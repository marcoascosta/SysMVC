<?php

/**
 * SysMVC - PHP Framework
 * 
 * PHP Framework.
 * 
 * @package    SysMVC
 * @author     Marco Costa (marcocosta@gmx.us)
 * @license    MIT
 * @since      2025-03-08
 * 
 */

 session_start();
 

use Symfony\Component\Dotenv\Dotenv;
use Pecee\SimpleRouter\SimpleRouter as Router;

// Carregar o autoloader do Composer
require __DIR__ . '/../vendor/autoload.php';



// Carregar o arquivo .env para variáveis de ambiente
$dotenv = new Dotenv();
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv->load(__DIR__ . '/../.env');
} else {
    throw new \Exception('.env file not found');
}

// Função para obter variáveis de ambiente com verificação
function getEnvOrDefault($name, $default = null) {
    $value = getenv($name);
    return $value !== false ? $value : $default;
}

// Configurações para o PHP
ini_set('memory_limit', getEnvOrDefault('PHP_MEMORY_LIMIT', '128M'));
ini_set('max_execution_time', getEnvOrDefault('PHP_MAX_EXECUTION_TIME', '30'));
ini_set('max_input_time', getEnvOrDefault('PHP_MAX_INPUT_TIME', '60'));
ini_set('upload_max_filesize', getEnvOrDefault('PHP_UPLOAD_MAX_FILESIZE', '2M'));
ini_set('post_max_size', getEnvOrDefault('PHP_POST_MAX_SIZE', '8M'));
ini_set('max_file_uploads', getEnvOrDefault('PHP_MAX_FILE_UPLOADS', '20'));
ini_set('display_errors', getEnvOrDefault('PHP_DISPLAY_ERRORS', '1'));
ini_set('display_startup_errors', getEnvOrDefault('PHP_DISPLAY_STARTUP_ERRORS', '1'));
ini_set('log_errors', getEnvOrDefault('PHP_LOG_ERRORS', '1'));
ini_set('error_log', getEnvOrDefault('PHP_ERROR_LOG', '/var/log/php_errors.log'));
error_reporting(constant(getEnvOrDefault('PHP_ERROR_REPORTING', 'E_ALL')));



// Ativar exibição de erros em desenvolvimento
ini_set('display_errors', 1);

require __DIR__ . '/../bootstrap/app.php';

// Iniciar o roteamento
Router::start();
