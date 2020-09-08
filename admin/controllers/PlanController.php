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

    public function add(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }else if(empty($description)){
                $this->error = "Chưa nhập mô tả";
            }else if(empty($price)){
                $this->error = "Chưa nhập giá";
            }
            if(empty($this->error)){
                $obj_plan = new Plan();
                $obj_plan->name = $name;
                $obj_plan->description = $description;
                $obj_plan->price = $price;
                $is_insert = $obj_plan->insert();
                if($is_insert){
                    $_SESSION['success'] = "Thêm mới thành công";
                }else{
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-goi';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/plans/create.php');
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $id = $_GET['id'];
        $plan_model = new Plan();
        $plan = $plan_model->getById($id);
        $this->content = $this->render('views/plans/detail.php',[
            'plan' => $plan
        ]);
        require_once "views/layouts/main.php";
    }

    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-goi';
            header("Location: $url_redirect");
            exit();
        }
        $id = $_GET['id'];
        $plan_model = new Plan();
        $plan = $plan_model->getById($id);

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }else if(empty($description)){
                $this->error = "Chưa nhập mô tả";
            }else if(empty($price)){
                $this->error = "Chưa điền giá";
            }
            if(empty($this->error)){
                $obj_plan = new Plan();
                $obj_plan->name = $name;
                $obj_plan->description = $description;
                $obj_plan->price = $price;
                $is_update = $obj_plan->update($id);
                if($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-goi';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/plans/update.php',['plan' => $plan]);
        require_once "views/layouts/main.php";
    }

    public function delete(){
        $id = $_GET['id'];
        $obj_plan = new Plan();
        $is_delete = $obj_plan->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-goi';
        header("Location: $url_redirect");
        exit();
    }
}