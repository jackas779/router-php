<?php



use App\Models\Route;
use App\Models\Router;

function View(string $parametros){
  echo $parametros;
}

var_dump(URL);
echo "<br>";

Route::get('/' ,function () {
  echo "jasdasdas<br>";
  return View("desde la vista<br>");
});

Route::get('/alumno', [Router::class, 'clase']);
Route::get('/alumno', [Router::class, 'clase']);
Route::post('/alumno', [Router::class, 'clase']);


var_dump(Route::getRoutes());