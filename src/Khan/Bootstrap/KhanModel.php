<?php

	namespace App\Khan\Bootstrap;

	class KhanModel {

		public function helpers(){
			foreach (func_get_args() as $key => $helper) {
				$name = "App\Khan\Libraries"."\\".$helper . "::create";
                $this->$helper = $name();
			}
		}

		public function __get($name){
			$aliases = require(ROOT_FOLDER . '/config/Aliases.php');
			foreach ($aliases as $key => $value) {
				$aliases[strtolower($key)] = $value;
				unset($aliases[$key]);
			}
	    	if(method_exists($this, $name) === false){
		    	if($aliases[$name]){
		    		return call_user_func_array($aliases[$name], [$_ENV]);
		    	}
	    	}
	    }

	}
