FROM php:7.2-fpm-alpine

MAINTAINER bmf <bmf.infomation@gmail.com>

RUN apk upgrade --update \
    && apk add \
       git \
       zlib-dev \
       nginx \
    && docker-php-ext-install pdo_mysql zip

WORKDIR /var/www/html
