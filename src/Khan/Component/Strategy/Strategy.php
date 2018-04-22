<?php

	namespace App\Khan\Component\Strategy;
	use App\Khan\Libraries\Session as Session;
	use App\Khan\Component\DB\DB as Conn;

	class Strategy {

		private static $instance = null;
		public static $strategy = '';
		public static $db = null;

	    public static function create(){
	        if (!self::$instance) {
	            self::$instance = new Strategy();
	        }
	        return self::$instance;
	    }

    	public function __contruct(){}

		public static function make($strategy){
			$strategys = require(ROOT_FOLDER . '/config/Strategy.php');
			if(!isset($strategys[$strategy])){ 
				return false; 
			}
			self::$strategy = $strategys[strtolower($strategy)];
			self::$db = Conn::getConn($_ENV);
			return $this;
		}

		public static function login($data){
			$scope = Strategy::create();
			$res = ["msg" => "sucess"];
			foreach (self::$strategy::login as $key => $required) {
				if(!$scope->validate($data, $required)){
					$res['msg'] = "error";
				}
			}
			$login = $scope::validateDatabase($data);
			if($login){
				foreach ($login as $key => $value) {
					if(!in_array($key, self::$strategy::ignoreSession)){
						Session::set($key, $value);
					}
				}
			}else{
				$res['msg'] = "error";
			}
			return $res;
		}

		public static function register($data){
			$scope = Strategy::create();
			$res = ["msg" => "sucess"];
			$schema = [];
			foreach (self::$strategy::register as $key => $required) {
				if(!$scope->validate($data, $required)){
					$res['msg'] = "error";
				}else{
					$schema[$required] = $data[$required];
				}
			}
			if(!$scope::exists($data["email"])){
				try {
					$hash = md5($data["password"]);
					$schema['password'] = $hash;
					self::$db->insert("login", $schema);	
				} catch (PDOException $e) {
					$res['msg'] = "error";
				}
			}else{
				$res['msg'] = "error";
			}
			return $res;
		}

		public static function logout(){
			Session::removeAll();
			redirect(self::$strategy::logout);
		}

		public static function validateDatabase($data){

			$query = self::$db->select("login", "*", [
				"email" => $data["email"],
				"password" => md5($data["password"])
			]);
			if(is_array($query)){
				$ultimo = end($query);
				return (is_array($ultimo)) ? $ultimo : false;
			}
			return false;

		}

		public static function exists($email){
			return ( count(self::$db->select(self::$strategy::table, "*", [
				"email" => $email
			])) > 0 ) ? true : false;
		}

		public static function validate($data, $key){
			return (isset($data[$key])) ? true : false;
		}

	}
