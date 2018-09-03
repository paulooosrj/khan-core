<?php 

	namespace Command\Bot;
	use App\Khan\Component\Hooks\Hooks as Hooks;

	class Bot {

		public static $instance = null,
					  $name = null,
					  $dir = null;

		protected function __construct(){
			Hooks::create(self::$dir, json_encode(['name' => self::$name], JSON_PRETTY_PRINT));
		}

		public static function init($name = ''){
			if(empty($name)) return;
			self::$name = $name;
			self::$dir = __DIR__ . '/storage/' . self::$name . '.json';
			self::$instance = new Bot;
			return self::$instance;
		}

		public static function loadUses(){
			$dataLoad = (array) Hooks::unJson(self::$dir);
			return array_values($dataLoad['top_uses']);
		}

		public static function save($data){
			$dataLoad = (array) Hooks::unJson(self::$dir);
			Hooks::write(
				self::$dir, 
				json_encode(array_merge($dataLoad, $data), JSON_PRETTY_PRINT)
			);
		}

		// public static function watch($folder){}
		// public static function watch($folder){}

		public static function watch($folder){
			$classGetted = [];
			$filesCount = count(glob($folder));

			foreach (glob($folder) as $file) {
				$classes = self::getPhpClasses($file);
				foreach ($classes as $key => $value) {
					$keys = array_keys($classGetted);
					$value = substr($value, 0, 1) === "\\" ?: "\\" . $value; 
					if(!in_array($value, $keys)){
						$classGetted = array_merge($classGetted, [$value => 1]);
					}
					else{
						$classGetted[$value] = $classGetted[$value] + 1;
					}
				}
			}

			$valueAllFiles = array_reduce($classGetted, function($ant, $atual){
				return $ant + $atual;
			}, 0);

			arsort($classGetted);

			$top_uses = array_keys(array_slice($classGetted, 0, ($filesCount + 1)));

			return [
				'uses' => $classGetted,
				'top_uses' => $top_uses,
				'media' => ($valueAllFiles / $filesCount)
			];

		}

		public static function getPhpClasses($filepath) {
		    $parsedFile = new \Go\ParserReflection\ReflectionFile($filepath);
			$fileNameSpaces = $parsedFile->getFileNamespaces();
			$aliases = [];
			foreach ($fileNameSpaces as $namespace) {
			    // $classes = array_map(function($value){
			    // 	return $value->getName();
			    // }, $namespace->getClasses());
			    $aliases = array_keys($namespace->getNamespaceAliases());
			}
			return $aliases;
		}

	}