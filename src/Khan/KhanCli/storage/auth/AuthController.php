<?php

	namespace MyApp;
	use App\Khan\Libraries\Session as Session;
	use App\Khan\Component\Strategy\Strategy as Strategy;

	class AuthController {

		public function logout($req, $res){
			Strategy::make('auth')::logout();
		}

		public function login($req, $res){
			
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

		public function uploadFile($file){
			$fileNewName = $file['newName'](md5(uniqid()));
			if(move_uploaded_file($file["tmp_name"], "public/img/{$fileNewName}")){
				return "public/img/{$fileNewName}";
			}
		}

		public function register($req, $res){

			$icone = $this->uploadFile($req->files('icone'));

			$register = Strategy::make('auth')::register([
				"email" => $req->post('email'),
				"password" => $req->post('password'),
				"name" => $req->post('username'),
				"icone" => $icone
			]);

			if($register["msg"] === "sucess"){
				$res->send("sucesso");
				redirect('../../login');
			}else{
				$res->send("error");
				redirect('../../register');
			}

		}

	}
