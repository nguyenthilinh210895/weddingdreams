<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:46 PM
 */
?>
<h5>
    <a href="danh-sach-cac-loai-tin" class="go-back">Quay lại</a>
</h5>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" name="name"
               id="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $blog_category['name'];?>"
               class="form-control"
        />
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
