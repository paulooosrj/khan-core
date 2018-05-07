<?php

	namespace MyApp;

	class TesteController extends \App\Khan\Bootstrap\KhanController {

		public function __construct($req, $res){

			$this->helpers('cache');

			$this->cache->init();
			if(!$this->cache->get('data', $out)){
				$this->cache->set('data', [
					"msg" => $this->container::get('teste')()
				], 300);
			}

			$this->cache->get('data', $out);
			return $out['msg'];

		}

		public static function teste(){
			return "Ola mundo!!";
		}

	}
