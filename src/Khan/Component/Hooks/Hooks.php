<?php

	namespace App\Khan\Component\Hooks;

	class Hooks {       

	    public static function exists($filename){
	        return file_exists($filename);
	    }

	    public static function copy($filename, $dist){
	        return @copy($filename, $dist);
	    }

	    public static function delete($filename){
	        if(Hooks::exists($filename)){
	            return @unlink($filename);
	        }
	    }

	    public static function append($filename, $code){
	        if(Hooks::exists($filename)){
	            return file_put_contents($filename, $code, FILE_APPEND);
	        }
	    }

	    public static function write($filename, $code){
	        if(Hooks::exists($filename)){
	            return file_put_contents($filename, $code);
	        }
	    }

	    public static function replace($filename, $replaces = []){
	        if(Hooks::exists($filename)){
	            $resources = file_get_contents($filename);
	            foreach ($replaces as $key => $value) {
	                $resources = str_replace($key, $value, $resources);
	            }
	            return $resources;
	        }
	    }

	    public static function read($filename){
	        if(Hooks::exists($filename)){
	            return file_get_contents($filename);
	        }
	    }

	    public static function toJson($filename){
	        if(Hooks::exists($filename)){
	            return json_encode(file_get_contents($filename), JSON_PRETTY_PRINT);
	        }
	    }

	    public static function unJson($filename){
	        if(Hooks::exists($filename)){
	            return json_decode(file_get_contents($filename));
	        }
	    }

	    public static function create($filename, $source = ''){
	        if(!Hooks::exists($filename)){
	            return file_put_contents($filename, $source);
	        }
	    }

	    public static function folder($foldername){
	        if(!Hooks::exists($foldername)){
	            return @mkdir($foldername);
	        }
	    }

	    public static function __callStatic($name, $arguments)
	    {
	        return call_user_func_array([$this, $name], $arguments);
	    }

	}
