<?php

// for ( $i = 1; $i <= 10; $i++ )
// {
//     echo 'เลข ' . $i . '<br>';
// }

// $a = 2;

// while ( $a < 1 )
// {
//     echo 'Number : ' . $a . '<br>';
//     $a++;
// }

// do
// {
//     echo 'No. ' . $a . '<br>';
//     $a++;
// } while ( $a < 1 );

// for ( $i = 1; $i <= 12; $i++ )
// {
//     echo '2 x ' . $i . ' = ' . $i * 2;
//     echo '<br>';
// }

for ( $i = 2; $i <= 24; $i++ )
{
    if ( $i > 4 )
    {
        break;
    }

    echo 'สูตรคูณแม่ ' . $i;
    echo '<br>';

    for ( $x = 1; $x <= 12; $x++ )
    {
        echo $i . ' x ' . $x . ' = ' . $i * $x;
        echo '<br>';
    }
    echo '<hr>';
}

?>