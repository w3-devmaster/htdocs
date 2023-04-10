<?php
function getGender( $gender )
{
    switch ( $gender )
    {
    case '0':
        return 'ชาย';
        break;

    case '1':
        return 'หญิง';
        break;

    default:
        return 'ไม่ทราบ';
        break;
    }
}

function gen_date( $date )
{
    $time = strtotime( $date );

    $date_text = date( 'D d-m', $time ) . '-' . ( (Int) date( 'Y', $time ) + 543 );

    return $date_text;
}
?>