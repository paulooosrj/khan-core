<?php

	Container::bind("teste", function(){
		return "Comece o desenvolvimento!!";
	});

	Router::notFound(function($req, $res){
		$res->setStatusCode(404);
		return die("Route not found insert in router!!");
	});

	Router::get('/', function($req, $res, Container $container){
		$message = $container::get('teste')();
		return $message;
	});

// 	Router::get('/form', function($req, $res){
// 		return $res->render('csrf.html');
// 	});

// 	Router::post('/form', function($req, $res){
// 		return Router::csrf_token_verify($req->post('token')) 
// 				? 'verdadeiro': 'falso';
// 	});

// 	Router::get('/teste', "Controllers\TesteController->index");

// 	Router::get('/testando', function($req, $res){
// 		return "Bot Run!!";
// 	});