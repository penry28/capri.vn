<?php

function loadProdByIdCate($cateId, $level) {
    if($level == 1) {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `cate_level_1_id` = '{$cateId}' ORDER BY `create_date` DESC");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `cate_level_2_id` = '{$cateId}' ORDER BY `create_date` DESC");
    }
}

function getListShowroom() {
    return db_fetch_array("SELECT `showroom_name`,`showroom_address`,`showroom_phone_1`,`showroom_phone_2`,`showroom_email` FROM `tbl_showroom` WHERE `status_current` = 'publish'");
}

function getListCateLimit($limit, $level) {
    return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `level` = '{$level}' LIMIT 0,$limit");
}

function getListTotalCate($level) {
    return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `level` = '{$level}'");
}

function getListBlogNewPosted($limit) {
    return db_fetch_array("SELECT `blog_id`,`blog_title`,`blog_img`,`blog_desc`,`cate_prod_id` FROM `tbl_blog` WHERE `status_current` = 'publish' ORDER BY `created_date` DESC LIMIT 0,$limit");
}

function getProductCateById($idCate) {
    return db_fetch_array("SELECT `title_cate`,`id_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '$idCate'");
}

function getListBlogHighLight() {
    return db_fetch_array("SELECT `blog_id`, `blog_title`, `blog_img` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `client_blog` = '1' ORDER BY `blog_views` DESC");
}

function getListCateHightLight() {
    return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `cate_highlight` = '1'");
}

function getListProductsTypical() {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `product_typical` = '1' ORDER BY `create_date` DESC");
}

function getCateItemByIdModel($idCate) {
    return db_fetch_row("SELECT `id_cate`,`title_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$idCate}'");
}

function addInfoSupport($infoSupport) {
    return db_insert("tbl_support_custommer", $infoSupport);
}