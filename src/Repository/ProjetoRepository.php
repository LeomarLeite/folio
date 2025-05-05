<?php
namespace App\Repository;

use App\Entity\Projeto;
use App\Service\JsonDatabaseService;

/**
 * Repositório para a entidade Projeto
 * 
 * Fornece métodos para acessar e manipular dados de projetos.
 */
class ProjetoRepository
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
        $this->dbService = new JsonDatabaseService('projetos');
    }
    
    /**
     * Retorna todos os projetos
     * 
     * @return array Lista de objetos Projeto
     */
    public function findAll(): array
    {
        $projetos = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            $projetos[] = new Projeto($item);
        }
        
        return $projetos;
    }
    
    /**
     * Busca um projeto pelo ID
     * 
     * @param int $id ID do projeto
     * @return Projeto|null Projeto encontrado ou null
     */
    public function findById(int $id): ?Projeto
    {
        $data = $this->dbService->getById($id);
        
        if ($data) {
            return new Projeto($data);
        }
        
        return null;
    }
    
    /**
     * Salva um projeto (insere ou atualiza)
     * 
     * @param Projeto $projeto Projeto a ser salvo
     * @return Projeto Projeto salvo com ID atualizado
     */
    public function save(Projeto $projeto): Projeto
    {
        $data = [
            'title' => $projeto->getTitle(),
            'description' => $projeto->getDescription(),
            'image' => $projeto->getImage(),
            'github' => $projeto->getGithub(),
            'demo' => $projeto->getDemo(),
            'technologies' => $projeto->getTechnologies()
        ];
        
        if ($projeto->getId()) {
            $this->dbService->update($projeto->getId(), $data);
            return $projeto;
        } else {
            $result = $this->dbService->insert($data);
            $projeto->setId($result->id);
            return $projeto;
        }
    }
    
    /**
     * Remove um projeto
     * 
     * @param int $id ID do projeto a ser removido
     * @return bool True se o projeto foi removido
     */
    public function delete(int $id): bool
    {
        return $this->dbService->delete($id);
    }
}
