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
?>