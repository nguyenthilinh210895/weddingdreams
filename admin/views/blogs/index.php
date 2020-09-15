<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:36 PM
 */
?>
<h4>
    <a href="them-moi-tin" class="add-a-new-card">Thêm mới</a>
</h4>
<?php
if(!empty($blogs)): ?>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Blog Category</th>
        <th>Title</th>
        <th>Summary</th>
        <th>Content</th>
        <th>Image</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php foreach ($blogs AS $blog): ?>
    <tr>
        <td><?php echo $blog['id']; ?></td>
        <td><?php echo $blog['blog_category_name']; ?></td>
        <td><?php echo $blog['title']; ?></td>
        <td><?php echo $blog['summary']; ?></td>
        <td><?php echo $blog['content']; ?></td>
        <td>
            <img src="assets/uploads/<?php echo $blog['image']; ?>" height="80">
        </td>
        <td><?php echo date('d-m-Y H:i:s', strtotime($blog['created_at'])); ?></td>
        <td>
            <?php
            if(!empty($blog['updated_at'])){
                echo date('d-m-Y H:i:s',strtotime($blog['updated_at']));
            }else{
                echo "--/--/--";
            }
            ?>
        <td>
            <a href="chi-tiet-tin/<?php echo $blog['id'];?>" title="Xem chi tiết">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
            <a href="chinh-sua-tin/<?php echo $blog['id'];?>" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a href="xoa-tin/<?php echo $blog['id'];?>" title="Xóa"
               onclick="return confirm('Are you sure?')"
            >
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php
else:
?>
<h3>The table is empty!</h3>
<?php endif; ?>

