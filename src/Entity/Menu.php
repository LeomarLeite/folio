<?php
namespace App\Entity;

/**
 * Classe Menu
 * 
 * Representa um item de menu no portfólio.
 */
class Menu
{
    /**
     * ID único do item de menu
     * @var int
     */
    private $id;
    
    /**
     * Título do item de menu
     * @var string
     */
    private $title;
    
    /**
     * Link do item de menu
     * @var string
     */
    private $link;
    
    /**
     * Ícone do item de menu
     * @var string
     */
    private $icon;
    
    /**
     * Flag para exibir ou não o item
     * @var bool
     */
    private $exibir;
    
    /**
     * Ordem de exibição do item
     * @var int
     */
    private $ordem;
    
    /**
     * Construtor
     * 
     * @param object|null $data Dados para inicializar o item de menu
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->id = $data->id ?? null;
            $this->title = $data->title ?? '';
            $this->link = $data->link ?? '';
            $this->icon = $data->icon ?? '';
            $this->exibir = $data->exibir ?? true;
            $this->ordem = $data->ordem ?? 0;
        }
    }
    
    /**
     * Retorna o ID do item de menu
     * 
     * @return int|null ID do item de menu
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * Define o ID do item de menu
     * 
     * @param int $id ID do item de menu
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Retorna o título do item de menu
     * 
     * @return string Título do item de menu
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Define o título do item de menu
     * 
     * @param string $title Título do item de menu
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Retorna o link do item de menu
     * 
     * @return string Link do item de menu
     */
    public function getLink(): string
    {
        return $this->link;
    }
    
    /**
     * Define o link do item de menu
     * 
     * @param string $link Link do item de menu
     * @return self
     */
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }
    
    /**
     * Retorna o ícone do item de menu
     * 
     * @return string Ícone do item de menu
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    
    /**
     * Define o ícone do item de menu
     * 
     * @param string $icon Ícone do item de menu
     * @return self
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }
    
    /**
     * Verifica se o item deve ser exibido
     * 
     * @return bool True se o item deve ser exibido
     */
    public function isExibir(): bool
    {
        return $this->exibir;
    }
    
    /**
     * Define se o item deve ser exibido
     * 
     * @param bool $exibir True se o item deve ser exibido
     * @return self
     */
    public function setExibir(bool $exibir): self
    {
        $this->exibir = $exibir;
        return $this;
    }
    
    /**
     * Retorna a ordem de exibição do item
     * 
     * @return int Ordem de exibição
     */
    public function getOrdem(): int
    {
        return $this->ordem;
    }
    
    /**
     * Define a ordem de exibição do item
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
