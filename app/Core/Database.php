<?php
declare(strict_types=1);

namespace App\Core;

use App\Support\Env;
use PDO;

final class Database
{
    private static ?PDO $connection = null;
    private static ?array $config = null;

    public static function connection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $config = self::config();
        $dsn = Env::get('DB_DSN', self::configValue($config, 'dsn'));

        if ($dsn === null) {
            $host = Env::get('DB_HOST', self::configValue($config, 'host', 'localhost'));
            $port = Env::get('DB_PORT', self::configValue($config, 'port', '3306'));
            $database = Env::get('DB_NAME', self::configValue($config, 'database', 'medcase_db'));
            $charset = Env::get('DB_CHARSET', self::configValue($config, 'charset', 'utf8mb4'));
            $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $host, $port, $database, $charset);
        }

        self::$connection = new PDO(
            $dsn,
            Env::get('DB_USER', self::configValue($config, 'username', 'root')),
            Env::get('DB_PASS', self::configValue($config, 'password', '')),
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );

        return self::$connection;
    }

    /**
     * @return array<string, scalar|null>
     */
    private static function config(): array
    {
        if (self::$config !== null) {
            return self::$config;
        }

        $path = __DIR__ . '/../../config.php';
        $settings = is_file($path) ? require $path : [];
        $database = is_array($settings) && isset($settings['db']) && is_array($settings['db'])
            ? $settings['db']
            : [];

        self::$config = $database;

        return self::$config;
    }

    /**
     * @param array<string, mixed> $config
     */
    private static function configValue(array $config, string $key, ?string $default = null): ?string
    {
        $value = $config[$key] ?? null;

        if ($value === null || $value === '') {
            return $default;
        }

        return is_scalar($value) ? (string) $value : $default;
    }
}

