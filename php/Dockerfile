# Dockerfile
FROM php:7.4-apache

# install mysqli and pdo extension for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

COPY run-apache /usr/local/bin
RUN a2enmod rewrite

COPY html /var/www/html

RUN chown -R www-data:www-data /var/www/html

CMD ["run-apache"]
