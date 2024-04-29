FROM php:7.2-apache
RUN a2enmod rewrite
COPY . /var/www/html/
RUN docker-php-ext-install pdo_mysql mysqli
