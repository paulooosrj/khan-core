<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class JsCommand extends Comando {

		public function checkModule($module){
			if(!file_exists('node_modules/')){
				return false;
			}
			return (file_exists('node_modules/'.$module)) ? true : false;
		}

		public function context(){

			return file_get_contents(__DIR__."/../../.cli/assets/js.txt");

		}

	    protected function configure(){

	        $this->setName('js')
	             ->addArgument('js-name', InputArgument::OPTIONAL, 'Qual o nome do javascript?')
        		 ->setDescription('New javascript file.')
        		 ->setHelp('New javascript in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$jsFile = ($input->getArgument('js-name')) ? $input->getArgument('js-name') : false;

	    	if($jsFile){

	    		if(file_put_contents(
	    			"public/js/{$jsFile}.js", 
	    			$this->context()
	    		)){

	    			if(!$this->checkModule('jquery')){
	    				KhanCommand::shell("npm i --save jquery");
	    			}

	    			if(!$this->checkModule('lodash')){
	    				KhanCommand::shell("npm i --save lodash");
	    			}

	    			$output->writeln('<info>Javascript '.$jsFile.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create javascript file</>');

	    	}

	    }

	}
