<?php

	namespace Command;

	class KhanCommand {

		public function __construct(){}

		public static function shell($shell, $debug = false){
			if($debug){ shell_exec('cls'); }
			shell_exec( $shell );
		}

	}
