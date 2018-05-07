<?php
	
	namespace App\Khan\Component\Router\Components;
	
	trait CsrfToken {

		  public static function csrf_token(){
            if (empty($_SESSION['token'])) {
                if (function_exists('mcrypt_create_iv')) {
                    $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
                } else {
                    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
                }
            }
            return $_SESSION['token'];
          }

          public static function csrf_token_verify($token){
            if (!empty($token) && !empty($_SESSION['token'])) {
                if (hash_equals($_SESSION['token'], $token)) {
                    return true;
                } else {
                    return false;
                }
            }
          }

	}
