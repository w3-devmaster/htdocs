<?php
function getAdmin( $sql, $user )
{
    $result = $sql->query( "select * from users where username = '$user' limit 1" );

    $row = $result->fetch_assoc();

    if ( $row['permission'] == 10 )
    {
        return true;
    }

    return false;
}

function getCategoryName( $sql, $cat_id )
{
    $result = $sql->query( "select * from categories where id = $cat_id " );

    $row = $result->fetch_assoc();

    return $row['category_name'];
}

function chkSelect( $pc_id, $cat_id )
{
    return $pc_id == $cat_id ? 'selected' : '';
}

function getProduct( $sql, $pid )
{
    $result = $sql->query( "select * from products where id = $pid " );

    $row = $result->fetch_assoc();

    return $row;
}

function getOrderStatus( $status )
{
    $stat = '';

    switch ( $status )
    {

    case 0:
        $stat = '<span class="text-secondary" >รอการอนุมัติ</span>';
        break;

    case 1:
        $stat = '<span class="text-primary" >รับชำระแล้ว</span>';
        break;

    case 2:
        $stat = '<span class="text-success" >จัดส่งแล้ว</span>';
        break;

    case 3:
        $stat = '<span class="text-danger" >ยกเลิก</span>';
        break;

    default:
        $stat = '<span class="text-secondary" >ไม่ทราบสถานะ</span>';
        break;
    }

    return $stat;
}

function getUserName($sql,$username) {
    $result = $sql->query("select * from users where username = '$username' limit 1");

    $row = $result->fetch_assoc();

    return $row['name'];
}
?>