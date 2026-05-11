<?php
declare(strict_types=1);

namespace App\Core;

final class Request
{
    /** @var array<string, mixed> */
    private array $body;

    /** @param array<string, mixed> $body */
    private function __construct(
        private string $method,
        private array $query,
        array $body
    ) {
        $this->body = $body;
    }

    public static function capture(): self
    {
        $rawBody = file_get_contents('php://input') ?: '';
        $jsonBody = json_decode($rawBody, true);
        $body = is_array($jsonBody) ? $jsonBody : $_POST;

        return new self(
            strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET')),
            $_GET,
            $body
        );
    }

    public function method(): string
    {
        return $this->method;
    }

    public function query(string $key, mixed $default = null): mixed
    {
        return $this->query[$key] ?? $default;
    }

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->body[$key] ?? $default;
    }

    /** @return array<string, mixed> */
    public function all(): array
    {
        return $this->body;
    }
}

