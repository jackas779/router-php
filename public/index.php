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
Route::post('/alumno/{id}/alianza/{codigo}/', [Router::class, 'clase']);

Route::init();

var_dump(Route::getRoutes());


// $pos = preg_split("/({[a-zA-Z0-9]+})/", '/alumno/{id}/alianza/{codigo}/', -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );

// preg_match_all("/\{[a-zA-Z0-9]+\}/", '/alumno/{id}/alianza/{codigo}/', $matches);

// echo "<br>";
// var_dump($matches[1]);