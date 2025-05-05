<?php
namespace App\Repository;

use App\Entity\Sobre;
use App\Service\JsonDatabaseService;

/**
 * Repositório para a entidade Sobre
 * 
 * Fornece métodos para acessar e manipular dados da seção Sobre.
 */
class SobreRepository
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
        $this->dbService = new JsonDatabaseService('sobre');
    }
    
    /**
     * Retorna os dados da seção Sobre
     * 
     * @return Sobre Objeto com os dados da seção Sobre
     */
    public function find(): Sobre
    {
        $data = $this->dbService->getAll();
        
        // Como só temos um registro, pegamos o primeiro item
        // ou retornamos um objeto vazio se não houver dados
        if (is_array($data) && count($data) > 0) {
            return new Sobre($data[0]);
        } else {
            return new Sobre();
        }
    }
    
    /**
     * Salva os dados da seção Sobre
     * 
     * @param Sobre $sobre Dados da seção Sobre
     * @return Sobre Dados salvos
     */
    public function save(Sobre $sobre): Sobre
    {
        $data = [
            'title' => $sobre->getTitle(),
            'subtitle' => $sobre->getSubtitle(),
            'text' => $sobre->getText(),
            'image' => $sobre->getImage()
        ];
        
        // Verificamos se já existe um registro
        $existingData = $this->dbService->getAll();
        
        if (is_array($existingData) && count($existingData) > 0) {
            // Se já existe, atualizamos o primeiro registro
            $this->dbService->update(1, $data);
        } else {
            // Se não existe, inserimos um novo
            $this->dbService->insert($data);
        }
        
        return $sobre;
    }
}
