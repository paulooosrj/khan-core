<?php

	namespace App\Khan\Component\Router\Router;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	date_default_timezone_set('America/Sao_Paulo');

	trait Temporary {

		public function generateHash($origin){
			return md5($origin.mt_rand(0, 100000));
		}

		public function hour(){
			return new \DateTime();
		}

		public function storageTemp(){
			if(!Hooks::exists('storage/temp') && !Hooks::exists('storage/temp/temp.json')){
				Hooks::folder(__DIR__. '/storage');
				Hooks::folder(__DIR__. '/storage/temp');
				Hooks::create(__DIR__. '/storage/temp/temp.json', json_encode([]));
			}
		}

		public function loadTemp(){
			return (array) json_decode(
				Hooks::read(__DIR__. '/storage/temp/temp.json')
			);
		}

		public function clearRouteTemp($route){
			$temp = $this->loadTemp();
			if(isset($temp[$route])){
				unset($temp[$route]);
				if(!isset($temp[$route])){
					return Hooks::write(__DIR__. '/storage/temp/temp.json', 
						json_encode($temp)
					);
				}
			}
		}

		public function gen($hash, $origin, $time, $method, $minutes){
			$this->storageTemp();
			$temp = $this->loadTemp();
			if(!isset($temp[$hash])){
				$temp[$hash] = [
					"origin" => $origin,
					"time" => $time,
					"method" => $method,
					"minutes" => $minutes
				];

				if(Hooks::write(__DIR__. '/storage/temp/temp.json', 
				json_encode($temp))){
					return $_ENV['APP_URL'].$hash;
				}

			}
		}

	}
