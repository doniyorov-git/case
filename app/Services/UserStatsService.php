<?php
declare(strict_types=1);

namespace App\Services;

use PDO;
use Throwable;

final class UserStatsService
{
    public function __construct(private ?PDO $pdo)
    {
    }

    /** @return array<string, int|string> */
    public function statsForUser(int $userId): array
    {
        if ($this->pdo instanceof PDO) {
            try {
                $stmt = $this->pdo->prepare(
                    'SELECT level, xp, next_level_xp, streak, accuracy, cases_completed, role_title
                     FROM user_stats
                     WHERE user_id = :user_id
                     LIMIT 1'
                );
                $stmt->execute(['user_id' => $userId]);
                $stats = $stmt->fetch();

                if (is_array($stats)) {
                    return [
                        'level' => (int) $stats['level'],
                        'xp' => (int) $stats['xp'],
                        'next_level_xp' => (int) $stats['next_level_xp'],
                        'streak' => (int) $stats['streak'],
                        'accuracy' => (int) $stats['accuracy'],
                        'cases_completed' => (int) $stats['cases_completed'],
                        'role_title' => (string) $stats['role_title'],
                    ];
                }
            } catch (Throwable $exception) {
                error_log($exception->getMessage());
            }
        }

        return [
            'level' => 24,
            'xp' => 2450,
            'next_level_xp' => 3000,
            'streak' => 5,
            'accuracy' => 92,
            'cases_completed' => 148,
            'role_title' => 'Senior Attending',
        ];
    }
}

