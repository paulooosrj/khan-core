<?php

    namespace App\Khan\Component\DB;
    use Medoo\Medoo;

    class DB {

        private static $db = null;
        private static $instance = null;

        public static function create(){
            if (!self::$instance) {
                self::$instance = new DB();
            }
            return self::$instance;
        }

        public static function mysql($env){
            return [
              'database_type' => $env['DB_CONNECTION'] ?: "mysql",
              'database_name' => $env['DB_DATABASE'] ?: "",
              'server' => $env['DB_HOST'] ?: "localhost",
              'username' => $env['DB_USERNAME'] ?: "root",
              'password' => $env['DB_PASSWORD'] ?: null,
              'charset' => $env['DB_CHARSET'] ?: "utf-8"
            ];
        }

        public static function sqlite($env){
            return [
              'database_type' => 'sqlite',
              'database_file' => $env['DB_FILE']
            ];
        }

        public static function getConn($env = null) {
            if (self::$db === null && $env !== null) {
                $type = "App\Khan\Component\DB\DB::" . $env['DB_CONNECTION'] ?: "mysql";
                self::$db = new Medoo($type($env));
            }
            return self::$db;
        }

    }
