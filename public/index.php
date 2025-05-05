<?php
/**
 * Front Controller
 * 
 * Este é o ponto de entrada único da aplicação.
 * Todas as requisições passam por aqui.
 */

// Carregar configurações
require_once dirname(__DIR__) . '/config/config.php';

// Definir constante para o diretório público
define('PUBLIC_DIR', __DIR__);

// Incluir o cabeçalho
require_once ROOT_DIR . '/includes/header.php';

// Carregar os módulos da página
require_once MODULES_DIR . '/menu/menu.php';
require_once MODULES_DIR . '/sobre/sobre.php';
require_once MODULES_DIR . '/habilidades/habilidades.php';
require_once MODULES_DIR . '/servicos/servicos.php';
require_once MODULES_DIR . '/projetos/projetos.php';
require_once MODULES_DIR . '/recomendacoes/recomendacoes.php';
require_once MODULES_DIR . '/contato/contato.php';

// Incluir o rodapé
require_once ROOT_DIR . '/includes/footer.php';
