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

