<?php
namespace App\Entity;

/**
 * Classe Projeto
 * 
 * Representa um projeto no portfólio.
 */
class Projeto
{
    /**
     * ID único do projeto
     * @var int
     */
    private $id;
    
    /**
     * Título do projeto
     * @var string
     */
    private $title;
    
    /**
     * Descrição do projeto
     * @var string
     */
    private $description;
    
    /**
     * Caminho da imagem do projeto
     * @var string
     */
    private $image;
    
    /**
     * Link para o repositório GitHub
     * @var string
     */
    private $github;
    
    /**
     * Link para demonstração do projeto
     * @var string
     */
    private $demo;
    
    /**
     * Lista de tecnologias utilizadas
     * @var array
     */
    private $technologies;
    
    /**
     * Ordem de exibição do projeto
     * @var int
     */
    private $ordem;
    
    /**
     * Construtor
     * 
     * @param object|null $data Dados para inicializar o projeto
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->id = $data->id ?? null;
            $this->title = $data->title ?? '';
            $this->description = $data->description ?? '';
            $this->image = $data->image ?? '';
            $this->github = $data->github ?? '';
            $this->demo = $data->demo ?? '';
            $this->technologies = $data->technologies ?? [];
            $this->ordem = $data->ordem ?? 0;
        }
    }
    
    /**
     * Retorna o ID do projeto
     * 
     * @return int|null ID do projeto
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * Define o ID do projeto
     * 
     * @param int $id ID do projeto
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Retorna o título do projeto
     * 
     * @return string Título do projeto
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Define o título do projeto
     * 
     * @param string $title Título do projeto
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Retorna a descrição do projeto
     * 
     * @return string Descrição do projeto
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * Define a descrição do projeto
     * 
     * @param string $description Descrição do projeto
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * Retorna o caminho da imagem do projeto
     * 
     * @return string Caminho da imagem
     */
    public function getImage(): string
    {
        return $this->image;
    }
    
    /**
     * Define o caminho da imagem do projeto
     * 
     * @param string $image Caminho da imagem
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }
    
    /**
     * Retorna o link do GitHub
     * 
     * @return string Link do GitHub
     */
    public function getGithub(): string
    {
        return $this->github;
    }
    
    /**
     * Define o link do GitHub
     * 
     * @param string $github Link do GitHub
     * @return self
     */
    public function setGithub(string $github): self
    {
        $this->github = $github;
        return $this;
    }
    
    /**
     * Retorna o link da demonstração
     * 
     * @return string Link da demonstração
     */
    public function getDemo(): string
    {
        return $this->demo;
    }
    
    /**
     * Define o link da demonstração
     * 
     * @param string $demo Link da demonstração
     * @return self
     */
    public function setDemo(string $demo): self
    {
        $this->demo = $demo;
        return $this;
    }
    
    /**
     * Retorna as tecnologias utilizadas
     * 
     * @return array Lista de tecnologias
     */
    public function getTechnologies(): array
    {
        return $this->technologies;
    }
    
    /**
     * Define as tecnologias utilizadas
     * 
     * @param array $technologies Lista de tecnologias
     * @return self
     */
    public function setTechnologies(array $technologies): self
    {
        $this->technologies = $technologies;
        return $this;
    }
    
    /**
     * Retorna a ordem de exibição do projeto
     * 
     * @return int Ordem de exibição
     */
    public function getOrdem(): int
    {
        return $this->ordem;
    }
    
    /**
     * Define a ordem de exibição do projeto
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
