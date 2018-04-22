<?php

	class Strategy {

		public static $facade = 'App\Khan\Component\Strategy\Strategy::create';

		public static function __callStatic($name, $arguments){
        	$facade = self::$facade;
        	return call_user_func_array([$facade(), $name], $arguments);
    	}

	}
