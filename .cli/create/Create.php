<?php

	class Create {

		public function __construct($projeto){
			$download = $this->download();
			if($download){
				if($this->unzip($download, $projeto)){
					$this->print("O projeto foi criado com sucesso!!");
					$this->cd($projeto);
				}
			}
		}

		protected function print($text){
			echo "\n\n   {$text}\n\n";
		}

		protected function runShell($shell, $debug = false){
			if($debug){ shell_exec('cls'); }
			shell_exec( $shell );
		}

		public function rm($name){
			$this->runShell("rm -r $name");
		}

		public function cd($name){
			$this->print("Agora falta pouco, dê um: (   cd {$name}   )");
		}

		public function unzip($zipFile, $projeto){

			$extractPath = ".cli/create/downloads/cache/";
			$zip = new ZipArchive;

			$res = $zip->open($zipFile);

			if ($res === TRUE) {

				$zip->extractTo($extractPath);
				$zip->close();

				rename('.cli/create/downloads/cache/router-khan-master', $projeto);
				$this->rm('.cli/create/downloads/update.zip');

				return true;


			}

		}

		public function download(){

			$url = "https://github.com/PaulaoDev/router-khan/archive/master.zip";
			$zipFile = ".cli/create/downloads/update.zip";
			$zipResource = fopen($zipFile, "w");
			// Get The Zip File From Server
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FAILONERROR, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_AUTOREFERER, true);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
			curl_setopt($ch, CURLOPT_FILE, $zipResource);
			$page = curl_exec($ch);
			if(!$page) {
			 echo "Error :- ".curl_error($ch);
			}
			curl_close($ch);
			return (file_exists($zipFile)) ? $zipFile : false;

		}

	}
