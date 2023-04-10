<?php
include 'connection.php';
global $conn;

$firstname = trim( $_POST['firstname'] );
$lastname  = trim( $_POST['lastname'] );
$email     = trim( $_POST['email'] );
$address   = trim( $_POST['address'] );
$gender    = trim( $_POST['gender'] );
$birthdate = trim( $_POST['birthdate'] );

$sql = "insert into users (firstname,lastname,email,address,gender,birthdate,created_at) values ('$firstname','$lastname','$email','$address',$gender,'$birthdate',now()) ";

$result = mysqli_query( $conn, $sql );

if ( $result )
{
    header( "location: ./index.php?msg=success" );
}
else
{
    header( "location: ./index.php?msg=failed" );
}

?>