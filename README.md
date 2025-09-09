# PHP Router (Alpha)

Este proyecto es un router en PHP que permite definir rutas, controladores y middlewares de manera sencilla, inspirado en frameworks modernos como Laravel y Symfony.

## Estado

> **Alpha:** El proyecto está en desarrollo activo y puede contener errores o cambios importantes. No se recomienda para entornos de producción.

## Descripción

PHP Router facilita la creación de aplicaciones web estructuradas, permitiendo separar la lógica de rutas, controladores y middlewares. Es ideal para aprender sobre enrutamiento en PHP o como base para proyectos personales.

## Instalación

1. Descarga el proyecto desde el [repositorio oficial](https://github.com/tu-usuario/tu-repo).
2. Instala las dependencias con Composer:
   ```sh
   composer install
   ```
3. Configura tu servidor web para apuntar a la carpeta `public/` y asegúrate de que el archivo `.htaccess` esté presente para la redirección de rutas.

## Características

- Definición de rutas con métodos HTTP (`GET`, `POST`, `PUT`, `DELETE`)
- Soporte para rutas dinámicas con parámetros (`/alumno/{id}/alianza/{codigo}`)
- Ejecución de middlewares antes de la petición
- Controladores y funciones anónimas como manejadores de rutas
- Página personalizada para errores 404

## Ejemplo de Uso

Define rutas en [`src/Routers/web.php`](src/Routers/web.php):

```php
Route::get('/', function () {
  return View("<br> Hola mundo <br>");
});

Route::get('/test', function () {
  return View("<br> Test con middleware <br>");
})->middleware(Middle::class);

Route::get('/alumno', [AlumnoCon::class, 'clase']);
Route::get('/alumno/{id}/alianza/{codigo}', [AlumnoCon::class, 'clase3']);
Route::post('/alumno', [Router::class, 'clase']);

Route::init();
```

## Estructura del Proyecto

- `config/` - Configuración de la aplicación
- `public/` - Punto de entrada público (index.php)
- `src/Controllers/` - Controladores
- `src/Interfaces/` - Interfaces
- `src/Middleware/` - Middlewares
- `src/Models/` - Modelos
- `src/Routers/` - Definición de rutas
- `src/views/` - Vistas
- `vendor/` - Dependencias de Composer

## Autor

Nicolas Ardila

##
