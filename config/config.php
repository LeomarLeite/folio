<?php
// Configurações do site
define('SITE_NAME', 'Meu Portfólio');
define('SITE_URL', 'http://localhost/portfolio');
define('ADMIN_EMAIL', 'seu-email@exemplo.com');

// Configurações de diretórios
define('ROOT_DIR', dirname(__DIR__));
define('DATA_DIR', ROOT_DIR . '/data');
define('MODULES_DIR', ROOT_DIR . '/modules');
define('ASSETS_URL', '/assets'); // URL para os assets

// Configurações de debug
define('DEBUG_MODE', true);

// Autoloader para namespaces (estilo PSR-4)
spl_autoload_register(function ($className) {
    // Converter namespace para caminho de arquivo
    // App\Entity\Projeto -> src/Entity/Projeto.php
    $prefix = 'App\\';
    $baseDir = ROOT_DIR . '/src/';
    
    // Verificar se a classe usa o namespace App\
    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) {
        return;
    }
    
    // Obter o caminho relativo da classe
    $relativeClass = substr($className, $len);
    
    // Substituir namespace separators (\) por directory separators (/)
    // e adicionar .php
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    
    // Carregar o arquivo se existir
    if (file_exists($file)) {
        require $file;
    }
});

// Função para tratamento de erros
function handleError($errno, $errstr, $errfile, $errline) {
    if (DEBUG_MODE) {
        echo "<div style='background: #f8d7da; color: #721c24; padding: 10px; margin: 10px 0; border-radius: 5px;'>";
        echo "<strong>Erro:</strong> [$errno] $errstr<br>";
        echo "Arquivo: $errfile na linha $errline";
        echo "</div>";
    } else {
        // Em produção, registrar erros em um arquivo de log
        $logDir = ROOT_DIR . '/var/logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        error_log(date('[Y-m-d H:i:s]') . " Erro [$errno]: $errstr em $errfile na linha $errline" . PHP_EOL, 3, $logDir . '/error.log');
    }
    
    // Não executar o manipulador de erros interno do PHP
    return true;
}

// Configurar manipulador de erros
set_error_handler('handleError');

// Iniciar sessão
session_start();
