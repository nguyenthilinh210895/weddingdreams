<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/2020
 * Time: 11:12 PM
 *
 * plans/detail.php
 */
if(isset($plan)):
?>
<table class="table-borderless mb-3" >
    <tr>
        <th>Mã</th>
        <td>
            <?php echo $plan['id'];?>
        </td>
    </tr>
    <tr>
        <th>Mô tả</th>
        <td>
            <?php echo $plan['description'];?>
        </td>
    </tr>
    <tr>
        <th>Giá</th>
        <td>
            <?php echo $plan['price'];?>
        </td>
    </tr>
    <tr>
        <th>Ngày tạo</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($plan['created_at']));?>
        </td>
    </tr>
    <tr>
        <th>Ngày cập nhật</th>
        <td>
            <?php
            if(!empty($plan['updated_at']))
                echo date('d-m-Y H:i:s', strtotime($plan['updated_at']));
            else echo "-/-/-";
            ?>
        </td>
    </tr>
</table>
<h5>
    <a href="danh-sach-cac-goi" class="go-back">Quay lại</a>
</h5>
<?php endif; ?>

