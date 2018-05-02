<?php

	namespace App\Khan\Component\DB;
	use App\Khan\Component\DB\DB as DB;

	class Model {

		private function db(){
			return DB::getConn($_ENV);
		}

		public function get_vars(){
			return get_object_vars($this);
		}

		public function save(){
			$data = $this->db()->insert($this::table, $this->get_vars());
			return $data->rowCount();
		}

		public function get($columns = [], $where = []){
			return $this->db()->get($this::table, $columns, $where);
		}

		public function find($tag = '*', $where = []){
			return $this->db()->select($this::table, $tag, $where);
		}

		public function update($update = [], $where = []){
			return $this->db()->update($this::table, $update, $where);
		}

		public function remove($where = []){
			return $this->db()->delete($this::table, $where);
		}

	}
