-- ============================================================
-- DEZOPAY Gateway — Database Schema
-- ============================================================
-- This is a starter schema for local/Firebase Studio development.
-- Import this file into your MySQL database to create the
-- minimum required tables for the application to function.
--
-- Usage:
--   mysql -u root dezopay_db < schema/dezopay_schema.sql
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";

-- ─── Site Settings ────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL DEFAULT 'DEZOPAY',
  `logo_url` varchar(500) DEFAULT 'https://pay.dezo.in/common/img/logoshild.png',
  `site_link` varchar(500) DEFAULT 'https://pay.dezo.in/',
  `whatsapp_number` varchar(20) DEFAULT '',
  `copyright_text` varchar(255) DEFAULT '© 2025 DEZOPAY™. All Rights Reserved.',
  `bonus_refer` decimal(10,2) DEFAULT 0.00,
  `income_sponser` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default site settings
INSERT IGNORE INTO `site_settings` (`id`, `brand_name`, `logo_url`, `site_link`, `whatsapp_number`, `copyright_text`)
VALUES (1, 'DEZOPAY', 'https://pay.dezo.in/common/img/logoshild.png', 'https://pay.dezo.in/', '', '© 2025 DEZOPAY™. All Rights Reserved.');

-- ─── API Settings ─────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `api_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `whatsapp_api_url` varchar(500) DEFAULT '',
  `sender_id` varchar(100) DEFAULT '',
  `api_key` varchar(255) DEFAULT '',
  `sender_email` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `api_settings` (`id`, `whatsapp_api_url`, `sender_id`, `api_key`, `sender_email`)
VALUES (1, '', '', '', '');

-- ─── Users ────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` enum('Admin','Developer','User') DEFAULT 'Developer',
  `balance` decimal(15,2) DEFAULT 0.00,
  `expiry` date DEFAULT NULL,
  `vip_expiry` date DEFAULT NULL,
  `planId` int DEFAULT NULL,
  `tranjection_Count` int DEFAULT 0,
  `kycstatus` varchar(20) DEFAULT 'pending',
  `acc_lock` int DEFAULT 0,
  `acc_ban` varchar(10) DEFAULT 'off',
  `login_token` varchar(255) DEFAULT NULL,
  `referred_by` int DEFAULT NULL,
  `referral_code` varchar(20) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── Orders (Transactions) ───────────────────────────────────
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` enum('PENDING','SUCCESS','FAILURE') DEFAULT 'PENDING',
  `method` varchar(50) DEFAULT NULL,
  `utr` varchar(100) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_mobile` varchar(15) DEFAULT NULL,
  `redirect_url` varchar(500) DEFAULT NULL,
  `callback_url` varchar(500) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `idx_user_status_date` (`user_id`, `status`, `create_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── Wallet Transactions ─────────────────────────────────────
CREATE TABLE IF NOT EXISTS `wallet_transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `opening_balance` decimal(15,2) DEFAULT 0.00,
  `closing_balance` decimal(15,2) DEFAULT 0.00,
  `utr` varchar(100) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── Settlement ──────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `settlement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `utr` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── Subscription Plans ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS `subscription_plan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `hitLimit` int DEFAULT 100,
  `expiry` int DEFAULT 30 COMMENT 'Duration in months',
  `features` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert a default plan
INSERT IGNORE INTO `subscription_plan` (`id`, `name`, `price`, `hitLimit`, `expiry`)
VALUES (1, 'Basic Plan', 0.00, 100, 1);

-- ─── Plan Orders ─────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `planorders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT 'PENDING',
  `utr` varchar(100) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── News / Announcements ────────────────────────────────────
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `news` (`id`, `content`)
VALUES (1, '🚀 Welcome to DEZOPAY Gateway! Your payments platform is ready.');

-- ─── Offers ──────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── Referral Income Slabs ───────────────────────────────────
CREATE TABLE IF NOT EXISTS `refer_income_slabs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `required_referrals` int NOT NULL DEFAULT 0,
  `commission_percent` decimal(5,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `refer_income_slabs` (`id`, `title`, `required_referrals`, `commission_percent`) VALUES
(1, 'Beginner', 0, 1.00),
(2, 'Growth', 10, 2.00),
(3, 'Pro', 50, 3.00),
(4, 'Elite', 100, 5.00);

-- ─── IP Whitelist ────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `ip_whitelist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;

-- ============================================================
-- Schema complete! 🎉
-- Default admin: Create via Register page or insert manually:
--
-- INSERT INTO users (mobile, email, password, name, role, expiry)
-- VALUES ('9999999999', 'admin@dezopay.com',
--         '$2y$10$...hashed_password...', 'Admin', 'Admin',
--         DATE_ADD(NOW(), INTERVAL 1 YEAR));
-- ============================================================
