<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $status     = !empty($_GET['status']) ? $_GET['status'] : null;
    $page       = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
    $q          = !empty($_GET['q']) ? $_GET['q'] : null;
    $numPerPage = 10;
    if(!empty($q)) {
        $__listProdSearch = getDataBySearch($q);
        $pageStart = (int)($page-1) * $numPerPage;
        if(count(($__listProdSearch)) >= $numPerPage) {
            $listDatePagination = [];
            $maxNumPerPage = $pageStart + $numPerPage;
            $numPage = 0;
            for($i=$pageStart ; $i<count($__listProdSearch);$i++) {
                $numPage ++;
            }            
            if($numPage <= $numPerPage) {
                $maxNumPerPage = count($__listProdSearch);
            }
            for($i = $pageStart ; $i < $maxNumPerPage; $i++) {
                $listDatePagination[$i] = $__listProdSearch[$i];
            }
            $__listProd = $listDatePagination;
        } else {
            $__listProd = $__listProdSearch;
        }
        $totalPage = ceil(count($__listProdSearch) / $numPerPage);
        $listTotalProd = $__listProdSearch;
    } else {
        $__listProd = getProductPagination($status, $page, $numPerPage);
        $totalPage = ceil(count(getListProdByStatus($status)) / $numPerPage);
        $listTotalProd   = getListProdByStatus();
    }
    $listCateLevel_1 = getCateByLevel(1);
    $listCateLevel_2 = getCateByLevel(2);
    $dataSendView = [
        "listProd"        => $__listProd,
        "listCateLevel_1" => $listCateLevel_1,
        "listCateLevel_2" => $listCateLevel_2,
        "listTotalProd"   => $listTotalProd,
        "page"            => $page,
        "q"               => $q,
        "status"          => $status,
        "totalPage"       => $totalPage
    ];
    load_view('index', $dataSendView);
}

function getDataBySearch($q) {
    $q = escape_string($q);
    $searchResult = [];
    if(strlen($q) > 0) {
        $keyWordType  = keywordClassification($q);
        $searchResult = searchData($keyWordType);
    } else {
        $searchResult = getListProd();
    }
    return $searchResult;
}

function addAction() {
    load('lib','validationForm');
    $listCate = getCate(1,0);
    $listCateLevel_2 = getCateByLevel(2);
    $listBlog = getBlog();
    $dataSendView = [
        "listCate" => $listCate,
        "listBlog" => $listBlog,
        "listCateLevel_2" => $listCateLevel_2
    ];
    if(isset($_POST['addProdSubmit'])) {
        $error = array();
        global $error;
        // check name product
        if(empty($_POST['title_product'])){
            $error['title_product'] = "<span class='error'>(*) Bạn vui lòng nhập tên sản phẩm</span>";
        } else {
            $title_product = $_POST['title_product'];
        }

        // check module product
        if(empty($_POST['module_product'])) {
            $error['module_product'] = "<span class='error'>(*) Vui lòng nhập module của sản phẩm</span>";
        } else {
            $module_product = $_POST['module_product'];
        }

        // check price capri
        if(empty($_POST['price_product'])) {
            $price_product = null;
        } else {
            $price_product = $_POST['price_product'];
        }

        // check price_old_product
        if(empty($_POST['price_old_product'])) {
            $price_old_product = null;
        } else {
            $price_old_product = $_POST['price_old_product'];
        }

        // check amout
        if(empty($_POST['amout_product'])) {
            $amout_product = null;
        } else {
            $amout_product = $_POST['amout_product'];
        }

        // check hire_purchase
        $hire_purchase = $_POST['hire_purchase'][0];

        // check stop sell
        $stop_sell = $_POST['stop_sell'][0];
            
        // check vote type
        if (empty($_POST['vote_type'])) {
            $vote_type = null;
        } else {
            $vote_type = $_POST['vote_type'];
        }

        // check num custom vote
        if(empty($_POST['num_custom_vote'])) {
            $num_custom_vote = 20;
        } else {
            $num_custom_vote = $_POST['num_custom_vote'];
        }

        // desc short
        if(empty($_POST['desc_short'])) {
            $desc_short = null;
        } else {
            $desc_short = $_POST['desc_short'];
        }

        // check avatar
        if(empty($_POST['avatar_main'])) {
            $error['avatar_main'] = "<span class='error'>(*) Bạn chưa chọn ảnh sản phẩm</span>";
        } else {
            $avatar_main = $_POST['avatar_main'];
        }

        // check list img-desc
        if(!empty($_POST['imgDesc'])) {
            $listImgDesc = array();
            $listImgDesc = $_POST['imgDesc'];
        } else {
            $listImgDesc = [];
        }

        // check list value key
        // ===== ##### ===== START BASIC ===== ##### ===== //
        if(empty($_POST['info_basic_prod'])) {
            $infoBasicProd = null;
        } else {
            $infoBasicProd = $_POST['info_basic_prod'];
        }
        // ===== ##### ===== END BASIC ===== ##### ===== //

        // ===== ##### ===== START FUTURE ===== ##### ===== //
        if(empty($_POST['info_feature_prod'])) {
            $infoFeatureProd = null;
        } else {
            $infoFeatureProd = $_POST['info_feature_prod'];
        }
        // ===== ##### ===== END FUTURE ===== ##### ===== //
        if(empty($_POST['info_specifications_prod'])) {
            $infoSpecificationsProd = null;
        } else {
            $infoSpecificationsProd = $_POST['info_specifications_prod'];
        }
        // ===== ##### ===== START SPECIFICATIONS ===== ##### ===== //
        
        // ===== ##### ===== END SPECIFICATIONS ===== ##### ===== //

        // check desc main
        if(empty($_POST['prod_desc_main'])) {
            $error['prod_desc_main'] = "<span class='error'>(*) Nhập thông tin mô tả sản phẩm</span>";
        } else {
            $prod_desc_main = $_POST['prod_desc_main'];
        }

        // check cate id cate level 1 
        if(empty($_POST['cate_level_1'])) {
            $error['cate_level_1'] = "<span class='error'>(*) Chọn danh mục cấp 1</span>";
            echo $_POST['cate_level_1'];
        } else {
            $cate_level_1 = $_POST['cate_level_1'];
        }

        if(empty($_POST['cate_level_2'])) {
            $cate_level_2 = null;
        } else {
            $cate_level_2 = $_POST['cate_level_2'];
        }

        // check status
        if(empty($_POST['status'])) {
            $status = "pending";
        } else {
            $status = "publish";
        }

        // check list id blog relative
        if(empty($_POST['blogRelative'])) {
            $listIdBlogRelative = null;
        } else {
            $listIdBlogRelative = json_encode($_POST['blogRelative']);
        }

        // check product exists
        if(checkProductExists($_POST['module_product'], $_POST['cate_level_2'])) {
            $error['productExists'] = "<span class='error'>(*) Sản phẩm này đã tồn tại</span>";
        }

        if(empty($error)) {
            $createDate = time();
            $creatorId = getInfoUser("user_id");
            $dataInfoProd = array(
                "title_product"            => $title_product,
                "avatar"                   => $avatar_main,
                "module_product"           => $module_product,
                "capri_price"              => $price_product,
                "market_price"             => $price_old_product,
                "amount"                   => $amout_product,
                "hire_purchase"            => $hire_purchase,
                "stop_sell"                => $stop_sell,
                "vote_type"                => $vote_type,
                "num_custom_vote"          => $num_custom_vote,
                "desc_short"               => $desc_short,
                "info_basic_prod"          => $infoBasicProd,
                "info_feature_prod"        => $infoFeatureProd,
                "info_specifications_prod" => $infoSpecificationsProd,
                "desc_main"                => $prod_desc_main,
                "cate_level_1_id"          => $cate_level_1,
                "cate_level_2_id"          => $cate_level_2,
                "status_current"           => $status,
                "list_id_blog_relative"    => $listIdBlogRelative,
                "create_date"              => $createDate,
                "creator_id"               => $creatorId,
            );
            $idProduct = addProduct($dataInfoProd);
            if(!empty($idProduct)) {
                if(!is_array($listImgDesc)) {
                    $listImgDesc = [];
                }
                $dataInfoImgDescProd = array(
                    "listImgDesc" => $listImgDesc,
                    "idProduct"   => $idProduct
                );
                if(!empty($dataInfoImgDescProd['listImgDesc'])) {
                    addImgDescProd($dataInfoImgDescProd);
                }
            }
        }
    }
    load_view('add', $dataSendView);
}

function uploadImgAvatarAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir     = "public/uploads/product/";
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

function uploadMultiImgAvatarAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $numFileImg = count($_FILES['file']['name']);
        $targetDir = "public/uploads/product/";
        $NumFileUploadSuccess = 0;
        $listUrlImg = array();
        for($i=0; $i<$numFileImg;$i++) {
            $justNameFile  = create_slug(pathinfo($_FILES['file']['name'][$i], PATHINFO_FILENAME));
            $justExtenFile = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
            $targetFile    = $targetDir . $justNameFile . '.' .$justExtenFile;
            if(file_exists($targetFile)) {
                $nameFileNew = $justNameFile . " - Copy.";
                $pathFileNew = $targetDir . $nameFileNew . $justExtenFile;
                $countFile = 1;
                while(file_exists($pathFileNew)) {
                    $nameFileNew = $justNameFile . " - Copy({$countFile}).";
                    $pathFileNew = $targetDir . $nameFileNew . $justExtenFile;
                    $countFile ++;
                }
                $targetFile = $pathFileNew;
            }
            if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $targetFile)) {
                $listUrlImg[$i] = $targetFile;
                $NumFileUploadSuccess ++;
            } 
        }
        if($NumFileUploadSuccess == $numFileImg) {
            $dataSendAjax = array(
                "status" => "success",
                "listUrlImg" => $listUrlImg
            );
        } else {
            $dataSendAjax = array(
                "status" => "error"
            );
        }
        echo json_encode($dataSendAjax);
    }
}

function loadListBlogByCateIdAction() {
    $cateId = $_POST['cateId'];
    $listBlog = getListBlogByCateId($cateId);
    echo json_encode(["listBlog" => $listBlog]);
}

function loadBlogBytitleAction() {
    $strSearch = $_POST['strSearch'];
    $listBlog = getListBlogByTitle($strSearch);
    echo json_encode(["listBlog" => $listBlog]);
}

function cateItemById($idCate) {
    return getCateItemById($idCate);
}

