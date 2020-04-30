FROM php:7.4-cli

WORKDIR /var/www

RUN apt-get -y update \
    && apt-get -y install git zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer