<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class ControllerCommand extends Comando {

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

	    protected function configure(){

	        $this->setName('controller')
	             ->addArgument('controller-name', InputArgument::OPTIONAL, 'Qual o nome do controller?')
        		 ->setDescription('New controller.')
        		 ->setHelp('New controller in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$controller = ($input->getArgument('controller-name')) ? $input->getArgument('controller-name') : false;

	    	if($controller){

	    		if(file_put_contents(
	    			"app/{$controller}Controller.php", 
	    			$this->context($controller)
	    		)){

	    			$output->writeln('<info>Controller '.$controller.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create controller</>');

	    	}

	    }

	}
