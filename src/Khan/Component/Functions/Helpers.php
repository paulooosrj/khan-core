<?php

use App\Khan\Component\Container\ServiceContainer as Container;

function redirect($url) {
	header("Location: {$url}");
}

function view($url) {
	return 'resources/views/' . $url;
}

function loadView($url) {
  include_once view($url);
}

function url($url) {
	return $_ENV['APP_URL'] . "/" . $url;
}

function img($src) {
  return assets('img/' . $src);
}

function css($src) {
  return assets('css/' . $src);
}

function script($src) {
  return assets('js/' . $src);
}

function assets($url) {
	return $_ENV['APP_URL'] . "/" . "public" . $url;
}

function is_closure($t) {
	return is_object($t) && ($t instanceof Closure);
}

function session($sess = '') {
	return isset($_SESSION) ?
	(isset($_SESSION[$sess]) ? $_SESSION[$sess] : '') : '';
}

function env($e = null) {
  if(!is_null($e)){
    return !empty($_ENV[$e]) ? $_ENV[$e] : null;
  }
  return !empty($_ENV) ? $_ENV : null;
}

function app($factory = null) {
	$instance = Container::create();
	if (is_null($factory) === false) {
		return $instance::get($factory);
	}
	return $instance;
}

function config($factory = '', $value = null) {
	$instance = Container::create();
	if (is_null($value) === false) {
		$instance::bind("app.config.{$factory}", $value);
	}
	return $instance::get("app.config.{$factory}");
} 

function db() {
  $db = DB::getConn(app()::get('app.config'));
  if($db !== null){
    return $db;
  }else{
    die("Error load database");
  }
} 

function cors() {
	return function ($req, $res) {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Max-Age: 1000");
		header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
		header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
	};
}
