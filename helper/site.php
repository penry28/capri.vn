<?php

function getCatalogue() {
    return db_fetch_row("SELECT `catalogue_title`, `catalogue_link`, `catalogue_banner`, `catalogue_year` FROM `tbl_catalogue` WHERE `publish_status` = '1'");
}

function getListBlog() {
    return db_fetch_array("SELECT `blog_id`,`blog_title`,`blog_img`, `blog_desc` FROM `tbl_blog` WHERE `status_current` = 'publish' ORDER BY `blog_views` DESC");
}

function loadListCate($level, $parent_id) {
    return getCate($level, $parent_id);
}

function getCate($level, $parent_id) {
    return db_fetch_array("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `level` = '{$level}' AND `parent_id` = '{$parent_id}'");
}

function getListPolicy() {
    return db_fetch_array("SELECT `policy_id`, `policy_title` FROM `tbl_policy` WHERE `status_current` = 'publish'");
}

function getListSlide() {
    return db_fetch_array("SELECT `slide_img` FROM `tbl_slide` WHERE `status_current` = 'publish' ORDER BY `slide_number` DESC");
}

function listInfoShowroom() {
    return db_fetch_array("SELECT `showroom_name`,`showroom_address`,`showroom_phone_1`,`showroom_phone_2`,`showroom_email` FROM `tbl_showroom` WHERE `status_current` = 'publish'");
}

function getListBlogCateHeader() {
    return db_fetch_array("SELECT `blogCate_id`,`blogCate_title` FROM `tbl_blogcate` WHERE `status_current` = 'publish'");
}

function getInfoSystem() {
    $data = db_fetch_array("SELECT * FROM `tbl_system`");
    if(!empty($data)) return $data[0];
    return [];
}

function getListAdsByType($type) {
    return db_fetch_array("SELECT `ads_id`,`ads_title`,`ads_img`,`ads_link` FROM `tbl_ads` WHERE `status_current` = 'publish' AND `{$type}` = '1'");
}

function getListProductSupport() {
    return db_fetch_array("SELECT * FROM `tbl_supportprod`")[0];
}