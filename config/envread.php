<?php

/**
 * Carrega variáveis de ambiente do arquivo .env e define como constantes.
 *
 * @param string $path Caminho para o arquivo .env
 */
function loadEnvToConstants($path) {
    if (!file_exists($path)) {
        throw new Exception("Arquivo .env não encontrado no caminho: $path");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignorar comentários
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Dividir chave e valor
        list($name, $value) = explode('=', $line, 2);

        // Remover espaços em branco
        $name = trim($name);
        $value = trim($value);

        // Verificar se o valor está entre aspas e removê-las
        if (preg_match('/^"(.*)"$/', $value, $matches)) {
            $value = $matches[1];
        } elseif (preg_match("/^'(.*)'$/", $value, $matches)) {
            $value = $matches[1];
        }

        // Definir como constante
        define($name, $value);
    }
}

// Uso da função
try {
    loadEnvToConstants(__DIR__ . '/../.env'); // Ajuste o caminho conforme necessário
    # echo "Variáveis de ambiente carregadas como constantes com sucesso!";
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}
