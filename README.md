# Mental App API

Laravel 11 JSON API for the Mental App (PHP ^8.2).

## Requirements

- PHP ^8.2
- Composer
- Database (SQLite by default per `.env.example`, or MySQL/Postgres/Redis if configured)

## Setup from fresh git clone

1. **Install dependencies**

   ```bash
   composer install
   ```

2. **Environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Edit `.env` if you need to change DB, mail, cache, etc.

3. **Database**
   By default `.env.example` uses SQLite. Create the SQLite file if it doesn't exist:
   - NOTE: If you are using MySQL/Postgres, ensure the database exists and credentials are correct in `.env`
     e.g., for MySQL:

   ```txt
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

- NOTE: If you are using SQLite, ensure the `database` directory exists and is writable. Then create the SQLite file:

```bash
touch database/database.sqlite
```

Run migrations and seed:

```bash
php artisan migrate
php artisan db:seed
```

(Only run migrations if you have permission as per project rules.)

4. **Storage/link (if needed)**

   ```bash
   php artisan storage:link
   ```

5. **Run the API (in case using Laravel's development server || php-cli)**
   ```bash
   php artisan serve
   ```
   The app will be available at `http://localhost:8000`.

## Development

- Clear caches: `php artisan optimize:clear`
- Run tests: `php artisan test`
- Run single test: `php artisan test --filter=TestName`

## Notes

- This is a pure JSON API (no web UI routes). API resources/controllers follow `--api` style.
- Use Form Requests for validation, keep controllers thin.
- Follow `.editorconfig` (2-space indent, LF, trim trailing whitespace except `*.md`).
- Do not commit `.env` or secrets.
