<?php
/**
 * DEZOPAY - Environment Variable Loader
 * Loads variables from .env file into $_ENV and getenv()
 * Include this file at the top of any file that needs credentials.
 */

function load_env($path = null) {
    if ($path === null) {
        $path = __DIR__ . '/.env';
    }

    if (!file_exists($path)) {
        // Fallback: check if environment variables are already set (e.g., on hosting)
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Parse KEY=VALUE
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            // Remove surrounding quotes if present
            if (preg_match('/^"(.*)"$/', $value, $matches)) {
                $value = $matches[1];
            } elseif (preg_match("/^'(.*)'$/", $value, $matches)) {
                $value = $matches[1];
            }

            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
}

// Auto-load on include
load_env();
