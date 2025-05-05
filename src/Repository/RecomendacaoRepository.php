<?php
namespace App\Repository;

use App\Entity\Recomendacao;
use App\Service\JsonDatabaseService;

/**
 * Repositório para a entidade Recomendacao
 * 
 * Fornece métodos para acessar e manipular dados de recomendações.
 */
class RecomendacaoRepository
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
        $this->dbService = new JsonDatabaseService('recomendacoes');
    }
    
    /**
     * Retorna todas as recomendações
     * 
     * @return array Lista de objetos Recomendacao
     */
    public function findAll(): array
    {
        $recomendacoes = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            $recomendacoes[] = new Recomendacao($item);
        }
        
        return $recomendacoes;
    }
    
    /**
     * Busca uma recomendação pelo ID
     * 
     * @param int $id ID da recomendação
     * @return Recomendacao|null Recomendação encontrada ou null
     */
    public function findById(int $id): ?Recomendacao
    {
        $data = $this->dbService->getById($id);
        
        if ($data) {
            return new Recomendacao($data);
        }
        
        return null;
    }
    
    /**
     * Salva uma recomendação (insere ou atualiza)
     * 
     * @param Recomendacao $recomendacao Recomendação a ser salva
     * @return Recomendacao Recomendação salva com ID atualizado
     */
    public function save(Recomendacao $recomendacao): Recomendacao
    {
        $data = [
            'name' => $recomendacao->getName(),
            'position' => $recomendacao->getPosition(),
            'company' => $recomendacao->getCompany(),
            'avatar' => $recomendacao->getAvatar(),
            'text' => $recomendacao->getText()
        ];
        
        if ($recomendacao->getId()) {
            $this->dbService->update($recomendacao->getId(), $data);
            return $recomendacao;
        } else {
            $result = $this->dbService->insert($data);
            $recomendacao->setId($result->id);
            return $recomendacao;
        }
    }
    
    /**
     * Remove uma recomendação
     * 
     * @param int $id ID da recomendação a ser removida
     * @return bool True se a recomendação foi removida
     */
    public function delete(int $id): bool
    {
        return $this->dbService->delete($id);
    }
}
