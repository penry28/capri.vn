<?php

function getCateItemById($id) {
    return db_fetch_row("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$id}'");
}

function getListShowroom() {
    return db_fetch_array("SELECT `showroom_name`,`showroom_address`,`showroom_phone_1`,`showroom_phone_2`,`showroom_email` FROM `tbl_showroom` WHERE `status_current` = 'publish'");
}

function getCateByLevelAndParentId($level, $parent_id) {
    return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `level` = '$level' AND `parent_id` = '$parent_id'");
}

function getProductsSellWellByCateId($cateId, $level, $limit) {
    if($level == 1) {
        $fieldLevel = "cate_level_1_id";
    } else {
        $fieldLevel = "cate_level_2_id";
    }
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `{$fieldLevel}` = '{$cateId}' AND `product_typical` = '1' ORDER BY `create_date` DESC LIMIT 0, $limit");
}

function getProductsNewAdded($cateId, $level, $limit)
{
    if ($level == 1) {
        $fieldLevel = "cate_level_1_id";
    } else {
        $fieldLevel = "cate_level_2_id";
    }
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `{$fieldLevel}` = '{$cateId}' ORDER BY `create_date` DESC LIMIT 0, $limit");
}

function loadProductByCateId($id_cate, $level) {
    if ($level == 1) {
        $fieldLevel = "cate_level_1_id";
    } else {
        $fieldLevel = "cate_level_2_id";
    }
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `{$fieldLevel}` = '{$id_cate}' ORDER BY `sold` DESC");
}

function getListBlogReadMost($limit) {
    return db_fetch_array("SELECT `blog_id`,`blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish' ORDER BY `blog_views` DESC LIMIT 0, $limit");
}

function getCateItemByIdModel($idCate) {
    return db_fetch_row("SELECT `id_cate`,`title_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$idCate}'");
}

function getListCateByLevel($level) {
    return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `level` = '{$level}'");
}

function getListBlogMostLove($limit) {
    return db_fetch_array("SELECT `blog_id`,`blog_title`,`blog_img` FROM `tbl_blog` WHERE `status_current` = 'publish' AND num_love != 0 ORDER BY `num_love` DESC LIMIT 0, $limit");
}