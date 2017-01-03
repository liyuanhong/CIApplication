FROM php:5.6-apache

RUN apt-get update \
&& apt-get -y install php5-mysql \
&& docker-php-ext-install mysql mysqli pdo pdo_mysql
