<?php

function startSessionIfNeeded() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function generateCsrfToken() {
    startSessionIfNeeded();
    
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    return $_SESSION['csrf_token'];
}

function getCsrfToken() {
    startSessionIfNeeded();
    return $_SESSION['csrf_token'] ?? '';
}

function validateCsrfToken($token) {
    startSessionIfNeeded();
    return hash_equals($_SESSION['csrf_token'] ?? '', $token ?? '');
}

?>


