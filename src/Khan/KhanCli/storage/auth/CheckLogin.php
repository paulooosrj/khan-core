<?php

	namespace Middlewares;

	class CheckLogin implements \App\Khan\Contracts\Middlewares\Middleware {

		public static function handle($req, $res, $next){

			if(isset($_SESSION)){
				if(!isset($_SESSION['id']) && !isset($_SESSION['email'])){
					redirect('../login');
				}
			}
			
			$next($req, $res);

		}

	}
