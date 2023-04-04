<?php

function hello()
{
    echo 'Hello World!';
}

function calc( $x, $y ) /// การรับ เรียกว่า Parameter
{
    echo $x + $y;
}

// calc( 100, 200 ); // การส่ง เรียกว่า Argument
// echo '<br>';
// calc( 500, 653 );
/////////////////////////////////////////////////////////////////////

function area( $w, $l )
{
    return $w * $l;
}

// $a = area( 400, 200 );

// $b = area( 20, 46 );

// echo $a + $b;

function percent( $val, $val2 = 50, $max = 100 )
{
    $a = $val * $max / $val2;

    return $a;
}

echo percent( 50, 100, 1000 );
?>