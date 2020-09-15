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
    Thêm mới Blog
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
               value="<?php if(isset($_POST['title'])) echo $_POST['title'];?>"
               class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
        <textarea id="summary" name="summary"
                  class="form-control"
        ><?php if(isset($_POST['summary'])) echo $_POST['summary'];?></textarea>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="content" name="content"
                  class="form-control"
        ><?php if(isset($_POST['content'])) echo $_POST['content'];?></textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image"
               id="image"
               value=""
               class="form-control"
        />
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
