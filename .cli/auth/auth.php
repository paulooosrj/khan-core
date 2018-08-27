<?php

    Router::get('/login', function ($req, $res) {
        $res->render('login.html', []);
    });

    Router::get('/register', function ($req, $res) {
        $res->render('register.html', []);
    });

    Router::get('/painel', function ($req, $res) {
    	$this->helpers('session');

    	if(!$this->session::has('email') && !$this->session::has('id')){
    		redirect('./');
    	}

        $res->render('painel.html', [
        	"nome" => $this->session::get('name')
        ]);

    });

    Router::post('/auth/register', 'MyApp\AuthController@register');

    Router::post('/auth/login', 'MyApp\AuthController@login');

    Router::get('/logout', 'MyApp\AuthController@logout');
