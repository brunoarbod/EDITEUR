<?php declare(strict_types=1);
require __DIR__ . '/boot.php';?>

<!doctype html><html lang="fr"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Connexion • PointClick Editor</title>
<link rel="stylesheet" href="public/admin.css">
</head><body><div class="container" style="max-width:520px;padding-top:40px">
  <div class="card">
    <h1>Connexion</h1>
    <?php foreach (get_flashes() as $f): ?>
      <div class="flash <?= e($f['type']) ?>"><?= e($f['message']) ?></div>
    <?php endforeach; ?>
    <form method="post" action="api/auth_login.php">
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Mot de passe</label>
      <input type="password" name="password" required>
      <?= csrf_field() ?>
      <button class="btn" type="submit">Se connecter</button>
    </form>
    <p style="margin-top:10px">Première fois ? <a href="setup.php">Créer l’admin</a></p>
  </div>
</div></body></html>
