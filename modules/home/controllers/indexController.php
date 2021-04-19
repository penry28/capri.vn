<?php
    function construct() {
        load_model('index');
    }

    function indexAction() {
        $listCate          = getListCateLimit(3, 1);
        $listTotalCate     = getListTotalCate(1);
        $blogNewPosted     = getListBlogNewPosted(2);
        $blogHighlight     = getListBlogHighLight();
        $listCateHighlight = getListCateHightLight();
        $productTypical    = getListProductsTypical();
        @$listInfoShowroom = getListShowroom();
        foreach($blogNewPosted as $key => $blogItem) {
            if(!empty($blogItem['cate_prod_id']) && !empty(getProductCateById($blogItem['cate_prod_id']))) {
                $blogItem['prodCate'] = getProductCateById($blogItem['cate_prod_id'])[0];
                $blogNewPosted[$key] = $blogItem;
            }
        }
        $dataSendView   = [
            "listCate"          => $listCate,
            "listTotalCate"     => $listTotalCate,
            "blogNewPosted"     => $blogNewPosted,
            "blogHighlight"     => $blogHighlight,
            "listCateHighlight" => $listCateHighlight,
            "productTypical"    => $productTypical,
            "listInfoShowroom"  => $listInfoShowroom
        ];
        load_view('index', $dataSendView);
    }

    function loadProdByCate($cateId, $level) {
        $listProd = loadProdByIdCate($cateId, $level);
        return $listProd;
    }

    function getCateItemByIdController($idCate) {
        return getCateItemByIdModel($idCate);
    }

    function sendSupportAction() {
        require "./libraries/sendMail/index.php";
        $infoSendSupport = $_POST['dataInfoSupport'];
        $infoSendSupport['sendDate'] = time();
        if(!empty($infoSendSupport['email'])) {
            $__htmlSendMailCustomer = getHtmlSendMailToCustomer($infoSendSupport);
            $__htmlSendMailStaff    = getHtmlSendMailToStaff($infoSendSupport);
            $dataSendMail = [
                [
                    "email"    => $infoSendSupport['email'],
                    "fullname" => $infoSendSupport['fullname'],
                    "title"    => "Capri thông báo: Phản hồi của bạn tới Capri đã được tiếp nhận.",
                    "content"  => $__htmlSendMailCustomer
                ],
                [
                    "email"    => getInfoSystem()['user_email_reply'],
                    "fullname" => getInfoSystem()['fullname_email_reply'],
                    "title"    => "Capri thông báo: khách hàng {$infoSendSupport['fullname']} muốn được hỗ trợ phản hồi.",
                    "content"  => $__htmlSendMailStaff
                ]
            ];
            $process = send_mail($dataSendMail[0]);
            if($process) {
                $sub_process = send_mail($dataSendMail[1]);
                if($sub_process) {
                    $infoSupport = [
                        "fullname"  => $infoSendSupport['fullname'],
                        "email"     => $infoSendSupport['email'],
                        "phone"     => $infoSendSupport['phone'],
                        "address"   => $infoSendSupport['address'],
                        "content"   => $infoSendSupport['content'],
                        "sent_date" => time(),
                        "type"      => $infoSendSupport['type']
                    ];
                    addInfoSupport($infoSupport);
                    $dataSendAjax = [
                        "status" => "success"
                    ];
                } else {
                    $dataSendAjax = [
                        "status" => "error"
                    ];
                }
            }
        } else {
            $__htmlSendMailStaff    = getHtmlSendMailToStaff($infoSendSupport);
            $dataSendMail = [
                [
                    "email"    => getInfoSystem()['user_email_reply'],
                    "fullname" => getInfoSystem()['fullname_email_reply'],
                    "title"    => "Capri thông báo: khách hàng {$infoSendSupport['fullname']} muốn được hỗ trợ phản hồi.",
                    "content"  => $__htmlSendMailStaff
                ]
            ];
            $process = send_mail($dataSendMail[0]);
            if($process) {
                $infoSupport = [
                    "fullname"  => $infoSendSupport['fullname'],
                    "email"     => $infoSendSupport['email'],
                    "phone"     => $infoSendSupport['phone'],
                    "address"   => $infoSendSupport['address'],
                    "content"   => $infoSendSupport['content'],
                    "sent_date" => time(),
                    "type"      => $infoSendSupport['type']
                ];
                addInfoSupport($infoSupport);
                $dataSendAjax = [
                    "status" => "success"
                ];
            } else {
                $dataSendAjax = [
                    "status" => "error"
                ];
            }
        }
        echo json_encode($dataSendAjax);
    }
?>