# Updating packages
FROM php:7.4
RUN apt-get update

# Installing dependencies

RUN apt-get install -qq apt-utils git curl libzip-dev libjpeg-dev libpng-dev libfreetype6-dev libbz2-dev

# Clearing out the local repository

RUN apt-get clean

# Installing extensions

RUN docker-php-ext-install pdo_mysql zip

# Installing Composer

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installing Laravel Envoy

RUN composer global require "laravel/envoy=~1.0"