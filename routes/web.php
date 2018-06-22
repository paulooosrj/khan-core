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

	Router::get([
		'/teste1' => function(){
			$this->app()::bind('nome', 'PaulaoDev');
			print_r($this->app('nome'));
		},
		'/teste2' => function(){
			print_r(url());
		},
	]);

	Router::post('/form', function($req, $res){

		return Router::csrf_token_verify($req->post('token')) 
			   ? "true" : "false";
		
	});

	Router::get('/form', function($req, $res){

		return $res->render('form.html');
		
	});

	Router::get('/maked', function($req, $res){

		echo Router::temp('GET', '/peer', 2);
		
	});

	/**/
	Router::get('/peer', function($req, $res){

		$res->render('peer.html');
		
	});

	Router::get('/react', function($req, $res){

		$res->render('react.html');
		
	});

	Router::get('/teste', "MyApp\TesteController::teste");

	Router::group('/painel', function($route){

		$route::get('/strategy', function($req, $res){

			return "Ola mundo!!";

		});


	}, [ /*Middlewares\InitMiddleware::class*/ ]); 
