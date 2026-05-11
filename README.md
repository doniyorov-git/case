# MEDCASE Clinical Simulation

MEDCASE is a plain PHP clinical training simulator. The UI remains server-rendered PHP with Tailwind from CDN, while the backend is organized into small framework-free layers under `app/`.

## Backend architecture

- `api/index.php` - API front controller and route registration.
- `api/auth/*.php`, `api/cases/*.php`, `api/user/*.php` - compatibility entrypoints used by the existing screens.
- `app/Controllers` - HTTP request/response orchestration.
- `app/Services` - application behavior such as login, case listing, and user stats.
- `app/Repositories` - database access and demo-data fallback.
- `app/Core` - request, response, routing, session, and PDO connection helpers.
- `app/Support` - environment and demo case support classes.
- `database/migrations` - MySQL schema files.
- `database/seeders` - demo data for local development.
- `design` - renamed prototype exports with readable file names.

## Configuration

Database credentials are read from environment variables:

```bash
DB_HOST=localhost
DB_PORT=3306
DB_NAME=medcase_db
DB_USER=root
DB_PASS=
DB_CHARSET=utf8mb4
```

`DB_DSN` can be used to override the generated MySQL DSN.

## Database setup

Run the migration SQL files in order, then optionally load the demo cases:

```sql
SOURCE database/migrations/001_create_users_table.sql;
SOURCE database/migrations/002_create_cases_table.sql;
SOURCE database/migrations/003_create_user_stats_table.sql;
SOURCE database/seeders/demo_cases.sql;
```

Passwords are stored with `password_hash()` and checked with `password_verify()`.