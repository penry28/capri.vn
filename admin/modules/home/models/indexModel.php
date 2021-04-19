<?php
function getTotalMessageSupportByStatus($status = '') {
    if(empty($status)) {
        return db_num_rows("SELECT * FROM `tbl_support_custommer`");
    } else {
        return db_num_rows("SELECT * FROM `tbl_support_custommer` WHERE `status` = '{$status}'");
    }
}

function getTotalProdCate() {
    return db_num_rows("SELECT * FROM `tbl_category_products`");
}

function getTotalProd() {
    return db_num_rows("SELECT * FROM `tbl_products`");
}

function getTotalCateBlog() {
    return db_num_rows("SELECT * FROM `tbl_blogcate`");
}

function getTotalBlog() {
    return db_num_rows("SELECT * FROM `tbl_blog`");
}

function getTotalAds() {
    return db_num_rows("SELECT * FROM `tbl_ads`");
}

function getTotalSlideHome() {
    return db_num_rows("SELECT * FROM `tbl_slide`");
}
