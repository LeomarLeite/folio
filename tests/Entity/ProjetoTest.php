<?php
namespace Tests\Entity;

use App\Entity\Projeto;
use PHPUnit\Framework\TestCase;

class ProjetoTest extends TestCase
{
    public function testCriacaoDeProjeto()
    {
        $projeto = new Projeto();
        $this->assertInstanceOf(Projeto::class, $projeto);
    }
    
    public function testSettersEGetters()
    {
        $projeto = new Projeto();
        
        $projeto->setId(1)
                ->setTitle('Projeto Teste')
                ->setDescription('Descrição de teste')
                ->setImage('imagem.jpg')
                ->setGithub('https://github.com/usuario/projeto')
                ->setDemo('https://demo.exemplo.com')
                ->setTechnologies(['PHP', 'JavaScript'])
                ->setOrdem(5);
        
        $this->assertEquals(1, $projeto->getId());
        $this->assertEquals('Projeto Teste', $projeto->getTitle());
        $this->assertEquals('Descrição de teste', $projeto->getDescription());
        $this->assertEquals('imagem.jpg', $projeto->getImage());
        $this->assertEquals('https://github.com/usuario/projeto', $projeto->getGithub());
        $this->assertEquals('https://demo.exemplo.com', $projeto->getDemo());
        $this->assertEquals(['PHP', 'JavaScript'], $projeto->getTechnologies());
        $this->assertEquals(5, $projeto->getOrdem());
    }
    
    public function testCriacaoComDados()
    {
        $dados = (object)[
            'id' => 2,
            'title' => 'Projeto de Dados',
            'description' => 'Descrição do projeto',
            'image' => 'projeto.jpg',
            'github' => 'https://github.com/usuario/projeto-dados',
            'demo' => 'https://demo.exemplo.com/dados',
            'technologies' => ['PHP', 'MySQL'],
            'ordem' => 3
        ];
        
        $projeto = new Projeto($dados);
        
        $this->assertEquals(2, $projeto->getId());
        $this->assertEquals('Projeto de Dados', $projeto->getTitle());
        $this->assertEquals('Descrição do projeto', $projeto->getDescription());
        $this->assertEquals('projeto.jpg', $projeto->getImage());
        $this->assertEquals('https://github.com/usuario/projeto-dados', $projeto->getGithub());
        $this->assertEquals('https://demo.exemplo.com/dados', $projeto->getDemo());
        $this->assertEquals(['PHP', 'MySQL'], $projeto->getTechnologies());
        $this->assertEquals(3, $projeto->getOrdem());
    }
}
