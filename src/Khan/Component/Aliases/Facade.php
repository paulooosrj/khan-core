<?php

	class facadeClass {

		public static $facade = 'facadeName';

		public static function __callStatic($name, $arguments){
        	$facade = self::$facade;
        	return call_user_func_array([$facade(), $name], $arguments);
    	}

	}
