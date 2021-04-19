<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $status = !empty($_GET['status']) ? $_GET['status'] : null;
    $page   = !empty($_GET['page'])   ? $_GET['page']   : 1;
    $q      = !empty($_GET['q'])      ? $_GET['q']      : null;
    $numPerPage = 10;
    if(!empty($q)) {
        $__listBlogCate = getDataBySearchPagination($q, $page, $numPerPage)['searchResult'];
        $totalPage      = ceil((getDataBySearchPagination($q, $page, $numPerPage)['totalRow']) / $numPerPage);
    } else {
        $__listBlogCate = getListBlogCatePagination($status, $page, $numPerPage);
        $totalPage      = ceil(count(getListBlogByStatus($status)) / $numPerPage);
    }
    $listBlogCate = $__listBlogCate;
    $dataSendView = [
        "listBlogCate" => $listBlogCate,
        "page"         => $page,
        "q"            => $q,
        "status"       => $status,
        "totalPage"    => $totalPage
    ];
    load_view('index', $dataSendView);
}

function addAction() {
    load('lib','validationForm');
    if(isset($_POST['add_new_cate_blog'])) {
        $error = [];
        global $error;

        // check img cate blog
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $imgblogCate = null;
        } else {
            $imgblogCate = $_POST['banner_img_thumbNail_url'];
        }

        // check name cate blog
        if(empty($_POST['title_cate'])) {
            $error['title_cate'] = "<span class='error'>(*) Nhập tiêu đề danh mục</span>";
        } else {
            if(checkTitleExist($_POST['title_cate'])) {
                $error['title_cate'] = "<span class='error'>(*) Tên danh mục này đã tồn tại</span>";
            }
            $titleCateBlog = $_POST['title_cate'];
        }

        // check desc cate blog
        if(empty($_POST['desc_cate'])) {
            $descCate = null;
        } else {
            $descCate = $_POST['desc_cate'];
        }

        // check status
        if(empty($_POST['status_cate'])) {
            $status = 'pending';
        } else {
            $status = $_POST['status_cate'];
        }

        if(empty($error)) {
            $createDate = time();
            $creator = getInfoUser("user_id");
            $dataBlogCate = [
                "blogCate_title"     => $titleCateBlog,
                "blogCate_img"       => $imgblogCate,
                "blogCate_desc"      => $descCate,
                "status_current" => $status,
                "created_date"   => $createDate,
                "creator_id"     => $creator
            ];
            addBlogCate($dataBlogCate);
        }
    }
    load_view('add');
}

function uploadImgBannerBlogCateAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir = "public/uploads/blogCate/";
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

function numBlogByCateIdBlog($idCateBlog) {
    return count(getBlogByIdBlogCateId($idCateBlog));
}

function updateAction() {
    $idBlogCate = !empty($_GET['id']) ? (int) $_GET['id'] : 0;
    $blogCateItem = getBlogCateItem($idBlogCate);
    $dataSendView = [
        "blogCateItem" => $blogCateItem
    ];
    load('lib','validationForm');
    if(isset($_POST['update_blog_cate_blog_btn'])) {
        $error = [];
        global $error;
        // check img cate blog
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $imgblogCate = null;
        } else {
            $imgblogCate = $_POST['banner_img_thumbNail_url'];
        }

        // check name cate blog
        if(empty($_POST['title_cate'])) {
            $error['title_cate'] = "<span class='error'>(*) Nhập tiêu đề danh mục</span>";
        } else {
            $titleCateBlog = $_POST['title_cate'];
        }

        // check desc cate blog
        if(empty($_POST['desc_cate'])) {
            $descCate = null;
        } else {
            $descCate = $_POST['desc_cate'];
        }

        // check status
        if(empty($_POST['status_cate'])) {
            $status = 'pending';
        } else {
            $status = $_POST['status_cate'];
        }

        if(empty($error)) {
            $updateDate = time();
            $dataInfoBlogCate = [
                "blogCate_title" => $titleCateBlog,
                "blogCate_img"   => $imgblogCate,
                "blogCate_desc"  => $descCate,
                "status_current" => $status,
                "update_date"    => $updateDate,
            ];
            updateBlogCate($dataInfoBlogCate, $idBlogCate);
        }
    }
    load_view('update', $dataSendView);
}

function getNumDataOfStatusAction() {
    $dataSendAjax = [
        "all"     => count(getListBlogByStatus(null)),
        "publish" => count(getListBlogByStatus("publish")),
        "pending" => count(getListBlogByStatus("pending")),
        "trash"   => count(getListBlogByStatus("trash"))
    ];
    echo json_encode($dataSendAjax);
}

function changeStatusAction() {
    $idBlogCate    = $_POST['idEl'];
    $statusCurrent = $_POST['statusCurrent'];
    $statusOld     = !empty($_POST['statusOld']) ? $_POST['statusOld'] : null;
    $dataInfoUpdateBlogCate = [
        "status_current" => $statusCurrent,
        "status_old"     => $statusOld
    ];
    $process = updateBlogCate($dataInfoUpdateBlogCate, $idBlogCate);
    $blogCateItem = getBlogCateItem($idBlogCate);
    if($process) {
        $dataSendAjax = [
            "status"        => "success",
            "statusCurrent" => $blogCateItem['status_current'],
            "statusOld"     => $blogCateItem['status_old']
        ];
    } else {
        $dataSendAjax = [
            "status"        => "error",
            "statusCurrent" => $blogCateItem['status_current'],
            "statusOld"     => $blogCateItem['status_old']
        ];
    }
    echo json_encode($dataSendAjax);
}

function deleteBlogCateAction() {
    $idBlogCate = $_POST['idCateBlog'];
    $process = handleDeleteBlogCateById($idBlogCate);
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
    $searchResult = getSearchBlogCateByTitle($strSearch);
    $dataSendAjax = [
        "searchResult" => $searchResult
    ];
    echo json_encode($dataSendAjax);
}

function setUrlSearchBlogCateAction() {
    load('helper','string');
    $strSearch     = trim($_POST['strSearch']);
    $urlPath = "?mod=blogCate&q=".preg_replace('([\s]+)', '+', escape_string($strSearch))."";
    $dataSendAjax = [
        "urlSearch" => $urlPath
    ];
    echo json_encode($dataSendAjax);
}