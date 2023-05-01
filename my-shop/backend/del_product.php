<?php
session_start();
if ( !empty( $_SESSION['user_login'] ) )
{
    $user = $_SESSION['user_login'];
    include_once '../config/config.php';
    include_once '../config/functions.php';

    if ( getAdmin( $sql, $user ) )
    {
        $pid = $_GET['pid'];

        $p_result = $sql->query( "select * from products where id = $pid limit 1" );

        if ( $p_result->num_rows > 0 )
        {
            $row       = $p_result->fetch_assoc();
            $old_image = $row['image'];

            $del = $sql->query( "delete from products where id = $pid " );

            if ( $del )
            {
                unlink( '../' . $old_image );
                $_SESSION['alert'] = ['mode' => 'success', 'msg' => 'ลบข้อมูลเสร็จสิ้น'];
                header( 'location: ../?page=products' );
            }
            else
            {
                $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'ดำเนินการล้มเหลว'];
                header( 'location: ../?page=products' );
            }
        }
        else
        {
            header( 'location: ../?page=products' );
        }

    }

}