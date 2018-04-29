<?php
	
	namespace StrategysAuth;

	class strategyName {
		// Table mysql using
		const table = "login";
		// Route logout
		const logout = "../login";
		// Ignore key init session
		const ignoreSession = ["password"];
		// login inputs
		const login = [
			// fields POST and COLUMNS
			"email", "password"
		];
		// register inputs and register in mysql
		const register = [
			// fields POST and COLUMNS
			"email", "password", "name"
		];
		// extends functions
		public static function extendsLogin($data){
			// $data["email"] = strip_tags($data["email"]);
			return $data;
		}
		public static function extendsRegister($data){
			// $data["password"] = md5($data["password"]);
			return $data;
		}
		public static function extendsLogout(){
			// echo "Saiu";
		}
		public static function extendsValidate($data){
			// $data["password"] = md5($data["password"]);
			return $data;
		}
	}
