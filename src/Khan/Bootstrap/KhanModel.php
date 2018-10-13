<?php

namespace App\Khan\Bootstrap;

class KhanModel extends \App\Khan\Component\DB\Model {

  public function __construct(){
    parent::__construct();
  }

	public function helpers() {
		foreach (func_get_args() as $key => $helper) {
			$name = "App\Khan\Libraries" . "\\" . $helper . "::create";
			$this->$helper = $name();
		}
	}

}
