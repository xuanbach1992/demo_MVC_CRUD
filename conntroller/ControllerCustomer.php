<?php

namespace controller;

use model\CustomerManager;
use model\Customers;
use model\DBconnect;

class ControllerCustomer
{
    public $connect;

    public function __construct()
    {
        $data = new DBconnect("mysql:host=localhost;dbname=customers", "root", "123456");
        $this->connect = new CustomerManager($data->connect());
    }

    public function getList()
    {
        $customers = $this->connect->getAll();
        include "view/list.php";
    }

    public function destroy()
    {
        $id = $_GET["id"];
        $this->connect->delete($id);
        header("Location:index.php");
    }

    public function addCustomer()
    {
        include "view/add.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $customer = new Customers($name, $address, $email);
            $this->connect->add($customer);
            header("Location:index.php");
        }
    }

    public function editCustomer()
    {
        $id = $_GET["id"];
        $customer=$this->connect->getCustomerByid($id);
        include "view/edit.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $customer = new Customers($name, $address, $email);
            $this->connect->update($id,$customer);
            header("Location:index.php");
        }
    }
}