<?php
	
	Container::bind("teste", function(){
		return "Comece o desenvolvimento!!";
	});

	Router::notFound(function($req, $res){
		$res->setStatusCode(404);
		return die("Route not found insert in router!!");
	});

	Router::get('/', function($req, $res){

		$message = Container::get('teste')();
		$res->render('index.html', [
			'message' => $message
		]);
		
	});

	Router::get('/teste', "MyApp\TesteController");

	Router::group('/painel', function($route){

		$route->map('GET', '/strategy', function($req, $res){

			/*
			Logout to strategy
			Strategy::make('painel')::logout();
			
			Register to strategy
			Strategy::make('painel')::register([
				"email" => "admin@admin.com",
				"password" => "paulao2018",
				"name" => "PaulaoDev"
			]);
			
			Login to strategy
			Strategy::make('painel')::login([
				"email" => "admin@admin.com",
				"password" => "paulao2018"
			]));

			*/

		});


	}, [ /*Middlewares\InitMiddleware::class*/ ]); 
