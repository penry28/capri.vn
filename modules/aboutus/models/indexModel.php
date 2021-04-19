<?php

function getTotalInfoAboutUs() {
    return db_fetch_row("SELECT * FROM `tbl_aboutus`");
}

function getListShowroom() {
    return db_fetch_array("SELECT `showroom_name`,`showroom_address`,`showroom_phone_1`,`showroom_phone_2`,`showroom_email` FROM `tbl_showroom` WHERE `status_current` = 'publish'");
}