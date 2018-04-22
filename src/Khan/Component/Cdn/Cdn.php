<?php

	namespace App\Khan\Component\Cdn;
	use App\Khan\Libraries\Request as Request;

	class Cdn {

		private static $instance = null;
		public static $endpoint = "https://cdnjs.cloudflare.com/ajax/libs/";

	    public static function create(){
	        if (!self::$instance) {
	            self::$instance = new Cdn();
	        }
	        return self::$instance;
	    }

	    private function __contruct(){}

	    public function asset($library, $version = "latest", $file){

	    	return self::$endpoint.$library."/".$version."/".$file;

	    }

	}
