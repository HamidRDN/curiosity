# syntax=docker/dockerfile:1

FROM php:8.1-cli-buster

WORKDIR /curiosity

COPY . ./
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN composer install

CMD [ "php", "./index.php" ]