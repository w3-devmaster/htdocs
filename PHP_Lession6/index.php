<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มการลงทะเบียนเลือกตั้งล่วงหน้า</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        include 'navbar.php';
    ?>

    <div class="container">
        <h2 class="mt-5 text-center">ระบบการลงทะเบียนเลือกตั้งล่วงหน้า</h2>
        <hr>

        <form action="request.php" method="post">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="firstname">ชื่อ</label>
                        <input class="form-control shadow-sm" type="text" name="firstname">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="lastname">นามสกุล</label>
                        <input class="form-control shadow-sm" name="lastname" type="text">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="gender">เพศ</label>
                        <select name="gender" id="gender" class="custom-select shadow-sm">
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <input class="btn btn-success btn-block shadow-sm" type="submit" value="ลงทะเบียน">
                </div>
            </div>
        </form>
    </div>
</body>

</html>