<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class GulpCommand extends Comando {

		public function error($output, $log){
			$output->writeln("<fg=red>{$log}</>");
		}

		public function sucess($output, $log){
			$output->writeln("<info>{$log}</info>");
		}

	    protected function configure(){

	        $this->setName('gulp')
        		 ->setDescription('Configure gulp.')
        		 ->setHelp('Configure gulp in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){

	    	if(
				copy(__DIR__.'/../../.cli/gulp-files/file-gulpfile.js', 'gulpfile.js') && 
				copy(__DIR__.'/../../.cli/gulp-files/file-package.json', 'package.json')
			){
				KhanCommand::shell("npm i gulp -g && npm install");
				$this->sucess("Gulp configurado com sucesso");
			}else{
				$this->error("Erro ao instalar gulp");
			}

	    }

	}
