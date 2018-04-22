<?php
	
	namespace App\Khan\Component\Router\Router;
	
	class ConfigureRoute {

		public function __construct($route){

		    $scope = Router::create();
		    $this->route = $route;
		    $scope->setRouterConfig($route);
		    return $this;
		    
		}

		public function name($name){
		    $scope = Router::create();
		    $this->name = $name;
		    $scope->setRouterName($name, $this->route);
		    $scope->setRouterConfigKey($this->route, 'name', $name);
		    return $this;
		}

		public function middleware(){
		    $scope = Router::create();
		    $this->middleware = func_get_args();
		    $scope->setRouterConfigKey($this->route, 'middleware', func_get_args());
		    return $this;
		}

      }
