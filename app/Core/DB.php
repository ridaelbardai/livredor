<?php

require_once(LIBS.'DB/MysqliDb.php');

class DB
{
    protected $db;
    public function connect()
    {
        $database = new MysqliDb(HOST, USER, PASS, DBNAME);

        try {
            $this->db = $database;
            return $this->db;
        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }
}
