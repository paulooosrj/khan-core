<?php

	namespace Models;

	class ApiModel extends \App\Khan\Component\DB\Model {

		const table = "login";

		protected $email = null;
		protected $password = null;
		protected $name = null;
		protected $icone = null;

		public function setEmail($email){
			$this->email = $email;
		}

		public function setPassword($password){
			$this->password = md5($password);
		}

		public function setName($name){
			$this->name = $name;
		}

		public function setIcone($icone){
			$this->icone = $icone;
		}

	}
