<?php

	namespace MyApp;
	use App\Khan\Libraries\Session as Session;
	use App\Khan\Component\Strategy\Strategy as Strategy;
	use App\Khan\Component\Router\Router\Router as Router;

	class AuthController {

		public function logout($req, $res){
			Strategy::make('auth')::logout();
		}

		public function login($req, $res){

			if(Router::csrf_token_verify($req->post('token'))){
			
				$login = Strategy::make('auth')::login([
					"email" => $req->post('email'), 
					"password" => $req->post('senha')
				]);

				if($login["msg"] === "sucess"){
					$res->send("sucesso");
				}else{
					$res->send("error");
				}

			}

		}

		public function uploadFile($file){
			$fileNewName = md5(uniqid()).".".pathinfo($file["name"], PATHINFO_EXTENSION);
			return $fileNewName;
		}

		public function register($req, $res){

			if(Router::csrf_token_verify($req->post('token'))){

				$icone = $this->uploadFile($_FILES['icone']);
				$register = Strategy::make('auth')::register([
					"email" => $req->post('email'),
					"password" => $req->post('password'),
					"name" => $req->post('username'),
					"icone" => "public/img/{$icone}"
				]);

				if($register["msg"] === "sucess"){
					move_uploaded_file($_FILES['icone']["tmp_name"], "public/img/{$icone}");
					$res->send("sucesso");
					redirect('../../login');
				}else{
					$res->send("error");
					redirect('../../register');
				}

			}

		}

	}
