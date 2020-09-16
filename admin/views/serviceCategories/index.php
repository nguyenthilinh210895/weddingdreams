<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/15/2020
 * Time: 9:40 PM
 */
?>
<h4>
    <a href="them-moi-loai-dich-vu" class="add-a-new-card">Thêm mới</a>
</h4>
<?php
if(!empty($service_categories)): ?>
    <table class="table table-bordered">
        <tr>
            <th>Mã ID</th>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th></th>
        </tr>
        <?php foreach ($service_categories AS $service_category): ?>
            <tr>
                <td><?php echo $service_category['service_category_id']; ?></td>
                <td><?php echo $service_category['name']; ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($service_category['created_at'])); ?></td>
                <td>
                    <?php
                    if(!empty($service_category['updated_at'])){
                        echo date('d-m-Y H:i:s',strtotime($service_category['updated_at']));
                    }else{
                        echo "--/--/--";
                    }
                    ?>
                <td>
                    <a href="" title="Xem chi tiết">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="sua-loai-dich-vu/<?php echo $service_category['service_category_id'];?>" title="Chỉnh sửa">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="xoa-loai-dich-vu/<?php echo $service_category['service_category_id'];?>" title="Xóa"
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
