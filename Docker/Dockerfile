FROM php:7-cli

COPY . /usr/src/project

WORKDIR /usr/src/project

# Install Composer:
# https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md
RUN apt-get update &&\
 apt-get install --assume-yes git libzip-dev unzip wget &&\
 wget https://raw.githubusercontent.com/composer/getcomposer.org/master/web/installer -O - -q |\
 php -- --install-dir=/usr/local/bin --filename=composer &&\
 docker-php-ext-install -j$(nproc) zip

# Install libraries needed for the project
RUN [ "composer", "install" ]
