<?php declare(strict_types=1);

require __DIR__ . '/../boot.php';
csrf_assert();
ensure_sqlite_schema();

$email = trim((string)($_POST['email'] ?? ''));
$pass  = (string)($_POST['password'] ?? '');

if ($email === '' || $pass === '') {
    flash('error', 'Email et mot de passe requis');
    redirect('../setup.php');
}

$pdo = DB::pdo();
$exists = $pdo->query('SELECT COUNT(*) AS c FROM users')->fetch()['c'] ?? 0;

if ((int)$exists > 0) {
    flash('error', 'Un utilisateur existe déjà.');
    redirect('../login.php');
}

$stmt = $pdo->prepare('INSERT INTO users(email, password) VALUES (?, ?)');
$stmt->execute([$email, password_hash_str($pass)]);

flash('success', 'Admin créé, vous pouvez vous connecter.');
redirect('../login.php');
?>

