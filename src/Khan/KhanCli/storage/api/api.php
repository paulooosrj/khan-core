
  
  function logger($log){
    $log = ucfirst($log);
    return "<h1>{$log}</h1>";
  }

	$router->group('/apiName', function($route){

      $route::get('/', function($req, $res){
          $res->send(logger('apiName generator in khan apis.'));
      });

      $route::params('/profile/{id}', function($req, $res){
          $res->send(logger('apiName param id: '. $req->params('id')));
      });

      $route::post('/', function($req, $res){
          $res->json($req->post());
      });

      $route::delete('/', function($req, $res){
          $res->send(logger('apiName delete key '. $req->delete('id')));
      });

      $route::put('/', function($req, $res){
          $res->send(logger('apiName put key '. $req->put('id')));
      });

      $route::patch('/', function($req, $res){
          $res->send(logger('apiName patch key '. $req->post('id')));
      });

      $route::respond('/respond', function($req, $res){
          $res->send(logger('apiName respond route '));
      });

      $route::get('/temporary', function($req, $res) use($route){
        return $route::temp("GET", "apiName/", 3);
      });

    });