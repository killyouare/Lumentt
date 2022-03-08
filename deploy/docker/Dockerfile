FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y wget git unzip curl zip jpegoptim vim optipng pngquant gifsicle locales libpq-dev libjpeg62-turbo-dev build-essential libicu-dev libpng-dev libzip-dev libjpeg-dev libfreetype6-dev\
    && pecl install xdebug-2.9.1 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_pgsql zip exif pcntl \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd \
    && docker-php-ext-enable pgsql \
    && docker-php-ext-configure gd  --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install gd

ADD ./deploy/docker/php.ini /usr/local/etc/php/php.ini

RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

COPY ./project /var/www

WORKDIR /var/www

RUN composer install
RUN cp .env.example .env 
RUN php artisan key:generate 
RUN php artisan jwt:secret
