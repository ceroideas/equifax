<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Proyecto DIVIDAE

## Instalación
- Clonar el Repositorio o Descargarlo
- Cambiar a la rama develop
- Usar el Manejador de Dependencias [Composer](https://getcomposer.org/) para instalar las librerías requeridas, con el comando update.

```bash
git checkout develop
composer update
```

- Instalar el ADMINLTE con el siguiente comando artisan.

```bash
php artisan adminlte:install
```

- Elegir No (N) a la confirmación de sobreescribir el archivo de configuración, se generarán las dependencias en public/vendor.

-Luego Instalar el plugin datatable con el siguiente comando

```bash
php artisan adminlte:plugins install --plugin=datatables
php artisan adminlte:plugins install --plugin=select2
php artisan adminlte:plugins install --plugin=tempusdominusBootstrap4
php artisan adminlte:plugins install --plugin=bootstrapSwitch
```

## Env

- Una vez instaladas las dependencias, renombrar el archivo .env.example a .env
> .env.example

>.env

- Rellenar las variables de entorno para la BBDD

```bash

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## Key

- Una vez configurado las variables de entorno, generar la key del proyecto con el siguiente comando artisan.

```bash
php artisan key:generate
```

## Migrar BBDD y levantar servidor
- Una vez generada la key ya puedes ejecutar. 

```bash
php artisan serve
```

- Y migrar las tablas BBDD

```bash
php artisan migrate
```