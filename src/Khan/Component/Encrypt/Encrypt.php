<?php
	
	namespace App\Khan\Component\Encrypt;

	class Encrypt {

		public static function encrypt($password) {
		    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
		}

		public static function verify($password, $hash){
			return password_verify($password, $hash);
		}

	}
