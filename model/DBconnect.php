<?php

namespace model;


class DBconnect
{
    public $dns;
    public $user;
    public $pass;

    public function __construct($dns, $user, $pass)
    {
        $this->dns = $dns;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new \PDO($this->dns, $this->user, $this->pass);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
        return $conn;
    }
}