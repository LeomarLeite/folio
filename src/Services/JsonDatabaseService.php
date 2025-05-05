<?php
namespace App\Service;

/**
 * Serviço para manipulação de arquivos JSON como banco de dados
 */
class JsonDatabaseService
{
    /**
     * Nome do arquivo JSON
     * @var string
     */
    private $filename;
    
    /**
     * Caminho completo para o arquivo JSON
     * @var string
     */
    private $filepath;
    
    /**
     * Construtor
     * 
     * @param string $filename Nome do arquivo JSON (sem extensão)
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->filepath = __DIR__ . '/../../data/' . $filename . '.json';
        
        // Cria o diretório data se não existir
        if (!is_dir(__DIR__ . '/../../data')) {
            mkdir(__DIR__ . '/../../data', 0755, true);
        }
        
        // Cria o arquivo JSON se não existir
        if (!file_exists($this->filepath)) {
            file_put_contents($this->filepath, json_encode([]));
        }
    }
    
    /**
     * Retorna todos os registros do arquivo JSON
     * 
     * @return array Registros do arquivo JSON
     */
    public function getAll(): array
    {
        $content = file_get_contents($this->filepath);
        return json_decode($content);
    }
    
    /**
     * Busca um registro pelo ID
     * 
     * @param int $id ID do registro
     * @return object|null Registro encontrado ou null
     */
    public function getById(int $id)
    {
        $data = $this->getAll();
        
        foreach ($data as $item) {
            if ($item->id === $id) {
                return $item;
            }
        }
        
        return null;
    }
    
    /**
     * Insere um novo registro
     * 
     * @param array $data Dados do registro
     * @return object Registro inserido com ID gerado
     */
    public function insert(array $data): object
    {
        $allData = $this->getAll();
        
        // Gera um novo ID
        $id = 1;
        if (count($allData) > 0) {
            $lastItem = end($allData);
            $id = $lastItem->id + 1;
        }
        
        // Adiciona o ID aos dados
        $data['id'] = $id;
        
        // Converte para objeto
        $newItem = (object) $data;
        
        // Adiciona ao array de dados
        $allData[] = $newItem;
        
        // Salva no arquivo
        file_put_contents($this->filepath, json_encode($allData, JSON_PRETTY_PRINT));
        
        return $newItem;
    }
    
    /**
     * Atualiza um registro existente
     * 
     * @param int $id ID do registro
     * @param array $data Novos dados
     * @return bool True se o registro foi atualizado
     */
    public function update(int $id, array $data): bool
    {
        $allData = $this->getAll();
        $updated = false;
        
        foreach ($allData as $key => $item) {
            if ($item->id === $id) {
                // Mantém o ID original
                $data['id'] = $id;
                
                // Atualiza o item
                $allData[$key] = (object) $data;
                $updated = true;
                break;
            }
        }
        
        if ($updated) {
            file_put_contents($this->filepath, json_encode($allData, JSON_PRETTY_PRINT));
        }
        
        return $updated;
    }
    
    /**
     * Remove um registro
     * 
     * @param int $id ID do registro
     * @return bool True se o registro foi removido
     */
    public function delete(int $id): bool
    {
        $allData = $this->getAll();
        $deleted = false;
        
        foreach ($allData as $key => $item) {
            if ($item->id === $id) {
                // Remove o item
                unset($allData[$key]);
                $deleted = true;
                break;
            }
        }
        
        if ($deleted) {
            // Reindexar o array
            $allData = array_values($allData);
            file_put_contents($this->filepath, json_encode($allData, JSON_PRETTY_PRINT));
        }
        
        return $deleted;
    }
}
