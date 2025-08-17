<?php declare(strict_types=1);

require __DIR__ . '/../boot.php';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    json_response(['ok' => False, 'error' => 'POST requis'], 405);
}
csrf_assert();
if (!in_array(basename(__FILE__), ['auth_login.php', 'users_setup_admin.php']) && !current_user_id()) {
    json_response(['ok' => False, 'error' => 'Auth requise'], 401);
}

// TODO: implémenter la logique réelle pour interactions save
json_response(['ok' => true, 'endpoint' => basename(__FILE__), 'note' => 'placeholder']);
?>

