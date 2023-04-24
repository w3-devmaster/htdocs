<h3>เพิ่มหมวดหมู่สินค้า</h3>
<hr>
<?php
    if ( isset( $_POST['edit'] ) )
    {
        $id            = $_GET['id'];
        $category_name = trim( $_POST['category_name'] );

        $result = $sql->query( "update categories set category_name = '$category_name' where id = $id " );

        if ( $result )
        {
            $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'บันทึกข้อมูลเสร็จสิ้น'];
            header( 'location: ./?page=category' );
        }
        else
        {
            $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'เกิดข้อผิดพลาด'];
            header( 'location: ./?page=category' );
        }

    }
    else
    {
        $id = $_GET['id'];

        $result = $sql->query( "select * from categories where id = $id limit 1" );

        $row = $result->fetch_assoc();
    ?>
<a class="btn btn-primary btn-sm" href="./?page=category">กลับ</a>
<div class="row mt-5 mx-0">
    <div class="col-12">
        <form action="" method="post">
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="category_name">ชื่อหมวดหมู่สินค้า</label>
            <input type="text" name="category_name" class="form-control" required value="<?=$row['category_name']?>">
        </div>
    </div>
    <div class="col-12">
        <input name="edit" class="btn btn-sm btn-success" type="submit" value="บันทึก">
    </div>
    <div class="col-12">
        </form>
    </div>
</div>

<?php
}
?>