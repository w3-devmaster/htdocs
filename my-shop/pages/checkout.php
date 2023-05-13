<?php
    if ( !empty( $_SESSION['user_login'] ) )
    {
        if ( !empty( $_POST['checkout'] ) )
        {
            $address = trim( $_POST['address'] );
            $phone   = $_POST['phone'];
            $email   = trim( $_POST['email'] );

            $products = $_SESSION['cart'];
            $customer = $_SESSION['user_login'];

            $order = $sql->query( "insert into orders (customer,address,phone,email) values ('$customer','$address','$phone','$email') " );

            if ( $order )
            {
                $result   = $sql->query( "select * from orders order by id desc limit 1" );
                $row      = $result->fetch_assoc();
                $order_id = $row['id'];

                foreach ( $products as $key => $value )
                {
                    $product = getProduct( $sql, $key );
                    $price   = $product['price'];

                    $sql->query( "insert into order_products (product_id,order_id,amount,price) values ($key,$order_id,$value,$price) " );
                }

                unset( $_SESSION['cart'] );

                $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'ทำการสั่งซื้อสินค้าสำเร็จ'];
                header( 'location: ./' );
            }
            else
            {
                $_SESSION['alert'] = ['mode' => 'error', 'msg' => 'มีบางอย่างผิดพลาด'];
                header( 'location: ./?page=checkout' );
            }
        }
        else
        {
        ?>
<h3 class="mt-3">ชำระค่าสินค้า</h3>
<hr>
<table class="table table-striped table-bordered text-center table-sm" style="font-size: 14px;">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อชิ้น</th>
            <th>รวม</th>
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
<div class="row">
    <div class="col-md-6 col-12">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga similique quae debitis corrupti reiciendis quos, ad accusamus veritatis vero aperiam incidunt dolorem ipsam minima! Non fugiat repellat incidunt eveniet quibusdam reprehenderit soluta veniam illum consectetur voluptatibus modi nesciunt exercitationem nemo autem, velit necessitatibus voluptate, corrupti ipsum illo dolorem. Libero, doloremque!
    </div>
    <div class="col-md-6 col-12">
        <form action="" method="post">
            <div class="form-group form-group-sm mb-3">
                <label for="address">ที่อยู่จัดส่ง</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="form-group form-group-sm mb-3">
                <label for="phone">เบอร์โทร</label>
                <input oninput="if(this.value*1!=this.value){alert('กรุณากรอกตัวเลขเท่านั้น');this.value=''}" type="text" name="phone" id="phone" class="form-control" required maxlength="10">
            </div>
            <div class="form-group form-group-sm mb-3">
                <label for="email">อีเมล</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <input name="checkout" class="btn btn-success" type="submit" value="ส่งข้อมูล">
        </form>
    </div>
</div>
<?php
    }
    }
    else
    {
        header( 'location: ./?page=login' );
}
?>