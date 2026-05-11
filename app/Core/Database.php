<?php
declare(strict_types=1);

namespace App\Core;

use App\Support\Env;
use PDO;

final class Database
{
    private static ?PDO $connection = null;

    public static function connection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $dsn = Env::get('DB_DSN');

        if ($dsn === null) {
            $host = Env::get('DB_HOST', 'localhost');
            $port = Env::get('DB_PORT', '3306');
            $database = Env::get('DB_NAME', 'medcase_db');
            $charset = Env::get('DB_CHARSET', 'utf8mb4');
            $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $host, $port, $database, $charset);
        }

        self::$connection = new PDO(
            $dsn,
            Env::get('DB_USER', 'root'),
            Env::get('DB_PASS', ''),
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );

        return self::$connection;
    }
}

