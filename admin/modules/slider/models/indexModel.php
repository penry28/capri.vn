<?php

function checkExistsSlideNum($num_vl) {
    $num = db_num_rows("SELECT * FROM `tbl_slide` WHERE `slide_number` = '{$num_vl}'");
    if($num) return true;
    return false;
}

function addInfoSlide($dataInfoSldie) {
    db_insert("tbl_slide", $dataInfoSldie);
}

function getListSlide() {
    return db_fetch_array("SELECT * FROM `tbl_slide`");
}

function getListSliderPagination($numPerPage) {
    return db_fetch_array("SELECT * FROM `tbl_slide` LIMIT 0, $numPerPage");
}

function getSlideItemById($idSlide) {
    return db_fetch_row("SELECT * FROM `tbl_slide` WHERE `slide_id` = '{$idSlide}'");
}

function updateInfoSlide($dataInfoSlide, $idSlide) {
    return db_update("tbl_slide", $dataInfoSlide, "`slide_id` = '{$idSlide}'");
}