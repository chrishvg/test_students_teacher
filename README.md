# Proyecto Laravel

Este proyecto es una aplicación desarrollada con el framework Laravel.

## Requisitos previos

- **PHP**: Versión >= 8.1
- **Composer**: Herramienta de gestión de dependencias para PHP
- **Base de datos**: MySQL
- **Git**: Para clonar el proyecto

## Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1. Clona el repositorio:
   ```bash
   git clone https://github.com/chrishvg/test_students_teacher.git

   cd test_students_teacher

   composer install

   php artisan migrate | Tambien puedes usar el archivo de SQL para migrar la base de datos de nombre laravel.sql

   ```

2. El swagger se llama swagger.yaml y se puede ver usando el editor https://editor.swagger.io/

3. Para obtener el token de autenticación, se debe hacer la petición GET a la ruta http://127.0.0.1:8000/api/key

4. Las peticiones de postman se encuentran en el archivo "crud test.postman_collection.json"

5. El archivo docker-compose.yml contiene las configuraciones para montar una base de datos MySQL y un administrador phpmyadmin en caso de que no se tenga instalado en el sistema. Se ejecutará el comando docker-compose up -d
