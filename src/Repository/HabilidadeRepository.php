<?php
namespace App\Repository;

use App\Entity\Habilidade;
use App\Service\JsonDatabaseService;

/**
 * Repositório para a entidade Habilidade
 * 
 * Fornece métodos para acessar e manipular dados de habilidades.
 */
class HabilidadeRepository
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
        $this->dbService = new JsonDatabaseService('habilidades');
    }
    
    /**
     * Retorna todas as habilidades
     * 
     * @return array Lista de objetos Habilidade
     */
    public function findAll(): array
    {
        $habilidades = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            $habilidades[] = new Habilidade($item);
        }
        
        return $habilidades;
    }
    
    /**
     * Busca uma habilidade pelo ID
     * 
     * @param int $id ID da habilidade
     * @return Habilidade|null Habilidade encontrada ou null
     */
    public function findById(int $id): ?Habilidade
    {
        $data = $this->dbService->getById($id);
        
        if ($data) {
            return new Habilidade($data);
        }
        
        return null;
    }
    
    /**
     * Encontra habilidades por grupo
     * 
     * @param string $group Nome do grupo
     * @return array Lista de habilidades do grupo
     */
    public function findByGroup(string $group): array
    {
        $habilidades = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            if ($item->group === $group) {
                $habilidades[] = new Habilidade($item);
            }
        }
        
        return $habilidades;
    }
    
    /**
     * Salva uma habilidade (insere ou atualiza)
     * 
     * @param Habilidade $habilidade Habilidade a ser salva
     * @return Habilidade Habilidade salva com ID atualizado
     */
    public function save(Habilidade $habilidade): Habilidade
    {
        $data = [
            'name' => $habilidade->getName(),
            'level' => $habilidade->getLevel(),
            'icon' => $habilidade->getIcon(),
            'group' => $habilidade->getGroup()
        ];
        
        if ($habilidade->getId()) {
            $this->dbService->update($habilidade->getId(), $data);
            return $habilidade;
        } else {
            $result = $this->dbService->insert($data);
            $habilidade->setId($result->id);
            return $habilidade;
        }
    }
    
    /**
     * Remove uma habilidade
     * 
     * @param int $id ID da habilidade a ser removida
     * @return bool True se a habilidade foi removida
     */
    public function delete(int $id): bool
    {
        return $this->dbService->delete($id);
    }
}
