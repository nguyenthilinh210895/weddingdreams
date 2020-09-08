<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:46 PM
 */
?>
<h4>
    <a href="them-moi-loai-tin" class="add-a-new-card">Thêm mới</a>
</h4>
    <h1>Danh sách Blog Categories</h1>
<?php
if(!empty($blog_categories)):
    ?>
    <table class="table table-bordered">
        <tr>
            <th>Mã ID</th>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th></th>
        </tr>
        <?php foreach ($blog_categories AS $blog_category): ?>
            <tr>
                <td><?php echo $blog_category['id']; ?></td>
                <td><?php echo $blog_category['name']; ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($blog_category['created_at'])); ?></td>
                <td>
                    <?php
                    if(!empty($blog_category['updated_at'])){
                        echo date('d-m-Y H:i:s',strtotime($blog_category['updated_at']));
                    }else{
                        echo "--/--/--";
                    }
                    ?>
                </td>
                <td>
                    <a href="chi-tiet-loai-tin/<?php echo $blog_category['id'];?>" title="Xem chi tiết">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="chinh-sua-loai-tin/<?php echo $blog_category['id'];?>" title="Chỉnh sửa">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="xoa-loai-tin/<?php echo $blog_category['id'];?>" title="Xóa"
                       onclick="return confirm('Are you sure?')"
                    >
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <h3>Không có bản ghi nào!</h3>
<?php endif; ?>