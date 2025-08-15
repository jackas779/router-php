<?php

namespace App\Models;

class Router {

  public array|object $param;
  public function __construct(array|object $param) {
    $this->param = $param;
    $this->init();

  }

  private function init(){
    
    if (is_callable($this->param)) {
      return call_user_func($this->param);
    }

    // if (is_array($this->param)) {
    //   var_dump($this->param[0]);
    // }
  }
}