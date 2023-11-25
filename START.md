# Archivo a seguir para configurar correctamente el proyecto y que pueda funcionar correctamente:

Configurar el archivo .env
Principalemente la conexión a MySql :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pruebatecnicaeuropelanguagejobs_mm
DB_USERNAME=[usuario_especifico]
DB_PASSWORD=[contraseña_especifico]

Ejecutar "CREATE SCHEMA PruebaTecnicaEuropeLanguageJobs_MM" en la consola de SQL para crear la base de datos;

Una vez configurado el .env ejecutar los siguientes comandos en el CLI del proyecto:

> npm install
> php artisan migrate
> php artisan db:seed --class=DogInfoSeeder

# Para lanzar el proyecto:

> npm run dev
> php artisan serve
