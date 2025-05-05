<?php
namespace Tests\Service;

use App\Service\JsonDatabaseService;
use PHPUnit\Framework\TestCase;

class JsonDatabaseServiceTest extends TestCase
{
    private $testDir;
    private $testFile;
    private $service;
    
    protected function setUp(): void
    {
        // Criar diretório temporário para testes
        $this->testDir = sys_get_temp_dir() . '/portfolio_test_' . uniqid();
        mkdir($this->testDir, 0777, true);
        
        // Substituir o diretório data pelo diretório de teste
        $reflection = new \ReflectionClass(JsonDatabaseService::class);
        $property = $reflection->getProperty('filepath');
        $property->setAccessible(true);
        
        // Criar o serviço com um arquivo de teste
        $this->testFile = 'test_data';
        $this->service = new JsonDatabaseService($this->testFile);
        
        // Modificar o caminho do arquivo para o diretório de teste
        $property->setValue($this->service, $this->testDir . '/' . $this->testFile . '.json');
    }
    
    protected function tearDown(): void
    {
        // Limpar arquivos temporários após os testes
        if (file_exists($this->testDir . '/' . $this->testFile . '.json')) {
            unlink($this->testDir . '/' . $this->testFile . '.json');
        }
        rmdir($this->testDir);
    }
    
    public function testInsert()
    {
        $data = [
            'title' => 'Teste',
            'description' => 'Descrição de teste'
        ];
        
        $result = $this->service->insert($data);
        
        $this->assertIsObject($result);
        $this->assertEquals(1, $result->id);
        $this->assertEquals('Teste', $result->title);
        $this->assertEquals('Descrição de teste', $result->description);
    }
    
    public function testGetAll()
    {
        // Inserir alguns dados de teste
        $this->service->insert(['title' => 'Item 1']);
        $this->service->insert(['title' => 'Item 2']);
        
        $result = $this->service->getAll();
        
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('Item 1', $result[0]->title);
        $this->assertEquals('Item 2', $result[1]->title);
    }
    
    public function testGetById()
    {
        $this->service->insert(['title' => 'Item 1']);
        $this->service->insert(['title' => 'Item 2']);
        
        $result = $this->service->getById(2);
        
        $this->assertIsObject($result);
        $this->assertEquals(2, $result->id);
        $this->assertEquals('Item 2', $result->title);
    }
    
    public function testUpdate()
    {
        $this->service->insert(['title' => 'Original']);
        
        $updated = $this->service->update(1, ['title' => 'Atualizado']);
        
        $this->assertTrue($updated);
        
        $item = $this->service->getById(1);
        $this->assertEquals('Atualizado', $item->title);
    }
    
    public function testDelete()
    {
        $this->service->insert(['title' => 'Item 1']);
        $this->service->insert(['title' => 'Item 2']);
        
        $deleted = $this->service->delete(1);
        
        $this->assertTrue($deleted);
        
        $all = $this->service->getAll();
        $this->assertCount(1, $all);
        $this->assertEquals(2, $all[0]->id);
    }
}
