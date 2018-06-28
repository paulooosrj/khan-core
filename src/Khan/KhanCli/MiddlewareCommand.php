<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class MiddlewareCommand extends Comando {

	    protected function configure(){

	        $this->setName('middleware')
	             ->addArgument('middleware-name', InputArgument::OPTIONAL, 'Qual o nome do middleware?')
        		 ->setDescription('New middleware.')
        		 ->setHelp('New middleware in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$middleware = ($input->getArgument('middleware-name')) ? $input->getArgument('middleware-name') : false;

	    	if($middleware){

	    		$folder = "app/http/middlewares/{$middleware}.php";
	    		$folderOrigin = __DIR__. "/storage/middleware/middleware.php";

	    		$make = Hooks::create($folder, Hooks::replace($folderOrigin, [
					"middlewareName" => $middleware
				]));

	    		if($make){

	    			$output->writeln('<info>Middleware '.$middleware.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create middleware</>');

	    	}

	    }

	}
