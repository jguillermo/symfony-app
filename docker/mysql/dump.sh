#!/bin/bash

mysqldump -u root -ptoord dbproject > /docker-entrypoint-initdb.d/database.sql
chmod 777  /docker-entrypoint-initdb.d/database.sql


