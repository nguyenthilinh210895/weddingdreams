<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/15/2020
 * Time: 9:52 PM
 */
require_once "models/Model.php";
class ServiceCategory extends Model
{
    public $service_category_id;
    public $name;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql = "SELECT * FROM service_categories";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $service_categories = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $service_categories;
    }

    public function getById($id){
        $sql = "SELECT * FROM service_categories WHERE service_category_id=$id";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        return $obj->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(){
        $sql = "INSERT INTO service_categories(`name`) VALUES(:name)";
        $obj = $this->connection->prepare($sql);
        $arr = [
          ':name' => $this->name
        ];
        return $obj->execute($arr);
    }

    public function update($id){
        $sql = "UPDATE service_categories SET `name`=:name, `updated_at`=:updated_at
                WHERE service_category_id=$id
                ";
        $obj = $this->connection->prepare($sql);
        $arr = [
            ':name' => $this->name,
            ':updated_at' => $this->updated_at
        ];
        return $obj->execute($arr);
    }

    public function delete($id){
        $sql = "DELETE FROM service_categories WHERE service_category_id=$id";
        $obj = $this->connection->prepare($sql);
        return $obj->execute();
    }
}