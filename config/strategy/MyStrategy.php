<?php
	
	namespace StrategysAuth;

	class MyStrategy {

		// Table mysql using
		const table = "login";

		// Route logout
		const logout = "../login";

		// Ignore key init session
		const ignoreSession = ["password"];

		const login = [
			// fields POST and COLUMNS
			"email", "password"
		];

		const register = [
			// fields POST and COLUMNS
			"email", "password", "name", "icone"
		];

		public static function extendsRegister($data){
			// event
			return $data;
		}

		public static function extendsValidate($data){
			// event
			return $data;
		}

	}
