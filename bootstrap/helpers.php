<?php

use Carbon\Carbon;

/**
 * Formata uma data utilizando Carbon.
 *
 * @param string $date
 * @param string $format
 * @return string
 */
function carbonFormatDate(string $date, string $format = 'Y-m-d H:i:s'): string {
    return Carbon::parse($date)->format($format);
}

/**
 * Calcula a diferença entre duas datas utilizando Carbon.
 *
 * @param string $startDate
 * @param string $endDate
 * @return string
 */
function carbonDateDifference(string $startDate, string $endDate): string {
    $start = Carbon::parse($startDate);
    $end = Carbon::parse($endDate);
    return $start->diffForHumans($end);
}



/**
 * Gera a URL completa para um ativo (asset) no seu projeto.
 *
 * @param string $path Caminho relativo do ativo.
 * @return string URL completa do ativo.
 */
function asset($path)
{
    // Obter a URL base do aplicativo a partir das constantes definidas
    $baseUrl = rtrim(APP_URL, '/');

    // Combinar a URL base com o caminho do ativo
    return $baseUrl . '/' . ltrim($path, '/');
}





/**
 * Converte um valor monetário para centavos.
 *
 * @param float $amount
 * @return int
 */
function toCents(float $amount): int {
    return (int) round($amount * 100);
}

/**
 * Converte um valor monetário de centavos para reais.
 *
 * @param int $cents
 * @return float
 */
function fromCents(int $cents): float {
    return $cents / 100;
}




use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

/**
 * Cria um sistema de arquivos Flysystem.
 *
 * @return Filesystem
 */
function createFilesystem(): Filesystem {
    $adapter = new Local(__DIR__ . '/path/to/your/files');
    return new Filesystem($adapter);
}

/**
 * Verifica se um arquivo existe no Flysystem.
 *
 * @param string $filePath
 * @return bool
 */
function flysystemFileExists(string $filePath): bool {
    $filesystem = createFilesystem();
    return $filesystem->has($filePath);
}




use Intervention\Image\ImageManager;

/**
 * Redimensiona uma imagem utilizando Intervention Image.
 *
 * @param string $filePath
 * @param int $width
 * @param int $height
 * @return bool
 */
function resizeImage(string $filePath, int $width, int $height): bool {
    $manager = new ImageManager(['driver' => 'gd']);
    $image = $manager->make($filePath);
    $image->resize($width, $height);
    return $image->save();
}





// Funções Helpers Gerais

/**
 * Carrega uma view com o BladeOne.
 *
 * @param string $view
 * @param array $data
 * @return string
 */
function view(string $view, array $data = []): string {
    global $blade;
    return $blade->run($view, $data);
}

/**
 * Obtém a URL base.
 *
 * @param string $path
 * @return string
 */
function baseUrl(string $path = ''): string {
    return 'http://localhost/' . trim($path, '/');
}

// Funções Helpers para Arrays

/**
 * Verifica se um valor existe no array.
 *
 * @param array $array
 * @param string $key
 * @return bool
 */
function arrayHas(array $array, string $key): bool {
    return isset($array[$key]);
}

/**
 * Mescla arrays recursivamente.
 *
 * @param array $array1
 * @param array $array2
 * @return array
 */
function arrayMergeRecursive(array $array1, array $array2): array {
    return array_merge_recursive($array1, $array2);
}

/**
 * Obtém um valor de um array ou valor padrão.
 *
 * @param array $array
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function dataGet($array, $key, $default = null) {
    if (is_null($key)) {
        return $array;
    }

    if (isset($array[$key])) {
        return $array[$key];
    }

    foreach (explode('.', $key) as $segment) {
        if (is_array($array) && array_key_exists($segment, $array)) {
            $array = $array[$segment];
        } else {
            return $default;
        }
    }

    return $array;
}

// Funções Helpers para Strings

/**
 * Converte uma string para camel case.
 *
 * @param string $string
 * @return string
 */
function toCamelCase(string $string): string {
    $result = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $string)));
    $result[0] = strtolower($result[0]);
    return $result;
}

/**
 * Gera um slug a partir de uma string.
 *
 * @param string $string
 * @return string
 */
function generateSlug(string $string): string {
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
    return trim($slug, '-');
}

/**
 * Converte uma string para snake case.
 *
 * @param string $string
 * @return string
 */
