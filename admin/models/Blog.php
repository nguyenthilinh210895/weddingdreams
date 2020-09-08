<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:38 PM
 */
require_once "models/Model.php";
class Blog extends Model
{
    public $id;
    public $blog_category_id;
    public $title;
    public $summary;
    public $content;
    public $image;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql = "SELECT * FROM blogs";
        $obj =  $this->connection->prepare($sql);
        $obj->execute();
        $blogs = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $blogs;
    }


}