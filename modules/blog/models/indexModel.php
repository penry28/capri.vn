<?php

function getListBlogCateById($idCate = '') {
    if(!empty($idCate)) {
        return db_fetch_array("SELECT `blogCate_id`,`blogCate_title`,`blogCate_img` FROM `tbl_blogcate` WHERE `status_current` = 'publish' AND `blogCate_id` = '{$idCate}'");
    } else {
        return db_fetch_array("SELECT `blogCate_id`,`blogCate_title`,`blogCate_img` FROM `tbl_blogcate` WHERE `status_current` = 'publish'");
    }
}

function getListBlogMostView($limit) {
    return db_fetch_array("SELECT `blog_id`,`blog_title`,`created_date`,`cate_prod_id`,`blog_img`,`blog_desc` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `blog_views` != 0 ORDER BY `blog_views` DESC LIMIT 0, $limit");
}

function getProductCateById($idCate) {
    return db_fetch_array("SELECT `title_cate`,`id_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '$idCate'");
}

function getListBlogTypical($limit) {
    return db_fetch_array("SELECT `blog_id`,`blog_title`,`created_date`,`cate_prod_id`,`blog_img`,`blog_desc` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `typical_post` = '1' ORDER BY `num_love` DESC LIMIT 0,$limit");
}

function getBlogHighLight() {
    return db_fetch_row("SELECT `blog_id`,`blog_title`,`created_date`,`cate_prod_id`,`blog_img`,`blog_desc` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `blog_highlight` = '1'");
}

function getBlogItemById($idBlog) {
    return db_fetch_row("SELECT * FROM `tbl_blog` WHERE `status_current` = 'publish' AND `blog_id` = '$idBlog'");
}

function getListCateRelative($cateIdLevel_2) {
    $cateLevel_2 = db_fetch_row("SELECT `parent_id` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$cateIdLevel_2}'");
    $idCateLevel_1 = $cateLevel_2['parent_id'];
    return db_fetch_array("SELECT `title_cate`,`id_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `parent_id` = '{$idCateLevel_1}'");
}

function updateBlogItem($dataUpdateBlog, $idBlog) {
    return db_update("tbl_blog", $dataUpdateBlog, "`blog_id` = '{$idBlog}'");
}

function getListBlogByBlogCateId($idBlogCate) {
    return db_fetch_array("SELECT * FROM `tbl_blog` WHERE `status_current` = 'publish' AND `blog_parentCate_id` = '{$idBlogCate}'");
}

function getBlogCateItem($idBlogCate) {
    return db_fetch_row("SELECT * FROM `tbl_blogcate` WHERE `status_current` = 'publish' AND `blogCate_id` = '{$idBlogCate}'");
}

function getListProductRelativeBlog($cateIdLevel_2) {
    $cateLevel_2 = db_fetch_row("SELECT `parent_id` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$cateIdLevel_2}'");
    $idCateLevel_1 = $cateLevel_2['parent_id'];
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `cate_level_1_id` = '{$idCateLevel_1}'");
}

function getListBlogMostLove($limit) {
    return db_fetch_array("SELECT `blog_id`,`blog_title`,`blog_img` FROM `tbl_blog` WHERE `status_current` = 'publish' AND num_love != 0 ORDER BY `num_love` DESC LIMIT 0, $limit");
}

function getListBlogRelative($idBlogCate) {
    return db_fetch_array("SELECT `blog_id`, `blog_title`,`blog_img` FROM `tbl_blog` WHERE `status_current` = 'publish' ORDER BY `num_love`,`update_date` DESC");
}