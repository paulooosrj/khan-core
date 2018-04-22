<?php 
      
     /**
     * Khan - Component (Router) - A fast, easy and flexible router system for PHP
     *
     * @author      PaulaoDev <jskhanframework@gmail.com>
     * @copyright   (c) PaulaoDev 
     * @link        https://github.com/PaulaoDev/Router
     * @license     MIT
     */
    
      namespace App\Khan\Component\Router\Router;
      use App\Khan\Component\Router\Http\Response as Response;
      use App\Khan\Component\Router\Http\Request as Request;
      use App\Khan\Component\Mime\Mime as Mime;

      class Router {
        
          use \App\Khan\Component\Router\RegexEngine\RegexEngine,
              \App\Khan\Component\Router\Http\Middlewares;
          
          private static $instance = null,
                         $uses = [],
                         $routes = [
                            "GET" => [],
                            "POST" => [],
                            "PARAMS" => [],
                            "DELETE" => [],
                            "PUT" => [],
                            "PATCH" => [],
                            "RESPOND" => []
                         ],
                         $routesConfig = [],
                         $routesName = [],
                         $config = [],
                         $delete, $put;
        
          public static function create($config = ''){
              if(self::$instance === null){
                 self::$instance = new self($config);
              }
              return self::$instance;
          }
        
          protected function __construct($config = null){
              $server = $_SERVER;
              self::$config["uri"] = Router::get_uri();

              self::$config["path"] = (strripos($server["REQUEST_URI"], "?")) 
                                      ? explode("?", $server["REQUEST_URI"])[0] 
                                      : $server["REQUEST_URI"];

              self::$config["method"] = (isset($server["REQUEST_METHOD"])) 
                                        ? $server["REQUEST_METHOD"] 
                                        : "GET";

              $this->outherMethods($config);
          }

          private function outherMethods($config){
              if(in_array(self::$config["method"], ["delete","put"])){
                if(self::$config["method"] === "delete"):
                  parse_str(file_get_contents('php://input'), self::$delete);
                endif;
                if(self::$config["method"] === "put"):
                  parse_str(file_get_contents('php://input'), self::$put);
                endif;
              }
              if(!is_null($config) && gettype($config) == "array"){
                self::$config = array_merge(self::$config, $config);
              }
          }
        
          public static function get_uri(){
              $server = $_SERVER;
              $protocol = (isset($server["REQUEST_SCHEME"])) ? $server["REQUEST_SCHEME"] : ((isset($server["HTTP_X_FORWARDED_PROTO"])) ? $server["HTTP_X_FORWARDED_PROTO"] : "http");
              $domain = (isset($server['HTTP_HOST'])) ? $server['HTTP_HOST'] : $server["SERVER_NAME"];
              $path = (isset($server["REQUEST_URI"])) ? $server["REQUEST_URI"] : "/";
              return "{$protocol}://{$domain}{$path}";
          }

          public static function methods(){
            return self::$routes;
          }
        
          public static function has($route, $type){
              return !isset(self::$routes[$type][$route]);
          }
        
          public static function type($type){
              return gettype($type);
          }
        
          public function set($name, $callback){
              if(!isset(self::$uses[$name])){
                self::$uses[$name] = $callback;
              }
          }
        
          private function uses(){
            return self::$uses;
          }

          private function makeRoutes($route, $call = null, $method = 'GET'){
              $scope = Router::create();
              if(Router::has($route, $method)){
                  $type = Router::type($route);
                  if($type === "string"){
                    self::$routes[$method][$route] = $call;
                  } elseif($type === "array"){
                    foreach ($route as $key => $routeName) {
                      if($callback == null){
                        self::$routess[$method][$key] = $routeName;
                      }else{
                        self::$routess[$method][$key] = $callback;
                      }
                    }
                  }
              }
              return $scope->configRoute($route);
          }
        
          public function class_invoked($class, $data){

              $this->runMiddlewares($data[0], $data[1]);

              if(isset($this->req_mid)){ $data[0] = $this->req_mid; }
              if(isset($this->res_mid)){ $data[1] = $this->res_mid; }

              if(strripos($class, "@")){
                list($className, $fun) = explode('@', $class);
                $finish = new $className;
                echo call_user_func_array([$finish, $fun], $data);
              }
              elseif(strripos($class, "::")){
                echo call_user_func_array($class, $data);
              }
              else{
                call_user_func_array([new \ReflectionClass($class), 'newInstance'], $data);
              }

          }

          public function callBind(){
            return new Responser;
          }
        
          private function type_trate($type, $callback, $data){
              if($type == "object"){
                $callback = $callback->bindTo($this->callBind());
                $this->runMiddlewares($data[0], $data[1]);
                if(isset($this->req_mid)){ $data[0] = $this->req_mid; }
                if(isset($this->res_mid)){ $data[1] = $this->res_mid; }
                echo call_user_func_array($callback, $data);
              }
              elseif($type == "string"){
                $this->class_invoked($callback, $data);
              }
          }
        
          private function trate_callback($callback, $data){
              $type = gettype($callback);
              if($type == "object"){
                $this->type_trate($type, $callback, $data);
              }
              elseif($type == "string"){
                $this->type_trate($type, $callback, $data);
              }
              elseif($type == "array"){
                foreach ($callback as $key => $value) {
                  $t = gettype($value);
                  $this->type_trate($t, $value, $data);
                }
              }
          }

          public static function redirect($route, $args){
              header("Location: {$route}");
          }

          public static function setRouterConfig($route){
            self::$routesConfig[$route] = [];
          }

          public static function setRouterConfigKey($route, $name, $valor){
            self::$routesConfig[$route][$name] = $valor;
          }

          public static function setRouterName($name, $route){
            self::$routesName[$name] = $route;
          }

          public function configRoute($route){
              return new ConfigureRoute($route); 
          }

          public static function generate($name, $data){

              $matchs = [];
              $routeActive = self::$routesName[$name];
              $uri = $routeActive;

              if(preg_match("/\{(.*?)\}/", $uri)){

                preg_match_all("/\{(.*?)\}/", $routeActive, $matchs);
                if(is_array($matchs) && count($matchs) > 1){
                    foreach ($matchs[0] as $key => $value) {
                       $uri = str_replace($value, $data[$key], $uri);
                    }
                }

              }

              return $uri;

          }

          public function isRespond($key, $uri){
              $key = '/^' . str_replace('/', '\/', $key) . '$/';
              $matches = [];
              return (preg_match($key, $uri, $matches)) ? $matches : false;
          }

          public static function group($route, $call = null, $middlewares = []){
              $scope = Router::create();
              $call(new GroupRouter($scope, $route, $middlewares));
              return $scope;
          }
        
          public static function get($route, $call = null, $method = 'GET'){
              $scope = Router::create();
              return $scope->makeRoutes($route, $call, $method);
          }
        
          public static function post($route, $call = null, $method = 'POST'){
              $scope = Router::create();
              return $scope->makeRoutes($route, $call, $method);
          }
        
          public static function delete($route, $call = null, $method = 'DELETE'){
              $scope = Router::create();
              return $scope->makeRoutes($route, $call, $method);
          }
        
          public static function put($route, $call = null, $method = 'PUT'){
              $scope = Router::create();
              return $scope->makeRoutes($route, $call, $method);
          }

          public static function respond($route, $call = null, $method = 'RESPOND'){
              $scope = Router::create();
              return $scope->makeRoutes($route, $call, $method);
          }
        
          public static function params($route, $call = null, $method = 'PARAMS'){
             $scope = Router::create();
             return $scope->makeRoutes($route, $call, $method);
          }

          public static function patch($route, $call = null, $method = 'PATCH'){
              $scope = Router::create();
              return $scope->makeRoutes($route, $call, $method);
          }

          public static function staticFile($route, $folder){
              $scope = Router::create();
              $scope::respond($route, function ($req, $res, $db, $reg) use($folder){
                  $fileDir = "{$folder}/{$reg[1]}";
                  if (file_exists($fileDir)) {
                      $mime = Mime::get($fileDir);
                      header("Content-type: {$mime}", true);
                      return file_get_contents($fileDir);
                  } else {
                      echo "error";
                      http_response_code(404);
                  }
              });
          }

          public static function notFound($call = null){
            self::$uses["not_found"] = $call;
          }

          public function makeData($params = ''){
              $data_receive = [
                  "post" => $_POST,
                  "get" => $_GET,
                  "params" => (is_array($params)) ? $params : [],
                  "session" => (isset($_SESSION) && count($_SESSION) > 0) ? $_SESSION : [],
                  "files" => $_FILES,
                  "put" => (is_array(self::$put)) ? self::$put : [],
                  "delete" => (is_array(self::$delete)) ? self::$delete : []
              ];
              return $data_receive;
          }

          public function respondRouter($fn, $data_receive, $inject = []){
              $data = array_merge([
                  new Request($data_receive, Router::get_uri()),
                  new Response(self::$uses),
                  'db' => function(){
                      return Conn::getConn($_ENV);
                  }
              ], $inject);
              $this->trate_callback($fn, $data);
          }

          public function isMiddlewareRouter($route){
              if(isset(self::$routesConfig[$route]['middleware']) 
                && !empty(self::$routesConfig[$route]['middleware'])){
                  call_user_func_array(
                    [$this, 'middleware'], 
                    self::$routesConfig[$route]['middleware']
                  );
              }
          }
        
          public function dispatch(){
              
              $this->setDefaultMiddlewares();

              $uri = self::$config["path"];
              $metodo = self::$config["method"];
              $param_receive = false;

              if(in_array('RESPOND', array_keys(self::$routes))){
                  foreach (self::$routes["RESPOND"] as $key => $fn) {
                      if($this->isRespond($key, $uri)){
                         $fn = self::$routes["RESPOND"][$key];
                         $this->respondRouter(
                            $fn, 
                            $this->makeData(), 
                            ["reg" => $this->isRespond($key, $uri)]
                        );
                      }
                  }
              }
            
              if(in_array('PARAMS', array_keys(self::$routes))){
                $param = $this->build(self::$routes["PARAMS"], $uri);
                if(is_array($param)){
                  $param_receive = $param;
                  $metodo = "PARAMS";
                }
              }

              // Limpa URL
              $uri = strip_tags(addslashes($uri));
              
              if(in_array($metodo, array_keys(self::$routes))){
                
                if(in_array($uri, array_keys(self::$routes[$metodo])) || in_array($param_receive["rota"], array_keys(self::$routes[$metodo]))){
                    
                    $data_receive = $this->makeData($param_receive['params']);
                    $rota = $uri;

                    if(is_array($param_receive)){
                      $rota = $param_receive['rota'];
                    }

                    $fn = self::$routes[$metodo][$rota];

                    $this->isMiddlewareRouter($rota);
                    $this->respondRouter($fn, $data_receive);

                }else{

                  if(isset(self::$uses["not_found"]) && !empty(self::$uses["not_found"])){
                    $this->respondRouter(
                      self::$uses["not_found"],
                      $this->makeData()
                    );
                  }else{
                    http_response_code(404);
                    die("Route not found");
                  }

                }

              }
              
          }
        
        
      }
