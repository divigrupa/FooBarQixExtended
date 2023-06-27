# Use PHP 8.1.2 FPM
FROM php:8.1.2-fpm-alpine

# Change www-data's uid & gid to be 1000
RUN apk add --no-cache shadow && \
    usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    apk del shadow

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
    unzip \
    bash \
    linux-headers  \
    $PHPIZE_DEPS

# Install extensions and enable xdebug
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug

# Configure xdebug
RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer.json and composer.lock
COPY ./app/composer.* /var/www/

# Install dependencies
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Generate autoload files
RUN composer dump-autoload --optimize

# Copy existing application directory permissions
COPY --chown=www-data:www-data ./app /var/www

# Create the coverage directory and set its permissions as root
USER root
RUN mkdir /var/www/coverage && chown www-data:www-data /var/www/coverage && chmod 775 /var/www/coverage

# Change current user to www-data
USER www-data

# Expose port 9003 (for xdebug) and start php-fpm server
EXPOSE 9003
CMD ["php-fpm"]
