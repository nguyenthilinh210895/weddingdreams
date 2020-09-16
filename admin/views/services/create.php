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
    Thêm mới Service
</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên gói</label>
        <input type="text" name="name"
               id="name"
               value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"
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
               value="<?php if(isset($_POST['price'])) echo $_POST['price'];?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="summary">Tóm tắt</label>
        <textarea id="summary" name="summary"
                  class="form-control"
        ><?php if(isset($_POST['summary'])) echo $_POST['summary'];?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description"
                  class="form-control"
        ><?php if(isset($_POST['description'])) echo $_POST['description'];?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
