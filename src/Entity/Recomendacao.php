<?php
namespace App\Entity;

/**
 * Classe Recomendacao
 * 
 * Representa uma recomendação/depoimento no portfólio.
 */
class Recomendacao
{
    /**
     * ID único da recomendação
     * @var int
     */
    private $id;
    
    /**
     * Nome da pessoa que fez a recomendação
     * @var string
     */
    private $name;
    
    /**
     * Cargo da pessoa
     * @var string
     */
    private $position;
    
    /**
     * Empresa da pessoa
     * @var string
     */
    private $company;
    
    /**
     * Caminho para a imagem de avatar
     * @var string
     */
    private $avatar;
    
    /**
     * Texto da recomendação
     * @var string
     */
    private $text;
    
    /**
     * Ordem de exibição da recomendação
     * @var int
     */
    private $ordem;
    
    /**
     * Construtor
     * 
     * @param object|null $data Dados para inicializar a recomendação
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->id = $data->id ?? null;
            $this->name = $data->name ?? '';
            $this->position = $data->position ?? '';
            $this->company = $data->company ?? '';
            $this->avatar = $data->avatar ?? '';
            $this->text = $data->text ?? '';
            $this->ordem = $data->ordem ?? 0;
        }
    }
    
    /**
     * Retorna o ID da recomendação
     * 
     * @return int|null ID da recomendação
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * Define o ID da recomendação
     * 
     * @param int $id ID da recomendação
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Retorna o nome da pessoa
     * 
     * @return string Nome da pessoa
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * Define o nome da pessoa
     * 
     * @param string $name Nome da pessoa
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * Retorna o cargo da pessoa
     * 
     * @return string Cargo da pessoa
     */
    public function getPosition(): string
    {
        return $this->position;
    }
    
    /**
     * Define o cargo da pessoa
     * 
     * @param string $position Cargo da pessoa
     * @return self
     */
    public function setPosition(string $position): self
    {
        $this->position = $position;
        return $this;
    }
    
    /**
     * Retorna a empresa da pessoa
     * 
     * @return string Empresa da pessoa
     */
    public function getCompany(): string
    {
        return $this->company;
    }
    
    /**
     * Define a empresa da pessoa
     * 
     * @param string $company Empresa da pessoa
     * @return self
     */
    public function setCompany(string $company): self
    {
        $this->company = $company;
        return $this;
    }
    
    /**
     * Retorna o caminho do avatar
     * 
     * @return string Caminho do avatar
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }
    
    /**
     * Define o caminho do avatar
     * 
     * @param string $avatar Caminho do avatar
     * @return self
     */
    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }
    
    /**
     * Retorna o texto da recomendação
     * 
     * @return string Texto da recomendação
     */
    public function getText(): string
    {
        return $this->text;
    }
    
    /**
     * Define o texto da recomendação
     * 
     * @param string $text Texto da recomendação
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
    
    /**
     * Retorna a ordem de exibição da recomendação
     * 
     * @return int Ordem de exibição
     */
    public function getOrdem(): int
    {
        return $this->ordem;
    }
    
    /**
     * Define a ordem de exibição da recomendação
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
