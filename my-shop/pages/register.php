<div class="row">
    <div class="col-md-6 col-12 mx-auto mt-3">
        <?php
            if ( !empty( $_SESSION['user_login'] ) )
            {
                echo "<script>window.location.href='./?page=dashboard'</script>";
            }

            if ( isset( $_SESSION['alert'] ) )
            {
            ?>
        <div class="alert alert-<?=$_SESSION['alert']['mode']?>"><?=$_SESSION['alert']['msg']?></div>
        <?php
            unset( $_SESSION['alert'] );
            }
        ?>
    </div>
    <div class="col-12"></div>
    <div class="col-md-6 col-12 mx-auto mt-3">
        <div class="card shadow">
            <div class="card-header">
                ลงทะเบียนลูกค้า
            </div>
            <div class="card-body">
                <form action="backend/signup.php" method="post">
                    <div class="form-group mb-3">
                        <label for="name">ชื่อ-สกุล</label>
                        <input id="name" name="name" class="form-control form-control-sm" type="text" required placeholder="ชื่อ และ นามสกุล">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">ชื่อผู้ใช้</label>
                        <input id="username" name="username" class="form-control form-control-sm" type="text" required placeholder="Username">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">รหัสผ่าน</label>
                        <input id="password" name="password" class="form-control form-control-sm" type="password" required placeholder="Password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="re_password">ยืนยันรหัสผ่าน</label>
                        <input id="re_password" name="re_password" class="form-control form-control-sm" type="password" required placeholder="Password">
                    </div>
                    <hr>
                    <div class="d-grid gap-2">
                        <input class="btn btn-success btn-sm" type="submit" value="ลงทะเบียน">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>