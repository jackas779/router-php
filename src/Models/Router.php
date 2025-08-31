<?php

namespace App\Models;

class Router {

  private array|object $callback;
  private ?array $arguments;

  public function __construct(string|object $callback, array $propertys = null) {
    if(is_string($callback)){
      $this->callback = explode('@', $callback);
    }else{
      $this->callback = $callback;
    }

    $this->arguments = $propertys;
  }

  public function init(){

    if (is_callable($this->callback)) {
      return call_user_func($this->callback);
    }

    if (is_array($this->callback)) {
      $class = $this->callback[0];
      $method = $this->callback[1];
      if(is_string($class) && class_exists($class)){
        if(is_string($method) && method_exists($class,$method)){
          $object = new $class();

          return call_user_func([$object, $method], $this->arguments);
        }
        else{
          echo "metodo no existe";
        }
      }
      else{
        echo "clase no existe";
      }
    }
    

  }
}