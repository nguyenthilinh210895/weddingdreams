<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:38 PM
 */
require_once "controllers/Controller.php";
require_once "models/Blog.php";
require_once "models/BlogCategory.php";
class BlogController extends Controller
{
    public function index(){
        $blog_model = new Blog();
        $blogs = $blog_model->getAll();
        $this->content = $this->render('views/blogs/index.php',[
            'blogs' => $blogs
        ]);
        require_once "views/layouts/main.php";
    }

    public function add(){
        $blog_category_model = new BlogCategory();
        $blog_categories = $blog_category_model->getAll();
        if(isset($_POST['submit'])){
            $blog_category_id = $_POST['blog_category_id'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            if(empty($title)){
                $this->error = "Chưa nhập tiêu đề";
            }else if(empty($summary)){
                $this->error = "Chưa nhập nội dung tổng quát";
            }else if(empty($content)){
                $this->error = "Chưa nhập nội dung";
            }else if($_FILES['image']['error'] == 4){
                $this->error = "Chưa có tệp nào được tải lên";
            }else if(empty($this->error)){
                $file_name = '';
                if($_FILES['image']['error'] == 0){
                    $dir_uploads = __DIR__.'/../assets/uploads';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $file_name = time().'-blog-'.$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $dir_uploads.'/'.$file_name);
                }
                $blog_model = new Blog();
                $blog_model->blog_category_id = $blog_category_id;
                $blog_model->title = $title;
                $blog_model->summary = $summary;
                $blog_model->content = $content;
                $blog_model->image = $file_name;
                $is_insert = $blog_model->insert();
                if($is_insert){
                    $_SESSION['success'] = "Thêm thành công";
                }else{
                    $_SESSION['error'] = "Thêm thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-tin';
                header("Location: $url_redirect");
                exit();
            }
        }

        $this->content = $this->render('views/blogs/create.php',[
            'blog_categories' => $blog_categories
        ]);
        require_once "views/layouts/main.php";
    }

    public function update(){
        $id = $_GET['id'];
        $blog_model = new Blog();
        $blog = $blog_model->getById($id);
        $blog_category_model = new BlogCategory();
        $blog_categories = $blog_category_model->getAll();
        if(isset($_POST['submit'])){
            $blog_category_id = $_POST['blog_category_id'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            if(empty($title) || empty($summary) || empty($content)){
                $this->error = "Chưa nhập đầy đủ thông tin";
            }else if($_FILES['image']['error'] == 0){
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                $file_size_mb = $_FILES['image']['size']/(1024*1024);
                $file_size_mb = round($file_size_mb, 2);
                if(!in_array($extension, $arr_extensions)){
                    $this->error = "Cần tải lên tệp định dạng là ảnh";
                }else if($file_size_mb > 2){
                    $this->error = "Dung lượng tệp tải lên không được vượt quá 2Mb";
                }
            }
            if(empty($this->error)){
                $file_name = $blog['image'];
                if($_FILES['image']['error'] == 0){
                    $dir_upload = __DIR__.'/../assets/uploads';
                    @unlink($dir_upload.'/'.$file_name);
                    if(!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $file_name = time().'-blog-'.$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $dir_upload.'/'.$file_name);
                }
                $blog_model->title = $title;
                $blog_model->blog_category_id = $blog_category_id;
                $blog_model->summary = $summary;
                $blog_model->content = $content;
                $blog_model->image = $file_name;
                $blog_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $blog_model->update($id);
                if($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                $url_redirect = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-tin';
                header("Location: $url_redirect");
                exit();
            }
        }
        $this->content = $this->render('views/blogs/update.php',[
            'blog' => $blog,
            'blog_categories' => $blog_categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $id = $_GET['id'];
        $blog_model = new Blog();
        $blog = $blog_model->getById($id);
        $this->content = $this->render('views/blogs/detail.php',[
            'blog' => $blog
        ]);
        require_once "views/layouts/main.php";
    }

    public function delete(){
        $id = $_GET['id'];
        $blog_model = new Blog();
        $is_delete = $blog_model->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        $redirect_url = $_SERVER['SCRIPT_NAME'].'/danh-sach-cac-tin';
        header("Location: $redirect_url");
        exit();
    }
}