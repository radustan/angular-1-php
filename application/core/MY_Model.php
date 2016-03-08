<?php

/**
 * @property CI_DB_query_builder $db;
 */

class MY_Model extends CI_Model
{
    protected $tableName;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get($this->tableName)->result();
    }

    public function getAllArray()
    {
        return $this->db->get($this->tableName)->result_array();
    }

    public function save(array $data)
    {
        return $this->db->insert($this->tableName, $data);
    }

}
