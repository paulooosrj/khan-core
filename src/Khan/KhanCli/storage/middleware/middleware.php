<?php

	namespace Middlewares;

	class middlewareName implements \App\Khan\Contracts\Middlewares\Middleware {

		public static function handle($req, $res, $next){

			echo "Init middleware middlewareName!!";
			$next($req, $res);

		}

	}
