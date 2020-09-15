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
        $sql = "SELECT blogs.*, blog_categories.name AS blog_category_name
                FROM blogs INNER JOIN blog_categories
                ON blog_categories.id = blogs.blog_category_id
                ";
        $obj =  $this->connection->prepare($sql);
        $obj->execute();
        $blogs = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $blogs;
    }

    public function getById($id){
        $sql = "SELECT * FROM blogs WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $blog = $obj->fetch(PDO::FETCH_ASSOC);
        return $blog;
    }

    public function insert(){
        $sql = "INSERT INTO blogs(`blog_category_id`, `title`,`summary`, `content`, `image`)
                VALUES (:blog_category_id, :title, :summary, :content, :image)
                ";
        $obj_con = $this->connection->prepare($sql);
        $arr_insert = [
            ':blog_category_id' => $this->blog_category_id,
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':image' => $this->image
        ];
        return $obj_con->execute($arr_insert);
    }

    public function update($id){
        $sql = "UPDATE blogs SET `blog_category_id`=:blog_category_id, 
                                  `title`=:title, `summary`=:summary, `content`=:content,
                                  `image`=:image, `updated_at`=:updated_at
                                  WHERE id=$id
                                  ";
        $obj_update = $this->connection->prepare($sql);
        $arr = [
            ':blog_category_id' => $this->blog_category_id,
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':image' => $this->image,
            ':updated_at' => $this->updated_at
        ];
        return $obj_update->execute($arr);
    }

    public function delete($id){
        $sql = "DELETE FROM blogs WHERE id=$id";
        $obj = $this->connection->prepare($sql);
        return $obj->execute();
    }
}