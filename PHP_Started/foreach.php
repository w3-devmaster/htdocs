<?php

$users = ['user1', 'user2', 'user3', 'user4'];

foreach ( $users as $user )
{
    echo $user . '<br>';
}

echo '<hr>';

$person = [
    'firstname' => 'apichat',
    'lastname'  => 'kumjensi',
    'gender'    => 'male',
    'age'       => 33,
];

foreach ( $person as $key => $value )
{
    echo $key . ' : ' . $value . '<br>';
}

?>