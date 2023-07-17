<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập hệ thống</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
</head>
<?php
require_once('../vendor/autoload.php');
require_once('../config/database.php');
session_start();
if (isset($_SESSION['loginadmin'])) {
    header('location:index.php');
}

use App\Models\User;


if (isset($_POST['DANGNHAP'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $args = [
            ['email', '=', $username],
            ['roles', '=', 1],
            ['status', '=', 1]
        ];
    } else {
        $args = [
            ['username', '=', $username],
            ['roles', '=', 1],
            ['status', '=', 1]
        ];
    }
    $row = User::where($args)->first();
    if ($row != null) {
        if ($row->password == $password) {
            $_SESSION['loginadmin'] = sha1($username);
            $_SESSION['name'] = $row->name;
            $_SESSION['user_id'] = $row->id;
            $_SESSION['image'] = isset($row->image) ? $row->image : 'z3794551929444_0006ff26437794ff6c182668f9fb512a.jpg';
            header('location:index.php');
        } else {
            $error_login = "Mật khẩu không chính xác";
        }
    } else {
        $error_login = "Tên đăng nhập không tồn tại";
    }
}
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>ĐĂNG NHẬP</b> HỆ THỐNG
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Thông tin đăng nhập</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Email hoặc tên đăng nhập">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu ">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button name="DANGNHAP" type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php if (isset($error_login)) : ?>
                        <div class="input-group mb-3">
                            <div class="text-danger"><?= $error_login; ?></div>
                        </div>
                    <?php endif; ?>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/dist/js/adminlte.min.js"></script>
</body>

</html>