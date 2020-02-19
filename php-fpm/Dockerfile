FROM php:7.4-fpm
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_10.x  | bash -
RUN apt-get -y install nodejs
WORKDIR /var/www/
RUN npm install