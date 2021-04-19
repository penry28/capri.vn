<?php

function getListMessageSupportByStatus($status = '') {
    if(!empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_support_custommer` WHERE `status` = '{$status}' ORDER BY `sent_date` DESC");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_support_custommer`");
    }
}

function getMessageSupportItemById($id) {
    return db_fetch_row("SELECT * FROM `tbl_support_custommer` WHERE `support_id` = '{$id}' ORDER BY `sent_date` DESC");
}

function updateInfoMessageSupport($infoUpdateStatusMess, $supportId) {
    return db_update("tbl_support_custommer", $infoUpdateStatusMess,"`support_id` = '{$supportId}'");
}

function getListMessageByPagination($status, $page, $numPerPage) {
    $pageStart = (int) ($page - 1) * $numPerPage;
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_support_custommer` LIMIT $pageStart, $numPerPage");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_support_custommer` WHERE `status` = '{$status}' LIMIT $pageStart, $numPerPage");
    }
}

function handleDeleteSupportCustomerById($idSupport) {
    return db_delete("tbl_support_custommer","`support_id` = '{$idSupport}'");
}

function getDataSearchRecomment($strSearch) {
    return db_fetch_array("SELECT * FROM `tbl_support_custommer` WHERE `phone` LIKE '%{$strSearch}%'");
}

function getListSearchByPagination($q, $page, $numPerPage) {
    $pageStart= (int) ($page - 1) * $numPerPage;
    return [
        "rearchResult" => db_fetch_array("SELECT * FROM `tbl_support_custommer` WHERE `phone` LIKE '%{$q}%' LIMIT $pageStart, $numPerPage"),
        "totalRow"     => db_num_rows("SELECT `support_id` FROM `tbl_support_custommer` WHERE `phone` LIKE '%{$q}%'"),
    ];
}