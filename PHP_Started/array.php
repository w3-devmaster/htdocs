<?php

$users = ['user1', 'user2', 'user3', 'user4']; // Indexed Array

$cars = ['bmw', 'benz', 'toyota', 'honda']; // Indexed Array

$person = [
    'firstname' => 'apichat',
    'lastname'  => 'kumjensi',
    'gender'    => 'male',
    'age'       => 33,
]; // Assosiative Array

// echo $users[0];
// echo '<br>';
// echo $cars[0];

// echo 'ชื่อ : ' . $person['firstname'] . ' อายุ : ' . $person['age'];

$classroom = [
    'room_no'   => 1,
    'room_name' => 'ป.6',
    'students'  => [
        1 => [
            'name' => 'boss',
        ],
        2 => [
            'name' => 'Jod',
        ],
        3 => [
            'name' => 'cream',
        ],
    ],
]; // Multidimensional Array

echo $classroom['students'][1]['name'];

?>