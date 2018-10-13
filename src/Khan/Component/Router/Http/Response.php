<?php

namespace App\Khan\Component\Router\Http;
use \App\Khan\Component\HttpFoundation\Response as ResponseFoundation;
use \App\Khan\Component\Router\Http\Interfaces\Response as ResponseInterface;

/**
 * Response Class and Interface Implement
 */
@session_start();

class Response extends ResponseFoundation implements ResponseInterface {

	public static $extends = [
		"view",
		"assets",
		"socket",
		"peer",
		"cdn",
		"csrf_token",
		"csrf_token_input",
	];

	private static $use = [];

	public function __construct($uses) {

		parent::__construct();
		self::$use = $uses;
		$this->loadTwig($uses);
		$this->extendsTwig();
		foreach (self::$use as $key => $value) {
			if (strpos($key, "twig.") !== false) {
				$fnName = str_replace('twig.', '', $key);
				$this->setFunctionTwig($fnName, $value);
			} else {
				$this->$key = $value;
			}
		}

	}

	public function loadTwig($uses) {
		$folder = (!isset($uses['views'])) ? 'resources/views/' : $uses['views'];
		$loader = new \Twig_Loader_Filesystem($folder);
		$cache = ($_ENV['APP_PRODUCTION'] === 'true') ? ['cache' => $folder . 'compilation_cache'] : [];
		$this->twig = new \Twig_Environment($loader, $cache);
	}

	public function setFunctionTwig($fname, $fncall = false) {
		$self = $this;
		$function = new \Twig_SimpleFunction($fname, function () use ($self, $fname, $fncall) {
			if ($fncall === false) {
				echo call_user_func_array([$self, $fname], func_get_args());
			} else {
				echo call_user_func_array($fncall, func_get_args());
			}
		});
		$this->twig->addFunction($function);
	}

	public function extendsTwig() {
		foreach (self::$extends as $key => $extend) {
			$this->setFunctionTwig($extend);
		}
	}

	public function csrf_token() {
		if (empty($_SESSION['token'])) {
			if (function_exists('mcrypt_create_iv')) {
				$_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			} else {
				$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
			}
		}
		return $_SESSION['token'];
	}

	public function csrf_token_input() {
		if (empty($_SESSION['token'])) {
			if (function_exists('mcrypt_create_iv')) {
				$_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			} else {
				$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
			}
		}
		return "<input type='hidden' name='token' value='" . $_SESSION['token'] . "'/>";
	}

	public function cdn($library, $version, $file) {
		$cdn = \App\Khan\Component\Cdn\Cdn::create();
		return $cdn->asset($library, $version, $file);
	}

	public function socket($dev = true) {

		$res = "<script src='https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.0/socket.io.slim.js' charset='utf-8'></script>";

		if ($dev) {
			$res .= "\n    <script src='https://rawgit.com/PaulaoDev/khan-core/master/src/Khan/Component/Socket/SocketAdpter.js' charset='utf-8'></script>";
		} else {
			$res .= "\n    <script src='https://cdn.rawgit.com/PaulaoDev/khan-core/master/src/Khan/Component/Socket/SocketAdpter.js' charset='utf-8'></script>";
		}

		return $res;

	}

	public function peer($dev = true) {

		$res = "<script src='https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.0/socket.io.slim.js' charset='utf-8'></script>";

		if ($dev) {
			$res .= "\n    <script src='https://rawgit.com/PaulaoDev/khan-core/master/src/Khan/Component/Socket/SocketAdpter.js' charset='utf-8'></script>";
			$res .= "\n    <script src='https://rawgit.com/PaulaoDev/khan-core/master/src/Khan/Component/Peer/Peer.js' charset='utf-8'></script>";
		} else {
			$res .= "\n    <script src='https://cdn.rawgit.com/PaulaoDev/khan-core/master/src/Khan/Component/Socket/SocketAdpter.js' charset='utf-8'></script>";
			$res .= "\n    <script src='https://cdn.rawgit.com/PaulaoDev/khan-core/master/src/Khan/Component/Peer/Peer.js' charset='utf-8'></script>";
		}

		return $res;

	}

	public function view($name) {
		echo 'resources/views/' . $name;
		return $this;
	}

	public function assets($name) {
		// print_r($_ENV);
		echo $_ENV['APP_URL'] . "/" . "public/" . $name;
		// return $this;
	}

	public function render($file, $data = []) {
		echo $this->twig->render($file, $data);
		return $this;
	}

	public function load($file) {
		$this->twig->load($file);
		return $this;
	}

	public function json($array = []) {
		echo json_encode($array, JSON_PRETTY_PRINT);
		return $this;
	}

	public function status($state = 200) {
		http_response_code($state);
		return $this;
	}

	public function send($string = '') {
		echo $string;
		return $this;
	}

}
