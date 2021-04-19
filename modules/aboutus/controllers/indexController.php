<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $totalInfoAboutUs = getTotalInfoAboutUs();
    $listShowroom = getListShowroom();
    $dataSendView = [
        "totalInfoAboutUs" => $totalInfoAboutUs,
        "listShowroom"     => $listShowroom
    ];
    load_view('index', $dataSendView);
}