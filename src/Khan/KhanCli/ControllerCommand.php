<?php

	namespace Command;

	set_time_limit(0);

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class ControllerCommand extends Comando {

	    protected function configure(){

	        $this->setName('controller')
	             ->addArgument('controller-name', InputArgument::OPTIONAL, 'Qual o nome do controller?')
        		 ->setDescription('New controller.')
        		 ->setHelp('New controller in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){

	    	$controller = ($input->getArgument('controller-name')) ? $input->getArgument('controller-name') : false;
	    	$botLearning = Bot\Bot::init('controllers');
            $controllerUses = $botLearning::loadUses();

	    	if($controller){

	    		$folder = "app/http/controllers/{$controller}Controller.php";
	    		$folderOrigin = __DIR__. "/storage/controller/controller.php";

	    		$make = Hooks::create($folder, Hooks::replace($folderOrigin, [
					"controllerName" => $controller . "Controller",
					"usedss" => count($controllerUses) > 0 ? array_reduce($controllerUses, function($ant, $atual) use($controllerUses){
						$some = end(array_values($controllerUses)) === $atual ? ";" : ",\n		";
						return $ant . "$atual". $some;
					}, "use	") : ''
				]));

	    		if($make){

	    			$output->writeln('<info>Controller '.$controller.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create controller</>');

	    	}

	    }

	}
