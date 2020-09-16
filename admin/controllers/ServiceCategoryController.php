<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/15/2020
 * Time: 9:52 PM
 */
require_once "controllers/Controller.php";
require_once "models/ServiceCategory.php";
class ServiceCategoryController extends Controller
{
    public function index(){
        $service_category_model = new ServiceCategory();
        $service_categories = $service_category_model->getAll();
        $this->content = $this->render('views/serviceCategories/index.php', [
            'service_categories' => $service_categories
        ]);
        require_once "views/layouts/main.php";
    }

    public function add(){
        $name = '';
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }
            if(empty($this->error)){
                $model = new ServiceCategory();
                $model->name = $name;
                $is_insert = $model->insert();
                if($is_insert){
                    $_SESSION['success'] = "Thêm thành công";
                }else{
                    $_SESSION['error'] = "Thêm thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-loai-dich-vu';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/serviceCategories/create.php');
        require_once "views/layouts/main.php";
    }

    public function update(){
        $id = $_GET['id'];
        $model = new ServiceCategory();
        $service_category = $model->getById($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }
            if(empty($this->error)){
                $model->name = $name;
                $model->updated_at = date('Y-m-d H:i:s');
                $is_update = $model->update($id);
                if($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-loai-dich-vu';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/serviceCategories/update.php',[
            'service_category' => $service_category
        ]);
        require_once "views/layouts/main.php";
    }

    public function delete(){
        $id = $_GET['id'];
        $model = new ServiceCategory();
        $is_delete = $model->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-loai-dich-vu';
        header("Location: $url_redirect");
        exit();
    }
}