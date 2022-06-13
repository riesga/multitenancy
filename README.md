<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Proyecto multitenancy laravel

Este proyecto contiene la estructura inicial para el manejo de laravel multitenancy con autenticación de Laravel Passport

## Pasos para clonar el proyecto

- Clone el repositorio.
- Cree un usuario en postgresql o el motor de su preferencia con permisos de superusuario o que pueda crear bases de datos o esquemas.
- Cree la base de datos principal que va a administrar los tenants.
- Copie o renombre el archivo .env.example a .env y configure sus variables de entorno (Base de datos, usuario, etc.)
- Ejecute composer install.
- Ejecute php artisan key:generate
- Ejecute php artisan migrate (para crear las tablas iniciales del dominio principal)
- Ejecute php artisan passport:install
- Listo, ya puede consultar las rutas y realizar pruebas con postman o cualquier otro cliente para probar APIs.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
