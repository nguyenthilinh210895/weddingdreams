<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/15/2020
 * Time: 9:40 PM
 */
?>
<h5>
    <a href="danh-sach-cac-loai-dich-vu" class="go-back">Quay lại</a>
</h5>
<h2>
    Sửa Service Category #<?php echo $service_category['service_category_id'];?>
</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" name="name"
               id="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $service_category['name'];?>"
               class="form-control"
        />
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Update"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
