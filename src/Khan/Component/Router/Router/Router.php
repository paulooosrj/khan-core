<?php

declare(strict_types=1);

/**
 * Khan - Component (Router) - A fast, easy and flexible router system for PHP
 *
 * @author      PaulaoDev <jskhanframework@gmail.com>
 * @copyright   (c) PaulaoDev
 * @link        https://github.com/PaulaoDev/Router
 * @license     MIT
 */

namespace App\Khan\Component\Router\Router;
use App\Khan\Component\Mime\Mime as Mime;
use App\Khan\Component\Router\Http\Request as Request;
use App\Khan\Component\Router\Http\Response as Response;

@session_start();

function pipe(){
    $fns = func_get_args();
    return function() use($fns){
        $v = func_get_args();
        return array_reduce($fns, function($ant, $atu){
            $ant = is_array($ant) ? $ant : [ $ant ];
            return call_user_func_array($atu, $ant);
        }, $v);
    };
}

/**
 * server
 *
 * @param  mixed $v
 *
 * @return void
 */
function server(string $v){
    return in_array($v, $_SERVER) ? $_SERVER[$v] : '';
}

/**
 * generate
 *
 * @param  mixed $name
 * @param  mixed $data
 *
 * @return void
 */
function generate($name, $data) {
    $matchs = [];
    // $routeActive = Router::$routesName[$name];
    $uri = $routeActive;
    if (preg_match("/\{(.*?)\}/", $uri)) {
        preg_match_all("/\{(.*?)\}/", $routeActive, $matchs);
        if (is_array($matchs) && count($matchs) > 1) {
            foreach ($matchs[0] as $key => $value) {
                $uri = str_replace($value, $data[$key], $uri);
            }
        }
    }
    return $uri;
}

/**
 * isJsonReturn
 *
 * @param  mixed $res
 *
 * @return void
 */
function isJsonReturn($res) {
    header('Content-Type: application/json');
    return json_encode($res, JSON_PRETTY_PRINT);
}

/**
 * isJsonRes
 *
 * @param  mixed $res
 *
 * @return void
 */
function isJsonRes($res) {
    return (is_array($res)) ? isJsonReturn($res) : $res;
}

/**
 * isRespond
 *
 * @param  mixed $key
 * @param  mixed $uri
 *
 * @return void
 */
function isRespond($key, $uri) {
    $key = '/^' . str_replace('/', '\/', $key) . '$/';
    $matches = [];
    return (preg_match($key, $uri, $matches)) ? $matches : false;
}

/**
 * group
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $middlewares
 *
 * @return void
 */
function group($route, $call = null, $middlewares = []) {
    $scope = Router::create();
    $call(new GroupRouter($scope, $route, $middlewares));
    return $scope;
}

/**
 * resolve
 *
 * @return void
 */
function resolve() {
    $args = func_get_args();
    if (count($args) !== 3) {throw "error arguments";}
    list($route, $call, $method) = $args;
    $scope = Router::create();
    return $scope->makeRoutes($route, $call, $method);
}

/**
 * get
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $method
 *
 * @return void
 */
function get($route, $call = null, $method = 'GET') {
    return resolve($route, $call, $method);
}

/**
 * post
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $method
 *
 * @return void
 */
function post($route, $call = null, $method = 'POST') {
    return resolve($route, $call, $method);
}

/**
 * delete
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $method
 *
 * @return void
 */
function delete($route, $call = null, $method = 'DELETE') {
    return resolve($route, $call, $method);
}

/**
 * put
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $method
 *
 * @return void
 */
function put($route, $call = null, $method = 'PUT') {
    return resolve($route, $call, $method);
}

/**
 * respond
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $method
 *
 * @return void
 */
function respond($route, $call = null, $method = 'RESPOND') {
    return resolve($route, $call, $method);
}

/**
 * params
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $method
 *
 * @return void
 */
function params($route, $call = null, $method = 'PARAMS') {
    return resolve($route, $call, $method);
}

/**
 * patch
 *
 * @param  mixed $route
 * @param  mixed $call
 * @param  mixed $method
 *
 * @return void
 */
function patch($route, $call = null, $method = 'PATCH') {
    return resolve($route, $call, $method);
}

/**
 * notFound
 *
 * @param  mixed $call
 *
 * @return void
 */
function notFound($call){
    return Router::notFound($call);
}

class Router {

	use \App\Khan\Component\Router\RegexEngine\RegexEngine,
	\App\Khan\Component\Router\Http\Middlewares,
	\App\Khan\Component\Router\Router\Temporary,
	\App\Khan\Component\Router\Components\CsrfToken;

	private static $instance = null,
	$uses = [],
	$routes = [
		"GET" => [],
		"POST" => [],
		"PARAMS" => [],
		"DELETE" => [],
		"PUT" => [],
		"PATCH" => [],
		"RESPOND" => [],
	],
	$routesConfig = [],
	$routesName = [],
	$config = [],
	$delete, $put;

