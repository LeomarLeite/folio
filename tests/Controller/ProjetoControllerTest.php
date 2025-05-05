<?php
namespace Tests\Controller;

use App\Controller\ProjetoController;
use App\Entity\Projeto;
use App\Repository\ProjetoRepository;
use PHPUnit\Framework\TestCase;

class ProjetoControllerTest extends TestCase
{
    private $mockRepository;
    private $controller;
    
    protected function setUp(): void
    {
        // Criar um mock do ProjetoRepository
        $this->mockRepository = $this->createMock(ProjetoRepository::class);
        
        // Criar o controlador
        $this->controller = new ProjetoController();
        
        // Substituir o repositório real pelo mock
        $reflection = new \ReflectionClass(ProjetoController::class);
        $property = $reflection->getProperty('repository');
        $property->setAccessible(true);
        $property->setValue($this->controller, $this->mockRepository);
    }
    
    public function testListar()
    {
        // Criar alguns projetos de teste
        $projeto1 = new Projeto();
        $projeto1->setId(1)->setTitle('Projeto 1');
        
        $projeto2 = new Projeto();
        $projeto2->setId(2)->setTitle('Projeto 2');

        // Configurar o mock para retornar os projetos de teste
        $this->mockRepository->method('findAll')
                            ->willReturn([$projeto1, $projeto2]);
        
        // Testar o método listar
        $result = $this->controller->listar();
        
        // Verificar se o resultado está correto
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Projeto::class, $result[0]);
        $this->assertInstanceOf(Projeto::class, $result[1]);
        $this->assertEquals(1, $result[0]->getId());
        $this->assertEquals(2, $result[1]->getId());
    }
    
    public function testBuscarPorId()
    {
        // Criar um projeto de teste
        $projeto = new Projeto();
        $projeto->setId(1)
                ->setTitle('Projeto Teste')
                ->setDescription('Descrição de teste');
        
        // Configurar o mock para retornar o projeto quando buscado pelo ID 1
        $this->mockRepository->method('findById')
                            ->with(1)
                            ->willReturn($projeto);
        
        // Testar o método buscarPorId
        $result = $this->controller->buscarPorId(1);
        
        // Verificar se o resultado está correto
        $this->assertInstanceOf(Projeto::class, $result);
        $this->assertEquals(1, $result->getId());
        $this->assertEquals('Projeto Teste', $result->getTitle());
        
        // Testar com um ID inexistente
        $this->mockRepository->method('findById')
                            ->with(999)
                            ->willReturn(null);
        
        $result = $this->controller->buscarPorId(999);
        $this->assertNull($result);
    }
    
    public function testSalvar()
    {
        // Dados para o projeto
        $dados = [
            'title' => 'Novo Projeto',
            'description' => 'Nova descrição',
            'image' => 'nova.jpg',
            'github' => 'https://github.com/user/novo',
            'demo' => 'https://demo.com/novo',
            'technologies' => ['PHP', 'JavaScript'],
            'ordem' => 5
        ];
        
        // Configurar o mock para simular o salvamento
        $this->mockRepository->expects($this->once())
                            ->method('save')
                            ->willReturnCallback(function($projeto) {
                                $projeto->setId(3); // Simular atribuição de ID
                                return $projeto;
                            });
        
        // Testar o método salvar
        $result = $this->controller->salvar($dados);
        
        // Verificar se o resultado está correto
        $this->assertInstanceOf(Projeto::class, $result);
        $this->assertEquals(3, $result->getId());
        $this->assertEquals('Novo Projeto', $result->getTitle());
        $this->assertEquals('Nova descrição', $result->getDescription());
        
        // Testar atualização
        $dadosAtualizados = [
            'id' => 3,
            'title' => 'Projeto Atualizado',
            'description' => 'Descrição atualizada',
            'image' => 'atualizada.jpg',
            'github' => 'https://github.com/user/atualizado',
            'demo' => 'https://demo.com/atualizado',
            'technologies' => ['PHP', 'MySQL'],
            'ordem' => 2
        ];
        
        $this->mockRepository->expects($this->once())
                            ->method('save')
                            ->willReturnCallback(function($projeto) {
                                return $projeto; // Retornar o mesmo projeto
                            });
        
        $result = $this->controller->salvar($dadosAtualizados);
        
        $this->assertInstanceOf(Projeto::class, $result);
        $this->assertEquals(3, $result->getId());
        $this->assertEquals('Projeto Atualizado', $result->getTitle());
        $this->assertEquals('Descrição atualizada', $result->getDescription());
    }
    
    public function testRemover()
    {
        // Configurar o mock para simular remoção bem-sucedida
        $this->mockRepository->method('delete')
                            ->with(1)
                            ->willReturn(true);
        
        // Testar o método remover
        $result = $this->controller->remover(1);
        
        // Verificar se o resultado está correto
        $this->assertTrue($result);
        
        // Testar remoção mal-sucedida
        $this->mockRepository->method('delete')
                            ->with(999)
                            ->willReturn(false);
        
        $result = $this->controller->remover(999);
        $this->assertFalse($result);
    }
}
