<?php

namespace App\Khan\Component\Router\Router;

class Dispatcher {

	public function __construct($router) {
		$this->router = $router;
	}

	public function __invoke($uri, $metodo, $routes, $uses) {

        $path = parse_url($_ENV['APP_URL'], PHP_URL_PATH);

		$param_receive = false;
		$scope = $this->router;

		if ($path !== "/") {
			$uri = str_replace($path, '', $uri);
		}

		array_walk($routes["RESPOND"], function ($fn, $key) use ($scope, $uri, $routes) {
			$reg = $scope->isRespond($key, $uri);
			if ($reg) {
				echo $scope->respondRouter($fn, $scope->makeData(), ["reg" => $reg]);
			}
		});

		if (in_array('PARAMS', array_keys($routes))) {
			$param = $scope->build($routes["PARAMS"], $uri);
			if (is_array($param)) {
				$param_receive = $param;
				$metodo = "PARAMS";
			}
		}

		// Limpa URL
        $uri = strip_tags(addslashes($uri));

		if (in_array($metodo, array_keys($routes))) {

			if (in_array($uri, array_keys($routes[$metodo])) || in_array($param_receive["rota"], array_keys($routes[$metodo]))) {

				$data_receive = $scope->makeData($param_receive['params']);
				$rota = $uri;

				if (is_array($param_receive)) {
					$rota = $param_receive['rota'];
				}

				$fn = $routes[$metodo][$rota];

				$scope->isMiddlewareRouter($rota);
				return $scope->respondRouter($fn, $data_receive);

			} else {
				if (isset($uses["not_found"]) && !empty($uses["not_found"])) {
					return $scope->respondRouter($uses["not_found"], $scope->makeData());
				} else {
					http_response_code(404);
					die("Route not found");
				}
			}

		}

	}

}
