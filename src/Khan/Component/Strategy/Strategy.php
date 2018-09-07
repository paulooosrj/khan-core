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
			$strategys = require(ROOT_FOLDER . '/config/strategy.php');
			if(!isset($strategys[$strategy])){ 
				return false; 
			}
			self::$strategy = $strategys[strtolower($strategy)];
			self::$db = Conn::getConn($_ENV);
			return Strategy::create();
		}

		public static function login($data){
			$scope = Strategy::create();
			$strategy = self::$strategy;
			if(method_exists($strategy, "extendsLogin")){
				$data = $strategy::extendsLogin($data);
			}
			$res = ["msg" => "sucess"];
			foreach ($strategy::login as $key => $required) {
				if(!$scope->validate($data, $required)){
					$res['msg'] = "error";
				}
			}
			$login = $scope::validateDatabase($data);
			if($login){
				foreach ($login as $key => $value) {
					if(!in_array($key, $strategy::ignoreSession)){
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
			$strategy = self::$strategy;
			if(method_exists($strategy, "extendsRegister")){
				$data = $strategy::extendsRegister($data);
			}
			$res = ["msg" => "sucess"];
			$schema = [];
			foreach ($strategy::register as $key => $required) {
				if(!$scope->validate($data, $required)){
					$res['msg'] = "error";
				}else{
					$schema[$required] = $data[$required];
				}
			}
			if(!$scope::exists($data["email"])){
				try {
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
			$strategy = self::$strategy;
			if(method_exists($strategy, "extendsLogout")){
				$data = $strategy::extendsLogout();
			}
			Session::removeAll();
			redirect($strategy::logout);
		}

		public static function validateDatabase($data){
			$strategy = self::$strategy;
			if(method_exists($strategy, "extendsValidate")){
				$data = $strategy::extendsValidate($data);
			}
			$query = self::$db->select("login", "*", [
				"email" => $data["email"],
				"password" => $data["password"]
			]);
			if(is_array($query)){
				$ultimo = end($query);
				return (is_array($ultimo)) ? $ultimo : false;
			}
			return false;

		}

		public static function exists($email){
			$strategy = self::$strategy;
			return ( count(self::$db->select($strategy::table, "*", [
				"email" => $email
			])) > 0 ) ? true : false;
		}

		public static function validate($data, $key){
			return (isset($data[$key])) ? true : false;
		}

	}
