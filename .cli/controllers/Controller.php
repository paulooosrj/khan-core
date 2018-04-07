<?php

	class Controller {

		public function __construct($nameController){

			$nameController .= "Controller";
			$controllerDefault = $this->context($nameController);
			$dir = "app/{$nameController}.php";

			if(file_put_contents($dir, $controllerDefault)){
				$this->print("O Controller {$nameController} foi criado com sucesso em: app/{$nameController}.php");
			}else{
				$this->print("Erro ao criar o Controller {$nameController}");
			}

		}

		public function context($name){

			return "<?php

	namespace MyApp;
	use App\Khan\Component\Container\ServiceContainer as Container;
	use App\Khan\Component\Stream\StreamServer as Stream;
	use App\Khan\Component\DB\DB as Database;

	class {$name} {

		public function index(\$req, \$res, \$db){
			echo 'Ola mundo!!'.
		}

		public function getDB(){
			return Database::getConn();
		}

	}
";

		}

		protected function print($text){
			echo "\n   {$text}\n";
		}

	}
