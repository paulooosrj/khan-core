<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class MakeCommand extends Comando {

		public function move($file, $dest){
			$file = __DIR__ . '/../../.cli/auth/' . $file;
			try {
				copy($file, $dest);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function createDatabase($input, $output){
			try {

				$conn = new \PDO("mysql:host={$_ENV['DB_HOST']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
			    $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			    $sql = "CREATE DATABASE IF NOT EXISTS {$_ENV['DB_DATABASE']}";
			    $conn->exec($sql);
			    $output->writeln("Database create success!!");

			} catch (Exception $e) {
				echo "";
			}
		}

		public function createTable($input, $output){
			try {

				$conn = new \PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
			    $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$sql = "CREATE TABLE IF NOT EXISTS `login` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `email` VARCHAR(50) NOT NULL, `password` VARCHAR(50) NOT NULL, `name` VARCHAR(20) NOT NULL, PRIMARY KEY (`id`) ) COLLATE='utf8_general_ci' ENGINE=InnoDB AUTO_INCREMENT=13;";
				$conn->exec($sql);
				$output->writeln("Table create success!!");

			} catch (Exception $e) {
				echo "";
			}
		}

		public function create($input, $output){
			// Create database
			$this->createDatabase($input, $output);
			$this->createTable($input, $output);
			// Move Routes
			$this->move('auth.php', 'routes/auth.php');
			// Move Views
			$this->move('index.html', 'resources/views/index.html');
			$this->move('login.html', 'resources/views/login.html');
			$this->move('painel.html', 'resources/views/painel.html');
			$this->move('register.html', 'resources/views/register.html');
			// Move Controllers
			$this->move('AuthController.php', 'app/AuthController.php');			
		}

	    protected function configure(){

	        $this->setName('make')
	             ->addArgument('type', InputArgument::OPTIONAL, 'Qual o make deseja gerar?')
        		 ->setDescription('New system predefined.')
        		 ->setHelp('System predefined in khan...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$make = ($input->getArgument('type')) ? $input->getArgument('type') : false;

	    	if($make && $make === "auth"){

	    		$dotenv = new \Dotenv\Dotenv('.');
				$dotenv->load();
	    		$this->create($input, $output);

	    	}else{

	    		$output->writeln('<fg=red>Error to make</>');

	    	}

	    }

	}
