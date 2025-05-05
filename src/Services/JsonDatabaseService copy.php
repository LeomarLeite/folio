<?php
namespace App\Service;

/**
 * Serviço para manipulação de dados em arquivos JSON
 * 
 * Esta classe fornece métodos para ler e escrever dados em arquivos JSON,
 * funcionando como uma camada de abstração para o armazenamento de dados.
 */
class JsonDatabaseService
{
    /**
     * Caminho para o diretório de dados
     * 
     * @var string
     */
    private $dataDir;
    
    /**
     * Nome da entidade (arquivo JSON sem extensão)
     * 
     * @var string
     */
    private $entity;
    
    /**
     * Dados carregados do arquivo JSON
     * 
     * @var array
     */
    private $data = [];
    
    /**
     * Construtor
     * 
     * @param string $entity Nome da entidade (arquivo JSON sem extensão)
     */
    public function __construct(string $entity)
    {
        $this->dataDir = dirname(dirname(__DIR__)) . '/data/';
        $this->entity = $entity;
        $this->loadData();
    }
    
    /**
     * Carrega os dados do arquivo JSON
     * 
     * @return void
     */
    private function loadData(): void
    {
        $filePath = $this->getFilePath();
        
        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            $this->data = json_decode($jsonData) ?: [];
        }
    }
    
    /**
     * Salva os dados no arquivo JSON
     * 
     * @return bool Retorna true se os dados foram salvos com sucesso
     */
    private function saveData(): bool
    {
        $filePath = $this->getFilePath();
        
        // Garantir que a pasta existe
        if (!is_dir($this->dataDir)) {
            mkdir($this->dataDir, 0755, true);
        }
        
        $jsonData = json_encode($this->data, JSON_PRETTY_PRINT);
        return file_put_contents($filePath, $jsonData) !== false;
    }
    
    /**
     * Retorna o caminho completo para o arquivo JSON
     * 
     * @return string Caminho do arquivo
     */
    private function getFilePath(): string
    {
        return $this->dataDir . $this->entity . '.json';
    }
    
    /**
     * Retorna todos os registros
     * 
     * @return array Lista de registros
     */
    public function getAll(): array
    {
        return $this->data;
    }
    
    /**
     * Busca um registro pelo ID
     * 
     * @param int $id ID do registro
     * @return object|null Registro encontrado ou null
     */
    public function getById(int $id)
    {
        foreach ($this->data as $item) {
            if ($item->id == $id) {
                return $item;
            }
        }
        return null;
    }
    
    /**
     * Insere um novo registro
     * 
     * @param array $item Dados do registro
     * @return object Registro inserido com ID gerado
     */
    public function insert(array $item): object
    {
        // Gerar ID único
        $maxId = 0;
        foreach ($this->data as $existingItem) {
            if ($existingItem->id > $maxId) {
                $maxId = $existingItem->id;
            }
        }
        
        $item['id'] = $maxId + 1;
        $itemObject = (object) $item;
        $this->data[] = $itemObject;
        $this->saveData();
        
        return $itemObject;
    }
    
    /**
     * Atualiza um registro existente
     * 
     * @param int $id ID do registro
     * @param array $newData Novos dados
     * @return bool Retorna true se o registro foi atualizado
     */
    public function update(int $id, array $newData): bool
    {
        foreach ($this->data as $key => $item) {
            if ($item->id == $id) {
                // Manter o ID original
                $newData['id'] = $id;
                $this->data[$key] = (object) $newData;
                return $this->saveData();
            }
        }
        return false;
    }
    
    /**
     * Remove um registro
     * 
     * @param int $id ID do registro
     * @return bool Retorna true se o registro foi removido
     */
    public function delete(int $id): bool
    {
        foreach ($this->data as $key => $item) {
            if ($item->id == $id) {
                array_splice($this->data, $key, 1);
                return $this->saveData();
            }
        }
        return false;
    }
}
