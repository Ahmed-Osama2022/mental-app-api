# AGENTS.md

## Project Overview

Laravel 11 API application (PHP ^8.2). Mental health app API.

## Commands

- Install dependencies: `composer install`
- Run tests: `php artisan test`
- Run a single test: `php artisan test --filter=TestName`
- Lint/format: `./vendor/bin/pint`
- Migrations: `php artisan migrate`
- Clear cache: `php artisan optimize:clear`

## Code Style

- Follow Laravel conventions and existing code style in the project.
- Format PHP code with Laravel Pint before considering work done.
- Use PSR-4 autoloading (`App\` → `app/`).
- Validate request data via Form Requests; keep controllers thin.
- Do not commit `.env` or secrets.

## Roles

### Role 1: Follow .editorconfig

Whenever writing a new file or editing an existing file, use the settings found in the `.editorconfig` file:

- Charset: `utf-8`
- End of line: `lf`
- Indent style: spaces, size `2` (4 for `docker-compose.yml`)
- Insert final newline: yes
- Trim trailing whitespace: yes (except in `.md` files)
