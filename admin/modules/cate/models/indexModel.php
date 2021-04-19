<?php

function checkTitleCateExist($titleCate) {
    $numRowCate = db_num_rows("SELECT * FROM `tbl_category_products` WHERE `title_cate` = '{$titleCate}'");
    if($numRowCate > 0) {
        return true;
    } return false;
}

function addCategory($data) {
    db_insert("tbl_category_products",$data);
}

function getCateByLevel($levelCate) {
    $listCate = db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `level` = '{$levelCate}'");
    return $listCate;
}

function getCate($level, $parentId) {
    $listCate = db_fetch_array("SELECT `title_cate`,`id_cate` FROM `tbl_category_products` WHERE `level` = '{$level}' AND `parent_id` = '{$parentId}'");
    return $listCate;
}

function getListCateByLevelPagination($level, $status, $page, $numPerPage) {
    $pageStart = (int) ($page - 1) * $numPerPage;
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `level` = {$level} LIMIT $pageStart, $numPerPage");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `level` = {$level} AND `status_current` = '{$status}' LIMIT $pageStart, $numPerPage");
    }
}

function getProdByCateId($level, $idCate) {
    switch($level) {
        case 1: {
            return db_fetch_array("SELECT `id_product` FROM `tbl_products` WHERE `cate_level_1_id` = '{$idCate}'");
        }
        case 2: {
            return db_fetch_array("SELECT `id_product` FROM `tbl_products` WHERE `cate_level_2_id` = '{$idCate}'");
        }
    }
}

function getCateById($idCate) {
    return db_fetch_row("SELECT * FROM `tbl_category_products` WHERE `id_cate` = '{$idCate}'");
}

function updateCategory($dataInfoUpdateCate, $idCate) {
    return db_update("tbl_category_products",$dataInfoUpdateCate,"`id_cate` = '{$idCate}'");
}

function addInfoCateHightLight($dataInfoCateHighlight) {
    return db_insert("tbl_cate_highlight", $dataInfoCateHighlight);
}

function getListCateHightLightPagination($numPerPage) {
    return db_fetch_array("SELECT * FROM `tbl_cate_highlight` LIMIT 0,$numPerPage");
}

function getCateByIdModel($cateId) {
    return db_fetch_row("SELECT `id_cate`,`title_cate` FROM `tbl_category_products` WHERE `id_cate` = '{$cateId}'");
}

function getCateHighLightItemById($idCateHighLight) {
    return db_fetch_row("SELECT * FROM `tbl_cate_highlight`");
}

function updateInfoCateHightLight($dataInfoCateHighlight, $idCateHighLight) {
    return db_update("tbl_cate_highlight", $dataInfoCateHighlight, "`id_cate_highlight` = '{$idCateHighLight}'");
}

function setCateHightlight($listIdCate) {
    resetCateHighlight();
    $listTotalCate = db_fetch_array("SELECT `id_cate` FROM `tbl_category_products` WHERE `level` = '1'");
    $dataUpdateCate = [
        "cate_highlight" => '1'
    ];
    foreach($listTotalCate as $cateItem) {
        if(in_array($cateItem['id_cate'], $listIdCate)) {
            updateCategory($dataUpdateCate, $cateItem['id_cate']);
        }
    }
    return true;
}

function resetCateHighlight() {
    $listCateHightLight = db_fetch_array("SELECT `id_cate` FROM `tbl_category_products` WHERE `level` = '1' AND `cate_highlight` = '1'");
    $dataUpdatecate = [
        "cate_highlight" => "0"
    ];
    foreach($listCateHightLight as $cateItem) {
        updateCategory($dataUpdatecate, $cateItem['id_cate']);
    }
}

function getListCateProdByStatusAndLevel($level, $status = '') {
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `level` = '{$level}'");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `status_current` = '{$status}' AND `level` = '{$level}'");
    }
}

function getDataBySearchCateProd($level, $q, $page, $numPerPage) {
    $pageStart = (int) ($page-1) * $numPerPage;
    return [
        "totalRow"           => db_num_rows("SELECT `id_cate` FROM `tbl_category_products` WHERE `level` = '{$level}' AND `title_cate` LIKE '%{$q}%'"),
        "dataPagePagination" => db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `level` = '{$level}' AND `title_cate` LIKE '%{$q}%' LIMIT $pageStart, $numPerPage")
    ];
}

function searchRecomment($level, $strSearch) {
    return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `level` = '{$level}' AND `title_cate` LIKE '%{$strSearch}%'");
}

function handleDeleteCateProdById($idCate) {
    return db_delete("tbl_category_products","`id_cate` = '{$idCate}'");
}