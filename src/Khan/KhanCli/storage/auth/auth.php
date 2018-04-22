<?php

    Router::get('/login', function ($req, $res) {
        $res->render('login.html');
    });

    Router::get('/register', function ($req, $res) {
        $res->render('register.html');
    });

    Router::group('/painel', function ($route) {

        $route->map("GET", '/', function($req, $res){
            $res->render('painel.html', [
                "nome" => $_SESSION['name']
            ]);
        });

        $route->map("GET", '/logout', 'MyApp\AuthController@logout');

    })->middleware('Middlewares\CheckLogin');

    Router::post('/auth/register', 'MyApp\AuthController@register');

    Router::post('/auth/login', 'MyApp\AuthController@login');
