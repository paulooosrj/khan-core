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

	use App\Khan\Component\{
		Router\src\Router\Router as Router,
		Container\ServiceContainer as Container,
		Stream\StreamServer as Stream,
		DB\DB as Conn
	};

	class Khan {

	    protected static $instance = null;

	    public static function create(){
	        if (self::$instance == null) {
	            self::$instance = new Khan();
	        }
	        return self::$instance;
	    }

	    protected function __construct(){}

	    private function enviroments(){
	        $this->dotenv = new \Dotenv\Dotenv(ROOT_FOLDER);
	        $this->dotenv->load();
	    }

	    private function setDb(){
	    	$this->db = function () {
	            return Conn::getConn($_ENV);
	        };
	    }

	    private function setContainer(){
	    	$this->container = Container::create();
	    }

	    protected function router(){

	        $container = $this->container;
	        $stream = new Stream();
	        $db = $this->db;

	        Router::create([
	            "clean_request" => true,
	            "url_filter" => true
	        ]);

	        $router = Router::create();

	        include_once __DIR__ . '/Component/Functions/Functions.php';

	        foreach (glob("routes/*.php") as $filename) {
	            include_once $filename;
	        }

	        $routerFactory = Router::create();
	        $routerFactory->dispatch();

	    }

	    public function services(){

	        $this->enviroments();
	        $this->setDb();
	        $this->setContainer();
	        $this->router();

	    }

	    public function dispatch(){

	        $this->services();

	    }
	    
	}
