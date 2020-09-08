<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 11:12 PM
 *
 * plans/update.php
 */
?>
<h5>
    <a href="danh-sach-cac-goi" class="go-back">Quay lại</a>
</h5>
<h2>
    Chỉnh sửa package #<?php echo $plan['id'];?>
</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên gói</label>
        <input type="text" name="name"
               id="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $plan['name'];?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description"
                  class="form-control"
        ><?php echo isset($_POST['description']) ? $_POST['description'] : $plan['description'];?></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price"
               id="price" min="1"
               value="<?php echo isset($_POST['price']) ? $_POST['price'] : $plan['price'];?>"
               class="form-control"
        />
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Update"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
