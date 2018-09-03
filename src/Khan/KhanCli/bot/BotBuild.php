<?php 

	namespace Command\Bot;

	class BotBuild {

		public function __construct(){

			// Set Models Watch
			$bot1 = Bot::init('models');
			$result1 = $bot1->watch(ROOT_FOLDER.'/app/models/*.php');
			$bot1->save($result1);

			// Set Controllers Watch
			$bot2 = Bot::init('controllers');
			$result2 = $bot2->watch(ROOT_FOLDER.'/app/http/controllers/*.php');
			$bot2->save($result2);

			// Set Middlewares Watch
			$bot3 = Bot::init('middlewares');
			$result3 = $bot3->watch(ROOT_FOLDER.'/app/http/middlewares/*.php');
			$bot3->save($result3);

		}

	}