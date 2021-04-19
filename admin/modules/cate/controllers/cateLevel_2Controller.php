<?php
    function construct() {
        load_model('index');
    }

    function listAction() {
        $status = !empty($_GET['status']) ? $_GET['status'] : null;
        $page   = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
        $q      = !empty($_GET['q']) ? $_GET['q'] : null;
        $numPerPage = 10;
        if(!empty($q)) {
            $__listCateLevel_2 = getDataBySearchCateProd(2, $q, $page, $numPerPage)['dataPagePagination'];
            $totalRow          = getDataBySearchCateProd(2, $q, $page, $numPerPage)['totalRow'];
            $totalPage         = ceil($totalRow / $numPerPage);
        } else {
            $__listCateLevel_2 = getListCateByLevelPagination(2, $status, $page, $numPerPage);
            $totalPage = ceil(count(getListCateProdByStatusAndLevel(2, $status)) / $numPerPage);
        }
        $listCateLevel_2 = $__listCateLevel_2;
        $dataSendView = [
            "listCateLevel_2" => $listCateLevel_2,
            "page"            => $page,
            "q"               => $q,
            "status"          => $status,
            "totalPage"       => $totalPage
        ];
        load_view('listCateLevel_2', $dataSendView);
    }

    function addAction() {
        load('lib','validationForm');
        $listCateLevel_1 = getCateByLevel(1);
        if(isset($_POST['add_new_cate_level_2'])) {
            $error = array();
            global $error;
            // check img banner
            if(empty($_POST['banner_img_thumbNail_url'])) {
                $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng chọn banner danh mục</span>";
            } else {
                $imgBanner = $_POST['banner_img_thumbNail_url'];
            }
            // check parent id cate 
            if(empty($_POST['parent_id'])) {
                $error['parent_id'] = "<span class='error'>(*) Bạn vui lòng chọn danh mục cha</span>";
            } else {
                $parent_id = $_POST['parent_id'];
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
            // check desc cate
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
                    "parent_id"        => $parent_id,
                    "created_date"     => $createDate,
                    "creator_id"       => $userId,
                    "level"            => 2,
                    "img_banner"       => $imgBanner,
                    "cate_desc"        => $descCate
                );
                addCategory($data);
                $error['process'] = false;
            }
        }
        $dataSendView = [
            "listCateLevel_1" => $listCateLevel_1
        ];
        load_view('addCateLevel_2', $dataSendView);
    }

    function loadCateById($idCate) {
        return getCateById($idCate);
    }

    function loadNumProdByCateId($idCate) {
        return count(getProdByCateId(2,$idCate));
    }

    function updateAction() {
        $idCate = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
        $cateItem = getCateById($idCate);
        $listCateLevel_1 = getCateByLevel(1);
        $dataSendView = [
            "cateItem" => $cateItem,
            "listCateLevel_1" => $listCateLevel_1
        ];
        load('lib','validationForm');
        if(isset($_POST['update_new_cate_level_2_btn'])) {
            $error = array();
            global $error;
            // check img banner
            if(empty($_POST['banner_img_thumbNail_url'])) {
                $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng chọn banner danh mục</span>";
            } else {
                $imgBanner = $_POST['banner_img_thumbNail_url'];
            }
            // check parent id cate 
            if(empty($_POST['parent_id'])) {
                $error['parent_id'] = "<span class='error'>(*) Bạn vui lòng chọn danh mục cha</span>";
            } else {
                $parent_id = $_POST['parent_id'];
            }
            // check title banner
            if(empty($_POST['title_cate'])) {
                $error['title_cate'] = "<span class='error'>(*) Không được bỏ trống tên danh mục</span>";
            } else {
                $titleCate = $_POST['title_cate'];
            }
            // check desc cate
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
                $userId = getInfoUser("user_id");
                $dataInfoUpdateCate = array(
                    "title_cate"       => $titleCate,
                    "status_current"   => $status,
                    "parent_id"        => $parent_id,
                    "update_date"      => $updateDate,
                    "img_banner"       => $imgBanner,
                    "cate_desc"        => $descCate
                );
                updateCategory($dataInfoUpdateCate, $idCate);
                $error['process'] = false;
            }
        }
        load_view('updateCateLevel_2', $dataSendView);
    }
?>