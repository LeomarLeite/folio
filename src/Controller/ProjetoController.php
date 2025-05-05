<?php
namespace App\Controller;

use App\Entity\Projeto;
use App\Repository\ProjetoRepository;

/**
 * Controlador para gerenciar projetos
 */
class ProjetoController
{
    /**
     * Repositório de projetos
     * @var ProjetoRepository
     */
    private $repository;
    
    /**
     * Construtor
     */
    public function __construct()
    {
        $this->repository = new ProjetoRepository();
    }
    
    /**
     * Lista todos os projetos
     * 
     * @return array Lista de projetos
     */
    public function listar(): array
    {
        return $this->repository->findAll();
    }
    
    /**
     * Busca um projeto pelo ID
     * 
     * @param int $id ID do projeto
     * @return Projeto|null Projeto encontrado ou null
     */
    public function buscarPorId(int $id): ?Projeto
    {
        return $this->repository->findById($id);
    }
    
    /**
     * Salva um projeto
     * 
     * @param array $dados Dados do projeto
     * @return Projeto Projeto salvo
     */
    public function salvar(array $dados): Projeto
    {
        $projeto = new Projeto();
        
        if (isset($dados['id'])) {
            $projeto->setId($dados['id']);
        }
        
        $projeto->setTitle($dados['title'] ?? '')
                ->setDescription($dados['description'] ?? '')
                ->setImage($dados['image'] ?? '')
                ->setGithub($dados['github'] ?? '')
                ->setDemo($dados['demo'] ?? '')
                ->setTechnologies($dados['technologies'] ?? []);
        
        return $this->repository->save($projeto);
    }
    
    /**
     * Remove um projeto
     * 
     * @param int $id ID do projeto
     * @return bool True se o projeto foi removido
     */
    public function remover(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
