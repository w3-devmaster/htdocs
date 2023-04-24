<?php
    if ( isset( $_GET['delete'] ) )
    {
        $id = $_GET['delete'];

        $chk = $sql->query( "select * from categories where id = $id " );
        if ( $chk->num_rows > 0 )
        {
            $del = $sql->query( "delete from categories where id = $id " );

            if ( $del )
            {
                $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'ลบข้อมูลเสร็จสิ้น'];
                header( 'location: ./?page=category' );
            }
            else
            {
                $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'มีข้อผิดพลาด'];
                header( 'location: ./?page=category' );
            }
        }
    }
    else
    {

        $result = $sql->query( "select * from categories order by id" );

    ?>
<h3>หมวดหมู่สินค้าทั้งหมด</h3>
<hr>
<a class="btn btn-success btn-sm" href="./?page=add_category">เพิ่มหมวดหมู่สินค้า</a>
<?php
    if ( isset( $_SESSION['alert'] ) )
        {
        ?>
<div class="alert alert-<?=$_SESSION['alert']['mode']?>"><?=$_SESSION['alert']['msg']?></div>
<?php
    unset( $_SESSION['alert'] );
        }
    ?>
<table class="table table-sm table-striped mt-5 table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อหมวดหมู่</th>
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
            <td><?=$row['category_name']?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="./?page=edit_category&id=<?=$row['id']?>">แก้ไข</a>
                <a class="btn btn-danger btn-sm" href="./?page=category&delete=<?=$row['id']?>">ลบ</a>
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