<?php

namespace App\Services;

class Sanitizer
{
    public static function sanitizeInput(array $data): array
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            $sanitizedData[$key] = static::sanitizeValue($value);
        }
        return $sanitizedData;
    }

    public static function sanitizeOutput($data)
    {
        if (is_array($data)) {
            return array_map([static::class, 'sanitizeOutput'], $data);
        }

        return $data !== null ? htmlspecialchars($data, ENT_QUOTES, 'UTF-8') : '';
    }

    private static function sanitizeValue($value)
    {
        if (is_array($value)) {
            return static::sanitizeInput($value);
        } elseif (is_null($value)) {
            return ''; // Ensures null does not pass through
        } elseif (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return filter_var($value, FILTER_SANITIZE_EMAIL);
        } elseif (filter_var($value, FILTER_VALIDATE_URL)) {
            return filter_var($value, FILTER_SANITIZE_URL);
        } else {
            return filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
    }
}
