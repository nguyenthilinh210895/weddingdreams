<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 11:14 PM
 */
require_once "models/Model.php";
class Plan extends Model
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select_all = "SELECT * FROM plans";
        $obj = $this->connection->prepare($sql_select_all);
        $obj->execute();
        $plans = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $plans;
    }

    public function getById($id){
        $sql = "SELECT * FROM plans WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $plan = $obj->fetch(PDO::FETCH_ASSOC);
        return $plan;
    }

    public function insert(){
        $sql = "INSERT INTO plans(`name`, `description`, `price`) VALUES (:name, :description, :price )";
        $obj = $this->connection->prepare($sql);
        $arr = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price
        ];
        return $obj->execute($arr);
    }

    public function update($id){
        $sql = "UPDATE plans 
                SET `name`=:name, `description`=:description, `price`=:price, `updated_at`=:updated_at
                WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        $arr = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':updated_at' => $this->updated_at
        ];
        return $obj->execute($arr);
    }

    public function delete($id){
        $sql = "DELETE FROM plans WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        return $obj->execute();
    }
}