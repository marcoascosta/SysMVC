<?php

/**
 * Loads environment variables from the .env file and defines them as constants.
 *
 * @param string $path Path to the .env file
 */
function loadEnvToConstants($path) {
    if (!file_exists($path)) {
        throw new Exception("The .env file was not found at the path: $path");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignore comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Split key and value
        list($name, $value) = explode('=', $line, 2);

        // Remove whitespace
        $name = trim($name);
        $value = trim($value);

        // Check if the value is enclosed in quotes and remove them
        if (preg_match('/^"(.*)"$/', $value, $matches)) {
            $value = $matches[1];
        } elseif (preg_match("/^'(.*)'$/", $value, $matches)) {
            $value = $matches[1];
        }

        // Define as constant
        define($name, $value);
    }
}

// Using the function
try {
    loadEnvToConstants(__DIR__ . '/../.env'); // Adjust the path as necessary
    # echo "Environment variables successfully loaded as constants!";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
