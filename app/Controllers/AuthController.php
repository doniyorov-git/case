<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Services\AuthService;

final class AuthController
{
    public function __construct(private AuthService $auth)
    {
    }

    /** @param array<string, string> $params */
    public function login(Request $request, array $params = []): void
    {
        $result = $this->auth->login(
            (string) $request->input('email', ''),
            (string) $request->input('password', '')
        );

        Response::json($result, $result['success'] ? 200 : 422);
    }

    /** @param array<string, string> $params */
    public function register(Request $request, array $params = []): void
    {
        $result = $this->auth->register(
            (string) $request->input('email', ''),
            (string) $request->input('password', ''),
            (string) $request->input('role', 'student')
        );

        Response::json($result, $result['success'] ? 201 : 422);
    }

    /** @param array<string, string> $params */
    public function logout(Request $request, array $params = []): void
    {
        $this->auth->logout();
        $redirect = (string) $request->query('redirect', '');

        if ($redirect !== '' && preg_match('/^[A-Za-z0-9_.\/-]+$/', $redirect)) {
            header('Location: ' . $redirect);
            return;
        }

        Response::json(['success' => true, 'message' => 'Logged out']);
    }
}

