<?php

function addInfoPolicy($dataInfoPolicy) {
    db_insert("tbl_policy", $dataInfoPolicy);
}

function getListPolicyPagination($numPerPage) {
    return db_fetch_array("SELECT * FROM `tbl_policy` LIMIT 0,$numPerPage");
}

function getPolicyItemById($idPolicy) {
    return db_fetch_row("SELECT * FROM `tbl_policy` WHERE `policy_id` = '{$idPolicy}'");
}

function updateInfoPolicy($dataInfoPolicy, $idPolicy) {
    return db_update("tbl_policy", $dataInfoPolicy, "`policy_id` = '{$idPolicy}'");
}