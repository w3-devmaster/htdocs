<?php
    session_start();
    include_once 'config/config.php';
    include_once 'config/functions.php';

    if ( isset( $_GET['logout'] ) )
    {
        session_destroy();
        echo "<script>window.location.href='./'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow">
        <div class="container-md">
            <a class="navbar-brand" href="./">My Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=all_products">สินค้าทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=cart">ตะกร้าสินค้า</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php
                        if ( empty( $_SESSION['user_login'] ) )
                        {
                        ?>
                    <li class="nav-item">
                        <a href="?page=register" class="nav-link">ลงทะเบียน</a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=login" class="nav-link">เข้าสู่ระบบ</a>
                    </li>
                    <?php
                        }
                        else
                        {
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?=$_SESSION['user_login']?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                if ( getAdmin( $sql, $_SESSION['user_login'] ) )
                                    {
                                    ?>
                            <li><a class="dropdown-item" href="./?page=dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="./?page=category">หมวดหมู่สินค้า</a></li>
                            <li><a class="dropdown-item" href="./?page=products">จัดการสินค้า</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php
                                }
                                    else
                                    {
                                    ?>
                            <li><a class="dropdown-item" href="./?page=order_list">ประวัติการสั่งซื้อ</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php
                                }
                                ?>
                            <li><a class="dropdown-item" href="./?logout">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-md">
        <?php
            if ( isset( $_SESSION['alert'] ) )
            {
            ?>
        <div class="alert alert-<?=$_SESSION['alert']['mode']?>"><?=$_SESSION['alert']['msg']?></div>
        <?php
            unset( $_SESSION['alert'] );
            }
        ?>
        <?php
    if ( isset( $_GET['page'] ) )
    {
        $path = 'pages/' . $_GET['page'] . '.php';
        if ( file_exists( $path ) )
        {
            include_once $path;
        }
        else
        {
            include_once 'pages/home.php';
        }
    }
    else
    {
        include_once 'pages/home.php';
    }
   
?>
    </div>
    <div class=""></div>

</body>

</html>