<?php
function construct() {
    load_model('index');
}


function loginAction() {
    load('lib', 'validationForm');
    if (isset($_POST['signup_submit'])) {
        $error = array();
        global $error;
        // check username
        if (empty($_POST['username'])) {
            $error['username'] = "<span class='error'>(*) Vui lòng không bỏ trống</span>";
        } else {
            if (!(strlen($_POST['username']) >= 6 && strlen($_POST['username']) <= 32)) {
                $error['username'] = "<span class='error'>(*) Số ký tự phải >= 5 và <= 32</span>";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = "<span class='error'>(*) Tên đăng nhập không hợp lệ</span>";
                } else {
                    $username = $_POST['username'];
                }
            }
        };

        // check passwrod
        if(empty($_POST['password'])) {
            $error['password'] = "<span class='error'>(*) Vui lòng không bỏ trống password</span>";
        } else {
            if(!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "<span class='error'>(*) Số ký tự phải >=5 và <=32</span>";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = "<span class='error'>(*) Password không hợp lệ</span>";
                } else {
                    $password = $_POST['password'];
                }
            }
        }

        // check user login
        if(empty($error)) {
            if(checkLogin($username, $password)) {
                if(!empty($_POST['remember_me'])) {
                    setcookie('is_login', $username, time() + 1800);
                }
                $_SESSION['is_login'] = $username;
                redirect('?');
            } else {
                $error['loginProcess'] = "<span class='error'>(*) Username or Password không chính xác</span>";
            }
        }
    }
    load_view('login');
}

function logOutAction() {
    unset($_SESSION['is_login']);
    setcookie('is_login', getInfoUser('username'), time() - 1800);
    redirect("?mod=users&action=login");
}