	/**
	 * create
	 *
	 * @param  mixed $config
	 *
	 * @return void
	 */
	public static function create($config = '') {
		if (self::$instance === null) {
			self::$instance = new self($config);
		}
		return self::$instance;
	}

	/**
	 * __construct
	 *
	 * @param  mixed $config
	 *
	 * @return void
	 */
	protected function __construct($config = null) {

        $server = $_SERVER;

		self::$config = array_merge(self::$config, [
            "uri" => Router::get_uri(),
            "path" => (strripos($server["REQUEST_URI"], "?"))
            ? explode("?", $server["REQUEST_URI"])[0]
            : $server["REQUEST_URI"],
            "method" => (isset($server["REQUEST_METHOD"]))
            ? $server["REQUEST_METHOD"]
            : "GET"
        ]);

        $this->outherMethods($config);

	}

	/**
	 * outherMethods
	 *
	 * @param  mixed $config
	 *
	 * @return void
	 */
	private function outherMethods($config) {
		if (in_array(self::$config["method"], ["delete", "put"])) {
			if (self::$config["method"] === "delete"):
				parse_str(file_get_contents('php://input'), self::$delete);
			endif;
			if (self::$config["method"] === "put"):
				parse_str(file_get_contents('php://input'), self::$put);
			endif;
		}
		if (!is_null($config) && gettype($config) == "array") {
			self::$config = array_merge(self::$config, $config);
		}
	}

	/**
	 * get_uri
	 *
	 * @return void
	 */
	public static function get_uri() {
		$server = $_SERVER;
		$scheme = isset($server["REQUEST_SCHEME"]) ?: null;
		$host = $server['HTTP_HOST'];
		$protocol = (isset($scheme)) ? $scheme : ((
			isset($server["HTTP_X_FORWARDED_PROTO"]
			)) ? $server["HTTP_X_FORWARDED_PROTO"] : "http");
		$domain = (isset($host)) ? $host : $server["SERVER_NAME"];
		$path = (isset($server["REQUEST_URI"])) ? $server["REQUEST_URI"] : "/";
		return "{$protocol}://{$domain}{$path}";
	}

	/**
	 * methods
	 *
	 * @return void
	 */
	public static function methods() {
		return self::$routes;
	}

	/**
	 * has
	 *
	 * @param  mixed $route
	 * @param  mixed $type
	 *
	 * @return void
	 */
	public static function has($route, $type) {
		if (is_array($route)) {
			$argss = [];
			foreach ($route as $key => $value) {
				$argss[] = !isset(self::$routes[$type][$key]) ?
				"true" : "false";
			}
			return !in_array("false", $argss) ? "true" : "false";
		}
		return !isset(self::$routes[$type][$route]);
	}

	/**
	 * type
	 *
	 * @param  mixed $type
	 *
	 * @return void
	 */
	public static function type($type) {
		return gettype($type);
	}

	public function set($name, $callback) {
		if (!isset(self::$uses[$name])) {
			self::$uses[$name] = $callback;
		}
	}

	private function uses() {
		return self::$uses;
	}

	public function create_instance($class, $params) {
		$c = count($params);
		if (stripos($class, "::")) {
			if ($c === 2) {
				return $class($param[0], $param[1]);
			}

			if ($c === 3) {
				return $class($param[0], $param[1], $param[2]);
			}

			if ($c === 4) {
				return $class($param[0], $param[1], $param[2], $param[3]);
			}

			if ($c === 5) {
				return $class($param[0], $param[1], $param[2], $param[3], $param[4]);
			}

		} else {
			if ($c === 2) {
				return new $class($param[0], $param[1]);
			}

			if ($c === 3) {
				return new $class($param[0], $param[1], $param[2]);
			}

			if ($c === 4) {
				return new $class($param[0], $param[1], $param[2], $param[3]);
			}

			if ($c === 5) {
				return new $class($param[0], $param[1], $param[2], $param[3], $param[4]);
			}

		}
	}

	public function makeRoutes($route, $call = null, $method = 'GET') {
		$scope = Router::create();
		if (Router::has($route, $method)) {
			$type = Router::type($route);
			if ($type === "string") {
				self::$routes[$method][$route] = $call;
			} elseif ($type === "array") {
				foreach ($route as $key => $routeName) {
					if (is_null($call)) {
						self::$routes[$method][$key] = $routeName;
					} else {
						self::$routes[$method][$key] = $call;
					}
				}
			}
		}
		return $scope->configRoute($route);
	}

	public function class_invoked($class, $data) {

		$this->runMiddlewares($data[0], $data[1]);
		$response = '';

		if (isset($this->req_mid)) {$data[0] = $this->req_mid;}
		if (isset($this->res_mid)) {$data[1] = $this->res_mid;}

		if (strripos($class, "->")) {
			list($className, $fun) = explode('->', $class);
			$refl = new \ReflectionMethod($className, $fun);
			$response = $refl->invokeArgs(new $className, $data);
		} else {
			$response = $this->create_instance($class, $data);
		}

		return isJsonRes($response);

	}