function toSnakeCase(string $string): string {
    return strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($string)));
}

/**
 * Gera uma string aleatória.
 *
 * @param int $length
 * @return string
 */
function randomString(int $length = 10): string {
    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / 62))), 1, $length);
}

// Funções Helpers para Datas

/**
 * Obtém a data atual formatada.
 *
 * @param string $format
 * @return string
 */
function currentDateFormatted(string $format = 'Y-m-d H:i:s'): string {
    return date($format);
}

/**
 * Calcula a diferença entre duas datas.
 *
 * @param string $startDate
 * @param string $endDate
 * @return int
 */
function dateDifference(string $startDate, string $endDate): int {
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    return $start->diff($end)->days;
}

/**
 * Formata uma data.
 *
 * @param string $date
 * @param string $format
 * @return string
 */
function formatDate(string $date, string $format = 'Y-m-d H:i:s'): string {
    return date($format, strtotime($date));
}

/**
 * Calcula a idade a partir de uma data de nascimento.
 *
 * @param string $birthDate
 * @return int
 */
function calculateAge(string $birthDate): int {
    $birthDate = new DateTime($birthDate);
    $today = new DateTime('today');
    return $birthDate->diff($today)->y;
}

// Funções Helpers para Respostas HTTP

/**
 * Redireciona para outra URL.
 *
 * @param string $url
 */
function redirect(string $url) {
    header('Location: ' . $url);
    exit();
}

/**
 * Envia uma resposta JSON.
 *
 * @param array $data
 * @param int $statusCode
 */
function jsonResponse(array $data, int $statusCode = 200) {
    header('Content-Type: application/json');
    http_response_code($statusCode);
    echo json_encode($data);
    exit();
}

// Funções Helpers para Manipulação de Arquivos

/**
 * Verifica se um arquivo existe.
 *
 * @param string $filePath
 * @return bool
 */
function fileExists(string $filePath): bool {
    return file_exists($filePath);
}

/**
 * Cria um diretório.
 *
 * @param string $path
 * @param int $permissions
 */
function createDirectory(string $path, int $permissions = 0755) {
    if (!file_exists($path)) {
        mkdir($path, $permissions, true);
    }
}

// Funções Helpers Adicionais (Semelhantes ao Laravel)



/**
 * Verifica se a cadeia de caracteres termina com um dado sufixo.
 *
 * @param string $haystack
 * @param string|array $needles
 * @return bool
 */
function strEndsWith($haystack, $needles) {
    foreach ((array) $needles as $needle) {
        if ($needle !== '' && substr($haystack, -strlen($needle)) === $needle) {
            return true;
        }
    }
    return false;
}

/**
 * Verifica se a cadeia de caracteres contém um dado valor.
 *
 * @param string $haystack
 * @param string|array $needles
 * @return bool
 */
function strContains($haystack, $needles) {
    foreach ((array) $needles as $needle) {
        if ($needle !== '' && strpos($haystack, $needle) !== false) {
            return true;
        }
    }
    return false;
}

/**
 * Helper para debugar variáveis (Imprime de maneira legível e sai).
 *
 * @param mixed $var
 */
function dd($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

/**
 * Helper para imprimir variáveis de maneira legível.
 *
 * @param mixed $var
 */
function dump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}



// Funções Helpers para Valores Monetários

/**
 * Formata um valor monetário.
 *
 * @param float $amount
 * @param string $currency
 * @return string
 */
function formatCurrency(float $amount, string $currency = 'BRL'): string {
    $formatter = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($amount, $currency);
}

/**
 * Converte um valor monetário para centavos.
 *
 * @param float $amount
 * @return int
 */
function toCents2(float $amount): int {
    return (int) round($amount * 100);
}

/**
 * Converte um valor monetário de centavos para reais.
 *
 * @param int $cents
 * @return float
 */
function fromCents2(int $cents): float {
    return $cents / 100;
}

// Funções Helpers Adicionais (Semelhantes ao Laravel)

/**
 * Verifica se a cadeia de caracteres começa com um dado prefixo.
 *
 * @param string $haystack
 * @param string|array $needles
 * @return bool
 */
function strStartsWith($haystack, $needles) {
    foreach ((array) $needles as $needle) {
        if ($needle !== '' && substr($haystack, 0, strlen($needle)) === $needle) {
            return true;
        }
    }
    return false;
}



?>

