<?php



use App\Models\Route;
use App\Models\Router;

function View(string $parametros){
  echo $parametros;
}

class AlumnoCon {
  public function clase():void{
    echo "<br>aqui iniciamos una instancia re guasa dinamicamente<br>";
  }

  public function clase2():void{
    echo "<br>se inicia otro metodo dinamico bien chido<br>";
  }
}

var_dump(URL);
echo "<br>";

Route::get('/' ,function () {
  return View("desde la vista<br>");
});

Route::get('/alumno', [AlumnoCon::class, 'clase']);
Route::get('/alumno', [AlumnoCon::class, 'clase2']);
// Route::get('/alumno', [Router::class, 'clase']);
Route::post('/alumno', [Router::class, 'clase']);

Route::init();

var_dump(Route::getRoutes());
