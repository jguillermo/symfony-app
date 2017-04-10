symfony-demo v3.3
=================

A Symfony project created on 2017.


# Docker Seed

## Install

```bash
$ ./scripts/tasks.build.sh
```

```bash
$ docker-compose down
$ docker-compose up
```

```bash
$ ./scripts/tasks.migration.sh migrate
$ ./scripts/tasks.migration.sh generate
$ ./scripts/tasks.migration.sh status
```

```bash
$ ./scripts/tasks.composer.sh install
$ ./scripts/tasks.composer.sh update
```

```bash
./docker/scripts/tasks.console.sh doctrine:schema:update --force
```

```bash
./docker/scripts/tasks.console.sh generate:bundle --namespace=Persons/Infrastructure/Ui/PersonsBundle --format=annotation --dir=src --bundle-name=PersonsBundle --shared  --no-interaction
```

```bash
./docker/scripts/tasks.console.sh generate:bundle --namespace=Misa/Users/Infrastructure/Ui/UsersBundle --format=annotation --dir=src --bundle-name=UsersBundle --shared  --no-interaction
```

## Open
http://localhost:8081/


##ejecutar por problemas de acceso a solr
sudo chmod o+w -R solr

##para ejecutar o indexar data
```bash
java -Dc="user" -jar /opt/solr/example/exampledocs/post.jar /opt/solr/server/solr/mycores/user/example/test.xml
```

###borrar cache de git
```bash
git rm -rf --cached .
```
