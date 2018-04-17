<?php
	
	Container::bind("teste", function(){
		return "Comece o desenvolvimento!!";
	});

	Router::get('/', function($req, $res){

		$res->render('index.html', [
			'message' => $this->container->get('teste')()
		]);
		
	});

	Router::group('/grupo', function($route){

		$route->map('GET', '/home', function($req, $res){
			return 'Ola mundo!!';
		});

		$route->map('PARAMS', '/home/{id}', function($req, $res){
			return 'Ola mundo!! '.$req->params('id');
		});

	}); 
