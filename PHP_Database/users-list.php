<?php
    include 'connection.php';
    include 'functions.php';
    global $conn;

    $sql = 'select * from users order by firstname';

    $result = mysqli_query( $conn, $sql );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <h3>รายชื่อสมาชิกทั้งหมด</h3>
    <table class="usersTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>อีเมล</th>
                <th>เพศ</th>
                <th>วันเกิด</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ( $row = mysqli_fetch_assoc( $result ) )
                {
                ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?=$row['firstname']?></td>
                <td><?=$row['lastname']?></td>
                <td><?=$row['email']?></td>
                <td><?=getGender( $row['gender'] )?></td>
                <td><?=gen_date( $row['birthdate'] )?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>