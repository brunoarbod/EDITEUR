<?php declare(strict_types=1);
require __DIR__ . '/boot.php';?>

<!doctype html><html lang="fr"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Installation • PointClick Editor</title>
<link rel="stylesheet" href="public/admin.css">
</head><body><div class="container" style="max-width:520px;padding-top:40px">
  <div class="card">
    <h1>Créer le compte admin</h1>
    <form method="post" action="api/users_setup_admin.php">
      <label>Email admin</label>
      <input type="email" name="email" required>
      <label>Mot de passe</label>
      <input type="password" name="password" required>
      <?= csrf_field() ?>
      <button class="btn" type="submit">Créer</button>
    </form>
  </div>
</div></body></html>
