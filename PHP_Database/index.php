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
    <div class="mainDiv">
        <?php
            if ( isset( $_GET['msg'] ) )
            {
                if ( $_GET['msg'] == 'success' )
                {
                    echo '<h3 class="success" >เพิ่มข้อมูลสำเร็จ</h3>';
                }
                elseif ( $_GET['msg'] == 'failed' )
                {
                    echo '<h3 class="error" >มีข้อผิดพลาด</h3>';
                }
            }
        ?>
        <a href="users-list.php">ดูข้อมูลสมาชิก</a>
        <form action="connection.php" method="post">
            <h2>กรอกข้อมูลส่วนตัว</h2>
            <table>
                <tr>
                    <th width="25%">ชื่อ</th>
                    <td><input id="firstname" name="firstname" type="text" required></td>
                </tr>
                <tr>
                    <th width="25%">นามสกุล</th>
                    <td><input id="lastname" name="lastname" type="text" required></td>
                </tr>
                <tr>
                    <th width="25%">อีเมล</th>
                    <td><input id="email" name="email" type="email" required></td>
                </tr>
                <tr>
                    <th width="25%">ที่อยู่</th>
                    <td>
                        <textarea name="address" id="address" cols="30" rows="10">

                        </textarea>
                    </td>
                </tr>
                <tr>
                    <th width="25%">เพศ</th>
                    <td>
                        <select name="gender" id="gender" required>
                            <option selected disabled value>เลือกเพศ</option>
                            <option value="0">ชาย</option>
                            <option value="1">หญิง</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="25%">วันเดือนปี เกิด</th>
                    <td>
                        <input id="birthdate" name="birthdate" type="date" required>
                    </td>
                </tr>
                <tr>
                    <th>เพิ่มข้อมูล</th>
                    <td>
                        <input type="submit" value="เพิ่มข้อมูล">
                    </td>
                </tr>
            </table>

            <!-- <div class="input-group">
                <label for="firstname">ชื่อ</label>

            </div>
            <div class="input-group">
                <label for="lastname">นามสกุล</label>
                <input id="lastname" name="lastname" type="text">
            </div>
            <div class="input-group">
                <label for="email">อีเมล</label>
                <input id="email" name="email" type="email">
            </div> -->
        </form>
    </div>
</body>

</html>