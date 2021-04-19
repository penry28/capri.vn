<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $idCate = !empty($_GET['id']) ? (Int)$_GET['id'] : 0;
    $cateItem = getCateItemById($idCate);
    $productsSellWell = getProductsSellWellByCateId($idCate, $cateItem['level'], 10);
    $productNewAdded  = getProductsNewAdded($idCate, $cateItem['level'], 10);
    $listBlogReadMost = getListBlogReadMost(8);
    $listBlogMostLove = getListBlogMostLove(10);
    @$listInfoShowroom = getListShowroom();
    if($cateItem['level'] == 1) {
        $listCateChild = getCateByLevelAndParentId(2, $cateItem['id_cate']);
    } else {
        $listCateChild = [];
    }
    $dataSendView = [
        "cateParent"       => $cateItem,
        "cateChild"        => $listCateChild,
        "productsSellWell" => $productsSellWell,
        "productNewAdded"  => $productNewAdded,
        "listBlogReadMost" => $listBlogReadMost,
        "listBlogMostLove" => $listBlogMostLove,
        "listInfoShowroom" => $listInfoShowroom
    ];
    load_view('index', $dataSendView);
}

function getListProductByCateId($id_cate, $level) {
    return loadProductByCateId($id_cate, $level);
}

function getCateItemByIdController($idCate) {
    return getCateItemByIdModel($idCate);
}

function getCateByLevelAndParentIdController($level, $idCate) {
    return getCateByLevelAndParentId($level, $idCate);
}

function allCateAction() {
    $listCateLevel_1 = getListCateByLevel(1);
    $listBlogReadMost = getListBlogReadMost(8);
    $listBlogMostLove = getListBlogMostLove(10);
    $dataSendView = [
        "listCateLevel_1"  => $listCateLevel_1,
        "listBlogReadMost" => $listBlogReadMost,
        "listBlogMostLove" => $listBlogMostLove
    ];
    load_view('allCate', $dataSendView);
}