<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $id = (int)$_GET['id'];
    $policyItem = getPolicyItemById($id);
    $dataSendView = [
        "policyItem" => $policyItem
    ];
    load_view('index', $dataSendView);
}