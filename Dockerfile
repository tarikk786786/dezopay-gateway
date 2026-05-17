FROM php:8.3-apache

# Install required system packages, PHP extensions, and MariaDB
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    mariadb-server \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo_mysql bcmath zip

# Enable Apache mod_rewrite (required for your .htaccess routing)
RUN a2enmod rewrite

# Change the default Apache document root if needed, but standard is /var/www/html
WORKDIR /var/www/html

# Copy the entire project into the Apache document root
COPY . /var/www/html/

# Copy the startup script and make it executable
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Fix permissions so Apache and MySQL can read/write
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chown -R mysql:mysql /var/lib/mysql

# Expose port 80 for Render
EXPOSE 80

# Command to run the startup script
CMD ["/start.sh"]
