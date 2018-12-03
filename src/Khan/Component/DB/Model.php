<?php

namespace App\Khan\Component\DB;

use App\Khan\Component\DB\DB as DB;

class Finder
{

    public function __construct($db, $table, $scope)
    {
        $this->db = $db;
        $this->table = $table;
        $this->scoped = $scope;
    }

    public function __call($name, $args)
    {
        return $this->db->select($this->table, "*", [$name => $args[0]]);
    }

}

class Model
{

    public static $storage = [];

    public function __construct()
    {
        $this->db = DB::getConn($_ENV);
        $this->find = new Finder($this->db, $this::table, $this);
    }

    public function db()
    {
        return DB::getConn($_ENV);
    }

    public function __get($name)
    {
        if (self::$storage[$name]) {
            return self::$storage[$name];
        }

    }

    public function __set($name, $value)
    {
        if ($name === "db" || $name === "find") {
            $this->{$name} = $value;
            return;
        }
        self::$storage[$name] = $value;
    }

    public function get_vars()
    {
        return self::$storage;
    }

    public function toModel($data = [])
    {
        $data = end($data);
        foreach ($data as $id => $valor) {
            self::$storage[$id] = $valor;
        }
        return $this;
    }

    public function storage()
    {
        return self::$storage;
    }

    public function save()
    {
        $db = $this->db();
        $data = $db->insert($this::table, $this->get_vars());
        return $data->rowCount();
    }

    public function get($columns = [], $where = [])
    {
        $db = $this->db();
        $where = $this->get_vars() ?? $where;
        return $db->get($this::table, $columns, $where);
    }

    public function update($update = [], $where = [])
    {
        $db = $this->db();
        $where = $this->get_vars() ?? $where;
        $exec = $db->update($this::table, $update, $where);
        return count($where) > 0 ? array_merge($where, $update) : $exec;
    }

    public function remove($where = [])
    {
        $db = $this->db();
        $where = $this->get_vars() ?? $where;
        return $db->delete($this::table, $where);
    }

}
