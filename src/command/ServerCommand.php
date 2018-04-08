<?php 

	namespace Command;

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class ServerCommand extends Comando {

	    protected function configure(){

	        $this->setName('server')
	             ->addArgument('porta', InputArgument::OPTIONAL, 'Em qual porta deseja o servidor?')
        		 ->setDescription('Listeng server in project.')
        		 ->setHelp('Listen web server in application...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    	
	    	$porta = ($input->getArgument('porta')) ? $input->getArgument('porta') : 8080;
	        $output->write("Servidor ativo em <info>http://localhost:{$porta}</info>");
			KhanCommand::shell("php -S localhost:{$porta} public/index.php");

	    }

	}
