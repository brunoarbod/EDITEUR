<?php declare(strict_types=1);

final class DB {
    private static ?\PDO $pdo = null;

    public static function pdo(): \PDO {
        if (self::$pdo === null) {
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];
            self::$pdo = new \PDO(DB_DSN, DB_USER, DB_PASS, $options);
            // Enable foreign keys for SQLite
            if (str_starts_with(DB_DSN, 'sqlite:')) {
                self::$pdo->exec('PRAGMA foreign_keys = ON');
            }
        }
        return self::$pdo;
    }
}
?>

