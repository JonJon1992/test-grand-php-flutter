FROM php:7.3-fpm

RUN apt update 

WORKDIR /var/www/slim_app

RUN RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer