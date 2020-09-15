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
<h2>Chi tiết Blog #<?php echo $blog['id'];?></h2>
<table>
    <tr>
        <th>ID</th>
        <td><?= $blog['id']; ?></td>
    </tr>
    <tr>
        <th>Title</th>
        <td><?= $blog['title']; ?></td>
    </tr>
    <tr>
        <th>Summary</th>
        <td><?= $blog['summary']; ?></td>
    </tr>
    <tr>
        <th>Content</th>
        <td><?= $blog['content']; ?></td>
    </tr>
    <tr>
        <th>Image</th>
        <td>
            <img src="assets/uploads/<?= $blog['image']; ?>" />
        </td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td><?= $blog['created_at']; ?></td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td><?= $blog['updated_at']; ?></td>
    </tr>
</table>
