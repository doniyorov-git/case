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
- `database/medcase.sql` - complete MySQL schema and demo data in one import file.
- `config.php` - local MySQL connection settings.
- `design` - renamed prototype exports with readable file names.

## Configuration

Database credentials are stored in `config.php`:

```php
return [
    'db' => [
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'medcase_db',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
        'dsn' => null,
    ],
];
```

Environment variables can override the file values when needed:

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

Import the complete SQL file:

```sql
SOURCE database/medcase.sql;
```

Passwords are stored with `password_hash()` and checked with `password_verify()`.