	public function callBind() {
		return new Responser;
	}

	private function type_trate($type, $callback, $data) {
		if ($type == "object") {
			$callback = $callback->bindTo($this->callBind());
			$this->runMiddlewares($data[0], $data[1]);
			if (isset($this->req_mid)) {$data[0] = $this->req_mid;}
			if (isset($this->res_mid)) {$data[1] = $this->res_mid;}
			$response = call_user_func_array($callback, $data);
			return isJsonRes($response);
		} elseif ($type == "string") {
			return $this->class_invoked($callback, $data);
		}
	}

	private function trate_callback($callback, $data) {
		$type = gettype($callback);
		if ($type == "object") {
			$refFunc = new \ReflectionFunction($callback);
			foreach ($refFunc->getParameters() as $param) {
				if ($param->getClass()) {
					$classe = $param->getClass()->name;
					$data[] = new $classe;
				}
			}
			return $this->type_trate($type, $callback, $data);
		} elseif ($type == "string") {
			return $this->type_trate($type, $callback, $data);
		} elseif ($type == "array") {
			foreach ($callback as $key => $value) {
				$t = gettype($value);
				return $this->type_trate($t, $value, $data);
			}
		}
	}

	public static function redirect($route) {
		$route = self::$routesName[$route] || $route;
		$route = "." . $route;
		header("Location: {$route}");
	}

	public static function setRouterConfig($route) {
		if (is_array($route)) {return false;}
		self::$routesConfig[$route] = [];
	}

	public static function setRouterConfigKey($route, $name, $valor) {
		self::$routesConfig[$route][$name] = $valor;
	}

	public static function setRouterName($name, $route) {
		self::$routesName[$name] = $route;
	}

	public function configRoute($route) {
		return new ConfigureRoute($route);
	}

	public static function temp($method = 'GET', $route, $minutes) {
        $scope = Router::create();
		$generate = $scope->generateHash($route);
		$time = $scope->hour();
		return $scope->gen(
			"/" . $generate,
			$route,
			$time,
			$method,
			$minutes
		);
	}

	public function setLoadTemp() {
		$scope = Router::create();
		$temp = $this->loadTemp();
		foreach ($temp as $key => $data) {
			$data = (array) $data;
			$timeOrigin = (array) $data['time'];
			$time = new \DateTime($timeOrigin["date"]);
			$time = date_diff(new \DateTime(), $time)->i;
			if ($time <= $data["minutes"]) {
				$scope->makeRoutes($key, function () use ($data) {
					Router::redirect($data["origin"]);
				}, $data["method"]);
			} else {
				$this->clearRouteTemp($key);
			}
		}
	}

	public static function staticFiles($route) {
		$folder = $route;
		$route = "/" . $route . "/(.*)";
		respond($route, function ($req, $res, $reg) use ($folder) {
			$fileDir = "{$folder}/{$reg[1]}";
			if (file_exists($fileDir)) {
				$mime = Mime::get($fileDir);
				ob_start();
				include ($fileDir);
				$res = ob_get_contents();
				ob_end_clean();
				header("Content-type: {$mime}", true);
				return $res;
			} else {
				echo "error";
				http_response_code(404);
			}
		});
    }

    public function isRespond($key, $uri){
        return isRespond($key, $uri);
    }

	public static function notFound($call = null) {
		self::$uses["not_found"] = $call;
	}

	public function makeData($params = '') {
		$data_receive = [
			"post" => $_POST,
			"get" => $_GET,
			"params" => (is_array($params)) ? $params : [],
			"session" => (isset($_SESSION) && count($_SESSION) > 0) ? $_SESSION : [],
			"files" => $_FILES,
			"put" => (is_array(self::$put)) ? self::$put : [],
			"delete" => (is_array(self::$delete)) ? self::$delete : [],
		];
		return $data_receive;
	}

	public function respondRouter($fn, $data_receive, $inject = []) {
		$data = array_merge([
			new Request($data_receive, Router::get_uri()),
			new Response(self::$uses),
		], $inject);
		return $this->trate_callback($fn, $data);
	}

	public function isMiddlewareRouter($route) {
		if (isset(self::$routesConfig[$route]['middleware'])
			&& !empty(self::$routesConfig[$route]['middleware'])) {
			call_user_func_array(
				[$this, 'middleware'],
				self::$routesConfig[$route]['middleware']
			);
		}
	}

	/**
	 * dispatch
	 *
	 * @param  mixed $method
	 * @param  mixed $path
	 * @param  mixed $test
	 *
	 * @return void
	 */
	public function dispatch($method = '', $path = '', $test = false) {

		$this->setDefaultMiddlewares();
		$this->setLoadTemp();

        $configs = self::$config;

		$method = $method ?: $configs['method'];
		$path = $path ?: $configs['path'];
		$dispatcher = new Dispatcher($this);
		$res = $dispatcher($path, $method, self::$routes, self::$uses);

		if (!$test) {
			echo $res;
		} else {
			return $res;
		}

	}

}
