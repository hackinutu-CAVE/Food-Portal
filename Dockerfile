FROM php:7.4.3-apache
RUN apt-get update

# Download Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" 
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --filename=composer
# RUN php -r "unlink('composer-setup.php');"

# Install auth0
RUN apt-get install git -y
RUN php composer require auth0/auth0-php:"~7.0"
RUN php composer install
# RUN php composer dump-autoload
RUN docker-php-ext-install mysqli pdo pdo_mysql
