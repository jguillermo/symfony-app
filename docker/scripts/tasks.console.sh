#!/bin/bash

cd docker && docker-compose exec --user $(id -u):$(id -g) php php bin/console $@
