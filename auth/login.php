<?php
require_once "../_config/config.php";
if (isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url()."';</script>";
}else{
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Hafihospital</title>
    <link href="<?=base_url('_assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url('_assets/bakuhantam-icon.png');?>" type="image/x-icon">
</head>

<body>
    <div id="wrapper">
        <div class="container">
            <div align="center" style="margin-top: 210px">
                <?php
                if (isset($_POST['login'])) {
                    $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                    $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                    $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error());
                    if (mysqli_num_rows($sql_login) > 0){
                        $_SESSION['user'] = $user;
                        echo "<script>window.location='".base_url()."';</script>";
                    }else { ?>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class=" alert alert-danger alert-dismissable" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <span class=" glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <strong>Login Gagal</strong> Username / Password salah
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>

                <form action="" method="post" class="navbar-form">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="user" id="" class="form-control" placeholder="Username" required
                            autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input type="password" name="pass" id="" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <input type="submit" value="Login" name="login" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="<?=base_url('_assets/js/jquery.js');?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js');?>"></script>
</body>

</html>
<?php
}
?>