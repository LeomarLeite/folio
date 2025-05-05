<?php
namespace App\Repository;

use App\Entity\Servico;
use App\Service\JsonDatabaseService;

/**
 * Repositório para a entidade Servico
 * 
 * Fornece métodos para acessar e manipular dados de serviços.
 */
class ServicoRepository
{
    /**
     * Serviço de banco de dados JSON
     * @var JsonDatabaseService
     */
    private $dbService;
    
    /**
     * Construtor
     */
    public function __construct()
    {
        $this->dbService = new JsonDatabaseService('servicos');
    }
    
    /**
     * Retorna todos os serviços
     * 
     * @return array Lista de objetos Servico
     */
    public function findAll(): array
    {
        $servicos = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            $servicos[] = new Servico($item);
        }
        
        return $servicos;
    }
    
    /**
     * Busca um serviço pelo ID
     * 
     * @param int $id ID do serviço
     * @return Servico|null Serviço encontrado ou null
     */
    public function findById(int $id): ?Servico
    {
        $data = $this->dbService->getById($id);
        
        if ($data) {
            return new Servico($data);
        }
        
        return null;
    }
    
    /**
     * Salva um serviço (insere ou atualiza)
     * 
     * @param Servico $servico Serviço a ser salvo
     * @return Servico Serviço salvo com ID atualizado
     */
    public function save(Servico $servico): Servico
    {
        $data = [
            'title' => $servico->getTitle(),
            'icon' => $servico->getIcon(),
            'items' => $servico->getItems()
        ];
        
        if ($servico->getId()) {
            $this->dbService->update($servico->getId(), $data);
            return $servico;
        } else {
            $result = $this->dbService->insert($data);
            $servico->setId($result->id);
            return $servico;
        }
    }
    
    /**
     * Remove um serviço
     * 
     * @param int $id ID do serviço a ser removido
     * @return bool True se o serviço foi removido
     */
    public function delete(int $id): bool
    {
        return $this->dbService->delete($id);
    }
}
