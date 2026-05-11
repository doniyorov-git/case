CREATE TABLE IF NOT EXISTS cases (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(191) NOT NULL,
    patient_name VARCHAR(191) NOT NULL,
    age TINYINT UNSIGNED NOT NULL,
    gender VARCHAR(32) NOT NULL,
    complaint VARCHAR(191) NOT NULL,
    specialty VARCHAR(100) NOT NULL,
    difficulty ENUM('Easy', 'Medium', 'Hard') NOT NULL DEFAULT 'Medium',
    description TEXT NOT NULL,
    est_time SMALLINT UNSIGNED NOT NULL DEFAULT 15,
    initial_statement TEXT NOT NULL,
    heart_rate SMALLINT UNSIGNED NOT NULL,
    systolic_bp SMALLINT UNSIGNED NOT NULL,
    diastolic_bp SMALLINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_cases_specialty (specialty),
    INDEX idx_cases_difficulty (difficulty)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

