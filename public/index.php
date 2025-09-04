<?php



use App\Models\Route;
use App\Models\Router;
use App\Interfaces\IMiddleware;

function View(string $parametros){
  echo $parametros;
}

class AlumnoCon {
  public function clase():void{
    echo "<br>aqui iniciamos una instancia re guasa dinamicamente clase 1<br>";
  }

  public function clase2():void{
    echo "<br>se inicia otro metodo dinamico bien chido clase 2<br>";
  }
  public function clase3(?array $request) :void{
    echo "vamos a usar uso del id $request[id]";
    echo "<br>se inicia una instacia con una ruta dinamica clase 3<br>";
  }
}

class Middle implements IMiddleware{

  public function handle($request){
    echo "Hola mundo desde el middleware se ejecuto primero el middleware<br>";
  }

}

var_dump(URL);
  $user = "jackas";


Route::get('/' ,function () {
  return View("<br> desde la vista xd <br>");
})->middleware(Middle::class);

Route::get('/alumno', [AlumnoCon::class, 'clase']);
Route::get('/alumno', [AlumnoCon::class, 'clase2']);
Route::get('/alumno/{id}/alianza/{codigo}', [AlumnoCon::class, 'clase3']);
// Route::get('/alumno', [Router::class, 'clase']);
Route::post('/alumno', [Router::class, 'clase']);

Route::init();

var_dump(Route::getRoutes());