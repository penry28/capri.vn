<?php
function addBlog($dataBlog) {
    db_insert("tbl_blog", $dataBlog);
}

function getListBlogCate() {
    return db_fetch_array("SELECT `blogCate_id`,`blogCate_title` FROM `tbl_blogcate`");
}

function getListCateByLevel($level) {
    return db_fetch_array("SELECT `id_cate`,`title_cate` FROM `tbl_category_products` WHERE `level` = '{$level}'");
}

function getListProd() {
    return db_fetch_array("SELECT `id_product`, `title_product` FROM `tbl_products`");
}

function getListProductByCateIdLevel2($cateId) {
    return db_fetch_array("SELECT `id_product`, `title_product` FROM `tbl_products` WHERE `cate_level_2_id` = '{$cateId}'");
}

function getListBlogPagination($status, $page, $numPerPage) {
    $pageStart = (int) ($page - 1) * $numPerPage;
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_blog` LIMIT $pageStart, $numPerPage");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_blog` WHERE `status_current` = '{$status}' LIMIT $pageStart, $numPerPage");
    }
}

function getCateBlogById($idCateBlog) {
    return db_fetch_row("SELECT `blogCate_title`,`blogCate_id` FROM `tbl_blogcate` WHERE `blogCate_id` = '{$idCateBlog}'");
}

function getBlogItemById($idBlog) {
    return db_fetch_row("SELECT * FROM `tbl_blog` WHERE `blog_id` = '{$idBlog}'");
}

function updateInfoBlog($dataInfoUpdateBlog, $idBlog) {
    return db_update("tbl_blog", $dataInfoUpdateBlog,"`blog_id` = '{$idBlog}'");
}

function getListBlog() {
    return db_fetch_array("SELECT * FROM `tbl_blog`");
}

function updateAnotherInfoBlog($dataUpdateInfoBlog) {
    $typicalBlogListId   = $dataUpdateInfoBlog['typicalBlogListId'];
    $blogHighlightListId = $dataUpdateInfoBlog['blogHighlightListId'];
    resetDataTypicalAndHighlightBlog();
    foreach($typicalBlogListId as $idBlog) {
        $dataUpdate = [
            "typical_post" => '1'
        ];
        updateInfoBlog($dataUpdate, $idBlog);
    }
    foreach($blogHighlightListId as $idBlog) {
        $dataUpdate = [
            "blog_highlight" => '1'
        ];
        updateInfoBlog($dataUpdate, $idBlog);
    }
}
function resetDataTypicalAndHighlightBlog() {
    $listBLog = db_fetch_array("SELECT `blog_id` FROM `tbl_blog`");
    foreach($listBLog as $blogItem) {
        $dataUpdate = [
            "typical_post"   => '0',
            "blog_highlight" => '0'
        ];
        updateInfoBlog($dataUpdate, $blogItem['blog_id']);
    }
}

function getListBlogByStatus($status = '') {
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_blog`");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_blog` WHERE `status_current` = '{$status}'");
    }
}

function handleDeleteBlogById($idBlog) {
    return db_delete("tbl_blog","`blog_id` = '{$idBlog}'");
}


function getSearchRecommentByTitle($strSearch) {
    return db_fetch_array("SELECT * FROM `tbl_blog` WHERE `blog_title` LIKE '%{$strSearch}%'");
}

function getListBlogByPagination($q, $page, $numPerPage) {
    $pageStart = (int) ($page - 1) * $numPerPage;
    return [
        "rearchResult" => db_fetch_array("SELECT * FROM `tbl_blog` WHERE `blog_title` LIKE '%{$q}%' LIMIT $pageStart, $numPerPage"),
        "totalPage"    => db_num_rows("SELECT * FROM `tbl_blog` WHERE `blog_title` LIKE '%{$q}%'")
    ];
}