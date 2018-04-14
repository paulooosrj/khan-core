<?php 

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Command\KhanCommand as KhanCommand;

	class CreateCommand extends Comando {

	    protected function configure(){

	        $this->setName('create')
	             ->addArgument('dir', InputArgument::OPTIONAL, 'Em qual diretorio?')
        		 ->setDescription('Download project.')
        		 ->setHelp('Install project in folder...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		

	    	$dir = ($input->getArgument('dir')) ? $input->getArgument('dir') : "khan-project";

	    	if(!file_exists($dir.'/')){

				try {
					
                    KhanCommand::shell("git clone https://github.com/PaulaoDev/khan {$dir}");
                    KhanCommand::shell("composer install");
                    
                    $output->write('<info>Finish download zip</info>');

				} catch (Exception $e) {
					
					$output->writeln('<fg=red>Error to download</>');

				}


	    	}else{

	    		$output->writeln('<fg=red>Project is existing!!</>');

	    	}

	    }

	}
