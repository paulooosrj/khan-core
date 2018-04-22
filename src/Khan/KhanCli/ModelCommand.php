<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class ModelCommand extends Comando {

	    protected function configure(){

	        $this->setName('model')
	             ->addArgument('model-name', InputArgument::OPTIONAL, 'Qual o nome do model?')
        		 ->setDescription('New model.')
        		 ->setHelp('New model in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$model = ($input->getArgument('model-name')) ? $input->getArgument('model-name') : false;

	    	if($model){

	    		$folder = "models/{$model}.php";
	    		$folderOrigin = __DIR__. "/storage/model/model.php";

	    		$make = Hooks::create($folder, Hooks::replace($folderOrigin, [
					"modelName" => $model
				]));

	    		if($make){

	    			$output->writeln('<info>Model '.$model.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create model</>');

	    	}

	    }

	}
