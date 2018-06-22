<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class JsCommand extends Comando {

		public function checkModule($module){
			if(!Hooks::exists('node_modules/')){
				return false;
			}
			return (Hooks::exists('node_modules/'.$module)) ? true : false;
		}

	    protected function configure(){

	        $this->setName('js')
	             ->addArgument('js-name', InputArgument::OPTIONAL, 'Qual o nome do javascript?')
	             ->addArgument('js-pack', InputArgument::OPTIONAL, 'Qual o pacote do javascript ira usar?')
        		 ->setDescription('New javascript file.')
        		 ->setHelp('New javascript in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$jsFile = ($input->getArgument('js-name')) ? $input->getArgument('js-name') : false;
	    	$type = ($input->getArgument('js-pack')) ? $input->getArgument('js-pack') : "jquery"; 

	    	if($jsFile){

	    		$make = Hooks::create("public/js/{$jsFile}.js", 
	    			Hooks::read(__DIR__.'/storage/assets/js.txt')
	    		);

	    		if($make){

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
