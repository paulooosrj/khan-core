<?php

/**
 *
 * @author      PaulaoDev <jskhanframework@gmail.com>
 * @copyright   (c) PaulaoDev
 * @link        https://github.com/PaulaoDev/router-khan
 * @license     MIT
 */

namespace App\Khan;
use App\Khan\Component\Dotenv;

define("ROOT_CORE", __DIR__);

/**
 * Class Core Run Project
 */

class Khan {

	protected static $instance = null;

	/**
	 * [create get instance in singleton]
	 * @return [object] [Return khan instance]
	 */

	public static function create() {
		if (self::$instance == null) {
			self::$instance = new Khan();
		}
		return self::$instance;
	}

	protected function __construct() {}

	/**
	 * Load Aliases in project
	 */

	private function aliases() {
		$aliases = require ROOT_FOLDER . '/config/aliases.php';
		foreach ($aliases as $key => $value) {
			class_alias($value, $key);
		}
	}

	public function apps() {
		include_once __DIR__ . '/Component/Functions/Helpers.php';
		include_once __DIR__ . '/Bootstrap/Config.php';
		$callTo = $app::resolve('app');
		$callTo = (array) $callTo();
		foreach ($callTo as $key => $value) {
			if (is_closure($value)) {
				$value();
			}
		}
	}

	/**
	 * [services Load all services]
	 * @return [void [load and run services in framework]
	 */

	public function services() {

		$this->aliases();
		$this->apps();

	}

	public function set($name, $value) {
		define($name, $value);
		return $this;
	}

	public function loadEnv() {
		return Dotenv\init(ROOT_FOLDER);
	}

	public function dispatch() {

		$this->loadEnv();
		$this->services();

	}

}
