<?php
    if ( !empty( $_GET['pid'] ) && is_numeric( $_GET['pid'] ) )
    {
        $pid    = $_GET['pid'];
        $result = $sql->query( "select * from products where id = $pid " );

        $count = $result->num_rows;

        if ( $count > 0 )
        {
            $row = $result->fetch_assoc();
        ?>
<h3 class="mt-3"><a class="btn btn-info btn-sm" href="./?page=products">กลับ</a> <?=$row['product_name']?> (<?=getCategoryName( $sql, $row['category_id'] )?>)</h3>
<hr>
<p>รายละเอียดสินค้า : <?=$row['product_desc']?></p>
<img class="img-thumbnail w-50" src="<?=$row['image']?>" alt="image">
<hr>
<p>ราคา : <?=number_format( $row['price'], 2 )?></p>
<p>จำนวนที่ถูกซื้อ : <?=number_format( $row['buy'] )?></p>

<?php
    }
        else
        {
            header( 'location: ./?page=products' );
        }

    }
    else
    {

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
            <td><?=getCategoryName( $sql, $row['category_id'] )?></td>
            <td><?=number_format( $row['price'], 2 )?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="./?page=products&pid=<?=$row['id']?>">ดูสินค้า</a>
                <a class="btn btn-warning btn-sm" href="./?page=edit_product&pid=<?=$row['id']?>">แก้ไขสินค้า</a>
            </td>
        </tr>
        <?php
            }
            ?>
    </tbody>
</table>

<?php
}
?>