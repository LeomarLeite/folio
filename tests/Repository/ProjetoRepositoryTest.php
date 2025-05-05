<?php
namespace Tests\Repository;

use App\Entity\Projeto;
use App\Repository\ProjetoRepository;
use App\Service\JsonDatabaseService;
use PHPUnit\Framework\TestCase;

class ProjetoRepositoryTest extends TestCase
{
    private $mockDbService;
    private $repository;
    
    protected function setUp(): void
    {
        // Criar um mock do JsonDatabaseService
        $this->mockDbService = $this->createMock(JsonDatabaseService::class);
        
        // Injetar o mock no repositório
        $this->repository = new ProjetoRepository();
        
        // Substituir o serviço real pelo mock
        $reflection = new \ReflectionClass(ProjetoRepository::class);
        $property = $reflection->getProperty('dbService');
        $property->setAccessible(true);
        $property->setValue($this->repository, $this->mockDbService);
    }
    
    public function testFindAll()
    {
        // Configurar o mock para retornar dados de teste
        $testData = [
            (object)[
                'id' => 1,
                'title' => 'Projeto 1',
                'description' => 'Descrição 1',
                'image' => 'imagem1.jpg',
                'github' => 'https://github.com/user/projeto1',
                'demo' => 'https://demo.com/1',
                'technologies' => ['PHP'],
                'ordem' => 2
            ],
            (object)[
                'id' => 2,
                'title' => 'Projeto 2',
                'description' => 'Descrição 2',
                'image' => 'imagem2.jpg',
                'github' => 'https://github.com/user/projeto2',
                'demo' => 'https://demo.com/2',
                'technologies' => ['JavaScript'],
                'ordem' => 1
            ]
        ];
        
        $this->mockDbService->method('getAll')
                           ->willReturn($testData);
        
        // Testar o método findAll
        $result = $this->repository->findAll();
        
        // Verificar se o resultado está correto
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Projeto::class, $result[0]);
        $this->assertInstanceOf(Projeto::class, $result[1]);
        
        // Verificar se os projetos estão ordenados por ordem
        $this->assertEquals(2, $result[0]->getId()); // Projeto 2 deve vir primeiro (ordem 1)
        $this->assertEquals(1, $result[1]->getId()); // Projeto 1 deve vir depois (ordem 2)
    }
    
    public function testFindById()
    {
        // Configurar o mock para retornar um projeto específico
        $testData = (object)[
            'id' => 1,
            'title' => 'Projeto Teste',
            'description' => 'Descrição teste',
            'image' => 'imagem.jpg',
            'github' => 'https://github.com/user/projeto',
            'demo' => 'https://demo.com',
            'technologies' => ['PHP', 'JavaScript'],
            'ordem' => 3
        ];
        
        $this->mockDbService->method('getById')
                           ->with(1)
                           ->willReturn($testData);
        
        // Testar o método findById
        $result = $this->repository->findById(1);
        
        // Verificar se o resultado está correto
        $this->assertInstanceOf(Projeto::class, $result);
        $this->assertEquals(1, $result->getId());
        $this->assertEquals('Projeto Teste', $result->getTitle());
    }
    
    public function testSave()
    {
        // Criar um projeto para salvar
        $projeto = new Projeto();
        $projeto->setTitle('Novo Projeto')
                ->setDescription('Nova descrição')
                ->setImage('nova.jpg')
                ->setGithub('https://github.com/user/novo')
                ->setDemo('https://demo.com/novo')
                ->setTechnologies(['PHP'])
                ->setOrdem(4);
        
        // Configurar o mock para simular inserção
        $this->mockDbService->expects($this->once())
                           ->method('insert')
                           ->willReturn((object)['id' => 3]);
        
        // Testar o método save para inserção
        $result = $this->repository->save($projeto);
        
        // Verificar se o resultado está correto
        $this->assertInstanceOf(Projeto::class, $result);
        $this->assertEquals(3, $result->getId());
        
        // Agora testar atualização
        $projeto->setId(3);
        $projeto->setTitle('Projeto Atualizado');
        
        // Configurar o mock para simular atualização
        $this->mockDbService->expects($this->once())
                           ->method('update')
                           ->with(3)
                           ->willReturn(true);
        
        // Testar o método save para atualização
        $result = $this->repository->save($projeto);
        
        // Verificar se o resultado está correto
        $this->assertInstanceOf(Projeto::class, $result);
        $this->assertEquals(3, $result->getId());
        $this->assertEquals('Projeto Atualizado', $result->getTitle());
    }
    
    public function testDelete()
    {
        // Configurar o mock para simular exclusão
        $this->mockDbService->expects($this->once())
                           ->method('delete')
                           ->with(1)
                           ->willReturn(true);
        
        // Testar o método delete
        $result = $this->repository->delete(1);
        
        // Verificar se o resultado está correto
        $this->assertTrue($result);
    }
}
