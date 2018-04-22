<?php

	class Container {

		public static $facade = 'App\Khan\Component\Container\ServiceContainer::create';

		public static function __callStatic($name, $arguments){
        	$facade = self::$facade;
        	return call_user_func_array([$facade(), $name], $arguments);
    	}

	}
