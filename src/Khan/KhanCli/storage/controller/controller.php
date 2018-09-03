<?php

	namespace Controllers;
	use \StrategysAuth\Strategy as Strategy;
	usedss

	class controllerName extends \App\Khan\Bootstrap\KhanController {

		public function index($req, $res, $db){
			$this->container::bind('msg', 'Ola mundo!!');
			echo $this->container::get('msg');
		}

		public function getDB(){
			return $this->db();
		}

	}
