CREATE DATABASE IF NOT EXISTS medcase_db
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE medcase_db;

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(191) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'instructor', 'admin') NOT NULL DEFAULT 'student',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE IF NOT EXISTS user_stats (
    user_id INT UNSIGNED PRIMARY KEY,
    level SMALLINT UNSIGNED NOT NULL DEFAULT 1,
    xp INT UNSIGNED NOT NULL DEFAULT 0,
    next_level_xp INT UNSIGNED NOT NULL DEFAULT 1000,
    streak SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    accuracy TINYINT UNSIGNED NOT NULL DEFAULT 0,
    cases_completed INT UNSIGNED NOT NULL DEFAULT 0,
    role_title VARCHAR(100) NOT NULL DEFAULT 'Clinical Learner',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_user_stats_user
        FOREIGN KEY (user_id) REFERENCES users (id)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO cases
    (id, title, patient_name, age, gender, complaint, specialty, difficulty, description, est_time, initial_statement, heart_rate, systolic_bp, diastolic_bp)
VALUES
    (1, '68-F Exertional Chest Pain', 'Helen Morris', 68, 'Female', 'Radiating chest pressure', 'Cardiology', 'Medium', 'Patient presents with radiating jaw pain during exercise.', 15, 'Doctor, my chest gets tight whenever I walk up stairs, and today it moved into my jaw.', 104, 148, 88),
    (2, '32-M Sudden Onset Weakness', 'Michael Smith', 32, 'Male', 'Unilateral weakness', 'Neurology', 'Hard', 'Acute unilateral hemiparesis and aphasia in a young adult.', 25, 'I was sitting at my desk when my right arm suddenly went limp and I could not find my words.', 88, 140, 90),
    (3, '24-F Chronic Cough', 'Aisha Karim', 24, 'Female', 'Persistent dry cough', 'Pulmonology', 'Easy', 'Persistent dry cough for 6 weeks, worse at night.', 10, 'The cough keeps waking me up at night, but I do not feel feverish.', 82, 118, 76),
    (4, '45-M LLQ Pain', 'Daniel Brooks', 45, 'Male', 'Lower left abdominal pain', 'Gastroenterology', 'Medium', 'Progressive lower left quadrant abdominal pain and fever.', 18, 'The pain started yesterday and has been getting sharper on my left side.', 96, 132, 84)
ON DUPLICATE KEY UPDATE
    title = VALUES(title),
    patient_name = VALUES(patient_name),
    age = VALUES(age),
    gender = VALUES(gender),
    complaint = VALUES(complaint),
    specialty = VALUES(specialty),
    difficulty = VALUES(difficulty),
    description = VALUES(description),
    est_time = VALUES(est_time),
    initial_statement = VALUES(initial_statement),
    heart_rate = VALUES(heart_rate),
    systolic_bp = VALUES(systolic_bp),
    diastolic_bp = VALUES(diastolic_bp);
