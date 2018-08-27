<?php

	namespace Command;

	set_time_limit(0); 

	use Symfony\Component\Console\Command\Command as Comando;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use App\Khan\Component\Hooks\Hooks as Hooks;
	use Command\KhanCommand as KhanCommand;

	class VueCommand extends Comando {

		public function error($output, $log){
			$output->writeln("<fg=red>{$log}</>");
		}

		public function sucess($output, $log){
			$output->writeln("<info>{$log}</info>");
		}

	    protected function configure(){

	        $this->setName('vue')
	        	 ->addArgument('type', InputArgument::OPTIONAL, 'Deseja utilizar vue?')
        		 ->setDescription('Init vue.')
        		 ->setHelp('Init vue in project...');

	    }

	    protected function execute(InputInterface $input, OutputInterface $output){
	    	
	    	$root = __DIR__ . '/storage';
	    	$webpack = $root . '/vue-files/webpack.config.js';
	    	$package = $root . '/vue-files/package.json';
	    	$vue = $root . '/vue-files/app.js';
				$babel = $root . '/vue-files/babelrc';

				$khanVue = $root . '/vue-files/khan-vue.php';
				$khanView = $root . '/vue-files/vue.html';

	    	$remove = Hooks::delete('public/js/app.js');
	    	$removeJsx = Hooks::delete('public/js/app.jsx');

	    	if(
				Hooks::copy($webpack, 'webpack.config.js') && 
				Hooks::copy($package, 'package.json') &&
				Hooks::copy($vue, 'public/js/app.js') &&
				Hooks::copy($babel, '.babelrc') &&
				Hooks::append('config/router.php', Hooks::read($khanVue)) &&
				Hooks::copy($khanView, 'resources/views/vue.html')
			){
				KhanCommand::shell("npm i webpack -g && npm install");
				$this->sucess($output, "Vue configurado com sucesso");
			}else{
				$this->error($output, "Erro ao instalar vue");
			}

	    }

	}
