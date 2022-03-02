FROM php:7.3-fpm-alpine

RUN set -ex \
    && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo_pgsql pgsql

WORKDIR /var/www/html/

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

COPY . .

RUN composer install

RUN cp .env.example .env

RUN php artisan key:generate && php artisan jwt:secret
