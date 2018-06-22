<?php
	
	use App\Khan\Component\Router\Router\Router as Router;
	use App\Khan\Component\DB\DB as Conn;
	use App\Khan\Component\Stream\StreamServer as Stream;

	// Set Router
	app()::bind('app.router', function(){
	    $router = Router::create();
	    $map = "routes/*.php";
	    foreach (glob($map) as $filename) {
	        include_once $filename;
	    }
	    $routerFactory = Router::create();
	    $routerFactory->dispatch();
	});

	// Set Stream
	app()::bind('app.stream', new Stream());

	// Set Database
	app()::bind('app.use.db', function () {
	    return Conn::getConn($_ENV);
	});
