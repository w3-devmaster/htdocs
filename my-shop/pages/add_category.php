<h3>เพิ่มหมวดหมู่สินค้า</h3>
<hr>
<?php
    if ( isset( $_POST['add'] ) )
    {
        global $sql;

        $category_name = trim( $_POST['category_name'] );

        $result = $sql->query( "insert into categories (category_name,created_at) values ('$category_name',now()) " );

        if ( $result )
        {
            $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'เพิ่มหมวดหมู่สินค้าเรียบร้อย'];
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
    ?>
<a class="btn btn-primary btn-sm" href="./?page=category">กลับ</a>
<div class="row mt-5 mx-0">
    <div class="col-12">
        <form action="" method="post">
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="category_name">ชื่อหมวดหมู่สินค้า</label>
            <input type="text" name="category_name" class="form-control" required>
        </div>
    </div>
    <div class="col-12">
        <input name="add" class="btn btn-sm btn-success" type="submit" value="เพิ่ม">
    </div>
    <div class="col-12">
        </form>
    </div>
</div>

<?php
}
?>