<?php 

use App\Models\Route;
use App\Models\Router;
use App\Middleware\Test as Middle;


Route::get('/' ,function () {
  return View("<br> Hola mundo <br>");
});

Route::get('/test' ,function () {
  return View("<br> Test con middleware <br>");
})->middleware(Middle::class);

// Route::get('/alumno', [AlumnoCon::class, 'clase']);
// Route::get('/alumno', [AlumnoCon::class, 'clase2']);
// Route::get('/alumno/{id}/alianza/{codigo}', [AlumnoCon::class, 'clase3']);
// // Route::get('/alumno', [Router::class, 'clase']);
// Route::post('/alumno', [Router::class, 'clase']);

Route::init();