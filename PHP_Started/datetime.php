<?php

// echo date( 'Y-m-d y M D' );

// echo "<hr>";

// $birthdate = '1990-09-30';

// // $bt = ;
// $now = time();

// echo date( 'D d M Y', $now );
// include "loops.php";

require 'loops.php';

echo "<hr>";
echo date( 'Y-m-d D H:i:s', strtotime( '+10 years' ) );

?>