FROM php:8.2-fpm-alpine

RUN apk --update --no-cache --virtual build-dependencies add curl wget nmap

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install opcache && docker-php-ext-enable opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
