<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 10:51 PM
 */

class Controller
{
    public $error;
    public $content;

    public function __construct()
    {

    }

    public function render($file, $variables = []){
        extract($variables);
        ob_start();
        require_once "$file";
        $view = ob_get_clean();
        return $view;
    }
}