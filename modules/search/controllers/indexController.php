<?php

use function JmesPath\search;

function construct() {
    load_model('index');
}

function getURLAction() {
    load('helper','string');
    $strSearch = trim($_GET['strSearch']);
    echo "search/?q=" . preg_replace('([\s]+)', '+', escape_string($strSearch));
}

function indexAction()
{
    $q = escape_string($_GET['q']);
    $searchResult = [];
    if(strlen($q) > 0) {
        $keyWordType  = keywordClassification($q);
        $searchResult = searchData($keyWordType);
    } else {
        $searchResult = getListProd();
    }
    $listCate = getListCateByProd($searchResult);
    $listBlogReadMost = getListBlogReadMost(8);
    $productNewAdded  = getProductsNewAdded(10);
    $totalProduct     = getTotalProd();
    $dataSendView = [
        "keywordSearch"    => $q,
        "searchResult"     => $searchResult,
        "listCate"         => $listCate,
        "listBlogReadMost" => $listBlogReadMost,
        "productNewAdded"  => $productNewAdded,
        "totalProduct"     => $totalProduct
    ];
    load_view('index', $dataSendView);
}

function keywordClassification($q) {
    $result = [];
    if(checkProduct($q)) {
        $result = [
            "type" => "product",
            "q"    => $q
        ];
    } else {
        if(checkProductCate($q)) {
            $result = [
                "type"   => "product_cate",
                "q"      => $q,
                "idCate" => getCateItemByTitle($q)['id_cate'],
                "level"  => getCateItemByTitle($q)['level'],
            ];
        } else {
            $result = [
                "type" => "product_total",
                "q"    => $q
            ];
        }
    }
    return $result;
}

function getCateItemByIdController($idCate) {
    return getCateItemByIdModel($idCate);
}

function recommentSearchAction() {
    $q = escape_string($_GET['strSearch']);
    $searchResult = [];
    if(strlen($q) > 0) {
        $keyWordType  = keywordClassification($q);
        $searchResult = searchData($keyWordType);
    } else {
        $searchResult = getListProd();
    }
    echo json_encode($searchResult);
}