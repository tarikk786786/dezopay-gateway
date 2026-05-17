FROM php:8.3-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo_mysql bcmath zip

# Enable Apache mod_rewrite (required for your .htaccess routing)
RUN a2enmod rewrite

# Change the default Apache document root if needed, but standard is /var/www/html
WORKDIR /var/www/html

# Copy the entire project into the Apache document root
COPY . /var/www/html/

# Fix permissions so Apache can read/write
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 for Render
EXPOSE 80
