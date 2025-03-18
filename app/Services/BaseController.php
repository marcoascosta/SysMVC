<?php

namespace App\Services;

class BaseController
{
    public function __construct()
    {
        // Adding security headers
        header("Content-Security-Policy: default-src 'self'; script-src 'self' https://trusted.cdn.com; style-src 'self' https://trusted.cdn.com; img-src 'self' data:;");
        header("X-Frame-Options: DENY");
        header("X-Content-Type-Options: nosniff");
        header("Referrer-Policy: no-referrer");
        header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
    }
}

?>
