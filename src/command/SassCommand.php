<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class SassCommand extends Comando {

		public function checkModule($module){
			if(!file_exists('node_modules/')){
				return false;
			}
			return (file_exists('node_modules/'.$module)) ? true : false;
		}

		public function context(){

			return file_get_contents(__DIR__."/../../.cli/assets/css.txt");

		}

	    protected function configure(){

	        $this->setName('sass')
	             ->addArgument('sass-name', InputArgument::OPTIONAL, 'Qual o nome do Sass?')
        		 ->setDescription('New sass file.')
        		 ->setHelp('New sass in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$sass = ($input->getArgument('sass-name')) ? $input->getArgument('sass-name') : false;

	    	if($sass){

	    		if(file_put_contents(
	    			"public/sass/{$sass}.scss", 
	    			$this->context()
	    		)){

	    			if(!$this->checkModule('bootstrap')){
	    				KhanCommand::shell("npm i --save bootstrap");
	    			}

	    			$output->writeln('<info>Sass '.$sass.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create Sass file</>');

	    	}

	    }

	}
