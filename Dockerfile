FROM php:7.4.3-apache
EXPOSE 80
CMD docker-php-ext-install mysqli pdo pdo_mysql