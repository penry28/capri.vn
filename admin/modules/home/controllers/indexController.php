<?php
    function construct() {
        load_model('index');
    }

    function indexAction() {
        $dataSendView = [
            "totalMessageSupportAll" => getTotalMessageSupportByStatus(),
            "totalMessageSupportNew" => getTotalMessageSupportByStatus('news'),
            "totalProdCate"          => getTotalProdCate(),
            "totalProd"              => getTotalProd(),
            "totalCateBlog"          => getTotalCateBlog(),
            "totalBlog"              => getTotalBlog(),
            "totalAds"               => getTotalAds(),
            "totalSlideHome"         => getTotalSlideHome()
        ];
        load_view('index', $dataSendView);
    }
