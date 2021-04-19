<?php

function getListProd() {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish'");
}

function getListProdBySearch($q) {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `title_product` LIKE '%{$q}%'");
}

function checkProduct($q) {
    $num = db_num_rows("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `title_product` LIKE '%{$q}%'");
    if($num > 0) return true;
    return false;
}

function checkProductCate($q) {
    $num = db_num_rows("SELECT * FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `title_cate` LIKE '%{$q}%'");
    if($num > 0) return true;
    return false;
}

function getCateItemByTitle($q) {
    return db_fetch_row("SELECT `id_cate`,`level` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `title_cate` LIKE '%{$q}%'");
}

function searchData($keyWordType) {
    $q = $keyWordType['q'];
    if($keyWordType['type'] == 'product') {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `title_product` LIKE '%{$q}%'");
    } else if($keyWordType['type'] == 'product_cate') {
        if($keyWordType['level'] == '1') {
            $typeCate = 'cate_level_1_id';
        } else {
            $typeCate = 'cate_level_2_id';
        }
        $idCate = $keyWordType['idCate'];
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND $typeCate = '{$idCate}'");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish'");
    }
}

function getListCateByProd($searchResult) {
    $listCate = [];
    foreach($searchResult as $prodItem) {
        $idCate = $prodItem['cate_level_1_id'];
        $cateItem = getCateById($idCate);
        if(!in_array($cateItem, $listCate)) {
            $listCate[] = $cateItem;
        }
    }
    return $listCate;
}

function getCateById($idCate) {
    return db_fetch_row("SELECT `id_cate`,`title_cate`,`img_banner` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$idCate}'");
}


function getListBlogReadMost($limit) {
    return db_fetch_array("SELECT `blog_id`,`blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish' ORDER BY `blog_views` DESC LIMIT 0, $limit");
}

function getCateItemByIdModel($idCate) {
    return db_fetch_row("SELECT `id_cate`,`title_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$idCate}'");
}

function getProductsNewAdded($limit) {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' ORDER BY `create_date` DESC LIMIT 0,$limit");
}

function getTotalProd() {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish'");
}