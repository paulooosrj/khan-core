<?php
	
	Router::params('/perfil/{id}', function($req, $res){
		echo "Perfil id {$req->params('id')}";
	});

	Router::get('/test', 'MyApp\ApiController->index');
	Router::get('/test_get', 'MyApp\ApiController->getAll');

	Router::get('/validate', function($req, $res){
		if(
			\App\Khan\Component\Validate\Data::validate([
				"name" => "PaulaoDev",
				"age" => 20,
				"picture" => "http://imgur.com/minha.png"
			], [
				"name" => "not_empty",
				"age" => "numeric",
				"picture" => "is_url"
			])
		){
			echo "É valido!!";
		}else{
			echo "Nao é valido!!";
		}
	});
