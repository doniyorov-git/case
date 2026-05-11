<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Services\UserStatsService;

final class UserController
{
    public function __construct(private UserStatsService $stats)
    {
    }

    /** @param array<string, string> $params */
    public function stats(Request $request, array $params = []): void
    {
        $userId = Session::userId();

        if ($userId === null) {
            Response::json(['success' => false, 'message' => 'Unauthorized'], 401);
            return;
        }

        Response::json(['success' => true, 'stats' => $this->stats->statsForUser($userId)]);
    }
}

