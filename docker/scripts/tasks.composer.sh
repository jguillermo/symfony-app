#!/bin/bash

export DEV_UID=$(id -u)
export DEV_GID=$(id -g)

chmod 0600 ./docker/build/ssh/id_rsa
chmod 0644 ./docker/build/ssh/id_rsa.pub

mkdir -p ./docker/.composer/cache/vcs
chmod 777 -R ./docker/.composer/

docker-compose -f docker/docker-compose.tasks.yml run --rm cli composer $@
