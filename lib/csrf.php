<?php declare(strict_types=1);

function csrf_token(): string {
    $key = 'csrf_' . session_id();
    if (empty($_SESSION[$key])) {
        $_SESSION[$key] = bin2hex(hash_hmac('sha256', (string)random_int(1, PHP_INT_MAX), CSRF_SECRET, true));
    }
    return $_SESSION[$key];
}

function csrf_field(): string {
    return '<input type="hidden" name="_token" value="' . e(csrf_token()) . '">';
}

function csrf_assert(): void {
    $token = $_POST['_token'] ?? '';
    if (!hash_equals(csrf_token(), $token)) {
        json_response(['ok' => false, 'error' => 'Invalid CSRF token'], 419);
    }
}
?>

