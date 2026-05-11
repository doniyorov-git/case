<?php
declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\CaseController;
use App\Controllers\UserController;
use App\Core\Database;
use App\Core\Request;
use App\Core\Router;
use App\Repositories\CaseRepository;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\CaseService;
use App\Services\UserStatsService;

require_once __DIR__ . '/../app/bootstrap.php';

function medcase_api_pdo(): ?PDO
{
    try {
        return Database::connection();
    } catch (Throwable $exception) {
        error_log($exception->getMessage());

        return null;
    }
}

function medcase_api_router(): Router
{
    static $router = null;

    if ($router instanceof Router) {
        return $router;
    }

    $pdo = medcase_api_pdo();
    $authController = new AuthController(new AuthService($pdo instanceof PDO ? new UserRepository($pdo) : null));
    $caseController = new CaseController(new CaseService(new CaseRepository($pdo)));
    $userController = new UserController(new UserStatsService($pdo));

    $router = new Router();
    $router->add('POST', '/auth/login', [$authController, 'login']);
    $router->add('POST', '/auth/register', [$authController, 'register']);
    $router->add('GET', '/auth/logout', [$authController, 'logout']);
    $router->add('POST', '/auth/logout', [$authController, 'logout']);
    $router->add('GET', '/cases', [$caseController, 'index']);
    $router->add('GET', '/cases/{id}', [$caseController, 'show']);
    $router->add('GET', '/user/stats', [$userController, 'stats']);

    return $router;
}

function medcase_handle_api(string $method, string $path): void
{
    medcase_api_router()->dispatch($method, $path, Request::capture());
}

if (realpath((string) ($_SERVER['SCRIPT_FILENAME'] ?? '')) === __FILE__) {
    $requestPath = parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH) ?: '/';
    $requestPath = preg_replace('#^/api#', '', $requestPath) ?: '/';
    medcase_handle_api((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET'), $requestPath);
}

