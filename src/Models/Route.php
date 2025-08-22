<?php

namespace App\Models;

class Route
{
  private static array $routes = [];
  private static Router $router;

  public static function run(string $method, array|object $param){

    // $methods = array_column(self::$routes, $method);

    foreach (self::$routes as $route) {
      if($route['method'] === $method && $route['url'] === URL){
        self::$router = new Router($param);
      }
    }
    
  }

  public static function get(string $url,array|object $param) {

    $method = 'GET';
    self::setRoutes($url,  $method);

    if($_SERVER['REQUEST_METHOD'] !== $method) return;

    self::run($method,$param);
  }

  public static function post(string $url,array|object $param) {

    $method = 'POST';
    self::setRoutes($url,  $method);

    if($_SERVER['REQUEST_METHOD'] !== $method) return; 

    self::run($method,$param);
  }
  private static function addRoute(string $url){
    if(!in_array($url, self::$routes)){
      self::$routes[] = $url;
    }
  }

  private static function setRoutes(string $url, string $method) :void {
    if(!in_array(['url' => $url, 'method'=> $method],self::$routes)){
      self::$routes[] = ['url' => $url, 'method'=> $method];
    }
  }

  public static function getRoutes(): array{
    return self::$routes;
  }
  
  public static function init():void{
    self::$router->init();
  }
}
