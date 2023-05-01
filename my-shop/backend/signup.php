<?php
session_start();

if ( !empty( $_POST['name'] ) && !empty( $_POST['username'] ) && !empty( $_POST['password'] ) && !empty( $_POST['re_password'] ) )
{
    include_once '../config/config.php';
    global $sql;
    $name        = trim( $_POST['name'] );
    $username    = trim( $_POST['username'] );
    $pass        = trim( $_POST['password'] );
    $re_password = trim( $_POST['re_password'] );

    if ( strlen( $username ) >= 4 && strlen( $username ) <= 25 && strlen( $pass ) >= 4 && strlen( $pass ) <= 25 )
    {
        if ( $pass === $re_password )
        {
            $password = md5( $pass );
            $result   = $sql->query( "insert into users (username,password,name,permission,created_at) values ('$username','$password','$name',0,now()) " );

            if ( $result )
            {
                $_SESSION['alert']      = ['mode' => 'success', 'msg' => 'สวัสดีคุณ ' . $name];
                $_SESSION['user_login'] = $username;
                header( 'location: ../?page=dashboard' );
            }
            else
            {
                $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'การลงทะเบียนล้มเหลว'];
                header( 'location: ../?page=register' );
            }
        }
        else
        {
            $_SESSION['alert'] = ['mode' => 'danger', 'msg' => 'รหัสผ่านทั้งสองช่องไม่ตรงกัน'];
            header( 'location: ../?page=register' );
        }
    }
    else
    {
        $_SESSION['alert'] = ['mode' => 'warning', 'msg' => 'กรุณาระบุชื่อผู้ใช้และรหัสผ่าน จำนวน  4-25 ตัวอักษร'];
        header( 'location: ../?page=register' );
    }

}
else
{
    header( 'location: ../?page=register' );
}

?>