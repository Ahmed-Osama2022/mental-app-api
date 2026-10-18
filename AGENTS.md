# AGENTS.md

## Project Overview

Laravel 11 API application (PHP ^8.2). Mental health app API.

## Commands

- Install dependencies: `composer install`
- Run tests: `php artisan test`
- Run a single test: `php artisan test --filter=TestName`
- Migrations: `php artisan migrate`
- Clear cache: `php artisan optimize:clear`

## Code Style

- Follow Laravel conventions and existing code style in the project.
- Use PSR-4 autoloading (`App\` → `app/`).
- Validate request data via Form Requests; keep controllers thin.
- Do not commit `.env` or secrets.

## Roles

### Role 1: .editorconfig compliance

Whenever writing or editing any file, follow the settings defined in `.editorconfig`:

- `charset = utf-8`
- `end_of_line = lf`
- `indent_style = space`, `indent_size = 2`
- `insert_final_newline = true`
- `trim_trailing_whitespace = true`
  - Exception: `*.md` files must NOT trim trailing whitespace.
  - `*.yml` / `*.yaml`: `indent_size = 2`
  - `docker-compose.yml`: `indent_size = 4`

### Role 2: Protected files

Do **not** modify any of the following without asking the user first:

- Everything under `config/`
- `.env`
- `.env.example`

If you believe a change there is needed, stop and ask.

### Role 3: Comments in code

Use comments in the code to document any harder-to-follow class or function: complex logic, business rules (e.g. order-time stock re-checks), non-obvious contracts (e.g. the localized `{field}_{locale}` selection with `_en` fallback), or anything that would take a reader extra time to understand. Keep them meaningful and concise.

### Role 4: Generating models

This is a pure JSON API (Laravel 11). Whenever scaffolding a new model, use:

```bash
php artisan make:model <Name> --all --api
```

- `--all` generates the model + migration + factory + seeder + controller + policy (+ form request).
- `--api` generates an **API resource controller** (no `create`/`edit` web methods) — required to match the project's JSON-only contract.

### Role 5: Database migration commands

Do **not** run any migration command (`php artisan migrate`, `migrate:refresh`, `migrate:fresh`, `migrate:rollback`, `db:wipe`, etc.) without asking the user and getting explicit permission first. Writing/editing migration files is fine — executing them is not, until approved.
