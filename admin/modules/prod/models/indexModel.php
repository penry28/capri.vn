<?php

function checkProductExists($model, $cateLevel_2) {
    $num = db_num_rows("SELECT `id_product` FROM `tbl_products` WHERE `module_product` = '{$model}' AND `cate_level_2_id` = '{$cateLevel_2}'");
    if($num > 0) return true;
    return false;
}

function getCate($level,$parent_id) {
    $listCate = db_fetch_array("SELECT `id_cate`,`title_cate` FROM `tbl_category_products` WHERE `level` = '{$level}' AND `parent_id` = '{$parent_id}'");
    return $listCate;
}

function addProduct($dataInfoProd) {
    $idProduct = db_insert("tbl_products", $dataInfoProd);
    return $idProduct;
}

function addImgDescProd($dataInfoImgDescProd) {
    foreach($dataInfoImgDescProd['listImgDesc'] as $imgItem) {
        $data = array(
            "url" => $imgItem,
            "product_id" => $dataInfoImgDescProd['idProduct']
        );
        db_insert("tbl_img_desc", $data);
    }
}

function getBlog() {
    return db_fetch_array("SELECT `blog_id`, `blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish'");
}

function getCateByLevel($level) {
    return db_fetch_array("SELECT `id_cate`, `title_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `level` = '{$level}'");
}

function getListBlogByCateId($cateId) {
    if($cateId != null) {
        return db_fetch_array("SELECT `blog_id`, `blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `cate_prod_id` = '{$cateId}'");
    } else {
        return db_fetch_array("SELECT `blog_id`, `blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish'");
    }
}

function getListBlogByTitle($strSearch) {
    return db_fetch_array("SELECT `blog_id`, `blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `blog_title` LIKE '%{$strSearch}%'");
}

function getListProdByStatus($status = '') {
    if(!empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = '{$status}'");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_products`");
    }
}

function getCateItemById($idCate) {
    return db_fetch_row("SELECT `title_cate`,`id_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$idCate}'");
}

function getProductItemById($id) {
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `id_product` = '{$id}'");
}

function getListImgDescByIdProduct($id) {
    return db_fetch_array("SELECT `img_id`,`url` FROM `tbl_img_desc` WHERE `product_id` = '{$id}'");
}

function getListInfoProdRelativeByLevel($id, $type) {
    return db_fetch_array("SELECT `info_id`,`info_name`,`info_value` FROM `tbl_total_info` WHERE `product_id` = '{$id}' AND `info_type` = '{$type}'");
}

function getBlogItemById($blogIdItem) {
    return db_fetch_row("SELECT `blog_id`,`blog_title` FROM `tbl_blog` WHERE `blog_id` = '{$blogIdItem}'");
}

function updateProduct($dataInfoUpdateProd, $id) {
    return db_update("tbl_products", $dataInfoUpdateProd, "`id_product` = '{$id}'");
}

function updateImgDescProd($dataInfoImgDescProd) {
    db_delete("tbl_img_desc","`product_id` = '{$dataInfoImgDescProd['idProduct']}'");
    addImgDescProd($dataInfoImgDescProd);
}


function getInfoSupportProd() {
    $listInfoSupportProd = db_fetch_array("SELECT * FROM `tbl_supportprod`");
    if(!empty($listInfoSupportProd)) {
        return $listInfoSupportProd[0];
    } else {
        return [];
    }
}

function updateInfoSuppportProd($dataInfoSupportProd, $id_support) {
    db_update("tbl_supportprod", $dataInfoSupportProd, "`id_support` = '{$id_support}'");
}

function getNumTotalProdByStatus($configStatus) {
    if($configStatus == 'all') {
        return db_num_rows("SELECT `id_product` FROM `tbl_products`");
    } else {
        return db_num_rows("SELECT `id_product` FROM `tbl_products` WHERE `status_current` = '{$configStatus}'");
    }
}

function getListProdByPaginationAndStatus($pageStart, $numPerPage, $configStatus) {
    $statusType = $configStatus != 'all' ? "WHERE `status_current` = '{$configStatus}'" : '';
    return db_fetch_array("SELECT * FROM `tbl_products` {$statusType} LIMIT $pageStart, $numPerPage");
}

// search
function checkProduct($q) {
    $num = db_num_rows("SELECT * FROM `tbl_products` WHERE `title_product` LIKE '%{$q}%'");
    if($num > 0) return true;
    return false;
}

function checkProductCate($q) {
    $num = db_num_rows("SELECT * FROM `tbl_category_products` WHERE `title_cate` LIKE '%{$q}%'");
    if($num > 0) return true;
    return false;
}

function getCateItemByTitle($q) {
    return db_fetch_row("SELECT `id_cate`,`level` FROM `tbl_category_products` WHERE `title_cate` LIKE '%{$q}%'");
}

function searchData($keyWordType) {
    $q = $keyWordType['q'];
    if($keyWordType['type'] == 'product') {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `title_product` LIKE '%{$q}%'");
    } else if($keyWordType['type'] == 'product_cate') {
        if($keyWordType['level'] == '1') {
            $typeCate = 'cate_level_1_id';
        } else {
            $typeCate = 'cate_level_2_id';
        }
        $idCate = $keyWordType['idCate'];
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE $typeCate = '{$idCate}'");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_products`");
    }
}

function getListProd() {
    return db_fetch_array("SELECT * FROM `tbl_products`");
}


function setProdTypical($listIdProd) {
    // resetProdTypical();
    $listProduct = getListProdByStatus();
    foreach($listProduct as $productItem) {
        if(in_array($productItem['id_product'], $listIdProd)) {
            $dataInfoUpdate = [
                "product_typical" => '1'
            ];
            updateProduct($dataInfoUpdate, $productItem['id_product']);
        }
    }
    return true;
}

function resetProdTypical() {
    $listProduct = db_fetch_array("SELECT `id_product` FROM `tbl_products` WHERE `product_typical` = '1'");
    $dataInfoUpdate = [
        "product_typical" => '0'
    ];
    foreach($listProduct as $productItem) {
        updateProduct($dataInfoUpdate, $productItem['id_product']);
    }
}

function handleDeleteProductById($idProd) {
    return db_delete("tbl_products", "`id_product` = '{$idProd}'");
}

function getProductPagination($status, $page, $numPerPage) {
    $pageStart = (int) ($page-1) * $numPerPage;
    if(empty($status)) {
        return db_fetch_array("SELECT * FROM `tbl_products` LIMIT $pageStart, $numPerPage");
    } else {
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = '{$status}' LIMIT $pageStart, $numPerPage");
    }
}