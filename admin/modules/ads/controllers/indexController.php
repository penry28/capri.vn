<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $numPerPage = 100;
    $listAds = getListAdsPagination($numPerPage);
    $dataSendView = [
        "listAds" => $listAds
    ];
    load_view('index', $dataSendView);
}

function addAction() {
    load('lib','validationForm');
    if(isset($_POST['add_new_ads_btn'])) {
        $error = [];
        global $error;
        // check ads_title
        if(empty($_POST['ads_title'])) {
            $error['ads_title'] = "<span class='error'>(*) Vui lòng nhập tiêu đề quảng cáo</span>";
        } else {
            if(checkTitleAdsExists($_POST['ads_title'])) {
                $error['ads_title'] = "<span class='error'>(*) Tiêu đề quảng cáo này đã tồn tại</span>";
            } else {
                $adsTitle = $_POST['ads_title'];
            }
        }

        // check ads img
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng nhập ảnh quảng cáo</span>";
        } else {
            $bannerImgThumbNailUrl = $_POST['banner_img_thumbNail_url'];
        }

        // check ads ads_link
        if(empty($_POST['ads_link'])) {
            $error['ads_link'] = "<span class='error'>(*) Vui lòng nhập link quảng cáo</span>";
        } else {
            $adsLink = $_POST['ads_link'];
        }

        // check space_product
        if(empty($_POST['space_product'])) {
            $spaceProduct = '0';
        } else {
            $spaceProduct = $_POST['space_product'];
        }

        // check space-productCate
        if(empty($_POST['space_productCate'])) {
            $spaceProductCate = '0';
        } else {
            $spaceProductCate = $_POST['space_productCate'];
        }

        // check space_blog
        if(empty($_POST['space_blog'])) {
            $spaceBlog = '0';
        } else {
            $spaceBlog = $_POST['space_blog'];
        }

        // space_blogCate
        if(empty($_POST['space_blogCate'])) {
            $spaceBlogCate = '0';
        } else {
            $spaceBlogCate = $_POST['space_blogCate'];
        }

        // check status ads
        if(empty($_POST['status_ads'])) {
            $statusAds = "pending";
        } else {
            $statusAds = $_POST['status_ads'];
        }

        // check error
        if(empty($error)) {
            $createDate = time();
            $creatorId = getInfoUser("user_id");
            $dataInfoAds = [
                "ads_img"        => $bannerImgThumbNailUrl,
                "ads_title"      => $adsTitle,
                "ads_link"       => $adsLink,
                "ads_prod"       => $spaceProduct,
                "ads_prodCate"   => $spaceProductCate,
                "ads_blog"       => $spaceBlog,
                "ads_blogCate"   => $spaceBlogCate,
                "status_current" => $statusAds,
                "create_date"    => $createDate,
                "creator_id"     => $creatorId,
            ];
            addInfoAds($dataInfoAds);
        }
    }
    load_view('add');
}

function uploadImgAdsAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir = "public/uploads/ads/";
        $justNameFile  = create_slug(pathinfo($_FILES['file']['name'], PATHINFO_FILENAME));
        $justExtenFile = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $targetFile    = $targetDir . $justNameFile . '.' .$justExtenFile;
        if(file_exists($targetFile)) {
            $getName = $justNameFile;
            $nameFileNew = $getName." - copy.";
            $pathFileNew = $targetDir . $nameFileNew . $justExtenFile;
            $countFile = 1;
            while(file_exists($pathFileNew)) {
                $getName = $justNameFile;
                $nameFileNew = $getName." - copy({$countFile}).";
                $pathFileNew = $targetDir . $nameFileNew . $justExtenFile;
                $countFile ++;
            }
            $targetFile = $pathFileNew;
        }
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            $dataSendAjax = [
                "status" => "success",
                "pathFile" => $targetFile
            ];
        } else {
            $dataSendAjax = [
                "status" => "error",
            ];
        }
        echo json_encode($dataSendAjax);
    }
}

function updateAction() {
    load('lib','validationForm');
    $idAds = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $adsItem = getAdsItemById($idAds);
    $dataSendView = [
        "adsItem" => $adsItem
    ];
    if(isset($_POST['update_new_ads_btn'])) {
        $error = [];
        global $error;
        // check ads_title
        if(empty($_POST['ads_title'])) {
            $error['ads_title'] = "<span class='error'>(*) Vui lòng nhập tiêu đề quảng cáo</span>";
        } else {
            $adsTitle = $_POST['ads_title'];
        }

        // check ads img
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng nhập ảnh quảng cáo</span>";
        } else {
            $bannerImgThumbNailUrl = $_POST['banner_img_thumbNail_url'];
        }

        // check ads ads_link
        if(empty($_POST['ads_link'])) {
            $error['ads_link'] = "<span class='error'>(*) Vui lòng nhập link quảng cáo</span>";
        } else {
            $adsLink = $_POST['ads_link'];
        }

        // check space_product
        if(empty($_POST['space_product'])) {
            $spaceProduct = '0';
        } else {
            $spaceProduct = $_POST['space_product'];
        }

        // check space-productCate
        if(empty($_POST['space_productCate'])) {
            $spaceProductCate = '0';
        } else {
            $spaceProductCate = $_POST['space_productCate'];
        }

        // check space_blog
        if(empty($_POST['space_blog'])) {
            $spaceBlog = '0';
        } else {
            $spaceBlog = $_POST['space_blog'];
        }

        // space_blogCate
        if(empty($_POST['space_blogCate'])) {
            $spaceBlogCate = '0';
        } else {
            $spaceBlogCate = $_POST['space_blogCate'];
        }

        // check status ads
        if(empty($_POST['status_ads'])) {
            $statusAds = "pending";
        } else {
            $statusAds = $_POST['status_ads'];
        }

        // check error
        if(empty($error)) {
            $updateDate = time();
            $dataInfoAds = [
                "ads_img"        => $bannerImgThumbNailUrl,
                "ads_title"      => $adsTitle,
                "ads_link"       => $adsLink,
                "ads_prod"       => $spaceProduct,
                "ads_prodCate"   => $spaceProductCate,
                "ads_blog"       => $spaceBlog,
                "ads_blogCate"   => $spaceBlogCate,
                "status_current" => $statusAds,
                "update_date"    => $updateDate,
            ];
            updateInfoAds($dataInfoAds, $idAds);
        }
    }
    load_view('update', $dataSendView);
}