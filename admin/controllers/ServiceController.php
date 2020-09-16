<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/16/2020
 * Time: 5:17 PM
 */
require_once "controllers/Controller.php";
require_once "models/ServiceCategory.php";
require_once "models/Service.php";
class ServiceController extends Controller
{
    public function index(){
        $service_model = new Service();
        $services = $service_model->getAll();
        $this->content = $this->render('views/services/index.php',[
            'services' => $services
        ]);
        require_once "views/layouts/main.php";
    }

    public function add(){
        $category_model = new ServiceCategory();
        $categories = $category_model->getAll();
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $service_category_id = $_POST['service_category_id'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $description = $_POST['description'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }
            if(empty($this->error)){
                $service_model = new Service();
                $service_model->name = $name;
                $service_model->service_category_id = $service_category_id;
                $service_model->price = $price;
                $service_model->summary = $summary;
                $service_model->description = $description;
                $is_insert = $service_model->insert();
                if($is_insert){
                    $_SESSION['success'] = "Thêm thành công";
                }else{
                    $_SESSION['error'] = "Thêm thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-dich-vu';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/services/create.php',[
            'service_categories' => $categories
        ]);
        require_once "views/layouts/main.php";
    }

    public function update(){
        $id = $_GET['id'];
        $service_model = new Service();
        $service = $service_model->getById($id);
        $service_category_model = new ServiceCategory();
        $service_categories = $service_category_model->getAll();
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $service_category_id = $_POST['service_category_id'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $description = $_POST['description'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }
            if(empty($this->error)){
                $service_model = new Service();
                $service_model->name = $name;
                $service_model->service_category_id = $service_category_id;
                $service_model->price = $price;
                $service_model->summary = $summary;
                $service_model->description = $description;
                $service_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $service_model->update($id);
                if($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-dich-vu';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/services/update.php',[
            'service' => $service,
            'service_categories' => $service_categories
        ]);
        require_once "views/layouts/main.php";
    }

    public function delete(){
        $id = $_GET['id'];
        $service_model = new Service();
        $is_delete = $service_model->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-dich-vu';
        header("Location: $url_redirect");
        exit();
    }
}