<?php

	namespace App\Khan\Component\Aliases;
	use App\Khan\Component\Hooks\Hooks as Hooks;

	class Aliases {

		public function __construct($aliase, $facade){

			$facadeFile = __DIR__. "/storage/{$aliase}.php";
			$facadeOrigin = __DIR__. '/Facade.php';

			Hooks::create($facadeFile, Hooks::replace($facadeOrigin, [
				"facadeClass" => $aliase,
				"facadeName" => $facade
			]));

		}

	}
