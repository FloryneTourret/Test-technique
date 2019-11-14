FROM php:7.2.4-fpm

RUN apt-get update
RUN apt-get install -q -y ssmtp mailutils && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install opcache 
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo
RUN pecl install apcu  && docker-php-ext-enable apcu