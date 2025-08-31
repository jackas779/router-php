<?php

namespace App\Models;

class Route
{
  private static array $routes = [];
  private static ?Router $router;


  public static function get(string $url,array|callable  $param) {

    self::handlerRoute($url,'GET',$param);
    return new self;
  }

  public static function post(string $url,array|callable  $param) {

    self::handlerRoute($url,'POST',$param);
    return new self();
  }

  public static function put(string $url,array|callable  $param) {

    self::handlerRoute($url,'PUT',$param);
    return new self();
  }

  public static function delete(string $url,array|callable  $param) {

    self::handlerRoute($url,'DELETE',$param);
    return new self();
  }

  public static function getRoutes(): array{
    return self::$routes;
  }

  public static function middleware (){
    echo "Me ejecuto primero que la vista intereanste logica <br>";
    // self::$router = null;

    var_dump(self::$router);  
    
  }
  
  public static function init():void{
    var_dump(self::$router);
    if(!isset(self::$router)){
      echo "404 not found";
    }else{
      self::$router->init();
    }
  }

  private static function handlerRoute(string $url, string $method, array|callable $param) :void {

    self::setRoutes($url, $method, $param);

    if($_SERVER['REQUEST_METHOD'] !== $method) return;

    self::$router = self::run($method,$url);
  }

  private static function setRoutes(string $url, string $method, array|callable $param ) :void {

    $action = $param;

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

  private static function run(string $method, $url) :?Router {

    foreach (self::$routes as $route) {

      $uri  = trim($route['url'] , '/');
      
      if(strpos($uri, '{') !== false){
        $array_url = explode('/', $uri);

        $newUrl = preg_replace_callback('/\{([a-zA-Z0-9]+)\}/', function($matches) {
          $paramName = $matches[1];
          return "(?<{$paramName}>[a-zA-Z0-9]+)";
        }, $uri);


        if(preg_match( '#^'.$newUrl.'$#', trim(URL, '/') , $matches) && $route['method'] === $method){

          $propertys = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

          return new Router($route['action'], $propertys);
        }
      }

      if( $route['method'] === $method && $route['url'] === URL){
        return new Router($route['action']);
      }
    }

    return null;
    
  }
}
