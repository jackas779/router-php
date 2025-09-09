<?php 

  namespace App\Middleware;

  use App\Interfaces\IMiddleware;

  class Test implements IMiddleware{

  public function handle($request){
    echo "El middleware se ejecuta antes que la peticion  <br>";
  }

}