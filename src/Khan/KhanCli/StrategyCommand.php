<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class StrategyCommand extends Comando {

	    protected function configure(){

	        $this->setName('strategy')
	             ->addArgument('strategy-name', InputArgument::OPTIONAL, 'Qual o nome do strategy?')
        		 ->setDescription('New strategy.')
        		 ->setHelp('New strategy in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    		
	    	$strategy = ($input->getArgument('strategy-name')) ? $input->getArgument('strategy-name') : false;

	    	if($strategy){

	    		$folder = ROOT_FOLDER. "/config/strategy/{$strategy}.php";
	    		$folderOrigin = __DIR__. "/storage/strategy/strategy.php";
	    		$strategyOrigin = ROOT_FOLDER . '/config/Strategy.php';
	    		$strategys = require(ROOT_FOLDER . '/config/Strategy.php');

	    		$make = Hooks::create($folder, Hooks::replace($folderOrigin, [
					"strategyName" => $strategy
				]));

				$make2 = Hooks::write($strategyOrigin, 
					Hooks::replace($strategyOrigin, [
						"// newStrategy" => ",'$strategy' => 'StrategysAuth\\".$strategy."'
		// newStrategy"
				]));

	    		if($make && $make2){

	    			$output->writeln('<info>Strategy '.$strategy.' foi criado com sucesso!!</info>');

				}

	    	}else{

	    		$output->writeln('<fg=red>Error to create strategy</>');

	    	}

	    }

	}