function updateAction() {
    $id = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    load('lib','validationForm');
    $productItem = getProductItemById($id);
    $listImgDesc = getListImgDescByIdProduct($id);
    $cateProdLevel_1 = getCateByLevel(1);
    $cateProdLevel_2 = getCateByLevel(2);
    $listBlogRelative = [];
    if(!empty($productItem['list_id_blog_relative'])) {
        $prodBlogJson = json_decode($productItem['list_id_blog_relative']);
        foreach($prodBlogJson as $blogIdItem) {
            $listBlogRelative[] = getBlogItemById($blogIdItem);
        }
    }
    $dataSendView = [
        "productItem"            => $productItem,
        "listImgDesc"            => $listImgDesc,
        "cateProdLevel_1"        => $cateProdLevel_1,
        "cateProdLevel_2"        => $cateProdLevel_2,
        "listBlogRelative"       => $listBlogRelative
    ];
    if(isset($_POST['updateProdSubmit'])) {
        $error = [];
        global $error;
        // check title_product
        if(!empty($_POST['title_product'])) {
            $error = array();
            global $error;
            // check name product
            if(empty($_POST['title_product'])){
                $error['title_product'] = "<span class='error'>(*) Vui lòng nhập tên sản phẩm</span>";
            } else {
                $title_product = $_POST['title_product'];
            }
    
            // check module product
            if(empty($_POST['module_product'])) {
                $error['module_product'] = "<span class='error'>(*) Vui lòng nhập module của sản phẩm</span>";
            } else {
                $module_product = $_POST['module_product'];
            }
    
            // check price capri
            if(empty($_POST['price_product'])) {
                $price_product = null;
            } else {
                $price_product = $_POST['price_product'];
            }
    
            // check price_old_product
            if(empty($_POST['price_old_product'])) {
                $price_old_product = null;
            } else {
                $price_old_product = $_POST['price_old_product'];
            }
    
            // check amout
            if(empty($_POST['amout_product'])) {
                $amout_product = null;
            } else {
                $amout_product = $_POST['amout_product'];
            }
                
            // check hire_purchase
            $hire_purchase = $_POST['hire_purchase'][0];
            // check stop sell
            $stop_sell = $_POST['stop_sell'][0];

            // check vote type
            if (empty($_POST['vote_type'])) {
                $vote_type = null;
            } else {
                $vote_type = $_POST['vote_type'];
            }
    
            // check num custom vote
            if(empty($_POST['num_custom_vote'])) {
                $num_custom_vote = 20;
            } else {
                $num_custom_vote = $_POST['num_custom_vote'];
            }
    
            // desc short
            if(empty($_POST['desc_short'])) {
                $desc_short = null;
            } else {
                $desc_short = $_POST['desc_short'];
            }
    
            // check avatar
            if(empty($_POST['avatar_main'])) {
                $error['avatar_main'] = "<span class='error'>(*) Bạn chưa chọn ảnh sản phẩm</span>";
            } else {
                $avatar_main = $_POST['avatar_main'];
            }
    
            // check list img-desc
            if(!empty($_POST['imgDesc'])) {
                $listImgDesc = array();
                $listImgDesc = $_POST['imgDesc'];
            } else {
                $listImgDesc = [];
            }
    
            // check list value key
            // ===== ##### ===== START BASIC ===== ##### ===== //
            if(empty($_POST['info_basic_prod'])) {
                $infoBasicProd = null;
            } else {
                $infoBasicProd = $_POST['info_basic_prod'];
            }
            // ===== ##### ===== END BASIC ===== ##### ===== //
    
            // ===== ##### ===== START FUTURE ===== ##### ===== //
            if(empty($_POST['info_feature_prod'])) {
                $infoFeatureProd = null;
            } else {
                $infoFeatureProd = $_POST['info_feature_prod'];
            }
            // ===== ##### ===== END FUTURE ===== ##### ===== //
    
            // ===== ##### ===== START SPECIFICATIONS ===== ##### ===== //
            if(empty($_POST['info_specifications_prod'])) {
                $infoSpecificationsProd = null;
            } else {
                $infoSpecificationsProd = $_POST['info_specifications_prod'];
            }
            // ===== ##### ===== END SPECIFICATIONS ===== ##### ===== //
    
            // check desc main
            if(empty($_POST['prod_desc_main'])) {
                $error['prod_desc_main'] = "<span class='error'>(*) Nhập thông tin mô tả sản phẩm</span>";
            } else {
                $prod_desc_main = $_POST['prod_desc_main'];
            }
    
            // check cate id cate level 1 
            if(empty($_POST['cate_level_1'])) {
                $error['cate_level_1'] = "<span class='error'>(*) Chọn danh mục cấp 1</span>";
                echo $_POST['cate_level_1'];
            } else {
                $cate_level_1 = $_POST['cate_level_1'];
            }
    
            if(empty($_POST['cate_level_2'])) {
                $cate_level_2 = null;
            } else {
                $cate_level_2 = $_POST['cate_level_2'];
            }
    
            // check status
            if(empty($_POST['status'])) {
                $status = "pending";
            } else {
                $status = "publish";
            }
    
            // check list id blog relative
            if(empty($_POST['blogRelative'])) {
                $listIdBlogRelative = null;
            } else {
                $listIdBlogRelative = json_encode($_POST['blogRelative']);
            }
    
            if(empty($error)) {
                $createDate = time();
                $dataInfoUpdateProd = array(
                    "title_product"            => $title_product,
                    "avatar"                   => $avatar_main,
                    "module_product"           => $module_product,
                    "capri_price"              => $price_product,
                    "market_price"             => $price_old_product,
                    "amount"                   => $amout_product,
                    "hire_purchase"            => $hire_purchase,
                    "stop_sell"                => $stop_sell,
                    "vote_type"                => $vote_type,
                    "num_custom_vote"          => $num_custom_vote,
                    "desc_short"               => $desc_short,
                    "info_basic_prod"          => $infoBasicProd,
                    "info_feature_prod"        => $infoFeatureProd,
                    "info_specifications_prod" => $infoSpecificationsProd,
                    "desc_main"                => $prod_desc_main,
                    "cate_level_1_id"          => $cate_level_1,
                    "cate_level_2_id"          => $cate_level_2,
                    "status_current"           => $status,
                    "list_id_blog_relative"    => $listIdBlogRelative,
                    "create_date_update"       => $createDate,
                );
                $process = updateProduct($dataInfoUpdateProd, $id);
                if(!empty($process)) {
                    if(!is_array($listImgDesc)) {
                        $listImgDesc = [];
                    }
                    $dataInfoImgDescProd = array(
                        "listImgDesc" => $listImgDesc,
                        "idProduct"   => $id
                    );
                    if(!empty($dataInfoImgDescProd['listImgDesc'])) {
                        updateImgDescProd($dataInfoImgDescProd);
                    }
                }
            }
        }
    }
    load_view('update', $dataSendView);
}

