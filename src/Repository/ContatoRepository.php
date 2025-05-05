<?php
namespace App\Repository;

use App\Entity\Contato;
use App\Service\JsonDatabaseService;

/**
 * Repositório para a entidade Contato
 * 
 * Fornece métodos para acessar e manipular dados de contatos.
 */
class ContatoRepository
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
        $this->dbService = new JsonDatabaseService('contato');
    }
    
    /**
     * Retorna todos os contatos
     * 
     * @return array Lista de objetos Contato
     */
    public function findAll(): array
    {
        $contatos = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            $contatos[] = new Contato($item);
        }
        
        return $contatos;
    }
    
    /**
     * Retorna todos os contatos visíveis
     * 
     * @return array Lista de objetos Contato
     */
    public function findAllVisible(): array
    {
        $contatos = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            if ($item->exibir) {
                $contatos[] = new Contato($item);
            }
        }
        
        return $contatos;
    }
    
    /**
     * Busca um contato pelo ID
     * 
     * @param int $id ID do contato
     * @return Contato|null Contato encontrado ou null
     */
    public function findById(int $id): ?Contato
    {
        $data = $this->dbService->getById($id);
        
        if ($data) {
            return new Contato($data);
        }
        
        return null;
    }
    
    /**
     * Salva um contato (insere ou atualiza)
     * 
     * @param Contato $contato Contato a ser salvo
     * @return Contato Contato salvo com ID atualizado
     */
    public function save(Contato $contato): Contato
    {
        $data = [
            'title' => $contato->getTitle(),
            'link' => $contato->getLink(),
            'mascara-link' => $contato->getMascaraLink(),
            'icon' => $contato->getIcon(),
            'exibir' => $contato->isExibir()
        ];
        
        if ($contato->getId()) {
            $this->dbService->update($contato->getId(), $data);
            return $contato;
        } else {
            $result = $this->dbService->insert($data);
            $contato->setId($result->id);
            return $contato;
        }
    }
    
    /**
     * Remove um contato
     * 
     * @param int $id ID do contato a ser removido
     * @return bool True se o contato foi removido
     */
    public function delete(int $id): bool
    {
        return $this->dbService->delete($id);
    }
}