<?php

	namespace MyApp;
	use App\Khan\Libraries\Session as Session;

	class AuthController {

		public function logout($req, $res, $db){
			Session::removeAll();
			redirect('./login');
		}

		public function login($req, $res, $db){
			
			$this->db = $db();
			$login = $this->validate(
				$req->post('email'), 
				$req->post('senha')
			);

			if($login){
				foreach ($login[0] as $key => $value) {
					Session::set($key, $value);
				}
				echo "sucesso";
			}else{
				echo "error";
			}

		}

		public function register($req, $res, $db){

			$this->db = $db();

			if($this->exists($req->post('email')) === false){

				try {

					$hash = md5($req->post('password'));

					\DB::insert("login", [
						"email" => $req->post('email'),
						"password" => $hash,
						"name" => $req->post('username')
					]);	
					echo "sucesso";

				} catch (PDOException $e) {
					echo $e->getMessage();
				}

			}

		}

		public function validate($email, $senha){

			$data = $this->db->select("login", "*", [
				"email" => $email,
				"password" => md5($senha)
			]);

			if(is_array($data)){

				$ultimo = end($data);
				return (is_array($data)) ? $data : false;

			}

			return false;

		}

		public function exists($email){

			return ( count($this->db->select("login", "*", [
				"email" => $email
			])) > 0 ) ? true : false;

		}

	}
