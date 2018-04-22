<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class SassCommand extends Comando {

		public function checkModule($module){
			if(!Hooks::exists('node_modules/')){
				return false;
			}
			return (Hooks::exists('node_modules/'.$module)) ? true : false;
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

	    		$make = Hooks::create("public/sass/{$sass}.scss", 
	    			Hooks::read(__DIR__.'/storage/assets/css.txt')
	    		);

	    		if($make){

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
