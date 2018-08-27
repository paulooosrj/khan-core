<?php

namespace App\Khan\Bootstrap;

class KhanModel {

	public function helpers() {
		foreach (func_get_args() as $key => $helper) {
			$name = "App\Khan\Libraries" . "\\" . $helper . "::create";
			$this->$helper = $name();
		}
	}

	public function loadAliases() {
		$aliases = require ROOT_FOLDER . '/config/Aliases.php';
		foreach ($aliases as $key => $value) {
			$aliases[strtolower($key)] = $value;
			unset($aliases[$key]);
		}
		return $aliases;
	}

	public function __get($name) {
		if (method_exists($this, $name) === false) {
			$aliases = $this->loadAliases();
			if ($aliases[$name]) {
				return call_user_func_array($aliases[$name], [$_ENV]);
			}
		}
	}

}
