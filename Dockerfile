FROM php:7.4.3-apache
RUN apt-get update

# Download Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" 
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'c31c1e292ad7be5f49291169c0ac8f683499edddcfd4e42232982d0fd193004208a58ff6f353fde0012d35fdd72bc394') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --filename=composer
# RUN php -r "unlink('composer-setup.php');"

# Install auth0
RUN apt-get install git -y
RUN php composer require auth0/auth0-php:"~7.0"
RUN php composer install
# RUN php composer dump-autoload
RUN docker-php-ext-install mysqli pdo pdo_mysql