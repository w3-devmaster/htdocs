<?php
    if ( isset( $_GET['pid'] ) )
    {
        $pid = $_GET['pid'];

        if ( empty( $_SESSION['cart'] ) )
        {
            $_SESSION['cart'] = [];
        }

        if ( isset( $_GET['delete'] ) )
        {
            unset( $_SESSION['cart'][$pid] );
            header( 'location: ./?page=cart' );
        }
        else
        {
            $result = $sql->query( "select * from products where id = $pid" );

            if ( $result->num_rows > 0 )
            {
                if ( array_key_exists( $pid, $_SESSION['cart'] ) )
                {
                    $_SESSION['cart'][$pid]++;
                }
                else
                {
                    $_SESSION['cart'][$pid] = 1;
                }
                header( 'location: ./?page=cart' );
            }
            else
            {
                header( 'location: ./?page=cart' );
            }

        }
    }

?>
<h3>ตะกร้าสินค้า</h3>
<hr>
<table class="table table-striped table-bordered text-center table-sm" style="font-size: 14px;">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อชิ้น</th>
            <th>รวม</th>
            <th>ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sum = 0;
            if ( !empty( $_SESSION['cart'] ) )
            {
                $i = 1;
                foreach ( $_SESSION['cart'] as $key => $value )
                {
                    $product = getProduct( $sql, $key );
                    $sum += ( $product['price'] * $value );
                ?>
        <tr>
            <td class="align-middle"><?=$i?></td>
            <td class="align-middle">
                <img style="width:50px;" src="<?=$product['image']?>" alt="<?=$product['product_name']?>">
                <?=$product['product_name']?>
            </td>
            <td class="align-middle"><?=$value?> ชิ้น</td>
            <td class="align-middle"><?=number_format( $product['price'] )?></td>
            <td class="align-middle"><?=number_format( $product['price'] * $value )?></td>
            <td class="align-middle">
                <a class="btn btn-danger btn-sm py-0" href="./?page=cart&pid=<?=$key?>&delete">X</a>
            </td>
        </tr>
        <?php
            $i++;
                }
            }
        ?>
        <tr>
            <td colspan="3">รวมทั้งสิ้น</td>
            <td colspan="3"><?=number_format( $sum, 2 )?> บาท</td>
        </tr>
    </tbody>
</table>
<div class="row justify-content-end">
    <div class="col-6">
        <div class="d-grid gap-2">
            <a class="btn btn-success" href="./?page=checkout">ชำระเงิน</a>
        </div>
    </div>
</div>