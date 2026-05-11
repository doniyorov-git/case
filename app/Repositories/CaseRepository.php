<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Support\DemoCases;
use PDO;
use Throwable;

final class CaseRepository
{
    public function __construct(private ?PDO $pdo)
    {
    }

    /** @return array<int, array<string, mixed>> */
    public function all(): array
    {
        if (!$this->pdo instanceof PDO) {
            return DemoCases::summaries();
        }

        try {
            $stmt = $this->pdo->query(
                'SELECT id, title, specialty, difficulty, description, est_time FROM cases ORDER BY id ASC LIMIT 50'
            );
            $cases = $stmt->fetchAll();

            return $cases ?: DemoCases::summaries();
        } catch (Throwable $exception) {
            error_log($exception->getMessage());

            return DemoCases::summaries();
        }
    }

    /** @return array<string, mixed>|null */
    public function find(int $id): ?array
    {
        if (!$this->pdo instanceof PDO) {
            return DemoCases::find($id);
        }

        try {
            $stmt = $this->pdo->prepare(
                'SELECT id, title, patient_name, age, gender, complaint, specialty, difficulty, description, est_time,
                        initial_statement, heart_rate, systolic_bp, diastolic_bp
                 FROM cases
                 WHERE id = :id
                 LIMIT 1'
            );
            $stmt->execute(['id' => $id]);
            $case = $stmt->fetch();

            if (!is_array($case)) {
                return DemoCases::find($id);
            }

            return $this->mapCase($case);
        } catch (Throwable $exception) {
            error_log($exception->getMessage());

            return DemoCases::find($id);
        }
    }

    /** @param array<string, mixed> $case */
    private function mapCase(array $case): array
    {
        return [
            'id' => (int) $case['id'],
            'title' => (string) $case['title'],
            'patient_name' => (string) $case['patient_name'],
            'age' => (int) $case['age'],
            'gender' => (string) $case['gender'],
            'complaint' => (string) $case['complaint'],
            'specialty' => (string) $case['specialty'],
            'difficulty' => (string) $case['difficulty'],
            'description' => (string) $case['description'],
            'est_time' => (int) $case['est_time'],
            'initial_statement' => (string) $case['initial_statement'],
            'vitals' => [
                'hr' => (int) $case['heart_rate'],
                'sbp' => (int) $case['systolic_bp'],
                'dbp' => (int) $case['diastolic_bp'],
            ],
        ];
    }
}

