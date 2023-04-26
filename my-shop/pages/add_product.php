่<?php
    $result = $sql->query( "select * from categories order by id" );
?>
<h3 class="mt-3">เพิ่มสินค้า</h3>
<hr>
<div class="row">
    <div class="col-12">
        <h4>ระบุข้อมูลสินค้าให้ครบถ้วน</h4>
        <?php
        if ( isset( $_SESSION['alert'] ) )
            {
            ?>
        <div class="alert alert-<?=$_SESSION['alert']['mode']?>"><?=$_SESSION['alert']['msg']?></div>
        <?php
        unset( $_SESSION['alert'] );
            }
        ?>

        <form action="backend/add_product.php" method="post" enctype="multipart/form-data">
    </div>
    <div class="col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">ชื่อสินค้า</span>
            <input name="product_name" type="text" class="form-control" required>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">รายละเอียดสินค้า</span>
            <input name="product_desc" type="text" class="form-control" required>
        </div>
    </div>
    <div class="col-md-4 col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">ราคาสินค้า</span>
            <input name="price" type="number" min="0.01" class="form-control" step="0.01" required>
        </div>
    </div>
    <div class="col-md-8 col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">หมวดหมู่</span>
            <select name="category_id" id="category_id" class="form-select" required>
                <option selected disabled value>กรุณาเลือกหมวดหมู่</option>
                <?php
                    while ( $row = $result->fetch_assoc() )
                    {
                    ?>
                <option value="<?=$row['id']?>"><?=$row['category_name']?></option>
                <?php }
                ?>
            </select>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">รูปภาพสินค้า</span>
            <input name="image" type="file" class="form-control" required>
        </div>
    </div>
    <div class="col-12">
        <div class="d-grid gap-2">
            <input class="btn btn-success" type="submit" value="เพิ่มสินค้า">
        </div>
        </form>
    </div>
</div>