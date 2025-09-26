# Multi-Tenant System

Laravel-based multi-tenant building management starter.

## Prerequisites
- PHP 8.2+
- Composer
- MySQL/MariaDB

## Installation
1. Clone the repo
   ```bash
   git clone <your-repo-url> multi-tenant-system
   cd multi-tenant-system
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Create environment file and set your database credentials
   ```bash
   cp .env.example .env
   ```
   - Update `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` in `.env`.

4. Generate application key
   ```bash
   php artisan key:generate
   ```

5. Run migrations and seed demo data
   ```bash
   php artisan migrate --seed
   ```

6. Run the application
   ```bash
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000`.

## Email configuration (Mailtrap)
To enable outgoing emails (notifications for bills), configure Mailtrap in your `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

- Replace `MAIL_USERNAME` and `MAIL_PASSWORD` with your Mailtrap Inbox credentials.
- Emails are sent only when `MAIL_USERNAME` is set (the app checks this before sending).

## Seeded Data and Login Access
Seeding creates base data for quick testing.

- Admin
  - Email: `admin@gmail.com`
  - Password: `12345678`

- Owners (9 accounts)
  - Emails: `owner1@example.com` … `owner9@example.com`
  - Password: `12345678`
  - Each owner has `building_name` and `building_address` preset
  - Each owner gets 10 flats: `owner-name-flat-01` … `owner-name-flat-10`
  - Each owner gets bill categories: `Electricity`, `Gas bill`, `Water bill`, `Utility Charges`

- Tenants
  - 100 tenants assigned round-robin to owners
  - Names: `Tenant 001` … `Tenant 100`
  - Emails: `tenant001@example.com` … `tenant100@example.com`
  - Note: Tenants are a separate model; default auth is for `users` (admin/owner).

- Bills per flat
  - 20 months of bills each flat: 10 paid (older), 10 unpaid (recent)
  - Amounts vary; unpaid totals differ from paid totals by design

## Common Commands
- Rerun only seeders (after DB exists):
  ```bash
  php artisan db:seed
  ```
- Run a specific seeder:
  ```bash
  php artisan db:seed --class=UserSeeder
  php artisan db:seed --class=FlatSeeder
  php artisan db:seed --class=BillCategorySeeder
  php artisan db:seed --class=TenantSeeder
  php artisan db:seed --class=BillSeeder
  ```

## Notes
- Default authentication uses the `users` table with roles: `admin`, `owner`, `tenant` (tenant role exists but seeded tenant records are in the `tenants` table).
- If using Laragon, you can point a virtual host to the `public` directory.

