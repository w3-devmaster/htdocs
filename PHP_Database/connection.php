<?php
$host     = 'localhost';
$user     = 'root';
$password = '';
$dbname   = 'my_web';

$conn = mysqli_connect( $host, $user, $password, $dbname );

if ( !$conn )
{
    die( 'Database connect failed : ' . mysqli_connect_error() );
}

?>