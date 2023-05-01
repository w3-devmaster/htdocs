<?php
session_start();
if ( !empty( $_SESSION['user_login'] ) )
{
    $user = $_SESSION['user_login'];
    include_once '../config/config.php';
    include_once '../config/functions.php';

    if ( getAdmin( $sql, $user ) )
    {
        $pid          = $_POST['pid'];
        $product_name = trim( $_POST['product_name'] );
        $product_desc = trim( $_POST['product_desc'] );
        $price        = trim( $_POST['price'] );
        $category_id  = trim( $_POST['category_id'] );
        $hots         = $_POST['hots'];
        $image        = $_FILES['image'];

        if ( $product_name != '' && $product_desc != '' && is_numeric( $price ) && is_numeric( $category_id ) )
        {

            if ( $image['error'] == 0 )
            {

                $p_result  = $sql->query( "select * from products where id = $pid limit 1" );
                $row       = $p_result->fetch_assoc();
                $old_image = $row['image'];

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
                            $result = $sql->query( "update products set product_name = '$product_name' , product_desc = '$product_desc' , price = $price , category_id = $category_id , image = '$save_dir' , hots = $hots where id = $pid " );

                            unlink( '../' . $old_image );

                            $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'บันทึกข้อมูลเสร็จสิ้น'];
                            header( 'location: ../?page=edit_product&pid=' . $pid );
                        }
                        else
                        {
                            $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'การอัปโหลดภาพล้มเหลว'];
                            header( 'location: ../?page=edit_product&pid=' . $pid );
                        }
                    }
                    else
                    {
                        $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'ขนาดไฟล์ภาพเกิน 2 MB'];
                        header( 'location: ../?page=edit_product&pid=' . $pid );
                    }
                }
                else
                {
                    $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'กรุณาอัปโหลดภาพ สกุล jpg หรือ png เท่านั้น'];
                    header( 'location: ../?page=edit_product&pid=' . $pid );
                }
            }
            else
            {
                $result = $sql->query( "update products set product_name = '$product_name' , product_desc = '$product_desc' , price = $price , category_id = $category_id , hots = $hots where id = $pid " );

                if ( $result )
                {
                    $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'บันทึกข้อมูลเสร็จสิ้น'];
                    header( 'location: ../?page=edit_product&pid=' . $pid );
                }
                else
                {
                    $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'บันทึกข้อมูลล้มเหลว'];
                    header( 'location: ../?page=edit_product&pid=' . $pid );
                }
            }

        }
        else
        {
            $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง'];
            header( 'location: ../?page=edit_product&pid=' . $pid );
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