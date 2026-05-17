#!/bin/bash

echo "Starting MariaDB..."
service mariadb start

# Wait for MariaDB to initialize
sleep 5

echo "Configuring Database..."
mysql -u root -e "CREATE DATABASE IF NOT EXISTS dezopay;"
mysql -u root -e "CREATE USER IF NOT EXISTS 'dezopay_user'@'localhost' IDENTIFIED BY 'dezopay_pass';"
mysql -u root -e "GRANT ALL PRIVILEGES ON dezopay.* TO 'dezopay_user'@'localhost';"
mysql -u root -e "FLUSH PRIVILEGES;"

# Import schema
if [ -f "/var/www/html/schema/dezopay_schema.sql" ]; then
    echo "Importing schema..."
    mysql -u root dezopay < /var/www/html/schema/dezopay_schema.sql
fi

# Copy .env if not exists
if [ ! -f "/var/www/html/.env" ]; then
    echo "Copying .env.example to .env..."
    cp /var/www/html/.env.example /var/www/html/.env
fi

echo "Starting Apache..."
source /etc/apache2/envvars
exec apache2 -D FOREGROUND
