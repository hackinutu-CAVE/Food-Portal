FROM php:7.4.3-apache
RUN apt-get update

# Download Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" 
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '795f976fe0ebd8b75f26a6dd68f78fd3453ce79f32ecb33e7fd087d39bfeb978342fb73ac986cd4f54edd0dc902601dc') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --filename=composer
# RUN php -r "unlink('composer-setup.php');"

# Install auth0
RUN apt-get install git -y
RUN php composer require auth0/auth0-php:"~7.0"
RUN php composer install
# RUN php composer dump-autoload
RUN docker-php-ext-install mysqli pdo pdo_mysql