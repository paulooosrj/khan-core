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
	    	$botLearning = Bot\Bot::init('models');
			$modelUses = $botLearning::loadUses();
			$keys = 1;

	    	if($model){

	    		$folder = "app/models/{$model}.php";
	    		$folderOrigin = __DIR__. "/storage/model/model.php";

	    		$make = Hooks::create($folder, Hooks::replace($folderOrigin, [
					"modelName" => $model,
					"usedss" => count($modelUses) > 0 ? array_reduce($modelUses, function($ant, $atual) use($modelUses){
						$some = end(array_values($modelUses)) === $atual ? ";" : ",\n		";
						return $ant . "$atual". $some;
					}, "use	") : ''
				]));

	    		if($make){

	    			$output->writeln('<info>Model '.$model.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create model</>');

	    	}

	    }

	}
