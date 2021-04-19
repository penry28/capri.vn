<?php
function construct() {
    load_model('index');
}

function indexAction() {
    @$idProd = (int)$_GET['id'];
    @$listProfileProd        = loadProfileProductById($idProd);
    @$cateLevel_1Item        = loadCateById($listProfileProd['cate_level_1_id']);
    @$cateListChild          = loadListCate(2, $cateLevel_1Item['id_cate']);
    @$listImgDesc            = getListImgDescByIdProduct($listProfileProd['id_product']);
    @$productRecomment       = listProductByCateLevel($listProfileProd['cate_level_1_id'], $listProfileProd['cate_level_2_id'], $idProd);
    @$listInfoShowroom       = getListShowroom();
    @$listInfoSupportProd    = getListInfoSupportProd();

    $listBlog = [];
    if(!empty($listProfileProd['list_id_blog_relative'])) {
        $listBlogIdArray = json_decode($listProfileProd['list_id_blog_relative']);
        $i = 0;
        foreach($listBlogIdArray as $blogIdItem) {
            $listBlog[$i] = getBlogItemById($blogIdItem);
            $i++;
        }
    }

    $dataSendView = array(
        "listProfileProd"     => $listProfileProd,
        "cateLevel_1Item"     => $cateLevel_1Item,
        "cateListChild"       => $cateListChild,
        "listImgDesc"         => $listImgDesc,
        "similarProduct"      => $productRecomment['similarProduct'],
        "relativeProduct"     => $productRecomment['relativeProduct'],
        "listBlog"            => $listBlog,
        "listInfoShowroom"    => $listInfoShowroom,
        "listInfoSupportProd" => $listInfoSupportProd
    );
    load_view('index', $dataSendView);
}

function loadCateById($id) {
    return getCateById($id);
}

function supportAction() {
    $type = !empty($_GET['type']) ? $_GET['type'] : 0;
    $infoSupportProd  = null;
    $titleInfoSupport = null;
    switch($type) {
        case 'trung-tam-bao-hanh': {
            $infoSupportProd  = getInfoSupportProd('content_service_center');
            $titleInfoSupport = "Trung Tâm Bảo Hành";
            $baseURL = base_url("ho-tro/trung-tam-bao-hanh.html");
            break;
        }
        case 'thong-tin-van-chuyen': {
            $infoSupportProd  = getInfoSupportProd('content_shipping_information');
            $titleInfoSupport = "Thông Tin Vận Chuyển";
            $baseURL = base_url("ho-tro/thong-tin-van-chuyen.html");
            break;
        }
        case 'huong-dan-thanh-toan': {
            $infoSupportProd  = getInfoSupportProd('content_payment_guide');
            $titleInfoSupport = "Hướng Dẫn Thanh Toán";
            $baseURL = base_url("ho-tro/huong-dan-thanh-toan.html");
            break;
        }
    }
    $dataSendView = [
        "infoSupportProd"  => $infoSupportProd,
        "titleInfoSupport" => $titleInfoSupport,
        "baseURL"          => $baseURL
    ];
    load_view('support', $dataSendView);
}

function getCateItemByIdController($idCate) {
    return getCateItemByIdModel($idCate);
}