<?php

	class Lib {

		public function __construct($nameLib){

			$libDefault = $this->context($nameLib);
			$dir = "src/Khan/libraries/{$nameLib}.php";

			if(file_put_contents($dir, $libDefault)){
				$this->print("A Library {$nameLib} foi criado com sucesso em: {$dir}");
			}else{
				$this->print("Erro ao criar Library {$nameLib}");
			}

		}

		public function context($name){

			return "<?php

	namespace App\Khan\Libraries;

	class {$name} {

		public function __construct(){

			return \$this;

		}

	}
";

		}

		protected function print($text){
			echo "\n   {$text}\n";
		}

	}
