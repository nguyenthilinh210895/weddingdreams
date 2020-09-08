<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:45 PM
 */
require_once "models/Model.php";
class BlogCategory extends Model
{
    public $id;
    public $name;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select_all = "SELECT * FROM blog_categories";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $blog_categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $blog_categories;
    }

    public function getById($id){
        $sql = "SELECT * FROM blog_categories WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $blog_category = $obj->fetch(PDO::FETCH_ASSOC);
        return $blog_category;
    }

    public function insert(){
        $sql = "INSERT INTO blog_categories(`name`) VALUES (:name)";
        $obj = $this->connection->prepare($sql);
        return $obj->execute([':name' => $this->name]);
    }

    public function update($id){
        $sql = "UPDATE blog_categories SET `name`=:name, `updated_at`=:updated_at WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        $arr_update = [
            ':name' => $this->name,
            ':updated_at' => $this->updated_at
        ];
        return $obj->execute($arr_update);
    }

    public function delete($id){
        $sql = "DELETE FROM blog_categories WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        return $obj->execute();
    }
}