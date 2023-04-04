<?php
$a = 10;

$b = 1000;

// if ( $a > $b )
// {
//     echo 'a น้อยกว่า b';
// }
// else
// {
//     echo 'a น้อยกว่าเห็นๆ';
// }

// if ( $b == 300 )
// {
//     echo 'b = 300';
// }
// elseif ( $b == 500 )
// {
//     echo 'b = 500';
// }
// elseif ( $b == 800 )
// {
//     echo 'b = 800';
// }
// elseif ( $b == 1000 )
// {
//     echo 'b = 1000';
// }
// else
// {
//     echo 'b != อะไรเลย';
// }

// Switch PHP
switch ( $b )
{
case 300:
    echo 'b = 300';
    break;

case 1000:
    echo 'b = 1000';
    break;

default:
    echo 'ไม่ตรงเลยนะจ๊ะ';
    break;
}
?>