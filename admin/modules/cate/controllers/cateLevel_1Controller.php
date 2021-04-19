<?php
function construct() {
    load_model('index');
}

function listAction() {
    $status = !empty($_GET['status']) ? $_GET['status']     : null;
    $page   = !empty($_GET['page'])   ? (int) $_GET['page'] : 1;
    $q      = !empty($_GET['q'])      ? $_GET['q']          : null;
    $numPerPage = 10;
    if(!empty($q)) {
        $__listCateLevel_1 = getDataBySearchCateProd(1, $q, $page, $numPerPage)['dataPagePagination'];
        $totalRow          = getDataBySearchCateProd(1, $q, $page, $numPerPage)['totalRow'];
        $totalPage         = ceil($totalRow / $numPerPage);
    } else {
        $__listCateLevel_1 = getListCateByLevelPagination(1, $status, $page, $numPerPage);
        $totalPage = ceil(count(getListCateProdByStatusAndLevel(1, $status)) / $numPerPage);
    }
    $listCateLevel_1 = $__listCateLevel_1;
    $dataSendView = [
        "listCateLevel_1" => $listCateLevel_1,
        "page"            => $page,
        "q"               => $q,
        "status"          => $status,
        "totalPage"       => $totalPage
    ];
    load_view('listCateLevel_1', $dataSendView);
}

function addAction() {
    load('lib','validationForm');
    if(isset($_POST['add_new_cate_level_1'])) {
        $error = array();
        global $error;
        // check img banner
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng chọn ảnh cho danh mục sản phẩm</span>";
        } else {
            $imgBanner = $_POST['banner_img_thumbNail_url'];
        }
        // check title banner
        if(empty($_POST['title_cate'])) {
            $error['title_cate'] = "<span class='error'>(*) Không được bỏ trống tên danh mục</span>";
        } else {
            if(checkTitleCateExist($_POST['title_cate'])) {
                $error['title_cate'] = "<span class='error'>(*) Danh mục này đã tồn tại</span>";
            } else {
                $titleCate = $_POST['title_cate'];
            }
        }
        if(empty($_POST['desc_cate'])) {
            $descCate = null;
        } else {
            $descCate = $_POST['desc_cate'];
        }
        // check status
        if(empty($_POST['status_cate'])) {
            $status = "pending";
        } else {
            $status = $_POST['status_cate'];
        }

        // check error
        if(empty($error)) {
            $createDate = time();
            $userId = getInfoUser("user_id");
            $data = array(
                "title_cate"       => $titleCate,
                "status_current"   => $status,
                "parent_id"        => 0,
                "created_date"     => $createDate,
                "creator_id"       => $userId,
                "level"            => 1,
                "img_banner"       => $imgBanner,
                "cate_desc"        => $descCate
            );
            addCategory($data);
            $error['process'] = false;
        }
    }
    load_view('addCateLevel_1');
}

function loadNumProdByCateId($idCate) {
    return count(getProdByCateId(1,$idCate));
}

function updateAction() {
    $idCate = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $cateItem = getCateById($idCate);
    $dataSendView = [
        "cateItem" => $cateItem
    ];
    load('lib','validationForm');
    if(isset($_POST['update_cate_level_1_btn'])) {
        $error = array();
        global $error;
        // check img banner
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng chọn ảnh cho danh mục sản phẩm</span>";
        } else {
            $imgBanner = $_POST['banner_img_thumbNail_url'];
        }
        // check title banner
        if(empty($_POST['title_cate'])) {
            $error['title_cate'] = "<span class='error'>(*) Không được bỏ trống tên danh mục</span>";
        } else {
            $titleCate = $_POST['title_cate'];
        }
        if(empty($_POST['desc_cate'])) {
            $descCate = null;
        } else {
            $descCate = $_POST['desc_cate'];
        }
        // check status
        if(empty($_POST['status_cate'])) {
            $status = "pending";
        } else {
            $status = $_POST['status_cate'];
        }

        // check error
        if(empty($error)) {
            $updateDate = time();
            $dataInfoUpdateCate = array(
                "title_cate"       => $titleCate,
                "status_current"   => $status,
                "update_date"      => $updateDate,
                "img_banner"       => $imgBanner,
                "cate_desc"        => $descCate
            );
            updateCategory($dataInfoUpdateCate, $idCate);
            $error['process'] = false;
        }
        
    }
    load_view('updateCateLevel_1', $dataSendView);
}

function chooseCateHighlightAction() {
    $listIdCate = $_POST['listCheckArr'];
    $process = setCateHightlight($listIdCate);
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


function setUrlSearchCateProdAction() {
    load('helper','string');
    $strSearch = trim($_POST['strSearch']);
    $urlPath = "?mod=cate&controller=cateLevel_1&action=list&q=".preg_replace('([\s]+)', '+', escape_string($strSearch))."";
    $dataSendAjax = [
        "urlSearch" => $urlPath
    ];
    echo json_encode($dataSendAjax);
}

