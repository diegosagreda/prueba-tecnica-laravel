
# Amazon Account Creation App

Esta aplicación web permite a los usuarios crear una cuenta en una plataforma que simula el proceso de registro de una cuenta de Amazon.


## Tecnologías

- Backend: Laravel (PHP)
- Frontend: HTML, CSS, JavaScript, Blade
- Base de Datos: PostgreSQL

## Características

- Formulario de Registro: Los usuarios pueden registrar una nueva cuenta completando un formulario con campos para nombre, correo electrónico, contraseña y confirmación de contraseña.

- Validación en el Frontend: Mensajes de error específicos se muestran en el formulario si hay problemas con los datos ingresados.

- Mensajes de Éxito: Un mensaje de éxito se muestra durante 5 segundos después de una creación exitosa de usuario.

## Installation

### Requisitos previos

- PHP 8.0 o superior
- Composer
- Node.js y npm
- PostgreSQL

### Clonar el repositorio

```bash
  git clone https://github.com/diegosagreda/prueba-tecnica-laravel.git
  cd prueba-tecnica-laravel

```

### Clonar el repositorio

1). Copia el archivo .env.example a .env:

```bash
 cp .env.example .env
```

2). Configura el archivo .env con tus credenciales de base de datos para PostgresSQL o MySQL

3). Instala las dependencias de PHP:

```bash
 composer install
```
4). Instala las dependencias de Node.js:

```bash
 npm install
```
5). Genera la clave de aplicación:

```bash
 php artisan key:generate
```
6). Ejecuta las migraciones para configurar la base de datos:

```bash
 php artisan migrate

```
### Ejecutar aplicación

Para iniciar el servidor de desarrollo de Laravel:

```bash
 php artisan serve

```
Y para compilar los archivos de frontend:

```bash
 npm run dev

```
La aplicación estará disponible en http://localhost:8000.
### Uso
- Accede a la página de registro en el navegador.
- Completa el formulario con la información requerida.
- Haz clic en "Crear tu cuenta de Amazon".
- Si el registro es exitoso, se mostrará un mensaje de éxito que desaparecerá después de 5 segundos. 
- Si hay errores en el formulario, se mostrarán mensajes de error específicos junto a los campos correspondientes.


## Documentation

### Frontend:

* El formulario se encuentra en el archivo resources/views/registro.blade.php
* Los estilos se encuentran en el archivo resources/css/registro.css
* El script del formulario se encuentra  en el archivo resources/js/registro.js

### Backend:

* El controlador para el registro de usuarios se encuentra en app/Http/Controllers/UserController.php
* Las rutas están definidas en routes/web.php


### Desarrollado por:

Ing Luis Diego Agreda


