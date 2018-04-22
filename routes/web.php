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

	Router::group('/grupo', function($route){

		$route->map('GET', '/home', function($req, $res){

			
			print_r(Strategy::make('painel')::login([
				"email" => "admin@admin.com",
				"password" => "paulao2018"
			]));

			/*
			
			

			print_r(Strategy::make('painel')::register([
				"email" => "admin@admin.com",
				"password" => "paulao2018",
				"name" => "PaulaoDev"
			]));

			print_r(Strategy::make('painel')::login([
				"email" => "admin@admin.com",
				"password" => "paulao2018"
			]));

			$encrypt = new \App\Khan\Component\Encrypt\Encrypt();

			$hash = $encrypt->encrypt("PaulaoDev");
			if($encrypt->verify("PaulaoDev", $hash)){
				echo "Hash é compativel!!";
			}*/

			return '';

		});

		$route->map('PARAMS', '/home/{id}', function($req, $res){
			return 'Ola mundo!! params '.$req->params('id');
		});

	}, [ /*Middlewares\InitMiddleware::class*/ ]); 
