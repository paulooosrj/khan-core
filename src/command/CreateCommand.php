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
	    		
	    	$context = __DIR__ . '/../../';
	    	$name = ($input->getArgument('dir')) ? $input->getArgument('dir') : 'khan';
	    	$dir = ($input->getArgument('dir')) ? "{$input->getArgument('dir')}/" : "khan-master/";
	    	$dir = $context . $dir;

	    	if(mkdir($dir)){
	    		if(file_put_contents($dir . "download.zip", 
				   file_get_contents(
				   		"https://github.com/PaulaoDev/khan/archive/master.zip"
				   )
				)){

		        	$zip = new \ZipArchive();
					if ($zip->open($dir . "download.zip") === TRUE) {
					    $zip->extractTo($dir);
					    $zip->close();
					    if(file_exists($dir. 'khan-master')){
					    	$dire = $dir. 'khan-master';
					    	KhanCommand::shell("mv {$dire}/* {$dir}");
					    	KhanCommand::shell("rm -f {$dir}download.zip");
					    }
					    $output->write('<info>Finish download zip</info>');
					} else {
					    $output->writeln('<fg=red>Error to download</>');
					}

				}else{

					$output->writeln('<fg=red>Error to download</>');

				}
	    	}else{
	    		$output->writeln('<fg=red>Project is existing!!</>');
	    	}

	    }

	}
