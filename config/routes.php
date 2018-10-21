<?php

    // use App\Khan\Component\Dotenv;
    use \App\Khan\Component\Router\Router;

    // $pipes = Router\pipe(
    //     function($msg){
    //         return $msg .= "Pipe 1<br/>";
    //     },
    //     function($msg){
    //         return $msg .= "Pipe 2<br/>";
    //     }
    // );


    // echo $pipes('Ola mundoooo<br/>');

	Container::bind("teste", function(){
		return "Comece o desenvolvimento!!";
    });

    // echo Dotenv\init('Ola mundo!!');

	Router\notFound(function($req, $res){
		$res->setStatusCode(404);
		return die("Route not found insert in router!!");
	});

	Router\get('/', function($req, $res, Container $container){
        $message = $container::get('teste')();
        return $message;
    });

    Router\get('/model', function(){
        $model = new Models\MyModel();
        /* $model->email = "jskhanframework@gmail.com";
        $model->id = 1;
        $model->update([
        "nome" => "Paulaumm DEV"
        ]); */
        /*
        $model->senha = md5("Paulaummm");
        print_r($model->save());
        */
        $find = $model->find->email('jskhanframework@gmail.com');
        $row = $model->toModel($find)->update(["nome" => "Paulao Dev"]);
        return $row;
    });

//   router('get', '/test', function(){
//     $data = new DateTime();
//     return ["horario" => $data->format('d-m-Y H:i:s')];
//   });

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
