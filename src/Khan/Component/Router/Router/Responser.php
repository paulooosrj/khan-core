<?php
	
	namespace App\Khan\Component\Router\Router;
	use App\Khan\Component\Container\ServiceContainer as Container;
  use App\Khan\Component\Stream\StreamServer as Stream;
  use App\Khan\Component\DB\DB as Conn;

	class Responser {

          public function __construct(){

            $this->container = Container::create();
            $this->stream = new Stream;
            $this->db = function(){
              return Conn::getConn($_ENV);
            };

          }

          public function app($arg = null){
            return (function_exists('app') && !is_null($arg)) ? app($arg) : Container::create();
          }

          public function helpers(){

              foreach (func_get_args() as $key => $helper) {
                  $name = "App\Khan\Libraries"."\\".$helper . "::create";
                  $this->$helper = $name();
              }

          }

      }
