<?php

    function isLogin() {
        if(!empty($_SESSION['is_login'])) {
            return true;
        } return false;
    }

    function getInfoUser($field="username") {
        if(!empty($_SESSION['is_login'])) {
            $numUser = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$_SESSION["is_login"]}'");
            if($numUser > 0) {
                $userItem = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$_SESSION["is_login"]}'");
                if(array_key_exists($field, $userItem)) {
                    return $userItem[$field];
                }
            }
        }
    }   
?>