# DEZOPAY Gateway — AI Context Document

> **This file provides structured context for AI assistants (Gemini, etc.) working on this codebase.**

## Project Overview

**DEZOPAY** is a full-stack UPI/payment gateway platform built with vanilla PHP and MySQL. It enables merchants to accept UPI payments through multiple payment processor integrations (PhonePe, Google Pay, Paytm, HDFC, etc.).

## Architecture

```
dezopay-gateway/
├── index.php                  # Entry point → redirects to auth/index.php
├── env_loader.php             # Loads .env vars into getenv()
├── composer.json              # PHP deps: endroid/qr-code, phpmailer
│
├── auth/                      # 🔐 Admin Dashboard (main application)
│   ├── config.php             # DB connection + site_settings fetch
│   ├── function.php           # Core functions: sendWA, sendEmail, credit/debit_balance
│   ├── header.php             # Shared header: session check, nav, theme
│   ├── footer.php             # Shared footer
│   ├── index.php              # Login page
│   ├── dashboard.php          # Main dashboard with analytics/charts
│   ├── transactions.php       # Transaction management (91KB - largest file)
│   ├── profile.php            # User profile management
│   ├── merchant_list.php      # Merchant directory
│   ├── connect_merchant.php   # Merchant onboarding
│   ├── subscription.php       # Plan management
│   ├── payment_link.php       # Payment link generation
│   ├── sitesetting.php        # Admin site settings
│   ├── ip_setting.php         # IP whitelist management
│   ├── DBManage.php           # Database admin interface
│   └── ...
│
├── payment/ to payment95/     # 💳 Payment processing flows (versioned)
│   ├── pay_now.php            # Payment initiation page
│   ├── payment_status.php     # Payment callback/status page
│   └── create_order.php       # API: order creation endpoint
│
├── phnpe/                     # PhonePe-specific integration
│   ├── index.php              # PhonePe payment flow
│   ├── checksum*.php          # Checksum generation/verification
│   └── ...                    # HTTP client utilities (PSR-7 style)
│
├── common/                    # Shared frontend assets
│   ├── css/                   # Bootstrap, animations, themes
│   └── js/                    # jQuery, config, auth scripts
│
├── assets/img/                # Static images (logos, UPI icons)
├── dezopay_site/              # Marketing/landing page
├── secret/                    # QR code generation, server utils
├── crons/                     # Scheduled task scripts
├── modules/                   # Modular components
└── schema/                    # Database schema files
```

## Database Structure

### Primary Database (from .env: `DB_NAME`)
Key tables (inferred from code):
- **`users`** — User accounts (mobile, password, balance, expiry, planId, role, kycstatus, login_token, referred_by)
- **`orders`** — Payment transactions (user_id, amount, status [SUCCESS/PENDING/FAILURE], method, create_date, utr)
- **`settlement`** — Settlement records (userid, amount, status, date)
- **`wallet_transactions`** — Wallet credit/debit ledger (user_id, amount, type, opening_balance, closing_balance, utr, Remark)
- **`site_settings`** — Platform configuration (brand_name, logo_url, site_link, whatsapp_number, copyright_text)
- **`api_settings`** — API credentials (whatsapp_api_url, sender_id, api_key, sender_email)
- **`subscription_plan`** — Plans with hitLimit and expiry
- **`planorders`** — Plan purchase records
- **`offers`** — Promotional offers
- **`news`** — News/announcements ticker
- **`refer_income_slabs`** — Referral commission tiers

### User Roles
- **Admin** — Full platform access, all user/transaction management
- **Developer** — Standard merchant access with referral features
- *(Other roles may exist)*

## API Endpoints

### Payment API
- `POST /api/create-order` → `payment/create_order.php` — Creates a new payment order
- `GET /api/check-order-status` → `payment/check_order.php` — Checks order status

### Payment Status Callbacks
- `GET /order/payment-status` → `payment/payment_status.php`
- `GET /order{N}/payment-status` → `payment{N}/payment_status.php` (N = 2-95)

### Instance APIs
- `POST /api/instance/events/google-pay` → Google Pay event handler
- `POST /api/instance/verify/google-pay` → Google Pay verification

## Configuration

### Environment Variables (.env)
```env
DB_HOST=localhost
DB_USERNAME=<mysql_user>
DB_PASSWORD=<mysql_password>
DB_NAME=<database_name>
DB2_HOST=localhost           # Secondary/legacy database
DB2_USERNAME=<user>
DB2_PASSWORD=<pass>
DB2_NAME=<db_name>
```

### Site Settings (database-driven)
Managed via `auth/sitesetting.php`, stored in `site_settings` table:
- `brand_name` — Platform name (default: "DEZOPAY")
- `logo_url` — Logo image URL
- `site_link` — Base URL (default: https://pay.dezo.in/)
- `whatsapp_number` — Support WhatsApp number
- `copyright_text` — Footer copyright

## Technology Stack
- **Backend:** PHP 7.4+ (vanilla, no framework)
- **Database:** MySQL/MariaDB
- **Frontend:** Bootstrap 5, Tailwind CSS (CDN), Chart.js, SweetAlert2, Font Awesome
- **Auth:** Session-based with login_token, password_hash/verify
- **Email:** PHPMailer via Gmail SMTP
- **Notifications:** WhatsApp API integration
- **QR Codes:** endroid/qr-code library

## Key Patterns & Conventions
1. **No MVC framework** — Flat PHP files with includes
2. **Config inclusion chain:** `header.php` → `config.php` → `env_loader.php` → `.env`
3. **Session management:** `$_SESSION['username']` (mobile), `$_SESSION['user_id']`, `$_SESSION['login_token']`
4. **Database queries:** Mix of raw SQL and helper functions from `DBManage.php` (db_select, db_insert, etc.)
5. **URL routing:** Apache `.htaccess` mod_rewrite (extensionless URLs)
6. **Payment versioning:** Multiple `payment{N}/` directories for different payment processor versions

## Security Notes
- Login lockout after 3 failed attempts (`acc_lock`)
- DevTools disabled on login page via `disable-devtool` library
- `.htaccess` blocks access to .env, .log, .sql files
- IP whitelisting for API access (`ip_setting.php`)
- Some queries use prepared statements, others use raw interpolation

## Running Locally
```bash
# 1. Install PHP dependencies
composer install

# 2. Copy and configure environment
cp .env.example .env
# Edit .env with your database credentials

# 3. Import database schema
mysql -u root -p dezopay_db < schema/dezopay_schema.sql

# 4. Start PHP development server
php -S localhost:8000

# 5. Access at http://localhost:8000 → redirects to login
```
