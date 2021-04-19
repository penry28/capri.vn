<?php
function construct() {
    load_model('index');
}

function uploadImgBannerAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir = "public/uploads/category/";
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
        echo json_encode($_FILES);
    }
}

function getCateByLevelAction() {
    $levelCate = $_POST['levelCate'];
    $listCate = getCateByLevel($levelCate);
    $dataSendAjax = ['listCate' => $listCate];
    echo json_encode($dataSendAjax);
}

function loadCateAction() {
    $level = (int)$_POST['level'];
    $parentId = (int)$_POST['parent_id'];
    $listCate = getCate($level, $parentId);
    $dataSendAjax = array(
        "listCate" => $listCate
    );
    echo json_encode($dataSendAjax);
}

function getCateByIdController($cateId) {
    return getCateByIdModel($cateId);
}


function changeStatusAction() {
    $idCate = $_POST['idEl'];
    $statusCurrent = $_POST['statusCurrent'];
    $statusOld = !empty($_POST['statusOld']) ? $_POST['statusOld'] : null;
    $dataInfoUpdateCate = [
        "status_current" => $statusCurrent,
        "status_old"     => $statusOld
    ];
    $process = updateCategory($dataInfoUpdateCate, $idCate);
    $cateItem = getCateById($idCate);
    if($process) {
        $dataSendAjax = [
            "status"        => "success",
            "statusCurrent" => $cateItem['status_current'],
            "statusOld"     => $cateItem['status_old']
        ];
    } else {
        $dataSendAjax = [
            "status"        => "error",
            "statusCurrent" => $cateItem['status_current'],
            "statusOld"     => $cateItem['status_old']
        ];
    }
    echo json_encode($dataSendAjax);
}

function deleteCateProdAction() {
    $idCate = $_POST['idCate'];
    $process = handleDeleteCateProdById($idCate);
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


function getNumDataOfStatusAction() {
    $level = $_POST['level'];
    $dataSendAjax = [
        "all"     => count(getListCateProdByStatusAndLevel($level,'')),
        "publish" => count(getListCateProdByStatusAndLevel($level,"publish")),
        "pending" => count(getListCateProdByStatusAndLevel($level,"pending")),
        "trash"   => count(getListCateProdByStatusAndLevel($level,"trash"))
    ];
    echo json_encode($dataSendAjax);
}


function recommentSearchAction() {
    $strSearch = $_GET['strSearch'];
    $level     = $_GET['level'];
    $dataSendAjax = [
        "searchResult" => searchRecomment($level, $strSearch)
    ];
    echo json_encode($dataSendAjax);
}