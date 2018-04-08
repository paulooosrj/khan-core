<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class HelperCommand extends Comando {

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

	    protected function configure(){

	        $this->setName('helper')
	             ->addArgument('helper-name', InputArgument::OPTIONAL, 'Qual o nome do helper?')
        		 ->setDescription('New helper.')
        		 ->setHelp('New helper in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$helper = ($input->getArgument('helper-name')) ? $input->getArgument('helper-name') : false;

	    	if($helper){

	    		if(file_put_contents(
	    			"src/Khan/libraries/{$helper}.php", 
	    			$this->context($helper)
	    		)){

	    			$output->writeln('<info>Helper '.$helper.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create helper</>');

	    	}

	    }

	}
