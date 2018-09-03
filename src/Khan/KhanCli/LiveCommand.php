<?php 

	namespace Command;

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class LiveCommand extends Comando {

	    protected function configure(){

	        $this->setName('live')
	             ->addArgument('porta', InputArgument::OPTIONAL, 'Em qual porta deseja o servidor?')
        		 ->setDescription('Listeng server in project.')
        		 ->setHelp('Listen web server in application...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    	
			$porta = ($input->getArgument('porta')) ? $input->getArgument('porta') : 8080;
			$forigin = __DIR__ . '/' . 'storage/live-server/';
	  		
	  		if(
	  			file_exists('./node_modules/gulp/') && 
	  			file_exists('./node_modules/browser-sync/') &&
	  			file_exists('./node_modules/gulp-connect-php/')
	  		){
	  			KhanCommand::shell("gulp");
	  		}else{
	  			copy($forigin."package.json", "package.json");
	  			copy($forigin."gulpfile.js", "gulpfile.js");
	  			KhanCommand::shell("npm install && gulp");
	  		}

	    }

	}
