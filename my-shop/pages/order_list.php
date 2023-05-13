<?php
    $user   = $_SESSION['user_login'];
    $result = $sql->query( "select * from orders where customer = '$user' order by order_date desc,status" );
?>
<div class="row">
    <div class="col-12 mt-3">
        <h3>รายการสั่งซื้อทั้งหมด</h3>
        <hr>
    </div>
    <div class="col-12">
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>วันที่สั่งซื้อ</th>
                    <th>สถานะ</th>
                    <th>ดูรายการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    while ( $row = $result->fetch_assoc() )
                    {
                    ?>
                <tr>
                    <td class="align-middle"><?=$i?></td>
                    <td class="align-middle">
                        <?=date( 'วันที่ d M', strtotime( $row['order_date'] ) )?>
                        <?=date( 'Y', strtotime( $row['order_date'] ) ) + 543?>
                        <?=date( ' เวลา H:i', strtotime( $row['order_date'] ) )?>
                    </td>
                    <td class="align-middle"><?=getOrderStatus( $row['status'] )?></td>
                    <td class="align-middle">
                        <a class="btn btn-info btn-sm" href="">ดูข้อมูล</a>
                    </td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>