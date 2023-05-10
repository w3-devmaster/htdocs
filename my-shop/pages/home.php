<?php
    $result = $sql->query( "select * from products where hots = 1 order by id" );
?>
<h3>หน้าแรก</h3>
<hr>
<p>สินค้ายอดฮิต</p>
<div class="row">
    <?php
        while ( $row = $result->fetch_assoc() )
        {
        ?>
    <div class="col-md-3 col-6 mb-3">
        <div class="card">
            <img src="<?=$row['image']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$row['product_name']?></h5>
                <p class="card-text"><?=$row['product_desc']?></p>
                <p class="card-text">ราคาสินค้า : <?=number_format( $row['price'], 2 )?> ฿</p>
                <a href="#" class="btn btn-primary">ซื้อ</a>
                <a href="./?page=cart&pid=<?=$row['id']?>" class="btn btn-success">ใส่ตะกร้า</a>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>