<?php

use Carbon\Carbon;

/**
 * Formats a date using Carbon.
 *
 * @param string $date
 * @param string $format
 * @return string
 */
function carbonFormatDate(string $date, string $format = 'Y-m-d H:i:s'): string {
    return Carbon::parse($date)->format($format);
}

/**
 * Calculates the difference between two dates using Carbon.
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
 * Generates the full URL for an asset in your project.
 *
 * @param string $path The relative path of the asset.
 * @return string The full URL of the asset.
 */
function asset($path)
{
    // Get the base URL of the application from the defined constants
    $baseUrl = rtrim(APP_URL, '/');

    // Combine the base URL with the asset path
    return $baseUrl . '/' . ltrim($path, '/');
}

/**
 * Converts a monetary value to cents.
 *
 * @param float $amount
 * @return int
 */
function toCents(float $amount): int {
    return (int) round($amount * 100);
}

/**
 * Converts a monetary value from cents to reais.
 *
 * @param int $cents
 * @return float
 */
function fromCents(int $cents): float {
    return $cents / 100;
}

/**
 * Creates a Flysystem file system.
 *
 * @return Filesystem
 */
function createFilesystem(): Filesystem {
    $adapter = new Local(__DIR__ . '/path/to/your/files');
    return new Filesystem($adapter);
}

/**
 * Checks if a file exists in Flysystem.
 *
 * @param string $filePath
 * @return bool
 */
function flysystemFileExists(string $filePath): bool {
    $filesystem = createFilesystem();
    return $filesystem->has($filePath);
}

/**
 * Resizes an image using Intervention Image.
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

/**
 * Loads a view with BladeOne.
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
 * Gets the base URL.
 *
 * @param string $path
 * @return string
 */
function baseUrl(string $path = ''): string {
    return 'http://localhost/' . trim($path, '/');
}

/**
 * Checks if a value exists in the array.
 *
 * @param array $array
 * @param string $key
 * @return bool
 */
function arrayHas(array $array, string $key): bool {
    return isset($array[$key]);
}

/**
 * Merges arrays recursively.
 *
 * @param array $array1
 * @param array $array2
 * @return array
 */
function arrayMergeRecursive(array $array1, array $array2): array {
    return array_merge_recursive($array1, $array2);
}

/**
 * Gets a value from an array or returns a default value.
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

/**
 * Converts a string to camel case.
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
 * Generates a slug from a string.
 *
 * @param string $string
 * @return string
 */
function generateSlug(string $string): string {
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
    return trim($slug, '-');
}

/**
 * Converts a string to snake case.
 *
 * @param string $string
 * @return string
 */
function toSnakeCase(string $string): string {
    return strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($string)));
}

/**
 * Generates a random string.
 *
 * @param int $length
 * @return string
 */
function randomString(int $length = 10): string {
    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / 62))), 1, $length);
}

/**
 * Gets the current date formatted.
 *
 * @param string $format
 * @return string
 */
function currentDateFormatted(string $format = 'Y-m-d H:i:s'): string {
    return date($format);
}

/**
 * Calculates the difference between two dates.
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
 * Formats a date.
 *
 * @param string $date
 * @param string $format
 * @return string
 */
function formatDate(string $date, string $format = 'Y-m-d H:i:s'): string {
    return date($format, strtotime($date));
}

/**
 * Calculates the age from a birth date.
 *
 * @param string $birthDate
 * @return int
 */
function calculateAge(string $birthDate): int {
    $birthDate = new DateTime($birthDate);
    $today = new DateTime('today');
    return $birthDate->diff($today)->y;
}

/**
 * Redirects to another URL.
 *
 * @param string $url
 */
function redirect(string $url) {
    header('Location: ' . $url);
    exit();
}

/**
 * Sends a JSON response.
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

/**
 * Checks if a file exists.
 *
 * @param string $filePath
 * @return bool
 */
function fileExists(string $filePath): bool {
    return file_exists($filePath);
}

/**
 * Creates a directory.
 *
 * @param string $path
 * @param int $permissions
 */
function createDirectory(string $path, int $permissions = 0755) {
    if (!file_exists($path)) {
        mkdir($path, $permissions, true);
    }
}

/**
 * Checks if the string ends with a given suffix.
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
 * Checks if the string contains a given value.
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
 * Helper for debugging variables (prints in a readable manner and exits).
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
 * Helper for printing variables in a readable manner.
 *
 * @param mixed $var
 */
function dump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
 * Formats a monetary value.
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
 * Converts a monetary value to cents.
 *
 * @param float $amount
 * @return int
 */
function toCents2(float $amount): int {
    return (int) round($amount * 100);
}

/**
 * Converts a monetary value from cents to reais.
 *
 * @param int $cents
 * @return float
 */
function fromCents2(int $cents): float {
    return $cents / 100;
}

/**
 * Checks if the string starts with a given prefix.
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
