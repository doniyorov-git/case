<?php
declare(strict_types=1);

namespace App\Support;

final class DemoCases
{
    /** @return array<int, array<string, mixed>> */
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => '68-F Exertional Chest Pain',
                'patient_name' => 'Helen Morris',
                'age' => 68,
                'gender' => 'Female',
                'complaint' => 'Radiating chest pressure',
                'specialty' => 'Cardiology',
                'difficulty' => 'Medium',
                'description' => 'Patient presents with radiating jaw pain during exercise.',
                'est_time' => 15,
                'initial_statement' => 'Doctor, my chest gets tight whenever I walk up stairs, and today it moved into my jaw.',
                'vitals' => ['hr' => 104, 'sbp' => 148, 'dbp' => 88],
            ],
            [
                'id' => 2,
                'title' => '32-M Sudden Onset Weakness',
                'patient_name' => 'Michael Smith',
                'age' => 32,
                'gender' => 'Male',
                'complaint' => 'Unilateral weakness',
                'specialty' => 'Neurology',
                'difficulty' => 'Hard',
                'description' => 'Acute unilateral hemiparesis and aphasia in a young adult.',
                'est_time' => 25,
                'initial_statement' => "I was sitting at my desk when my right arm suddenly went limp and I couldn't find my words.",
                'vitals' => ['hr' => 88, 'sbp' => 140, 'dbp' => 90],
            ],
            [
                'id' => 3,
                'title' => '24-F Chronic Cough',
                'patient_name' => 'Aisha Karim',
                'age' => 24,
                'gender' => 'Female',
                'complaint' => 'Persistent dry cough',
                'specialty' => 'Pulmonology',
                'difficulty' => 'Easy',
                'description' => 'Persistent dry cough for 6 weeks, worse at night.',
                'est_time' => 10,
                'initial_statement' => 'The cough keeps waking me up at night, but I do not feel feverish.',
                'vitals' => ['hr' => 82, 'sbp' => 118, 'dbp' => 76],
            ],
            [
                'id' => 4,
                'title' => '45-M LLQ Pain',
                'patient_name' => 'Daniel Brooks',
                'age' => 45,
                'gender' => 'Male',
                'complaint' => 'Lower left abdominal pain',
                'specialty' => 'Gastroenterology',
                'difficulty' => 'Medium',
                'description' => 'Progressive lower left quadrant abdominal pain and fever.',
                'est_time' => 18,
                'initial_statement' => 'The pain started yesterday and has been getting sharper on my left side.',
                'vitals' => ['hr' => 96, 'sbp' => 132, 'dbp' => 84],
            ],
        ];
    }

    /** @return array<int, array<string, mixed>> */
    public static function summaries(): array
    {
        return array_map(static function (array $case): array {
            return [
                'id' => $case['id'],
                'title' => $case['title'],
                'specialty' => $case['specialty'],
                'difficulty' => $case['difficulty'],
                'description' => $case['description'],
                'est_time' => $case['est_time'],
            ];
        }, self::all());
    }

    /** @return array<string, mixed>|null */
    public static function find(int $id): ?array
    {
        foreach (self::all() as $case) {
            if ((int) $case['id'] === $id) {
                return $case;
            }
        }

        return null;
    }
}

