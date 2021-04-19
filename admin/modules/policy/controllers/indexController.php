<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $numPerPage = 100;
    $listPolicy = getListPolicyPagination($numPerPage);
    $dataSendView = [
        "listPolicy" => $listPolicy
    ];
    load_view('index', $dataSendView);
}

function addAction() {
    load('lib','validationForm');
    if(isset($_POST['add_new_policy_btn'])) {
        $error = [];
        global $error;

        //check title policy
        if(empty($_POST['title_policy'])) {
            $error['title_policy'] = "<span class='error'>(*) Vui lòng nhập tên chính sách</span>";
        } else {
            $titlePolicy = $_POST['title_policy'];
        }

        //check desc policy
        if(empty($_POST['desc_policy'])) {
            $error['desc_policy'] = "<span class='error'>(*) Vui lòng nhập mô tả chính sách</span>";
        } else {
            $descPlicy = $_POST['desc_policy'];
        }

        // check content policy
        if(empty($_POST['content_policy'])) {
            $error['content_policy'] = "<span class='error'>(*) Vui lòng nhập nội dung chính sách</span>";
        } else {
            $contentPolicy = $_POST['content_policy'];
        }

        // check status
        if(empty($_POST['status_policy'])) {
            $statusPolicy = "pending";
        } else {
            $statusPolicy = $_POST['status_policy'];
        }

        // check error
        if(empty($error)) {
            $createDate = time();
            $creatorId = getInfoUser("user_id");
            $dataInfoPolicy = [
                "policy_title"   => $titlePolicy,
                "policy_content" => $contentPolicy,
                "created_date"   => $createDate,
                "creator_id"     => $creatorId,
                "status_current" => $statusPolicy,
                "policy_desc"    => $descPlicy
            ];
            addInfoPolicy($dataInfoPolicy);
        }
    }
    load_view('add');
}

function updateAction() {
    load('lib','validationForm');
    $idPolicy = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $policyItem = getPolicyItemById($idPolicy);
    $dataSendView = [
        "policyItem" => $policyItem
    ];
    if(isset($_POST['update_new_policy_btn'])) {
        $error = [];
        global $error;

        //check title policy
        if(empty($_POST['title_policy'])) {
            $error['title_policy'] = "<span class='error'>(*) Vui lòng nhập tên chính sách</span>";
        } else {
            $titlePolicy = $_POST['title_policy'];
        }

        //check desc policy
        if(empty($_POST['desc_policy'])) {
            $error['desc_policy'] = "<span class='error'>(*) Vui lòng nhập mô tả chính sách</span>";
        } else {
            $descPlicy = $_POST['desc_policy'];
        }

        // check content policy
        if(empty($_POST['content_policy'])) {
            $error['content_policy'] = "<span class='error'>(*) Vui lòng nhập nội dung chính sách</span>";
        } else {
            $contentPolicy = $_POST['content_policy'];
        }

        // check status
        if(empty($_POST['status_policy'])) {
            $statusPolicy = "pending";
        } else {
            $statusPolicy = $_POST['status_policy'];
        }

        // check error
        if(empty($error)) {
            $updateDate = time();
            $dataInfoPolicy = [
                "policy_title"   => $titlePolicy,
                "policy_content" => $contentPolicy,
                "created_date"   => $updateDate,
                "status_current" => $statusPolicy,
                "policy_desc"    => $descPlicy
            ];
            updateInfoPolicy($dataInfoPolicy, $idPolicy);
        }
    }
    load_view('update', $dataSendView);
}