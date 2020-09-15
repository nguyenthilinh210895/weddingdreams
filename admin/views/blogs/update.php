<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:36 PM
 */
?>
<h5>
    <a href="danh-sach-cac-tin" class="go-back">Quay lại</a>
</h5>
<h2>
    Chỉnh sửa Blog #<?php echo $blog['id'];?>
</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="blog_category_id">Blog Category</label>
        <select name="blog_category_id" class="form-control" id="blog_category_id">
            <?php foreach ($blog_categories AS $blog_category):
                $selected = '';
                if(isset($_POST['blog_category_id']) && $blog_category['id'] == $_POST['blog_category_id']){
                    $selected = 'selected';
                }
                if($blog_category['id'] == $blog['blog_category_id']){
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $blog_category['id'];?>"
                    <?php echo $selected; ?>
                >
                    <?php echo $blog_category['name'];?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="name">Title</label>
        <input type="text" name="title"
               id="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $blog['title']; ?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
        <textarea id="summary" name="summary"
                  class="form-control"
        ><?php echo isset($_POST['summary']) ? $_POST['summary'] : $blog['summary'];?></textarea>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="content" name="content"
                  class="form-control"
        ><?php echo isset($_POST['content']) ? $_POST['content'] : $blog['content'];?></textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image"
               id="image"
               value=""
               class="form-control"
        />
        <img src="assets/uploads/<?php echo $blog['image']; ?>" height="150">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Update"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
