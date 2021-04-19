<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('lib','validationForm');
    $numPerPage = 100;
    $listCatalogue = getListCataloguePagination($numPerPage);
    $dataSendView = [
        "listCatalogue" => $listCatalogue
    ];
    load_view('index', $dataSendView);
}

function addAction() {
    load('lib','validationForm');
    if(isset($_POST['add_new_catalogue'])) {
        $error = array();
        global $error;

        // check title
        if(empty($_POST['title_catalogue'])) {
            $error['title_catalogue'] = "<span class='error'>(*) Nhập title catalogue</span>";
        } else {
            $titleCatalogue = $_POST['title_catalogue'];
        }

        // check banner
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error-catalogue'>(*) Nhập banner catalogue</span>";
        } else {
            $bannerCatalogue = $_POST['banner_img_thumbNail_url'];
        }

        // check link download
        if(empty($_POST['link_download'])) {
            $error['link_download'] = "<span class='error'>(*) Nhập link download catalogue</span>";
        } else {
            $linkDownload = $_POST['link_download'];
        }

        // check year create
        if(empty($_POST['year_created'])) {
            $error['year_created'] = "<span class='error'>(*) Nhập năm xuất bản catalogue</span>";
        } else {
            $yearCreated = $_POST['year_created'];
        }

        // check error
        if(empty($error)) {
            $createDate = time();
            $creatorId  = getInfoUser("user_id");
            $dataCatalogue = [
                "catalogue_title"  => $titleCatalogue,
                "catalogue_link"   => $linkDownload,
                "catalogue_banner" => $bannerCatalogue,
                "catalogue_year"   => $yearCreated,
                "created_date"     => $createDate,
                "creator_id"       => $creatorId
            ];
            addCatalogueNew($dataCatalogue);
        }
    }
    load_view('add');
}

function uploadImgBannerCatalogueAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir = "public/uploads/catalogue/";
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
    $idCatalogue = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $catalogueItem = getCatalogueItemById($idCatalogue);
    $dataSendView = [
        "catalogueItem" => $catalogueItem
    ];
    if(isset($_POST['update_new_catalogue'])) {
        $error = array();
        global $error;

        // check title
        if(empty($_POST['title_catalogue'])) {
            $error['title_catalogue'] = "<span class='error'>(*) Nhập title catalogue</span>";
        } else {
            $titleCatalogue = $_POST['title_catalogue'];
        }

        // check banner
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error-catalogue'>(*) Nhập banner catalogue</span>";
        } else {
            $bannerCatalogue = $_POST['banner_img_thumbNail_url'];
        }

        // check link download
        if(empty($_POST['link_download'])) {
            $error['link_download'] = "<span class='error'>(*) Nhập link download catalogue</span>";
        } else {
            $linkDownload = $_POST['link_download'];
        }

        // check year create
        if(empty($_POST['year_created'])) {
            $error['year_created'] = "<span class='error'>(*) Nhập năm xuất bản catalogue</span>";
        } else {
            $yearCreated = $_POST['year_created'];
        }

        // check error
        if(empty($error)) {
            $updateDate = time();
            $dataCatalogue = [
                "catalogue_title"  => $titleCatalogue,
                "catalogue_link"   => $linkDownload,
                "catalogue_banner" => $bannerCatalogue,
                "catalogue_year"   => $yearCreated,
                "update_date"      => $updateDate,
            ];
            updateCatalogueNew($dataCatalogue, $idCatalogue);
        }
    }
    load_view('update', $dataSendView);
}

function chooseCataloguePublishAction() {
    $idCatalogue = (int)$_POST['idCatalogue'];
    $dataUpdateCatalogue = [
        "publish_status" => "1"
    ];
    resetDataPublishStatus();
    $process = updateCatalogueNew($dataUpdateCatalogue, $idCatalogue);
    if($process) {
        $dataSendAjax = [
            "status" => "success"
        ];
    } else {
         $dataSendAjax = [
             "status" => "error"
         ];
    }
    echo json_encode($dataSendAjax);
}