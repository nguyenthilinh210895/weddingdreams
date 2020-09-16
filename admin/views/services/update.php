<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/15/2020
 * Time: 9:40 PM
 */
?>
<h5>
    <a href="danh-sach-cac-dich-vu" class="go-back">Quay lại</a>
</h5>
<h2>
    Chỉnh sửa Service #<?php echo $service['service_id'];?>
</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên gói</label>
        <input type="text" name="name"
               id="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $service['name'];?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="service_category_id">Service Category</label>
        <select name="service_category_id" class="form-control" id="service_category_id">
            <?php foreach ($service_categories AS $service_category):
                $selected = '';
                if(isset($_POST['service_category_id']) && $service_category['service_category_id'] == $_POST['service_category_id']){
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $service_category['service_category_id'];?>"
                    <?php echo $selected; ?>
                >
                    <?php echo $service_category['name'];?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price"
               id="price" min="1"
               value="<?php echo isset($_POST['price']) ? $_POST['price'] : $service['price'];?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="summary">Tóm tắt</label>
        <textarea id="summary" name="summary"
                  class="form-control"
        ><?php echo isset($_POST['summary']) ? $_POST['summary'] : $service['summary'];?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description"
                  class="form-control"
        ><?php echo isset($_POST['description']) ? $_POST['description'] : $service['description'];?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
