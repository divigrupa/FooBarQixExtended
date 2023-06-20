# Use PHP 8.1.2 FPM
FROM php:8.1.2-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
    zip \
    curl \
    wget \
    git \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    unzip

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Install dependencies with Composer
COPY ./app/composer.json ./app/composer.lock* /var/www/
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Copy existing application directory permissions
COPY --chown=www-data:www-data ./app /var/www

# Change current user to www-data
USER www-data

CMD ["php-fpm"]
