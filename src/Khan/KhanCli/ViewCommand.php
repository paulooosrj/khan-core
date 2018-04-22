<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class ViewCommand extends Comando {

	    protected function configure(){

	        $this->setName('view')
	             ->addArgument('view-name', InputArgument::OPTIONAL, 'Qual o nome do view?')
        		 ->setDescription('New view.')
        		 ->setHelp('New view in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$view = ($input->getArgument('view-name')) ? $input->getArgument('view-name') : false;

	    	if($view){

	    		$folder = "resources/views/{$view}.html";
	    		$folderOrigin = __DIR__. "/storage/view/view.html";

	    		$make = Hooks::create($folder, Hooks::replace($folderOrigin, [
					"viewName" => $view
				]));

	    		if($make){

	    			$output->writeln('<info>view '.$view.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create view</>');

	    	}

	    }

	}
