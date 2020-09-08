<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 11:12 PM
 *
 * plans/index.php
 */
?>
<h4>
    <a href="them-moi-goi" class="add-a-new-card">Thêm mới</a>
</h4>
<?php
if(!empty($plans)): ?>
<table class="table table-bordered">
    <tr>
        <th>Mã ID</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th></th>
    </tr>
    <?php foreach ($plans AS $plan): ?>
    <tr>
        <td><?php echo $plan['id']; ?></td>
        <td><?php echo $plan['name']; ?></td>
        <td><?php echo $plan['description']; ?></td>
        <td>$<?php echo $plan['price']; ?></td>
        <td><?php echo date('d-m-Y H:i:s', strtotime($plan['created_at'])); ?></td>
        <td>
            <?php
            if(!empty($plan['updated_at'])){
                echo date('d-m-Y H:i:s',strtotime($plan['updated_at']));
            }else{
                echo "--/--/--";
            }
            ?>
        <td>
            <a href="chi-tiet-goi/<?php echo $plan['id'];?>" title="Xem chi tiết">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
            <a href="chinh-sua-goi/<?php echo $plan['id'];?>" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a href="xoa-goi/<?php echo $plan['id'];?>" title="Xóa"
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
