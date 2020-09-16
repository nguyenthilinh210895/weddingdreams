<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/15/2020
 * Time: 9:40 PM
 */
?>
<h4>
    <a href="them-moi-dich-vu" class="add-a-new-card">Thêm mới</a>
</h4>
<?php
if(!empty($services)): ?>
    <table class="table table-bordered">
        <tr>
            <th>Mã Service</th>
            <th>Loại Service</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Khái quát</th>
            <th>Mô tả</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th></th>
        </tr>
        <?php foreach ($services AS $service): ?>
            <tr>
                <td><?php echo $service['service_id']; ?></td>
                <td><?php echo $service['service_category_name']; ?></td>
                <td><?php echo $service['name']; ?></td>
                <td><?php echo $service['price']; ?></td>
                <td><?php echo $service['summary']; ?></td>
                <td><?php echo $service['description']; ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($service['created_at'])); ?></td>
                <td>
                    <?php
                    if(!empty($service['updated_at'])){
                        echo date('d-m-Y H:i:s',strtotime($service['updated_at']));
                    }else{
                        echo "--/--/--";
                    }
                    ?>
                <td>
                    <a href="" title="Xem chi tiết">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="sua-dich-vu/<?php echo $service['service_id'];?>" title="Chỉnh sửa">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="xoa-dich-vu/<?php echo $service['service_id'];?>" title="Xóa"
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
