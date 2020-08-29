<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 10:56 PM
 */
require_once "configs/Database.php";
class Model
{
    public $connectinon;
    public function __construct()
    {
        $this->connectinon = $this->getConnection();
    }

    public function getConnection(){
        $connection = new PDO(Database::DB_DSN,
                    Database::DB_USERNAME,
                    Database::DB_PASSWORD
            );
        return $connection;
    }
}