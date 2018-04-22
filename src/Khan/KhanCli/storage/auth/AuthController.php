<?php

	namespace MyApp;
	use App\Khan\Libraries\Session as Session;
	use \StrategysAuth\Strategy as Strategy;

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

		public function register($req, $res){

			$register = Strategy::make('auth')::register([
				"email" => $req->post('email'),
				"password" => $req->post('password'),
				"name" => $req->post('username')
			]);

			if($register["msg"] === "sucess"){
				$res->send("sucesso");
			}else{
				$res->send("error");
			}

		}

	}
