<?php

namespace App\Khan\Bootstrap;

class KhanController {

	public function helpers() {
		foreach (func_get_args() as $key => $helper) {
			$name = "App\Khan\Libraries" . "\\" . $helper . "::create";
			$this->$helper = $name();
		}
	}

}