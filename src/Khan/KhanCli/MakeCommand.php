<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class MakeCommand extends Comando {

		public function move($folder, $file, $dest){
			
			$file = __DIR__ . '/' . 'storage/' . $folder . '/' . $file;
			try {
				copy($file, $dest);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function makeStrategy($strategy, $folder){
			$strategyOrigin = ROOT_FOLDER . '/config/strategy.php';
			$make2 = Hooks::write($strategyOrigin, 
					Hooks::replace($strategyOrigin, [
						"// newStrategy" => ",'$strategy' => 'StrategysAuth\\".$folder."'
		// newStrategy"
			]));
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
				$sql = "CREATE TABLE IF NOT EXISTS `login` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `email` VARCHAR(50) NOT NULL, `password` VARCHAR(50) NOT NULL, `name` VARCHAR(20) NOT NULL, `created_at` VARCHAR(50) NOT NULL, `updated_at` VARCHAR(50) NOT NULLPRIMARY KEY (`id`) ) COLLATE='utf8_general_ci' ENGINE=InnoDB AUTO_INCREMENT=13;";
				$conn->exec($sql);
				$output->writeln("Table create success!!");

			} catch (Exception $e) {
				echo "";
			}
		}

		public function chatCreate($input, $output){
			// Move Routes
			// $this->move('chat', 'chat.php', 'routes/chat.php');
      $file = __DIR__ . '/' . 'storage/chat/chat.php';
      $maked = Hooks::append('config/router.php', Hooks::read($file)); 
			// Move Views
			$this->move('chat', 'index.html', 'resources/views/index.html');
			$this->move('chat', 'chat.html', 'resources/views/chat.html');
			$output->writeln("Chat create success!!");
		}

		public function create($input, $output){
			// Create database
			$this->createDatabase($input, $output);
			$this->createTable($input, $output);
			// Move Routes
			// $this->move('auth', 'auth.php', 'routes/auth.php');
      $file = __DIR__ . '/' . 'storage/auth/auth.php';
      $maked = Hooks::append('config/router.php', Hooks::read($file));
			// Move Views
			$this->move('auth', 'index.html', 'resources/views/index.html');
			$this->move('auth', 'login.html', 'resources/views/login.html');
			$this->move('auth', 'painel.html', 'resources/views/painel.html');
			$this->move('auth', 'register.html', 'resources/views/register.html');
			// Move Controllers
			$this->move('auth', 'AuthController.php', 'app/AuthController.php');
			// Move Middlewares
			$this->move('auth', 'CheckLogin.php', 'middlewares/CheckLogin.php');
			// move Strategy
			$this->move('auth', 'AuthStrategy.php', 'config/strategy/AuthStrategy.php');
			// config strategys
			$this->makeStrategy('auth', 'AuthStrategy');
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

	    	}
	    	elseif ($make && $make === "chat") {
	    		
	    		$this->chatCreate($input, $output);

	    	}
	    	else{

	    		$output->writeln('<fg=red>Error to make</>');

	    	}

	    }

	}
