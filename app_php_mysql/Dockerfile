FROM php:7.3-apache

RUN apt update && apt install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY . /var/www/html
EXPOSE 80/tcp
EXPOSE 443/tcp
