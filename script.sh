#!/usr/bin/env bash

#set -e

DOMAIN="local.app.miweb.com"
IMAGE="demo-app"

FRONTEND_DIR=app/frontend

CK='\u2714'
ER='\u274c'

alias cls='printf "\033c"'

export DEV_UID=$(id -u)
export DEV_GID=$(id -g)

app_start()
{
    app_remove_var_cmd
    docker-compose -f docker-compose.yml down &&
    docker-compose -f docker-compose.yml up
    sudo chmod 777 -R ./app/var/
    sudo chmod o+w -R ./solr

    if [ $? -eq 0 ]; then
        echo -e "\n\n$CK  [Docker UP] "
        echo -e "\n----------------------------------------------------------"
        echo -e "\n App Server RUN  ===> http://$DOMAIN   \r"
        echo -e "\n----------------------------------------------------------\n"
    else
        echo -e "\n$ER [Docker UP] No se pudo levantar docker.\n"
    fi
}

app_remove_var_cmd(){
    sudo rm -rf ./app/var
    mkdir ./app/var && mkdir ./app/var/cache && mkdir ./app/var/cache/test && mkdir ./app/var/cache/dev
    sudo chmod 777 -R ./app/var/
}

app_down()
{
   docker-compose down

   echo -e "\n\n$CK  [Docker Down] \n"
}

app_docker_images_build()
{
   docker-compose -f docker-compose.build.yml build $@
}

app_docker_images_push()
{
   docker push docker.orbis.pe/$IMAGE:php && \
   docker push docker.orbis.pe/$IMAGE:mysql && \
   docker push docker.orbis.pe/$IMAGE:cli
}

app_docker_images_pull()
{
   docker pull docker.orbis.pe/$IMAGE:php && \
   docker pull docker.orbis.pe/$IMAGE:mysql && \
   docker pull docker.orbis.pe/$IMAGE:cli
}

app_composer_cmd()
{
    app_remove_var_cmd

    docker-compose -f docker-compose.tasks.yml run --rm cli composer $@

    sudo chmod 777 -R ./app/var
}

app_builddb_cmd()
{
    docker-compose exec --user $(id -u):$(id -g) php php bin/console doctrine:migrations:migrate --no-interaction
    docker-compose exec --user $(id -u):$(id -g) php php bin/console doctrine:fixtures:load --no-interaction
    docker-compose exec --user $(id -u):$(id -g) mysql ./dump.sh
}

app_test_cmd()
{
    sudo rm -rf ./app/var
    mkdir ./app/var && chmod 777 ./app/var
    docker-compose -f docker-compose.test.yml down \
    && docker-compose -f docker-compose.test.yml run --rm cli
    chmod 777 -R ./app/var
}

app_symfony_console()
{
    docker-compose exec --user $(id -u):$(id -g) php bin/console $@
}

command_exists ()
{
    type "$1" &> /dev/null ;
}

app_install()
{
   echo -e "\r"

   if ! grep -q "$DOMAIN" /etc/hosts;
    then
      echo -e "\nSetting Virtualhost ....\n"
      sudo su -c "echo '127.0.0.1 $DOMAIN' >> /etc/hosts"
      if [ $? -eq 0 ]; then
          echo -e "$CK  [Virtualhost] "
      else
         echo -e "\r $ER [Virtualhost] Error al configurar el virtualhost."
         exit
      fi
   else
        echo -e "$CK  [Virtualhost] "
   fi

   echo -e "$CK  [Folders & Permissions] "
   chmod 0600 ./docker/ssh/id_rsa
   chmod 0644 ./docker/ssh/id_rsa.pub

   mkdir -p ./app/.composer/cache/vcs
   chmod 777 -R ./app/docker/.composer/
   mkdir -p ./app/var
   sudo chmod o+w -R ./solr


   if [ ! -d "./app/composer.lock" ]; then
       echo -e "\nInstall dependencies .... "
       app_composer_cmd install \
          --no-progress \
          --profile \
          --prefer-dist
       if [ $? -eq 0 ]; then
         echo -e "$CK  [Dependencies] "
       else
         echo -e "\r $ER [Dependencies] Ocurrio un error al instalar las dependencias"
         exit
       fi
   else
      app_composer_cmd update

      echo -e "$CK  [Dependencies] "
   fi

   echo -e "\n--------------------------------------------------"
   echo -e "  [OK] Ejecutar make start o docker-compose up   "
   echo -e "\n  Go to ==> http://$DOMAIN   \r"
   echo -e "----------------------------------------------------\n"
}

case "$1" in
"install")
    app_install
    ;;
"start")
    app_start
    ;;
"stop")
    app_down
    ;;
"console")
    app_symfony_console ${@:2}
    ;;
"composer")
    app_composer_cmd ${@:2}
    ;;
"builddb")
    app_builddb_cmd
    ;;
"test")
    app_test_cmd
    ;;
"build")
    app_docker_images_build ${@:2}
    ;;
"pull")
    app_docker_images_pull
    ;;
"push")
    app_docker_images_push
    ;;
*)
    echo -e "\n\n\n$ER [APP] No se especifico un comando valido\n"
    ;;
esac