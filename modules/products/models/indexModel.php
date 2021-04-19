<?php

function getCateById($id) {
    return db_fetch_row("SELECT * FROM `tbl_category_products` WHERE `id_cate` = '{$id}'");
}

function loadProfileProductById($idProd) {
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `id_product` = '{$idProd}'");
}

function getListImgDescByIdProduct($idProd) {
    return db_fetch_array("SELECT * FROM `tbl_img_desc` WHERE `product_id` = '{$idProd}'");
}

function getTotalInfoProd($typeInfo, $prodId) {
    return db_fetch_array("SELECT * FROM `tbl_total_info` WHERE `info_type` = '{$typeInfo}' AND `product_id` = '{$prodId}'");
}

function listProductByCateLevel($cate_level_1, $cate_level_2, $id_prod) {
    $listProdLevel_2 = db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `cate_level_2_id` = '{$cate_level_2}' AND `id_product` != '{$id_prod}'");
    $listId = [];
    foreach($listProdLevel_2 as $prodItem) {
        $listId[] = $prodItem['id_product'];
    }
    $listProdLevel_1 = db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' AND `cate_level_1_id` = '{$cate_level_1}' AND `id_product` != '{$id_prod}'");
    $relativeProduct = [];
    foreach($listProdLevel_1 as $prodItem) {
        if(!in_array($prodItem['id_product'], $listId)) {
            $relativeProduct[] = $prodItem;
        }
    }
    if(empty($relativeProduct)) {
        $relativeProduct = getNewProductAdded(10);
    }
    return [
        "similarProduct" => $listProdLevel_2,
        "relativeProduct" => $relativeProduct
    ];
}

function getNewProductAdded($limit) {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status_current` = 'publish' ORDER BY `create_date` DESC LIMIT 0,$limit");
    // $listProdNew = [];
    // $temp = [];
    // for ($i=0; $i < count($listProduct) - 1; $i++) {
    //     for ($j=$i + 1; $j < count($listProduct); $j++) {
    //         if((int)$listProduct[$i]['create_date'] < (int)$listProduct[$j]['create_date']) {
    //             $temp            = $listProduct[$i];
    //             $listProduct[$i] = $listProduct[$j];
    //             $listProduct[$j] =  $temp;
    //         }
    //     }
    // }
    // if(count($listProduct) > 10) {
    //     $limit = $limit;
    // } else {
    //     $limit = count($listProduct);
    // }
    // for ($i=0; $i < $limit; $i++) {
    //     $listProdNew[$i] = $listProduct[$i];
    // }
    // return $listProduct;
}

function getBlogItemById($blogIdItem) {
    return db_fetch_row("SELECT `blog_id`, `blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `blog_id` = '{$blogIdItem}'");
}

function getListShowroom() {
    return db_fetch_array("SELECT `showroom_name`,`showroom_address`,`showroom_phone_1`,`showroom_phone_2`,`showroom_email` FROM `tbl_showroom` WHERE `status_current` = 'publish'");
}

function getListInfoSupportProd() {
    $listInfoSupportProd = db_fetch_array("SELECT * FROM `tbl_supportprod`");
    if(!empty($listInfoSupportProd)) {
        return $listInfoSupportProd[0];
    } else {
        return [];
    }
}

function getInfoSupportProd($infoName) {
    return db_fetch_array("SELECT * FROM `tbl_supportprod`")[0][$infoName];
}

function getCateItemByIdModel($idCate) {
    return db_fetch_row("SELECT `id_cate`,`title_cate` FROM `tbl_category_products` WHERE `status_current` = 'publish' AND `id_cate` = '{$idCate}'");
}