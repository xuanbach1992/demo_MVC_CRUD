<?php


namespace model;


class Customers
{
    public $id;
    public $name;
    public $address;
    public $email;

    public function __construct($name, $address, $email)
    {
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
    }
}