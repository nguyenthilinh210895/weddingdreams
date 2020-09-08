<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/2020
 * Time: 4:46 PM
 */
if(isset($blogCategory)):
    ?>
    <table class="table-borderless mb-3" >
        <tr>
            <th>Mã</th>
            <td>
                <?php echo $blogCategory['id'];?>
            </td>
        </tr>
        <tr>
            <th>Tên</th>
            <td>
                <?php echo $blogCategory['name'];?>
            </td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($blogCategory['created_at']));?>
            </td>
        </tr>
        <tr>
            <th>Ngày cập nhật</th>
            <td>
                <?php
                if(!empty($blogCategory['updated_at']))
                    echo date('d-m-Y H:i:s', strtotime($blogCategory['updated_at']));
                else echo "--/--/--";
                ?>
            </td>
        </tr>
    </table>
    <h5>
        <a href="danh-sach-cac-loai-tin" class="go-back">Quay lại</a>
    </h5>
<?php endif; ?>

