<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 11:18 PM
 */
require_once "controllers/Controller.php";
require_once "models/Plan.php";
class PlanController extends Controller
{
    public function index(){
        $plan_model = new Plan();
        $plans = $plan_model->getAll();
        $this->content = $this->render('views/plans/index.php', [
            'plans' => $plans
        ]);
        require_once "views/layouts/main.php";
    }
}