<?php
namespace App\Entity;

/**
 * Classe Sobre
 * 
 * Representa as informações da seção "Sobre" no portfólio.
 */
class Sobre
{
    /**
     * Título da seção
     * @var string
     */
    private $title;
    
    /**
     * Subtítulo da seção
     * @var string
     */
    private $subtitle;
    
    /**
     * Texto da seção (pode conter HTML)
     * @var string
     */
    private $text;
    
    /**
     * Caminho da imagem de perfil
     * @var string
     */
    private $image;
    
    /**
     * Construtor
     * 
     * @param object|null $data Dados para inicializar a seção Sobre
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->title = $data->title ?? '';
            $this->subtitle = $data->subtitle ?? '';
            $this->text = $data->text ?? '';
            $this->image = $data->image ?? '';
        }
    }
    
    /**
     * Retorna o título da seção
     * 
     * @return string Título da seção
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Define o título da seção
     * 
     * @param string $title Título da seção
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Retorna o subtítulo da seção
     * 
     * @return string Subtítulo da seção
     */
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }
    
    /**
     * Define o subtítulo da seção
     * 
     * @param string $subtitle Subtítulo da seção
     * @return self
     */
    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }
    
    /**
     * Retorna o texto da seção
     * 
     * @return string Texto da seção
     */
    public function getText(): string
    {
        return $this->text;
    }
    
    /**
     * Define o texto da seção
     * 
     * @param string $text Texto da seção
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
    
    /**
     * Retorna o caminho da imagem
     * 
     * @return string Caminho da imagem
     */
    public function getImage(): string
    {
        return $this->image;
    }
    
    /**
     * Define o caminho da imagem
     * 
     * @param string $image Caminho da imagem
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }
}
