<?php
    if(!empty($_SESSION['user_login'])){
        $order_id = $_GET['oid'];

        $result = $sql->query("select * from orders where id = $order_id ");
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();   
?>
        <div class="row">
            <div class="col-12 pt-3">
                <h3>ใบสั่งซื้อ ที่ <?=$row['id']?></h3>
                <hr>
                <p class="mb-0">ผู้ซื้อ : <?=getUserName($sql,$row['customer'])?></p>
                <p class="mb-0">วันที่ซื้อ : <?=$row['order_date']?></p>
                <p class="mb-0">ที่อยู่ : <?=$row['address']?></p>
                <p class="mb-0">โทร : <?=$row['phone']?></p>
                <p class="mb-0">อีเมล : <?=$row['email']?></p>
                <p class="mb-0">สถานะ order : <?=getOrderStatus($row['status'])?></p>
            </div>
            <div class="col-12">
                <h3 class="text-center" >รายการสินค้า</h3>
                <table class="table table-striped table-sm table-bordered text-center">
                    <thead>
                        <tr>
                            <th>รายการ</th>
                            <th>สินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $oid = $row['id'];
                        $product_result = $sql->query("select * from order_products where order_id = $oid");
                        $i = 1;
                        $all_price = 0;
                        while($product = $product_result->fetch_assoc()){
                            $all_price += ($product['amount']*$product['price']);
                        ?>
                        <tr>
                            <td><?=$i?></td>
                            <td class="text-start" ><?=getProduct($sql,$product['product_id'])['product_name']?></td>
                            <td><?=$product['amount']?></td>
                            <td><?=number_format($product['price'],2)?></td>
                            <td><?=number_format($product['amount']*$product['price'],2)?></td>
                        </tr>

                <?php
                        $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
                <h2 class="text-end">รวมมูลค่าทั้งหมด : <span class="text-success" ><?=number_format($all_price,2)?></span> บาท</h2>
            </div>
        </div>
<?php
        }else{
            header('location: ./?page=order_list');
        }
    }else{
        header('location: ./?page=login');
    }

?>