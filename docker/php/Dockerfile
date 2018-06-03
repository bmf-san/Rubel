FROM php:7.2-fpm-alpine

MAINTAINER bmf <bmf.infomation@gmail.com>

RUN apk upgrade --update \
    && apk add \
       git \
       zlib-dev \
       nginx \
    && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

RUN apk add --no-cache nodejs

WORKDIR /var/www/html
