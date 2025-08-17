<?php declare(strict_types=1);

function current_user_id(): ?int { return $_SESSION['uid'] ?? null; }

function require_login(): void {
    if (!current_user_id()) { redirect('login.php'); }
}

function login_user(int $uid): void { $_SESSION['uid'] = $uid; }
function logout_user(): void { unset($_SESSION['uid']); session_regenerate_id(true); }

function password_hash_str(string $plain): string { return password_hash($plain, PASSWORD_DEFAULT); }

function password_verify_str(string $plain, string $hash): bool { return password_verify($plain, $hash); }

function ensure_sqlite_schema(): void {
    if (!str_starts_with(DB_DSN, 'sqlite:')) { return; }
    $pdo = DB::pdo();
    $pdo->exec('CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
    )');
}
?>

