<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class ApiCommand extends Comando {

	    protected function configure(){

	        $this->setName('api')
	             ->addArgument('api-name', InputArgument::OPTIONAL, 'Qual o nome do controller?')
        		   ->setDescription('New api.')
        		   ->setHelp('New api in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$api = ($input->getArgument('api-name')) ? $input->getArgument('api-name') : false;

	    	if($api){

	    		$folder = "config/routes.php";
	    		$folderOrigin = __DIR__. "/storage/api/api.php";

	    		$make = Hooks::append($folder, Hooks::replace($folderOrigin, [
  					"apiName" => $api
  				]));

	    		if($make){

	    			$output->writeln('<info>Api '.$api.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create api</>');

	    	}

	    }

	}
