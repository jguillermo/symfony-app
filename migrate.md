migrar a symfony 4

```bash
mv app app_old
```
en este caso, debes tener instalado el composer en la pc
```bash
composer create-project symfony/skeleton app
```

#instalar doctrine
```bash
./script.sh composer require doctrine maker
```
y nodificar el archivo de configuracion en app/.env.dist y app/.env
DATABASE_URL=mysql://root:toord@mysql:3306/dbproject

# instalar
```bash
./script.sh composer 
```