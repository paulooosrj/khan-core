<?php

	class Router {

		public static $facade = 'App\Khan\Component\Router\Router\Router::create';

		public static function __callStatic($name, $arguments){
			
        	$facade = self::$facade;
        	
        	return call_user_func_array([$facade(), $name], $arguments);

    	}

	}
