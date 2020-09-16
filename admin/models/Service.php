<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/16/2020
 * Time: 5:18 PM
 */
require_once "models/Model.php";
class Service extends Model
{
    public $service_id;
    public $service_category_id;
    public $name;
    public $price;
    public $summary;
    public $description;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select_all = "SELECT services.*, service_categories.name AS service_category_name
                            FROM services
                            INNER JOIN service_categories
                            ON services.service_category_id = service_categories.service_category_id
                            WHERE TRUE
                            ";
        $obj = $this->connection->prepare($sql_select_all);
        $obj->execute();
        $services = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $services;
    }

    public function getById($id){
        $sql_select_one = "SELECT services.*, service_categories.name AS service_category_name
                            FROM services
                            INNER JOIN service_categories
                            ON services.service_category_id = service_categories.service_category_id
                            WHERE services.service_id = $id
                            ";
        $obj = $this->connection->prepare($sql_select_one);
        $obj->execute();
        $service = $obj->fetch(PDO::FETCH_ASSOC);
        return $service;
    }

    public function insert(){
        $sql_insert = "INSERT INTO services(service_category_id, name, price, summary, description)
                      VALUES (:service_category_id, :name, :price, :summary, :description)
                      ";
        $arr_insert = [
            ':service_category_id' => $this->service_category_id,
            ':name' => $this->name,
            ':price' => $this->price,
            ':summary' => $this->summary,
            ':description' => $this->description
        ];
        $obj = $this->connection->prepare($sql_insert);
        return $obj->execute($arr_insert);
    }

    public function update($id){
        $sql_update = "UPDATE services
                       SET service_category_id=:service_category_id, name=:name, price=:price, 
                       summary=:summary, description=:description, updated_at=:updated_at
                       WHERE service_id=$id
                       ";
        $obj = $this->connection->prepare($sql_update);
        $arr_update = [
            ':service_category_id' => $this->service_category_id,
            ':name' => $this->name,
            ':price' => $this->price,
            ':summary' => $this->summary,
            ':description' => $this->description,
            ':updated_at' => $this->updated_at
        ];
        return $obj->execute($arr_update);
    }

    public function delete($id){
        $sql_delete = "DELETE FROM services WHERE service_id=$id";
        $obj = $this->connection->prepare($sql_delete);
        return $obj->execute();
    }
}