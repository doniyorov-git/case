<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Services\CaseService;

final class CaseController
{
    public function __construct(private CaseService $cases)
    {
    }

    /** @param array<string, string> $params */
    public function index(Request $request, array $params = []): void
    {
        if (!Session::isAuthenticated()) {
            Response::json(['success' => false, 'message' => 'Unauthorized'], 401);
            return;
        }

        Response::json(['success' => true, 'cases' => $this->cases->listCases()]);
    }

    /** @param array<string, string> $params */
    public function show(Request $request, array $params): void
    {
        if (!Session::isAuthenticated()) {
            Response::json(['success' => false, 'message' => 'Unauthorized'], 401);
            return;
        }

        $case = $this->cases->findCase((int) ($params['id'] ?? 0));

        if ($case === null) {
            Response::json(['success' => false, 'message' => 'Case not found'], 404);
            return;
        }

        Response::json(['success' => true, 'case' => $case]);
    }
}

