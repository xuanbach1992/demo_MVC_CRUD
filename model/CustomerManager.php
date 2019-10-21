<?php


namespace model;


use http\Header;

class CustomerManager
{
    public $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM customer";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $customers = [];
        foreach ($result as $value) {
            $customer = new Customers($value["name"], $value["address"], $value["email"]);
            $customer->id = $value["id"];
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function delete($id)
    {
        $this->connect->query("DELETE FROM customer WHERE id=$id");
    }

    public function add($customer)
    {
        $sql = "INSERT INTO customer( name, email, address) VALUES (:name,:email,:address)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":name", $customer->name);
        $stmt->bindParam(":email", $customer->email);
        $stmt->bindParam(":address", $customer->address);
        $stmt->execute();
    }

    public function getCustomerByid($id)
    {
        $sql = "SELECT * FROM customer WHERE id=$id";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $customer = new Customers($result["name"], $result["address"], $result["email"]);
        return $customer;

    }

    public function update($id,$customer)
    {
        $sql = "UPDATE customer SET name=:name,email=:email,address=:address WHERE id=:id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":name", $customer->name);
        $stmt->bindParam(":email", $customer->email);
        $stmt->bindParam(":address", $customer->address);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

}