FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    postgresql-dev \
    zip

RUN docker-php-ext-install pdo pdo_pgsql zip bcmath

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]
