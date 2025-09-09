<?php


function View(string $parametros){
  echo $parametros;
}

class AlumnoCon {
  public function clase():void{
    echo "<br>aqui iniciamos una instancia desde metodo 1<br>";
  }

  public function clase2():void{
    echo "<br>se inicia otro metodo que es la clase 2<br>";
  }
  public function clase3(?array $request) :void{
    echo "vamos a usar uso del id $request[id]";
    echo "<br>se inicia una instacia con una ruta dinamica desde el metodo 3<br>";
  }
}


require_once __DIR__ . '../../src/Routers/web.php';