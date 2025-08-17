<?php declare(strict_types=1);

function flash(string $type, string $message): void {
    $_SESSION['flashes'][] = ['type' => $type, 'message' => $message];
}

function get_flashes(): array {
    $flashes = $_SESSION['flashes'] ?? [];
    unset($_SESSION['flashes']);
    return $flashes;
}
?>

