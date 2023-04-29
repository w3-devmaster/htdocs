<?php
    if ( !empty( $_GET['pid'] ) && is_numeric( $_GET['pid'] ) )
    {
        $pid    = $_GET['pid'];
        $result = $sql->query( "select * from products where id = $pid " );

        $count = $result->num_rows;

        if ( $count > 0 )
        {
            $row = $result->fetch_assoc();

            $category = $sql->query( "select * from categories order by id" );
        ?>
<h3 class="mt-3"><a class="btn btn-info btn-sm" href="./?page=products">กลับ</a> แก้ไขสินค้า</h3>
<hr>
<div class="row">
    <div class="col-12">
        <h4>กรอกข้อมูลสินค้าตามที่ต้องการ</h4>
        <?php
            if ( isset( $_SESSION['alert'] ) )
                    {
                    ?>
        <div class="alert alert-<?=$_SESSION['alert']['mode']?>"><?=$_SESSION['alert']['msg']?></div>
        <?php
            unset( $_SESSION['alert'] );
                    }
                ?>

        <form action="backend/edit_product.php" method="post" enctype="multipart/form-data">
    </div>
    <div class="col-12 mb-3">
        <input name="pid" type="hidden" value="<?=$row['id']?>">
        <div class="input-group">
            <span class="input-group-text">ชื่อสินค้า</span>
            <input name="product_name" type="text" class="form-control" required value="<?=$row['product_name']?>">
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">รายละเอียดสินค้า</span>
            <input name="product_desc" type="text" class="form-control" required value="<?=$row['product_desc']?>">
        </div>
    </div>
    <div class="col-md-4 col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">ราคาสินค้า</span>
            <input name="price" type="number" min="0.01" class="form-control" step="0.01" required value="<?=$row['price']?>">
        </div>
    </div>
    <div class="col-md-8 col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">หมวดหมู่</span>
            <select name="category_id" id="category_id" class="form-select" required>
                <?php
                    while ( $r = $category->fetch_assoc() )
                            {
                            ?>
                <option <?=$row['category_id'] == $r['id'] ? 'selected' : ''?> value="<?=$r['id']?>"><?=$r['category_name']?></option>
                <?php }
                        ?>
            </select>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="input-group">
            <span class="input-group-text">รูปภาพสินค้า</span>
            <input name="image" type="file" class="form-control">
        </div>
    </div>
    <div class="col-12 mb-3">
        <img class="img-thumbnail w-25" src="<?=$row['image']?>" alt="product-image">
    </div>
    <div class="col-12 mb-3">
        <div class="form-check form-check-inline">
            <input <?=$row['hots'] == 0 ? 'checked' : ''?> class="form-check-input" type="radio" name="hots" id="hots1" value="0">
            <label class="form-check-label" for="hots1">ปกติ</label>
        </div>
        <div class="form-check form-check-inline">
            <input <?=$row['hots'] == 1 ? 'checked' : ''?> class="form-check-input" type="radio" name="hots" id="hots2" value="1">
            <label class="form-check-label" for="hots2">สินค้าขายดี</label>
        </div>
    </div>
    <div class="col-12">
        <div class="d-grid gap-2">
            <input class="btn btn-success" type="submit" value="บันทึกข้อมูลสินค้า">
        </div>
        </form>
    </div>
</div>

<?php
    }
        else
        {
            header( 'location: ./?page=products' );
        }
}
?>