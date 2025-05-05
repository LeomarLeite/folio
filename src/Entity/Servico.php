<?php
namespace App\Entity;

/**
 * Classe Servico
 * 
 * Representa um serviço oferecido no portfólio.
 */
class Servico
{
    /**
     * ID único do serviço
     * @var int
     */
    private $id;
    
    /**
     * Título do serviço
     * @var string
     */
    private $title;
    
    /**
     * Ícone do serviço
     * @var string
     */
    private $icon;
    
    /**
     * Itens do serviço
     * @var array
     */
    private $items;
    
    /**
     * Ordem de exibição do serviço
     * @var int
     */
    private $ordem;
    
    /**
     * Construtor
     * 
     * @param object|null $data Dados para inicializar o serviço
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->id = $data->id ?? null;
            $this->title = $data->title ?? '';
            $this->icon = $data->icon ?? '';
            $this->items = $data->items ?? [];
            $this->ordem = $data->ordem ?? 0;
        }
    }
    
    /**
     * Retorna o ID do serviço
     * 
     * @return int|null ID do serviço
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * Define o ID do serviço
     * 
     * @param int $id ID do serviço
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Retorna o título do serviço
     * 
     * @return string Título do serviço
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Define o título do serviço
     * 
     * @param string $title Título do serviço
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Retorna o ícone do serviço
     * 
     * @return string Ícone do serviço
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    
    /**
     * Define o ícone do serviço
     * 
     * @param string $icon Ícone do serviço
     * @return self
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }
    
    /**
     * Retorna os itens do serviço
     * 
     * @return array Itens do serviço
     */
    public function getItems(): array
    {
        return $this->items;
    }
    
    /**
     * Define os itens do serviço
     * 
     * @param array $items Itens do serviço
     * @return self
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }
    
    /**
     * Retorna a ordem de exibição do serviço
     * 
     * @return int Ordem de exibição
     */
    public function getOrdem(): int
    {
        return $this->ordem;
    }
    
    /**
     * Define a ordem de exibição do serviço
     * 
     * @param int $ordem Ordem de exibição
     * @return self
     */
    public function setOrdem(int $ordem): self
    {
        $this->ordem = $ordem;
        return $this;
    }
}
