FROM php:7.1-cli
MAINTAINER Jose Guillermo <jguillermo@outlook.com>

RUN apt-get update \
 && apt-get install -y git zlib1g-dev \
 && docker-php-ext-install zip pdo pdo_mysql \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer


RUN apt-get install -y git \
    && gpg --keyserver pool.sks-keyservers.net --recv-keys B42F6819007F00F88E364FD4036A9C25BF357DD4 \
    && curl -o /usr/local/bin/gosu -SL "https://github.com/tianon/gosu/releases/download/1.2/gosu-amd64" \
    && curl -o /usr/local/bin/gosu.asc -SL "https://github.com/tianon/gosu/releases/download/1.2/gosu-amd64.asc" \
    && gpg --verify /usr/local/bin/gosu.asc \
    && rm /usr/local/bin/gosu.asc \
    && rm -r /root/.gnupg/ \
    && chmod +x /usr/local/bin/gosu

# Wait
COPY ./wait-for-it.sh /tmp/wait-for-it.sh
RUN chmod +x /tmp/wait-for-it.sh


ENV VERSION 1.0

# Entrypoint
COPY ./entrypoint.sh /root/entrypoint.sh
RUN chmod +x /root/entrypoint.sh

ENV APP_DIR=/var/www/html
ENV COMPOSER_HOME=$APP_DIR/docker/.composer
WORKDIR $APP_DIR
ENTRYPOINT ["/root/entrypoint.sh"]
