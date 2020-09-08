<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:45 PM
 */
require_once "controllers/Controller.php";
require_once "models/BlogCategory.php";
class BlogCategoryController extends Controller
{
    public function index(){
        $blog_category_obj = new BlogCategory();
        $blog_categories = $blog_category_obj->getAll();
        $this->content = $this->render('views/blogCategories/index.php',[
            'blog_categories' => $blog_categories
        ]);
        require_once "views/layouts/main.php";
    }

    public function add(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }
            if(empty($this->error)){
                $blog_category_obj = new BlogCategory();
                $blog_category_obj->name = $name;
                $is_insert = $blog_category_obj->insert();
                if($is_insert){
                    $_SERVER['success'] = "Thêm thành công";
                }else{
                    $_SERVER['error'] = "Thêm thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-loai-tin';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/blogCategories/create.php');
        require_once "views/layouts/main.php";
    }

    public function update(){
        $id = $_GET['id'];
        $blog_category_model = new BlogCategory();
        $blog_category = $blog_category_model->getById($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }
            if(empty($this->error)){
                $blog_category_model = new BlogCategory();
                $blog_category_model->name = $name;
                $blog_category_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $blog_category_model->update($id);
                if($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-loai-tin';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/blogCategories/update.php', ['blog_category' => $blog_category]);
        require_once "views/layouts/main.php";
    }

    public function detail(){
        $id = $_GET['id'];
        $blogCategoryModel = new BlogCategory();
        $blogCategory = $blogCategoryModel->getById($id);
        $this->content = $this->render('views/blogCategories/detail.php',
            ['blogCategory' => $blogCategory]);
        require_once "views/layouts/main.php";
    }

    public function delete(){
        $id = $_GET['id'];
        $obj = new BlogCategory();
        $is_delete = $obj->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Đã xóa";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-loai-tin';
        header("Location: $url_redirect");
        exit();
    }
}