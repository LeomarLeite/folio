<?php
namespace App\Entity;

/**
 * Classe Contato
 * 
 * Representa um meio de contato no portfólio.
 */
class Contato
{
    /**
     * ID único do contato
     * @var int
     */
    private $id;
    
    /**
     * Título do contato
     * @var string
     */
    private $title;
    
    /**
     * Link do contato
     * @var string
     */
    private $link;
    
    /**
     * Máscara para o link
     * @var string
     */
    private $mascaraLink;
    
    /**
     * Ícone do contato
     * @var string
     */
    private $icon;
    
    /**
     * Flag para exibir ou não o contato
     * @var bool
     */
    private $exibir;
    
    /**
     * Construtor
     * 
     * @param object|null $data Dados para inicializar o contato
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->id = $data->id ?? null;
            $this->title = $data->title ?? '';
            $this->link = $data->link ?? '';
            $this->mascaraLink = $data->{'mascara-link'} ?? '';
            $this->icon = $data->icon ?? '';
            $this->exibir = $data->exibir ?? true;
        }
    }
    
    /**
     * Retorna o ID do contato
     * 
     * @return int|null ID do contato
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * Define o ID do contato
     * 
     * @param int $id ID do contato
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Retorna o título do contato
     * 
     * @return string Título do contato
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Define o título do contato
     * 
     * @param string $title Título do contato
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Retorna o link do contato
     * 
     * @return string Link do contato
     */
    public function getLink(): string
    {
        return $this->link;
    }
    
    /**
     * Define o link do contato
     * 
     * @param string $link Link do contato
     * @return self
     */
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }
    
    /**
     * Retorna a máscara do link
     * 
     * @return string Máscara do link
     */
    public function getMascaraLink(): string
    {
        return $this->mascaraLink;
    }
    
    /**
     * Define a máscara do link
     * 
     * @param string $mascaraLink Máscara do link
     * @return self
     */
    public function setMascaraLink(string $mascaraLink): self
    {
        $this->mascaraLink = $mascaraLink;
        return $this;
    }
    
    /**
     * Retorna o ícone do contato
     * 
     * @return string Ícone do contato
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    
    /**
     * Define o ícone do contato
     * 
     * @param string $icon Ícone do contato
     * @return self
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }
    
    /**
     * Verifica se o contato deve ser exibido
     * 
     * @return bool True se o contato deve ser exibido
     */
    public function isExibir(): bool
    {
        return $this->exibir;
    }
    
    /**
     * Define se o contato deve ser exibido
     * 
     * @param bool $exibir True se o contato deve ser exibido
     * @return self
     */
    public function setExibir(bool $exibir): self
    {
        $this->exibir = $exibir;
        return $this;
    }
}
