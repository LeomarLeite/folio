<?php
namespace App\Repository;

use App\Entity\Menu;
use App\Service\JsonDatabaseService;

/**
 * Repositório para a entidade Menu
 * 
 * Fornece métodos para acessar e manipular dados de itens de menu.
 */
class MenuRepository
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
        $this->dbService = new JsonDatabaseService('menu');
    }
    
    /**
     * Retorna todos os itens de menu
     * 
     * @return array Lista de objetos Menu
     */
    public function findAll(): array
    {
        $menuItems = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            $menuItems[] = new Menu($item);
        }
        
        return $menuItems;
    }
    
    /**
     * Retorna todos os itens de menu visíveis, ordenados
     * 
     * @return array Lista de objetos Menu
     */
    public function findAllVisible(): array
    {
        $menuItems = [];
        $data = $this->dbService->getAll();
        
        foreach ($data as $item) {
            if ($item->exibir) {
                $menuItems[] = new Menu($item);
            }
        }
        
        // Ordenar por ordem
        usort($menuItems, function($a, $b) {
            return $a->getOrdem() - $b->getOrdem();
        });
        
        return $menuItems;
    }
    
    /**
     * Busca um item de menu pelo ID
     * 
     * @param int $id ID do item de menu
     * @return Menu|null Item de menu encontrado ou null
     */
    public function findById(int $id): ?Menu
    {
        $data = $this->dbService->getById($id);
        
        if ($data) {
            return new Menu($data);
        }
        
        return null;
    }
    
    /**
     * Salva um item de menu (insere ou atualiza)
     * 
     * @param Menu $menu Item de menu a ser salvo
     * @return Menu Item de menu salvo com ID atualizado
     */
    public function save(Menu $menu): Menu
    {
        $data = [
            'title' => $menu->getTitle(),
            'link' => $menu->getLink(),
            'icon' => $menu->getIcon(),
            'exibir' => $menu->isExibir(),
            'ordem' => $menu->getOrdem()
        ];
        
        if ($menu->getId()) {
            $this->dbService->update($menu->getId(), $data);
            return $menu;
        } else {
            $result = $this->dbService->insert($data);
            $menu->setId($result->id);
            return $menu;
        }
    }
    
    /**
     * Remove um item de menu
     * 
     * @param int $id ID do item de menu a ser removido
     * @return bool True se o item de menu foi removido
     */
    public function delete(int $id): bool
    {
        return $this->dbService->delete($id);
    }
}
