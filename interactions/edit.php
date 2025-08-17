<?php require __DIR__ . '/boot.php'; ?>
<!doctype html><html lang="fr"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>PointClick Editor</title>
<link rel="stylesheet" href="public/admin.css">
</head><body>
<header>
  <div class="container">
    <nav>
      <a href="index.php">Dashboard</a>
      <a href="assets/index.php">Assets</a>
      <a href="objects/index.php">Objets</a>
      <a href="scenes/index.php">Scènes</a>
      <a href="interactions/index.php">Interactions</a>
      <?php if (current_user_id()): ?>
        <a href="logout.php" style="float:right">Déconnexion</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
<div class="container">
<?php foreach (get_flashes() as $f): ?>
  <div class="flash <?= e($f['type']) ?>"><?= e($f['message']) ?></div>
<?php endforeach; ?>

<div class="card">
  <h1>Éditer une interaction</h1>
  <p>Édition (à implémenter).</p>
</div>
</div></body></html>
