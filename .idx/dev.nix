# DEZOPAY Gateway - Firebase Studio Environment Configuration
# This Nix configuration sets up the complete PHP + MySQL development environment
# for the Dezopay payment gateway platform.

{ pkgs, ... }: {
  # Use stable Nixpkgs channel
  channel = "stable-24.11";

  # ─── System Packages ────────────────────────────────────────────────
  packages = [
    # PHP 8.3 with required extensions (mysqli, curl, mbstring, gd, etc.)
    (pkgs.php83.buildEnv {
      extensions = { enabled, all }: enabled ++ (with all; [
        mysqli
        pdo_mysql
        curl
        mbstring
        gd
        zip
        xml
        intl
        bcmath
        openssl
        fileinfo
        tokenizer
        json
        session
        ctype
        dom
        simplexml
      ]);
      extraConfig = ''
        display_errors = On
        error_reporting = E_ALL
        memory_limit = 256M
        upload_max_filesize = 50M
        post_max_size = 50M
        max_execution_time = 300
        date.timezone = Asia/Kolkata
        session.save_handler = files
        session.save_path = /tmp
      '';
    })

    # Composer for PHP dependency management
    pkgs.php83Packages.composer

    # MySQL client tools
    pkgs.mysql80

    # Useful CLI utilities
    pkgs.curl
    pkgs.jq
    pkgs.git
    pkgs.unzip
  ];

  # ─── MySQL Service ──────────────────────────────────────────────────
  services.mysql = {
    enable = true;
    package = pkgs.mysql80;
  };

  # ─── VS Code Extensions ────────────────────────────────────────────
  idx.extensions = [
    # PHP Development
    "bmewburn.vscode-intelephense-client"    # PHP IntelliSense
    "xdebug.php-debug"                       # PHP Debugging
    "MehediDraworworworGHOST.php-snippets"  # PHP Snippets (optional)

    # Database
    "cweijan.vscode-mysql-client2"           # MySQL Client

    # Web Development
    "ecmel.vscode-html-css"                  # HTML/CSS support
    "dbaeumer.vscode-eslint"                 # JS linting

    # Utilities
    "EditorConfig.EditorConfig"              # Editor consistency
    "mikestead.dotenv"                       # .env file support
  ];

  # ─── Workspace Previews ────────────────────────────────────────────
  idx.previews = {
    enable = true;
    previews = {
      web = {
        command = [
          "php"
          "-S"
          "0.0.0.0:$PORT"
          "-t"
          "."
        ];
        manager = "web";
        env = {
          PORT = "$PORT";
        };
      };
    };
  };

  # ─── Workspace Lifecycle Hooks ──────────────────────────────────────
  idx.workspace = {

    # Runs ONCE when the workspace is first created
    onCreate = {
      # Install PHP dependencies via Composer
      install-deps = ''
        if [ -f composer.json ]; then
          composer install --no-interaction --prefer-dist
        fi
      '';

      # Copy .env.example to .env if .env doesn't exist
      setup-env = ''
        if [ ! -f .env ] && [ -f .env.example ]; then
          cp .env.example .env
          echo "✅ Created .env from .env.example - please update with your credentials"
        fi
      '';

      # Setup the MySQL database and import schema
      setup-database = ''
        echo "⏳ Waiting for MySQL to be ready..."
        sleep 5

        # Create the database
        mysql -u root -e "CREATE DATABASE IF NOT EXISTS dezopay_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>/dev/null || true

        # Import schema if available
        if [ -f schema/dezopay_schema.sql ]; then
          mysql -u root dezopay_db < schema/dezopay_schema.sql 2>/dev/null || true
          echo "✅ Database schema imported"
        fi

        # Update .env with local database credentials
        if [ -f .env ]; then
          sed -i 's/DB_HOST=.*/DB_HOST=localhost/' .env
          sed -i 's/DB_USERNAME=.*/DB_USERNAME=root/' .env
          sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=/' .env
          sed -i 's/DB_NAME=.*/DB_NAME=dezopay_db/' .env
          echo "✅ Updated .env with local database credentials"
        fi

        echo "✅ Database setup complete"
      '';

      # Create required directories
      create-directories = ''
        mkdir -p auth/uploads
        mkdir -p auth/qrcodes
        mkdir -p secret/Qrcode
        mkdir -p logs
        echo "✅ Required directories created"
      '';
    };

    # Runs EVERY TIME the workspace starts
    onStart = {
      # Verify environment
      verify-env = ''
        echo "🚀 DEZOPAY Gateway - Firebase Studio Workspace"
        echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
        echo "📌 PHP Version: $(php -v | head -1)"
        echo "📌 Composer: $(composer --version 2>/dev/null | head -1)"
        echo "📌 MySQL: $(mysql --version 2>/dev/null)"
        echo ""
        echo "📂 Project: DEZOPAY Payment Gateway"
        echo "🌐 Preview will start at the web preview URL"
        echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
      '';
    };
  };
}
