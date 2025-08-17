<?php declare(strict_types=1);

require __DIR__ . '/../boot.php';
csrf_assert();
ensure_sqlite_schema();

$email = trim((string)($_POST['email'] ?? ''));
$pass  = (string)($_POST['password'] ?? '');

if ($email === '' || $pass === '') {
    flash('error', 'Email et mot de passe requis');
    redirect('../login.php');
}

$pdo = DB::pdo();
$stmt = $pdo->prepare('SELECT id, password FROM users WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user || !password_verify_str($pass, $user['password'])) {
    flash('error', 'Identifiants invalides');
    redirect('../login.php');
}

login_user((int)$user['id']);
flash('success', 'Connexion réussie');
redirect('../index.php');
?>

