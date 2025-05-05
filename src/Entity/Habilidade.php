<?php
namespace App\Entity;

/**
 * Classe Habilidade
 * 
 * Representa uma habilidade técnica no portfólio.
 */
class Habilidade
{
    /**
     * ID único da habilidade
     * @var int
     */
    private $id;
    
    /**
     * Nome da habilidade
     * @var string
     */
    private $name;
    
    /**
     * Nível de conhecimento
     * @var string
     */
    private $level;
    
    /**
     * Ícone da habilidade
     * @var string
     */
    private $icon;
    
    /**
     * Grupo da habilidade (ex: Frontend, Backend)
     * @var string
     */
    private $group;
    
    /**
     * Ordem de exibição da habilidade
     * @var int
     */
    private $ordem;
    
    /**
     * Construtor
     * 
     * @param object|null $data Dados para inicializar a habilidade
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->id = $data->id ?? null;
            $this->name = $data->name ?? '';
            $this->level = $data->level ?? '';
            $this->icon = $data->icon ?? '';
            $this->group = $data->group ?? '';
            $this->ordem = $data->ordem ?? 0;
        }
    }
    
    /**
     * Retorna o ID da habilidade
     * 
     * @return int|null ID da habilidade
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * Define o ID da habilidade
     * 
     * @param int $id ID da habilidade
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Retorna o nome da habilidade
     * 
     * @return string Nome da habilidade
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * Define o nome da habilidade
     * 
     * @param string $name Nome da habilidade
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * Retorna o nível de conhecimento
     * 
     * @return string Nível de conhecimento
     */
    public function getLevel(): string
    {
        return $this->level;
    }
    
    /**
     * Define o nível de conhecimento
     * 
     * @param string $level Nível de conhecimento
     * @return self
     */
    public function setLevel(string $level): self
    {
        $this->level = $level;
        return $this;
    }
    
    /**
     * Retorna o ícone da habilidade
     * 
     * @return string Ícone da habilidade
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    
    /**
     * Define o ícone da habilidade
     * 
     * @param string $icon Ícone da habilidade
     * @return self
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }
    
    /**
     * Retorna o grupo da habilidade
     * 
     * @return string Grupo da habilidade
     */
    public function getGroup(): string
    {
        return $this->group;
    }
    
    /**
     * Define o grupo da habilidade
     * 
     * @param string $group Grupo da habilidade
     * @return self
     */
    public function setGroup(string $group): self
    {
        $this->group = $group;
        return $this;
    }
    
    /**
     * Retorna a ordem de exibição da habilidade
     * 
     * @return int Ordem de exibição
     */
    public function getOrdem(): int
    {
        return $this->ordem;
    }
    
    /**
     * Define a ordem de exibição da habilidade
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
