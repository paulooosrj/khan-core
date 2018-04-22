<?php

	namespace MyApp;
	use \StrategysAuth\Strategy as Strategy;

	class controllerName extends \App\Khan\Bootstrap\KhanController {

		public function index($req, $res, $db){
			$this->container::set('msg', 'Ola mundo!!');
			echo $this->container::get('msg');
		}

		public function getDB(){
			return $this->db();
		}

	}
