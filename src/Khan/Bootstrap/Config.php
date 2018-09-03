<?php

use App\Khan\Component\DB\DB as Conn;
use App\Khan\Component\Router\Router\Router as Router;
use App\Khan\Component\Stream\StreamServer as Stream;

// Set Configs
app()::bind('app.config', $_ENV);

// Set Router
app()::bind('app.router', function () {
	$router = Router::create();
	include_once 'config/routes.php';
	$router::staticFiles('public');
	$router::staticFiles('docs');
	$routerFactory = Router::create();
	$routerFactory->dispatch();
});

// Set Stream
app()::bind('app.stream', new Stream());

// Set Database
app()::bind('app.use.db', function () {
	return Conn::getConn($_ENV);
});

// Set Timezone
app()::bind('app.use.timezone', function(){
  $config = require ROOT_FOLDER . "/config/app.php";
  return date_default_timezone_set($config['timezone']);
});