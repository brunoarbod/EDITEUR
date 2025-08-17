<?php declare(strict_types=1);

/**
 * Minimal configuration. Fill with your real secrets.
 * Prefer environment variables in production.
 */
define('APP_ENV', getenv('APP_ENV') ?: 'dev');
define('BASE_URL', getenv('BASE_URL') ?: '/pointclick-editor');

// Database (example: mysql:host=127.0.0.1;dbname=pointclick;charset=utf8mb4)
define('DB_DSN', getenv('DB_DSN') ?: 'sqlite:' . __DIR__ . '/var/dev.sqlite');
define('DB_USER', getenv('DB_USER') ?: '');
define('DB_PASS', getenv('DB_PASS') ?: '');

// Security
define('CSRF_SECRET', getenv('CSRF_SECRET') ?: 'change-this-please');

// Uploads
define('UPLOAD_DIR', __DIR__ . '/uploads');
if (!is_dir(UPLOAD_DIR)) { mkdir(UPLOAD_DIR, 0775, true); }
?>

