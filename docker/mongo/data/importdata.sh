#!/bin/sh
mongoimport -v --db db-app --collection usuarios   --file /docker-entrypoint-initdb.d/data.json
#mongoimport -v --db db-tesis-aptitus_a --collection busquedas  --file /var/www/tesis/db-tesis-aptitus_a--busquedas.json