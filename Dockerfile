FROM php:8.4-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    nodejs \
    npm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy project files
# 1. Project files okkoma container ekata copy karanna
COPY . .

# 2. Composer install karanna (dependencies install wenawa)
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 3. Laravel storage folders walata permissions hadanna
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80