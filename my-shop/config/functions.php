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
?>