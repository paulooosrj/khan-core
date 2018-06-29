<?php

    $users = [
        [ "name" => "Jose", "idade" => 20 ],
        [ "name" => "Pedro", "idade" => 22 ],
        [ "name" => "Maria", "idade" => 18 ],
        [ "name" => "Carla", "idade" => 25 ]
    ];

    Router::get('/vue', function($req, $res){

       include view('vue.html');
  
    });

	$router->group('/khan-vue', function($route) use($users){

      $route::get('/', function($req, $res) use ($users){
          $res->json($users)
              ->status(200);
      });

      $route::params('/profile/{id}', function($req, $res) use ($users){
          $id = $req->params('id');
          $find = in_array($id, array_keys($users));
          if($find)
            $res->json($users[$id])
                ->status(200);
          else
            $res->json(["error" => "not find user {$id}"])
                ->status(401);
      });

      $route::post('/', function($req, $res){
          $res->json($req->post());
      });

      $route::delete('/', function($req, $res) use ($users){
          $res->json($req->delete())
              ->status(200);
      });

      $route::put('/', function($req, $res) use ($users){
          $res->json($req->put())
              ->status(200);
      });

  });