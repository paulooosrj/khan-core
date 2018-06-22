<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class ReactCommand extends Comando {

		public function error($output, $log){
			$output->writeln("<fg=red>{$log}</>");
		}

		public function sucess($output, $log){
			$output->writeln("<info>{$log}</info>");
		}

	    protected function configure(){

	        $this->setName('react')
	        	 ->addArgument('type', InputArgument::OPTIONAL, 'Deseja utilizar react?')
        		 ->setDescription('Init react.')
        		 ->setHelp('Init react in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    	
	    	$root = __DIR__ . '/storage';
	    	$webpack = $root . '/react-files/webpack.config.js';
	    	$package = $root . '/react-files/package.json';
	    	$react = $root . '/react-files/app.js';
	    	$babel = $root . '/react-files/babelrc';

	    	$remove = Hooks::delete('public/js/app.js');
	    	$removeJsx = Hooks::delete('public/js/app.jsx');

	    	if(
				Hooks::copy($webpack, 'webpack.config.js') && 
				Hooks::copy($package, 'package.json') &&
				Hooks::copy($react, 'public/js/app.jsx') &&
				Hooks::copy($babel, '.babelrc')
			){
				KhanCommand::shell("npm i webpack -g && npm install");
				$this->sucess($output, "React configurado com sucesso");
			}else{
				$this->error($output, "Erro ao instalar react");
			}

	    }

	}
