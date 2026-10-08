FROM php:8.4-cli
RUN apt-get update && apt-get install -y git unzip libicu-dev libzip-dev \
 && docker-php-ext-install intl zip pdo_mysql opcache
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
