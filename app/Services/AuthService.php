<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Session;
use App\Repositories\UserRepository;
use Throwable;

final class AuthService
{
    public function __construct(private ?UserRepository $users)
    {
    }

    /** @return array{success: bool, message: string} */
    public function login(string $email, string $password): array
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
            return ['success' => false, 'message' => 'Email or password is invalid'];
        }

        if ($this->users === null) {
            return ['success' => false, 'message' => 'Authentication service is unavailable'];
        }

        try {
            $user = $this->users->findByEmail($email);

            if (!$user || !password_verify($password, (string) $user['password'])) {
                return ['success' => false, 'message' => 'Invalid email or password'];
            }

            Session::login($user);

            return ['success' => true, 'message' => 'Login successful'];
        } catch (Throwable $exception) {
            error_log($exception->getMessage());

            return ['success' => false, 'message' => 'Authentication service is unavailable'];
        }
    }

    /** @return array{success: bool, message: string} */
    public function register(string $email, string $password, string $role = 'student'): array
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Email is invalid'];
        }

        if (strlen($password) < 8) {
            return ['success' => false, 'message' => 'Password must be at least 8 characters'];
        }

        if ($this->users === null) {
            return ['success' => false, 'message' => 'Registration service is unavailable'];
        }

        $allowedRoles = ['student', 'instructor', 'admin'];
        $role = in_array($role, $allowedRoles, true) ? $role : 'student';

        try {
            $this->users->create($email, password_hash($password, PASSWORD_DEFAULT), $role);

            return ['success' => true, 'message' => 'User registered successfully'];
        } catch (Throwable $exception) {
            error_log($exception->getMessage());

            return ['success' => false, 'message' => 'Registration failed'];
        }
    }

    public function logout(): void
    {
        Session::destroy();
    }
}

