<?php

	error_reporting(0);

	require_once 'update/build.php';
	require_once 'create/Create.php';

	class CliKhan {

		protected static $comando = '';
		protected static $value = '';

		public function __construct($query = null){

			if(is_null($query)){
				$this->helper();
			}

			self::$comando = strpos($query, ':') ? explode(':', $query)[0] : $query;
			self::$value = (strpos($query, ':')) ? end(explode(':', $query)) : false;

			if(method_exists($this, self::$comando)){

				if(!self::$value): $this->{self::$comando}(); endif;
				if(self::$value): $this->{self::$comando}(self::$value); endif;

			}else{

				$comando = (strlen(self::$comando) > 0) ? self::$comando.' ' : '';
				$this->print($comando."esta comando não existe.");
				$this->help();

			}

		}

		public function helper(){
			$this->runShell('php khan help');
		}

		protected function runShell($shell, $debug = false){
			if($debug){ shell_exec('cls'); }
			shell_exec( $shell );
		}

		protected function print($text){
			echo "\n   {$text}\n";
		}

		public function server($porta = 8080){

			$this->print("Servidor ativo em http://localhost:{$porta}");
			$this->runShell("php -S localhost:{$porta} public/index.php");

		}

		public function create($projeto = null){

			if(is_null($projeto)){
				$this->print("Dê um nome ao projeto.");
				return false;
			}

			$create = new Create($projeto);


		}

		public function controller($nameController = null){

			if(is_null($nameController)){

				$this->print("Dê um nome ao controller para criar, exemplo: php khan controller:Teste");
				return false;

			}

			require_once 'controllers/Controller.php';

			$controller = new Controller($nameController);

		}

		public function lib($nameLib = null){

			if(is_null($nameLib)){

				$this->print("Dê um nome a library para criar, exemplo: php khan lib:Library");
				return false;

			}

			require_once 'libraries/Lib.php';
			$lib = new Lib($nameLib);

		}

		public function gulp(){

			if(
				copy('.cli/gulp-files/file-gulpfile.js', 'gulpfile.js') && 
				copy('.cli/gulp-files/file-package.json', 'package.json')
			){
				$this->print('Aguarde a instalação dos pacotes.');
				$this->runShell('npm i gulp -g && npm install');
			}else{
				$this->print("Error install gulp");
			}

		}

		public function update($comando = null){

			if(is_null($comando)){

				$builder = new Build();
				$builder->check();

			}else{
				if($comando === "last"){
					$last = file_get_contents('.cli/update/dates/last.txt');
					$this->print("A ultima atualização ocorreu em {$last}");
				}
			}


		}

		public function npmPackageInstall($pack){
			$package = (array) json_decode(file_get_contents('package.json'));
			if(!$package["devDependencies"]){
				$package["devDependencies"] = [];
			}
			if(!$package["dependencies"]){
				$package["dependencies"] = [];
			}
			$dependencies = array_merge($package["devDependencies"], $package["dependencies"]);
			return (array_key_exists($pack, $dependencies)) ? true : false;
		}

		public function js($comando = null){

			if(is_null($comando)){ return false; }

			$file = file_get_contents(".cli/assets/js.txt");

			if(file_put_contents("public/js/{$comando}.js", $file)){

				if( $this->npmPackageInstall('jquery') === false ){
					$this->runShell('npm i --save jquery');
				}

				if( $this->npmPackageInstall('lodash') === false ){
					$this->runShell('npm i --save lodash');
				}

				$this->print("O arquivo:  {$comando}.js foi criado com sucesso!!");

			}else{

				$this->print("Error create js {$comando}.js");

			}

		}

		public function sass($comando = null){

			if(is_null($comando)){ return false; }

			$file = file_get_contents(".cli/assets/css.txt");

			if(file_put_contents("public/sass/{$comando}.scss", $file)){

				if( $this->npmPackageInstall('bootstrap') === false ){
					$this->runShell('npm i --save bootstrap');
				}

				$this->print("O arquivo:  {$comando}.scss foi criado com sucesso!!");

			}else{

				$this->print("Erro ao criar Sass {$comando}.scss");

			}

		}

		public function help(){

			$this->print("Comandos: \n\n      khan controller:NomeDoController ( cria um controller ja com a estrutura )\n      khan lib:LibName ( Create from libraries )\n      khan server ( liga o servidor php embutido )\n      khan gulp ( gera estrutura de sass watch e babel loader )\n      khan js:NomeDoArquivoJS ( gera um arquivo javascript com a estrutura. )\n      khan sass:NomeDoSass ( gera um arquivo sass ja com estrutura e bootstrap )\n      khan update ( update project khan )");

		}

	}
