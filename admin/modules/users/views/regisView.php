<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="./public/css/layout.css">

    <link rel="stylesheet" href="./public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/fonts/aizo-icon.css">
    <title>Document</title>
</head>

<body>
    <div id="app">
        <div id="login-box" style="height: 600px;">
            <div class="left">
                <form action="" method="POST" class="form-register">
                    <h1>Đăng ký</h1>
                    <div class="form-group">
                        <input type="text" name="fullname" placeholder="Họ và tên" autocomplete="off" spellcheck="false" value="<?php echo set_value("fullname") ?>">
                        <?php echo form_error("fullname") ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Tên đăng nhập" autocomplete="off" spellcheck="false" value="<?php echo set_value("username") ?>">
                        <?php echo form_error("username") ?>
                    </div>
                    <div class="form-group" style="position: relative;">
                        <input type="password" name="password" placeholder="Mật khẩu đăng nhập" autocomplete="off" spellcheck="false">
                        <span class="toggle-view-pass" style="position: absolute;">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                        <?php echo form_error("password") ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" placeholder="Số điện thoại" autocomplete="off" spellcheck="false" value="<?php echo set_value("phone") ?>">
                        <?php echo form_error("phone") ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" placeholder="Email của bạn" autocomplete="off" spellcheck="false" value="<?php echo set_value("email") ?>">
                        <?php echo form_error("email") ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" id="title" placeholder="Chức danh nhân viên" autocomplete="off" spellcheck="false" value="<?php echo set_value("title") ?>">
                        <?php echo form_error("title") ?>
                    </div>
                    <div class="form-group">
                        <select type="text" name="gender" id="gender">
                            <option value="">Giới tính</option>
                            <option value="male" <?php if(set_value("gender") == 'male') { echo "selected"; } else { echo null; } ?>>Nam</option>
                            <option value="female" <?php if(set_value("gender") == 'female') { echo "selected"; } else { echo null; } ?>>Nữ</option>
                        </select>
                        <?php echo form_error("gender") ?>
                    </div>
                    <div class="form-group">
                        <select name="permission" id="permission">
                            <option value="">---Quyền của nhân viên---</option>
                            <option value="1" <?php if(set_value("permission") == '1') { echo "selected"; } else { echo null; } ?>>Admin</option>
                            <option value="0" <?php if(set_value("permission") == '0') { echo "selected"; } else { echo null; } ?>>Thành Viên</option>
                        </select>
                        <?php echo form_error("permission") ?>
                    </div>
                    <button type="submit" name="regis_submit" value="Sign me up">Đăng Ký</button>
                    <a href="?mod=users&controler=login&action=login" class="login-view">Đã có tài khoảng ?</a>
                </form>
            </div>
            <div class="right" style="height: 600px;">
                <span class="loginwith">Welcome to<br>CAPRI</span>
            </div>
            <div class="or" style="top: 280px;">OR</div>
        </div>
    </div>
</body>

</html>