function getNumProdByTotalStatusAction() {
    $dataSendAjax = [
        "numProdStatusAll"     => count(getListProdByStatus()),
        "numProdStatusPublish" => count(getListProdByStatus('publish')),
        "numProdStatusPending" => count(getListProdByStatus('pending')),
        "numProdStatusTrash"   => count(getListProdByStatus('trash'))
    ];
    echo json_encode($dataSendAjax);
}

function supportAction() {
    load('lib','validationForm');
    $infoSupportProd = getInfoSupportProd();
    $dataSendView = [
        "infoSupportProd" => $infoSupportProd
    ];
    if(isset($_POST['updateInfosupportProd_btn'])) {
        $error = [];
        global $error;
        // check content_service_center
        if(empty($_POST['content_service_center'])) {
            $error['content_service_center'] = "<span class='error'>(*) Vui lòng không bỏ trống nội dung bảo hành</span>";
        } else {
            $content_service_center = $_POST['content_service_center'];
        }

        // check content_shipping_information
        if(empty($_POST['content_shipping_information'])) {
            $error['content_shipping_information'] = "<span class='error'>(*) Vui lòng không bỏ trống nội dung thông tin vận chuyển</span>";
        } else {
            $content_shipping_information = $_POST['content_shipping_information'];
        }

        // check content_payment_guide
        if(empty($_POST['content_payment_guide'])) {
            $error['content_payment_guide'] = "<span class='error'>(*) Vui lòng không bỏ trống thông tin hướng dẫn vận chuyển</span>";
        } else {
            $content_payment_guide = $_POST['content_payment_guide'];
        }

        // check error
        if(empty($error)) {
            $dataInfoSupportProd = [
                "content_service_center"       => $content_service_center,
                "content_shipping_information" => $content_shipping_information,
                "content_payment_guide"        => $content_payment_guide
            ];
            updateInfoSuppportProd($dataInfoSupportProd, $infoSupportProd['id_support']);
        }
    }
    load_view('support', $dataSendView);
}


// choose list product typical
function chooseProdTypicalAction() {
    $listIdProd = $_POST['listCheckArr'];
    $process = setProdTypical($listIdProd);
    if($process) {
        $dataSendAjax = ["status" => "success"];
    } else {
        $dataSendAjax = ["status" => "error"];
    }
    echo json_encode($dataSendAjax);
}


function getNumDataOfStatusAction() {
    $dataSendAjax = [
        "all"     => count(getListProdByStatus()),
        "publish" => count(getListProdByStatus("publish")),
        "pending" => count(getListProdByStatus("pending")),
        "trash"   => count(getListProdByStatus("trash"))
    ];
    echo json_encode($dataSendAjax);
}

// change status
function changeStatusAction() {
    $idProd = $_POST['idEl'];
    $statusCurrent = $_POST['statusCurrent'];
    $statusOld = !empty($_POST['statusOld']) ? $_POST['statusOld'] : null;
    $dataInfoUpdateProd = [
        "status_current" => $statusCurrent,
        "status_old"     => $statusOld
    ];
    $process = updateProduct($dataInfoUpdateProd, $idProd);
    $productItem = getProductItemById($idProd);
    if($process) {
        $dataSendAjax = [
            "status"        => "success",
            "statusCurrent" => $productItem['status_current'],
            "statusOld"     => $productItem['status_old']
        ];
    } else {
        $dataSendAjax = [
            "status"        => "error",
            "statusCurrent" => $productItem['status_current'],
            "statusOld"     => $productItem['status_old']
        ];
    }
    echo json_encode($dataSendAjax);
}


function deleteProdAction() {
    $idProd = $_POST['idProd'];
    $process = handleDeleteProductById($idProd);
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

// recomment search

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


function setUrlSearchProdAction() {
    load('helper','string');
    $strSearch     = trim($_POST['strSearch']);
    $urlPath = "?mod=prod&q=".preg_replace('([\s]+)', '+', escape_string($strSearch))."";
    $dataSendAjax = [
        "urlSearch" => $urlPath
    ];
    echo json_encode($dataSendAjax);
}


