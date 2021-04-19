<?php
    function checkLogin($username, $password) {
        $username = ($username);
        $password = (md5($password));
        $numUser  = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'");
        if($numUser > 0) {
            return true;
        } return false;
    }

    // check user exists to register
    function checkUserExists($email) {
        $email = ($email);
        $numUser = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
        if($numUser > 0) return true;
        return false;
    }

    // check active account 
    function checkUserActive($email) {
        $userItem = db_fetch_row("SELECT `is_active` FROM `tbl_users` WHERE `email` = '{$email}'");
        if($userItem['is_active'] == '1') return true;
        return false;
    }

    // add user
    function addUser($dataUser) {
        db_insert("tbl_users", $dataUser);
    }
?>