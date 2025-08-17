<?php declare(strict_types=1);

session_start();
date_default_timezone_set('Europe/Paris');

require_once __DIR__ . '/config.php';

// simple autoload for lib/*
spl_autoload_register(function($class) {
    $file = __DIR__ . '/lib/' . strtolower($class) . '.php';
    if (is_file($file)) { require_once $file; }
});

// Preload helpers
require_once __DIR__ . '/lib/utils.php';
require_once __DIR__ . '/lib/flash.php';
require_once __DIR__ . '/lib/csrf.php';
require_once __DIR__ . '/lib/auth.php';
?>

