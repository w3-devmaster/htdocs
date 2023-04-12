<?php

$_CONFIG['mysql_host']   = 'localhost';
$_CONFIG['mysql_user']   = 'root';
$_CONFIG['mysql_pwd']    = '';
$_CONFIG['mysql_dbname'] = 'my_shop';

$sql = new mysqli( $_CONFIG['mysql_host'], $_CONFIG['mysql_user'], $_CONFIG['mysql_pwd'], $_CONFIG['mysql_dbname'] );

if ( !$sql )
{
    die( '!! Error Connections to database.' );
}

?>