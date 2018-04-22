<?php

    namespace App\Khan\Libraries;
    use App\Khan\Contracts\Libraries\Libraries as LibrariesContract;

    class Cache implements LibrariesContract {

        private $_salt = "Khan Framework";
        private $_name;
        private $_dir;
        private $_extension;
        private $_path;

        protected static $instance = null;

        public static function create(){
            if(is_null(self::$instance)){
                self::$instance = new Cache();
            }
            return self::$instance;
        }

        public function __construct(){}
        
        public function init($name = "default", $dir = "src/Khan/component/cache/temp/", $extension = ".cache") 
        {
            if(md5($this->_salt) == "233abed7ee9945c0429047405d864283") throw new \Exception("Change _salt value before usage! (line 5)");
            $dir = str_replace("\\", "/", $dir);
            if(!$this->endsWith($dir, "/"))
            {
                $dir .= "/";
            }
            $this->_name = $name;
            $this->_dir = $dir;
            $this->_extension = $extension;
            $this->_path = $this->getPath();
            $this->checkDir();
        }

        public function set($key, $value, $ttl = -1)
        {
            $data = [
                "t" => time(),
                "e" => $ttl,
                "v" => serialize($value),
            ];
            $cache = $this->getCache();
            if($cache == null)
            {
                $cache = [
                    $key => $data,
                ];
            }
            else
            {
                $cache[$key] = $data;
            }
            $this->setCache($cache);
        }
        public function get($key, &$out)
        {
            $cache = $this->getCache();
            if(!is_array($cache)) return false;
            if(!array_key_exists($key, $cache)) return false;
            $data = $cache[$key];
            if($this->isExpired($data))
            {
                unset($cache[$key]);
                $this->setCache($cache);
                return false;
            }
            $out = unserialize($data["v"]);
            return true;
        }
    	
    	public function remove($key)
    	{
    		$cache = $this->getCache();
            if(!is_array($cache)) return false;
            if(!array_key_exists($key, $cache)) return false;
    		
    		unset($cache[$key]);
    		$this->setCache($cache);
    		return true;
    	}
        private function isExpired($data)
        {
            if($data["e"] == -1) return false;
            $expiresOn = $data["t"] + $data["e"];
            return $expiresOn < time();
        }
        private function setCache($json)
        {
            if(!is_array($json)) throw new \Exception("Invalid cache (not an array?)");
            $content = json_encode($json);
            file_put_contents($this->_path, $content);
        }
        private function getCache()
        {
            if(!file_exists($this->_path)) return null;
            $content = file_get_contents($this->_path);
            return json_decode($content, true);
        }
        private function getPath() 
        {
            return $this->_dir . md5($this->_name . $this->_salt) . $this->_extension;
        }
        private function checkDir()
        {
            if(!is_dir($this->_dir) && !mkdir($this->_dir, 0775, true))
            {
                throw new \Exception("Unable to create cache directory ($this->_dir)");
            }
            if(!is_readable($this->_dir) || !is_writable($this->_dir))
            {
                if(!chmod($this->_dir, 0775))
                {
                    throw new \Exception("Cache directory must be readable and writable ($this->_dir)");
                }
            }
            return true;
        }
        private function startsWith($haystack, $needle)
        {
            $length = strlen($needle);
            return (substr($haystack, 0, $length) === $needle);
        }
        private function endsWith($haystack, $needle)
        {
            $length = strlen($needle);
            return $length === 0 || (substr($haystack, -$length) === $needle);
        }
    }
