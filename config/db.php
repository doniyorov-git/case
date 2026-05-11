<?php
declare(strict_types=1);

use App\Core\Database;

require_once __DIR__ . '/../app/bootstrap.php';

try {
    $pdo = Database::connection();
} catch (Throwable $exception) {
    error_log($exception->getMessage());
    $pdo = null;
}

return $pdo;
