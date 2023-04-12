<?php
    if ( empty( $_SESSION['user_login'] ) )
    {
        $_SESSION['alert'] = ['mode' => 'info', 'msg' => 'กรุณาเข้าสู่ระบบก่อนทำรายการ'];
        echo "<script>window.location.href='./?page=login'</script>";
    }
    else
    {
        if ( isset( $_SESSION['alert'] ) )
        {
        ?>
<div class="alert alert-<?=$_SESSION['alert']['mode']?>"><?=$_SESSION['alert']['msg']?></div>
<?php
    unset( $_SESSION['alert'] );
        }
    ?>
<h1>ยินดีต้อนรับ <?=$_SESSION['user_login']?></h1>
<?php
}
?>