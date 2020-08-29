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
        $obj = $this->connectinon->prepare($sql_select_all);
        $obj->execute();
        $plans = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $plans;
    }
}