<?php

	use App\Khan\Component\Container\ServiceContainer as Container;
	
    function redirect($url){
        header("Location: {$url}");
    }

    function view($url){
        return 'resources/views/' . $url;
    }

    function url($url){
        return $_ENV['APP_URL'] . "/" . $url;
    }

    function assets($url){
        return $_ENV['APP_URL']. "/" . "public" . $url;
    }

    function is_closure($t) {
	    return is_object($t) && ($t instanceof Closure);
	}

    function session($sess = ''){
        return isset($_SESSION) ? 
               (isset($_SESSION[$sess]) ? $_SESSION[$sess] : '') : '';
    }

    function app($factory = null){
    	$instance = Container::create();
    	if(is_null($factory) === false){
    		return $instance::get($factory);
    	}
    	return $instance;
    }

    function config($factory = '', $value = null){
    	$instance = Container::create();
    	if(is_null($value) === false){
    		$instance::bind("app.config.{$factory}", $value);
    	}
    	return $instance::get("app.config.{$factory}");
    }
