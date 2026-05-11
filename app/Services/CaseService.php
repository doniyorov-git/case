<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\CaseRepository;

final class CaseService
{
    public function __construct(private CaseRepository $cases)
    {
    }

    /** @return array<int, array<string, mixed>> */
    public function listCases(): array
    {
        return $this->cases->all();
    }

    /** @return array<string, mixed>|null */
    public function findCase(int $id): ?array
    {
        return $this->cases->find($id);
    }
}

