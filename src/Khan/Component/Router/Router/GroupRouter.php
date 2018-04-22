<?php
	
	namespace App\Khan\Component\Router\Router;

	class GroupRouter {

	    public function __construct($scope, $route, $middlewares){
	        $this->scope = $scope;
	        $this->route = $route;
	        $this->middlewares = $middlewares;
	    }

        public function map($method, $route_two, $call){
			$route = $this->route . $route_two;
			call_user_func_array(
			  [$this->scope, $method],
			  [$route, $call]
			);
			$make = $this->scope->configRoute($route);
			if(count($this->middlewares) > 0){
				$make->middleware(...$this->middlewares);
			}
     		return $make;
        }

    }
