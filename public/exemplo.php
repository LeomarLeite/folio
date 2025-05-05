<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php';
// require_once __DIR__ . '/../src/Entity/Projeto.php';
// require_once __DIR__ . '/../src/Repository/ProjetoRepository.php';
// require_once __DIR__ . '/../src/Controller/ProjetoController.php';


use App\Controller\ProjetoController;

// Instanciar o controlador
$projetoController = new ProjetoController();

// Listar todos os projetos
$projetos = $projetoController->listar();
echo "Projetos encontrados: " . count($projetos) . "\n";

// Buscar um projeto específico
$projeto = $projetoController->buscarPorId(1);
if ($projeto) {
    echo "Projeto encontrado: " . $projeto->getTitle() . "\n";
} else {
    echo "Projeto não encontrado.\n";
}

// Adicionar um novo projeto
$novoProjeto = $projetoController->salvar([
    'title' => 'Novo Projeto',
    'description' => 'Descrição do novo projeto',
    'image' => 'assets/images/novo-projeto.jpg',
    'github' => 'https://github.com/username/novo-projeto',
    'demo' => 'https://exemplo.com/demo-novo',
    'technologies' => ['PHP', 'JavaScript', 'CSS']
]);
echo "Novo projeto adicionado com ID: " . $novoProjeto->getId() . "\n";

// Atualizar um projeto existente
$projetoAtualizado = $projetoController->salvar([
    'id' => 1,
    'title' => 'Projeto Atualizado',
    'description' => 'Descrição atualizada',
    'image' => 'assets/images/projeto1.jpg',
    'github' => 'https://github.com/username/projeto1',
    'demo' => 'https://exemplo.com/demo1',
    'technologies' => ['PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript']
]);
echo "Projeto atualizado: " . $projetoAtualizado->getTitle() . "\n";

// Remover um projeto
// Descomente para testar
// $removido = $projetoController->remover(3);
// echo "Projeto removido: " . ($removido ? "Sim" : "Não") . "\n";
