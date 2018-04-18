<?php
	
	Router::params('/perfil/{id}', function($req, $res){
		echo "Perfil id {$req->params('id')}";
	});

	Router::get('/test', function($req, $res){

		print_r($req);
		return "Ola mundo!!";

	});
