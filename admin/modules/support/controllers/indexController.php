<?php
function construct() {
    load_model('index');
}

function indexAction() {
    $status = !empty($_GET['status']) ? $_GET['status']     : null;
    $page   = !empty($_GET['page'])   ? (int) $_GET['page'] : 1;
    $q      = !empty($_GET['q'])      ? $_GET['q']          : null;
    $numPerPage = 10;
    if(!empty($q)) {
        $__listMessageSupport = getListSearchByPagination($q, $page, $numPerPage)['rearchResult'];
        $totalPage            = ceil(getListSearchByPagination($q, $page, $numPerPage)['totalRow'] / $numPerPage);
    } else {
        $__listMessageSupport = getListMessageByPagination($status, $page, $numPerPage);
        $totalPage            = ceil(count(getListMessageSupportByStatus($status)) / $numPerPage);
    }
    $listMessageSupport = $__listMessageSupport;
    $dataSendView = [
        "listMessageSupport" => $listMessageSupport,
        "page"               => $page,
        "q"                  => $q,
        "status"             => $status,
        "totalPage"          => $totalPage
    ];
    load_view('index', $dataSendView);
}


function infoAction() {
    load('lib','validationForm');
    $id = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $messageSpItem = getMessageSupportItemById($id);
    $dataSendView = [
        "messageSpItem" => $messageSpItem
    ];
    if(isset($_POST['update_info_message_btn'])) {
        $error = [];
        global $error;
        // check status message
        $status    = $_POST['status_mess'];
        $replyDate = $_POST['reply_date'] = time();
        $infoUpdateStatusMess = [
           "status"      => $status,
            "reply_date" => $replyDate
        ];
        updateInfoMessageSupport($infoUpdateStatusMess, $messageSpItem['support_id']);
    }
    load_view('info', $dataSendView);
}

function getNumDataOfStatusAction() {
    $dataSendAjax = [
        "all"   => count(getListMessageSupportByStatus()),
        "news"  => count(getListMessageSupportByStatus("news")),
        "seen"  => count(getListMessageSupportByStatus("seen")),
        "trash" => count(getListMessageSupportByStatus("trash"))
    ];
    echo json_encode($dataSendAjax);
}

function changeStatusAction() {
    $idSupport = $_POST['idEl'];
    $statusCurrent = $_POST['statusCurrent'];
    $statusOld = !empty($_POST['statusOld']) ? $_POST['statusOld'] : null;
    $dataInfoUpdateSupport = [
        "status"         => $statusCurrent,
        "status_old"     => $statusOld
    ];
    $process = updateInfoMessageSupport($dataInfoUpdateSupport, $idSupport);
    $supportItem = getMessageSupportItemById($idSupport);
    if($process) {
        $dataSendAjax = [
            "status"        => "success",
            "statusCurrent" => $supportItem['status'],
            "statusOld"     => $supportItem['status_old']
        ];
    } else {
        $dataSendAjax = [
            "status"        => "error",
            "statusCurrent" => $supportItem['status'],
            "statusOld"     => $supportItem['status_old']
        ];
    }
    echo json_encode($dataSendAjax);
}

function deleteSupportCustomerAction() {
    $idSupport = $_POST['idSupport'];
    $process = handleDeleteSupportCustomerById($idSupport);
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

function recommentSearchAction() {
    $strSearch = $_GET['strSearch'];
    $rearchResult = getDataSearchRecomment($strSearch);
    $dataSendAjax = [
        "rearchResult" => $rearchResult
    ];
    echo json_encode($dataSendAjax);
}

function setUrlSearchSupportAction() {
    load('helper','string');
    $strSearch     = trim($_POST['strSearch']);
    $urlPath = "?mod=support&q=".preg_replace('([\s]+)', '+', escape_string($strSearch))."";
    $dataSendAjax = [
        "urlSearch" => $urlPath
    ];
    echo json_encode($dataSendAjax);
}