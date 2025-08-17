<?php declare(strict_types=1);

require __DIR__ . '/boot.php';
logout_user();
flash('success', 'Vous êtes déconnecté.');
redirect('login.php');
?>

