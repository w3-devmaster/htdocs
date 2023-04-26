<?php
    $result = $sql->query( "select * from products" );

?>
<h3 class="mt-3">สินค้าทั้งหมด</h3>
<hr>
<a class="btn btn-success btn-sm" href="./?page=add_product">เพิ่มข้อมูลสินค้า</a>
<table class="table table-striped table-bordered mt-3 text-center">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อสินค้า</th>
            <th>หมวดหมู่</th>
            <th>ราคา</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ( $row = $result->fetch_assoc() )
            {
            ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['product_name']?></td>
            <td><?=$row['category_id']?></td>
            <td><?=number_format( $row['price'], 2 )?></td>
            <td></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>