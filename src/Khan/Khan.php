<?php

	/**
	 * RouterKhan (Khan.php) - A fast, easy and flexible router system for PHP
	 *
	 * @author      PaulaoDev <jskhanframework@gmail.com>
	 * @copyright   (c) PaulaoDev
	 * @link        https://github.com/PaulaoDev/router-khan
	 * @license     MIT
	 */

	namespace App\Khan;

	define("ROOT_CORE", __DIR__);

	include_once __DIR__ . '/Component/Functions/Helpers.php';
	include_once __DIR__ . '/Bootstrap/Config.php';

	/**
	 * Class Core Run Project
	 */

	class Khan {

	    protected static $instance = null;

	    /**
	     * [create get instance in singleton]
	     * @return [object] [Return khan instance]
	     */
	    
	    public static function create(){
	        if (self::$instance == null) {
	            self::$instance = new Khan();
	        }
	        return self::$instance;
	    }

	    protected function __construct(){}

	    /**
	     * [enviroments $_ENV]
	     * @return [void] [load enviroments in system]
	     */
	    
	    public static function enviroments(){
	        $dotenv = new \Dotenv\Dotenv(ROOT_FOLDER);
	        $dotenv->load();
	        return $_ENV;
	    }

	    /**
	     * Update Aliases in project
	     */
	    
	  	public function updateAliases(){
	    	$aliases = require(ROOT_FOLDER . '/config/Aliases.php');
	    	foreach ($aliases as $key => $value) {
	    		@unlink(__DIR__.'/Component/Aliases/storage/'.$key.'.php');
	    	}
	    }

	    /**
	     * Update Aliases in project
	     */
	    
	  	public function loadAliases(){
	    	$aliases = require(ROOT_FOLDER . '/config/Aliases.php');
	    	foreach ($aliases as $key => $value) {
	    		$folder = __DIR__.'/Component/Aliases/storage/'.$key.'.php';
	    		include_once($folder);
	    	}
	    }

	    /**
	     * Create Aliases in project
	     */
	    
	    private function aliases(){
	    	$aliases = require(ROOT_FOLDER . '/config/Aliases.php');
	    	foreach ($aliases as $key => $value) {
	    		new Component\Aliases\Aliases($key, $value);
	    	}
	    }

	    /**
	     * [services Load all services]
	     * @return [void [load and run services in framework]
	     */
	    
	    public function services(){

	        $this->enviroments();
	        $this->aliases();
	        $this->loadAliases();

	        foreach (app()::resolve('app')() as $key => $value) {
	        	if(is_closure($value)){
	        		$value();
	        	}
	        }

	    }

	    public function dispatch(){

	        $this->services();

	    }
	    
	}
