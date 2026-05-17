# 💳 DEZOPAY Gateway

[![Open in Firebase Studio](https://firebasestorage.googleapis.com/v0/b/idx-templates/o/badge.svg?alt=media&token=a1b3c4d5-e6f7-8901-a2b3-c4d5e6f78901)](https://studio.firebase.google.com/import?url=https://github.com/tarikk786786/dezopay-gateway)

> **Enterprise-grade UPI Payment Gateway Platform** — Accept UPI payments through multiple processors including PhonePe, Google Pay, Paytm, HDFC, and more.

---

## 🚀 Quick Start (Firebase Studio)

1. Click the **"Open in Firebase Studio"** button above
2. Wait for the workspace to initialize (installs PHP, MySQL, Composer dependencies)
3. The `.env` file will be auto-created from `.env.example`
4. Update `.env` with your database credentials
5. The web preview will automatically start

## 🛠️ Local Development Setup

### Prerequisites
- PHP 8.0+ with extensions: `mysqli`, `curl`, `mbstring`, `gd`, `zip`
- MySQL 8.0+ or MariaDB 10.5+
- Composer
- Apache with `mod_rewrite` (or PHP built-in server for dev)

### Installation

```bash
# Clone the repository
git clone https://github.com/tarikk786786/dezopay-gateway.git
cd dezopay-gateway

# Install PHP dependencies
composer install

# Setup environment
cp .env.example .env
# Edit .env with your database credentials

# Import database schema
mysql -u root -p your_db_name < schema/dezopay_schema.sql

# Start development server
php -S localhost:8000
```

### Access
- **Login:** `http://localhost:8000` → redirects to login
- **Dashboard:** `http://localhost:8000/auth/dashboard`
- **API:** `http://localhost:8000/api/create-order`

## 📁 Project Structure

```
dezopay-gateway/
├── .idx/                      # Firebase Studio configuration
│   └── dev.nix                # Nix environment (PHP, MySQL, extensions)
├── auth/                      # Admin dashboard & core application
│   ├── config.php             # Database connection
│   ├── function.php           # Core business logic
│   ├── dashboard.php          # Analytics dashboard
│   ├── transactions.php       # Transaction management
│   └── ...
├── payment/ → payment95/      # Payment processing modules
├── phnpe/                     # PhonePe integration
├── common/                    # Shared CSS/JS assets
├── schema/                    # Database schema files
├── .env.example               # Environment template
├── composer.json              # PHP dependencies
├── GEMINI.md                  # AI assistant context file
└── README.md                  # This file
```

## ⚙️ Configuration

### Environment Variables (`.env`)

| Variable | Description | Default |
|----------|-------------|---------|
| `DB_HOST` | MySQL host | `localhost` |
| `DB_USERNAME` | MySQL username | — |
| `DB_PASSWORD` | MySQL password | — |
| `DB_NAME` | Primary database name | — |
| `DB2_HOST` | Secondary DB host | `localhost` |
| `DB2_USERNAME` | Secondary DB username | — |
| `DB2_PASSWORD` | Secondary DB password | — |
| `DB2_NAME` | Secondary database name | — |

### Site Settings (Admin Panel)
Managed via **Admin → Site Settings** (`auth/sitesetting.php`):
- Brand name, logo, site URL
- WhatsApp support number
- Copyright text

## 🔒 Security Features

- 🔐 Session-based authentication with token verification
- 🔑 Password hashing with `password_hash()` / `password_verify()`
- 🚫 Account lockout after 3 failed login attempts
- 🛡️ IP whitelisting for API access
- 📛 `.htaccess` protects sensitive files (`.env`, logs, SQL dumps)
- 🔏 HTTPS enforcement via mod_rewrite

## 📊 Features

- **Multi-Processor Payments** — PhonePe, Google Pay, Paytm, HDFC, and more
- **Merchant Dashboard** — Real-time analytics, charts, transaction management
- **Wallet System** — Credit/debit with full transaction ledger
- **Subscription Plans** — Tiered plans with expiry management
- **Referral System** — Multi-level referral commission tiers
- **Payment Links** — Generate and share payment links
- **QR Code Payments** — Dynamic QR code generation
- **Notifications** — WhatsApp + Email notifications
- **Admin Panel** — Complete platform management

## 🧰 Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP 8.x (vanilla) |
| Database | MySQL 8.0 / MariaDB |
| Frontend | Bootstrap 5, Tailwind CSS, Chart.js |
| Auth | PHP Sessions + Token |
| Email | PHPMailer (Gmail SMTP) |
| QR Codes | endroid/qr-code |
| Alerts | SweetAlert2 |
| Icons | Font Awesome 6, Remix Icons |

## 📄 License

Private / Proprietary — All rights reserved.

---

<p align="center">
  <strong>DEZOPAY</strong> — Powering Digital Payments 🚀
</p>
