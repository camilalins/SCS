FROM php:8-fpm-alpine

#ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
#RUN chmod +x /usr/local/bin/install-php-extensions

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install opcache && docker-php-ext-enable opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
