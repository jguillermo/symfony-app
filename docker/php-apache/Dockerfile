FROM php:7.1-apache
MAINTAINER Jose Guillermo <jguillermo@outlook.com>

RUN apt-get update \
 && apt-get install -y git zlib1g-dev \
 && docker-php-ext-install zip \
 && docker-php-ext-install pdo_mysql \
 && a2enmod rewrite \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

# Hosts
RUN su -c "echo '127.0.0.1 local.app.com' >> /etc/hosts"

# Config Apache
ENV APACHE_DIR /etc/apache2
RUN rm -f $APACHE_DIR/sites-enabled/*
COPY ./local.app.conf $APACHE_DIR/sites-available/
#RUN ln -s $APACHE_DIR/sites-available/local.app.conf $APACHE_DIR/sites-enabled/local.app.conf
RUN a2ensite local.app \
    && a2enmod rewrite\
    && a2enmod headers

WORKDIR /var/www/html

ENV VERSION 1.0
