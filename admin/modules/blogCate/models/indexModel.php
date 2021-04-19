<?php

function addBlogCate($dataBlogCate) {
    db_insert("tbl_blogcate", $dataBlogCate);
}

function checkTitleExist($titleBlogCate) {
    $numBlogCate = db_num_rows("SELECT * FROM `tbl_blogcate` WHERE `blogCate_title` = '{$titleBlogCate}'");
    if($numBlogCate > 0) return true;
    return false;
}

function getListBlogCatePagination($status, $page, $numPerPage) {
    $pageStart = (int)($page - 1) * $numPerPage;
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_blogcate` LIMIT $pageStart, $numPerPage");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_blogcate` WHERE `status_current` = '{$status}' LIMIT $pageStart, $numPerPage");
    }
}

function getBlogByIdBlogCateId($idCateBlog) {
    return db_fetch_array("SELECT `blog_id` FROM `tbl_blog` WHERE `blog_parentCate_id` = '{$idCateBlog}'");
}

function getBlogCateItem($idBlogCate) {
    return db_fetch_row("SELECT * FROM `tbl_blogcate` WHERE `blogCate_id` = '{$idBlogCate}'");
}

function  updateBlogCate($dataInfoBlogCate, $idBlogCate) {
    return db_update("tbl_blogcate", $dataInfoBlogCate, "`blogCate_id` = '{$idBlogCate}'");
}

function getListBlogByStatus($status) {
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_blogcate`");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_blogcate` WHERE `status_current` = '{$status}'");
    }
}

function handleDeleteBlogCateById($idBlogCate) {
    return db_delete("tbl_blogcate","`blogCate_id` = '{$idBlogCate}'");
}

function getSearchBlogCateByTitle($strSearch) {
    return db_fetch_array("SELECT * FROM `tbl_blogcate` WHERE `blogCate_title` LIKE '%{$strSearch}%'");
}

function getDataBySearchPagination($q, $page, $numPerPage) {
    $pageStart = (int) ($page-1) * $numPerPage;
    return [
        "searchResult" => db_fetch_array("SELECT * FROM `tbl_blogcate` WHERE `blogCate_title` LIKE '%{$q}%' LIMIT $pageStart, $numPerPage"),
        "totalRow"     => db_num_rows("SELECT `blogCate_id` FROM `tbl_blogcate` WHERE `blogCate_title` LIKE '%{$q}%'")
    ];
}