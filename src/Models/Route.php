<?php

namespace App\Models;

class Route
{
  private static array $routes = [];
  private static Router $router;

  public static function run(string $method, array|callable $param){

    foreach (self::$routes as $route) {

      $uri  = trim($route['url'] , '/z');
      
      if(strpos($uri, '{') !== false){
        $uri  = preg_replace('#{[a-zA-Z0-9]+}#','([a-zA-Z0-9]+)',$uri);

        
        if(preg_match( '#^'.$uri.'$#', trim(URL, '/') , $matches) && $route['method'] === $method){          

          self::$router = new Router($param);
        }
      }

      // var_dump(preg_match( '#^'.$uri.'$#', trim(URL, '/') ), '#^'.$uri.'$#', trim(URL, '/'), $method);
      // echo "----------------------------------------------";

      if( $route['method'] === $method && $route['url'] === URL){
        self::$router = new Router($param);
      }
    }
    
  }

  public static function get(string $url,array|callable  $param) {

    $method = 'GET';
    self::setRoutes($url, $method, $param);

    if($_SERVER['REQUEST_METHOD'] !== $method) return;

    self::run($method,$param);
  }

  public static function post(string $url,array|callable  $param) {

    $method = 'POST';
    self::setRoutes($url, $method, $param);

    if($_SERVER['REQUEST_METHOD'] !== $method) return; 

    self::run($method,$param);
  }
  private static function addRoute(string $url){
    if(!in_array($url, self::$routes)){
      self::$routes[] = $url;
    }
  }

  private static function setRoutes(string $url, string $method, array|callable $param ) :void {

    $action = null;

    if(is_array($param)){
      $action = join('@', $param);
    }

    $result = array_filter(self::$routes,function($route) use ($url, $method){
      return $route['url'] === $url && $route['method'] === $method;
    });

    if(empty($result)){
      self::$routes[] = ['url' => $url, 'method'=> $method, 'action' => $action];
    }else{
      $url_columns = array_column(self::$routes, 'url');
      $key = array_search($url, $url_columns);
      self::$routes[$key]['action'] = $action; 
    }
  }

  public static function getRoutes(): array{
    return self::$routes;
  }
  
  public static function init():void{
    if(!isset(self::$router)){
      echo "404 not found";
    }else{
      self::$router->init();
    }
  }
}
