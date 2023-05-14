<?php
session_start();
if ( !empty( $_SESSION['user_login'] ) )
{
    $user = $_SESSION['user_login'];
    include_once '../config/config.php';
    include_once '../config/functions.php';

    if ( getAdmin( $sql, $user ) )
    {
   
        $product_name = trim( $_POST['product_name'] );
        $product_desc = trim( $_POST['product_desc'] );
        $price        = trim( $_POST['price'] );
        $category_id  = trim( $_POST['category_id'] );
        $image        = $_FILES['image'];

        if ( $product_name != '' && $product_desc != '' && is_numeric( $price ) && is_numeric( $category_id ) )
        {
            if ( $image['type'] == 'image/jpeg' || $image['type'] == 'image/png' || $image['type'] == 'image/jpg' )
            {
                $size = ( $image['size'] / 1024 / 1024 ); //  MB
                if ( $size <= 2.00 )
                {
                    $save_dir    = "images/products/" . $image['name'];
                    $save_upload = "../" . $save_dir;

                    if ( file_exists( $save_upload ) )
                    {
                        unlink( $save_upload );
                    }

                    if ( move_uploaded_file( $image['tmp_name'], $save_upload ) )
                    {
                        $result = $sql->query( "insert into products (product_name,product_desc,price,category_id,image,created_at) values ('$product_name','$product_desc',$price,$category_id,'$save_dir',now()) " );

                        if ( $result )
                        {
                            $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'เพิ่มข้อมูลสำเร็จ'];
                            header( 'location: ../?page=products' );
                        }
                        else
                        {
                            $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'การเพิ่มสินค้าล้มเหลว'];
                            header( 'location: ../?page=add_product' );
                        }
                    }
                    else
                    {
                        $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'การอัปโหลดภาพล้มเหลว'];
                        header( 'location: ../?page=add_product' );
                    }
                }
                else
                {
                    $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'ขนาดไฟล์ภาพเกิน 2 MB'];
                    header( 'location: ../?page=add_product' );
                }
            }
            else
            {
                $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'กรุณาอัปโหลดภาพ สกุล jpg หรือ png เท่านั้น'];
                header( 'location: ../?page=add_product' );
            }
        }
        else
        {
            $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง'];
            header( 'location: ../?page=add_product' );
        }
    }
    else
    {
        header( 'location: ../?page=login' );
    }
}
else
{
    header( 'location: ../?page=login' );
}
?>