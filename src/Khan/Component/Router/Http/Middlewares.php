<?php 

      namespace App\Khan\Component\Router\Http;

      trait Middlewares {

      		public static $middlewares = [];

	      	public static function middleware(){
	           foreach (func_get_args() as $key => $mid) {
	               self::$middlewares[] = $mid;
	           }
	        }

	        public function setDefaultMiddlewares(){
	            $middlewares = require(ROOT_FOLDER . '/config/Middlewares.php');
	            call_user_func_array([$this, 'middleware'], $middlewares);
	        }

	      	public function runMiddlewares($req, $res){
	           if(count(self::$middlewares) > 0){
	              call_user_func_array(
	                [self::$middlewares[0], "handle"], 
	                [$req, $res, $this->nextMiddleware(0)]
	              );
	           }
	        }

      		public function nextMiddleware($id = 1){

	            $selfed = $this;
	            $id++;

	            return function($req, $res) use($id, $selfed){
	              
	                if(!isset(self::$middlewares[$id])){ 
	                  $selfed->req_mid = $req;
	                  $selfed->res_mid = $res;
	                  return false; 
	                }

	                call_user_func_array(
	                  [self::$middlewares[$id], "handle"], 
	                  [$req, $res, $selfed->nextMiddleware($id)]
	                );

	            };

          }

      }
