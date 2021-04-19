<?php


function addInfoAds($dataInfoAds) {
    return db_insert("tbl_ads", $dataInfoAds);
}

function checkTitleAdsExists($ads_title) {
    $num = db_num_rows("SELECT `ads_id` FROM `tbl_ads` WHERE `ads_title` = '{$ads_title}'");
    if($num > 0) return true;
    return false;
}

function getListAdsPagination($numPerPage) {
    return db_fetch_array("SELECT * FROM `tbl_ads` LIMIT 0, $numPerPage");
}

function getAdsItemById($idAds) {
    return db_fetch_row("SELECT * FROM `tbl_ads` WHERE `ads_id` = '{$idAds}'");
}

function updateInfoAds($dataInfoAds, $idAds) {
    return db_update("tbl_ads", $dataInfoAds, "`ads_id` = '{$idAds}'");
}