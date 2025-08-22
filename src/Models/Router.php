<?php

namespace App\Models;

class Router {

  public array|object $param;
  public function __construct(array|object $param) {
    $this->param = $param;
  }

  public function init(){

    if (is_callable($this->param)) {
      return call_user_func($this->param);
    }

    if (is_array($this->param)) {
      $class = $this->param[0];
      $method = $this->param[1];
      if(is_string($class) && class_exists($class)){
        if(is_string($method) && method_exists($class,$method)){
          $object = new $class();
          return call_user_func([$object, $method]);
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