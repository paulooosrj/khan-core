<?php
	
	namespace App\Khan\Component\Router\Router;

	class GroupRouter {

		public static $scope = null,
			   		  $route = null,
			   	      $middlewares = null;

	    public function __construct($scope, $route, $middlewares){
	        self::$scope = $scope;
	        self::$route = $route;
	        self::$middlewares = $middlewares;
	    }

        public static function __callStatic($method, $arguments){
        	if(count($arguments) === 2){
        		$route = self::$route . $arguments[0];
        		$call = $arguments[1];
        		call_user_func_array(
				  [self::$scope, $method],
				  [$route, $call]
				);
				$make = self::$scope->configRoute($route);
				if(count(self::$middlewares) > 0){
					$make->middleware(...self::$middlewares);
				}
	     		return $make;
        	}
        }

    }
