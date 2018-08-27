<?php
	
	namespace App\Khan\Component\Encrypt;

	class Encrypt {

		public static function encrypt($password) {
		    return password_hash($password, PASSWORD_DEFAULT);
		}

		public static function verify($password, $hash){
			return password_verify($password, $hash);
		}

	}
