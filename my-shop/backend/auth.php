<?php
session_start();

if ( !empty( $_POST['username'] ) && !empty( $_POST['password'] ) )
{
    include_once '../config/config.php';
    global $sql;
    $username = trim( $_POST['username'] );
    $password = trim( $_POST['password'] );

    $result = $sql->query( "select * from users where username = '$username' limit 1" );

    if ( $result->num_rows > 0 )
    {
        $row = $result->fetch_assoc();

        if ( $row['password'] == md5( $password ) )
        {
            $_SESSION['alert']      = ['mode' => 'success', 'msg' => 'ยินดีต้อนรับกลับ!!'];
            $_SESSION['user_login'] = $row['username'];
            header( 'location: ../?page=dashboard' );
        }
        else
        {
            $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'รหัสผ่านไม่ถูกต้อง'];
            header( 'location: ../?page=login' );
        }
    }
    else
    {
        $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'ไม่พบข้อมูลผู้ใช้งานนี้'];
        header( 'location: ../?page=login' );
    }
}
else
{
    header( 'location: ../?page=login' );
}
?>