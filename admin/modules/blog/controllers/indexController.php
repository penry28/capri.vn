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
            $__listBlog = getListBlogByPagination($q, $page, $numPerPage)['rearchResult'];
            $totalPage  = ceil(getListBlogByPagination($q, $page, $numPerPage)['totalPage'] / $numPerPage);

        } else {
            $__listBlog = getListBlogPagination($status, $page, $numPerPage);
            $totalPage  = ceil(count(getListBlogByStatus($status)) / $numPerPage);
        }
        $dataSendView = [
            "listBlog"  => $__listBlog,
            "page"      => $page,
            "q"         => $q,
            "status"    => $status,
            "totalPage" => $totalPage 
        ];
        load_view('index', $dataSendView);
    }

    function addAction() {
        load('lib','validationForm');
        if(isset($_POST['add_new_blog'])) {
            $error = [];
            global $error;

            // check title blog
            if(empty($_POST['title_blog'])) {
                $error['title_blog'] = "<span class='error'>(*) Vui lòng nhập tiêu đề</span>";
            } else {
                $titleBlog = $_POST['title_blog'];
            }

            // check parent cate prod
            if(empty($_POST['cate_prod_id'])) {
                $cateProdId = null;
            } else {
                $cateProdId = $_POST['cate_prod_id'];
            }

            // check product blog id
            if(empty($_POST['product_blog'])) {
                $productBlogId = null;
            } else {
                $productBlogId = $_POST['product_blog'];
            }

            // check img blog
            if(empty($_POST['banner_img_thumbNail_url'])) {
                $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Bạn vui lòng chọn ảnh cho bài viết</span>";
            } else {
                $blogImg = $_POST['banner_img_thumbNail_url'];
            }
            
            // check desc blog
            if(empty($_POST['desc_blog'])) {
                $error['desc_blog'] = "<span class='error'>(*) Vui lòng nhập mô tả bài biết</span>";
            } else {
                $descBlog = $_POST['desc_blog'];
            }

            // check content blog
            if(empty($_POST['blog_content'])) {
                $error['blog_content'] = "<span class='error'>(*) Vui lòng ghi nội dung cho bài viết</span>";
            } else {
                $blogContent = $_POST['blog_content'];
            }

            // check status blog
            if(empty($_POST['status_blog'])) {
                $status = "pending";
            } else {
                $status = $_POST['status_blog'];
            }

            // check blog parent Cate id
            if(empty($_POST['blogCate_id'])) {
                $error['blogCate_id'] = "<span class='error'>(*) Vui lòng chọn danh mục cho bài viết</span>";
            } else {
                $blogCate_id = $_POST['blogCate_id'];
            }

            // check iframe video
            if(empty($_POST['video_intro'])) {
                $video_intro = null;
            } else {
                $video_intro = $_POST['video_intro'];
            }

            if(empty($error)) {
                $createDate = time();
                $creatorId = getInfoUser("user_id");
                $dataBlog = [
                    "blog_title"         => $titleBlog,
                    "cate_prod_id"       => $cateProdId,
                    "product_blog_id"    => $productBlogId,
                    "blog_img"           => $blogImg,
                    "blog_desc"          => $descBlog,
                    "blog_content"       => $blogContent,
                    "blog_parentCate_id" => $blogCate_id,
                    "video_intro"        => $video_intro,
                    "status_current"     => $status,
                    "created_date"       => $createDate,
                    "creator_id"         => $creatorId
                ];
                addBlog($dataBlog);
            }
        }
        $listBlogCate = getListBlogCate();
        $listCateProd = getListCateByLevel(2);
        $listProd     = getListProd();
        $dataSendView = [
            "listBlogCate" => $listBlogCate,
            "listCateProd" => $listCateProd,
            "listProd"     => $listProd
        ];
        load_view('add', $dataSendView);
    }


    
function uploadImgBannerBlogAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir = "public/uploads/blog/";
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

function getListProdCateLevel2Action() {
    $cateId = $_POST['idCate'];
    $listProdByCate = getListProductByCateIdLevel2($cateId);
    echo json_encode($listProdByCate);
}

function loadCateBlogById($idCateBlog) {
    return getCateBlogById($idCateBlog);
}

function updateAction() {
    $idBlog              = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $blogItem            = getBlogItemById($idBlog);
    $listCateProdLevel_2 = getListCateByLevel(2);
    $listProd            = getListProd();
    $listBlogCate        = getListBlogCate();
    $dataSendView = [
        "blogItem"            => $blogItem,
        "listCateProdLevel_2" => $listCateProdLevel_2,
        "listProd"            => $listProd,
        "listBlogCate"        => $listBlogCate
    ];
    load('lib','validationForm');
    if(isset($_POST['update_blog_btn'])) {
        $error = [];
        global $error;
        // check title blog
        if(empty($_POST['title_blog'])) {
            $error['title_blog'] = "<span class='error'>(*) Vui lòng nhập tiêu đề</span>";
        } else {
            $titleBlog = $_POST['title_blog'];
        }

        // check parent cate prod
        if(empty($_POST['cate_prod_id'])) {
            $cateProdId = null;
        } else {
            $cateProdId = $_POST['cate_prod_id'];
        }

        // check product blog id
        if(empty($_POST['product_blog'])) {
            $productBlogId = null;
        } else {
            $productBlogId = $_POST['product_blog'];
        }

        // check img blog
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Bạn vui lòng chọn ảnh cho bài viết</span>";
        } else {
            $blogImg = $_POST['banner_img_thumbNail_url'];
        }
        
        // check desc blog
        if(empty($_POST['desc_blog'])) {
            $error['desc_blog'] = "<span class='error'>(*) Vui lòng nhập mô tả bài biết</span>";
        } else {
            $descBlog = $_POST['desc_blog'];
        }

        // check content blog
        if(empty($_POST['blog_content'])) {
            $error['blog_content'] = "<span class='error'>(*) Vui lòng ghi nội dung cho bài viết</span>";
        } else {
            $blogContent = $_POST['blog_content'];
        }

        // check status blog
        if(empty($_POST['status_blog'])) {
            $status = "pending";
        } else {
            $status = $_POST['status_blog'];
        }

        // check blog parent Cate id
        if(empty($_POST['blogCate_id'])) {
            $error['blogCate_id'] = "<span class='error'>(*) Vui lòng chọn danh mục cho bài viết</span>";
        } else {
            $blogCate_id = $_POST['blogCate_id'];
        }

        // check iframe video
        if(empty($_POST['video_intro'])) {
            $video_intro = null;
        } else {
            $video_intro = $_POST['video_intro'];
        }

        if(empty($error)) {
            $updateDate = time();
            $dataInfoUpdateBlog = [
                "blog_title"         => $titleBlog,
                "cate_prod_id"       => $cateProdId,
                "product_blog_id"    => $productBlogId,
                "blog_img"           => $blogImg,
                "blog_desc"          => $descBlog,
                "blog_content"       => $blogContent,
                "blog_parentCate_id" => $blogCate_id,
                "video_intro"        => $video_intro,
                "status_current"     => $status,
                "update_date"        => $updateDate,
            ];
            updateInfoBlog($dataInfoUpdateBlog, $idBlog);
        }
    }
    load_view('update', $dataSendView);
}

function managerAction() {
    load('lib','validationForm');
    $listBlog = getListBlog();
    $dataSendView = [
        "listBlog" => $listBlog
    ];
    if(isset($_POST['save_manager_btn'])) {
        $error = [];
        global $error;
        // check typical_blog
        if(!empty($_POST['typical_blog'])) {
            $typical_blog_arr = [];
            $typical_blog_arr = $_POST['typical_blog'];
        }
        // check blog_highlight
        if(!empty($_POST['blog_highlight'])) {
            $blog_highlight_arr = [];
            $blog_highlight_arr = $_POST['blog_highlight'];
        }
        if(empty($typical_blog_arr)) {
            $error['typical_blog'] = "<span class='error'>(*) Vui lòng chọn ít nhất một bài viết</span>";
        } else {
            $typicalBlogListId = $typical_blog_arr;
        }
        if(empty($blog_highlight_arr)) {
            $error['blog_highlight'] = "<span class='error'>(*) Vui lòng chọn một bài viết</span>";
        } else {
            $blogHighlightListId = $blog_highlight_arr;
        }
        if(empty($error)) {
            $dataUpdateInfoBlog = [
                "typicalBlogListId"   => $typicalBlogListId,
                "blogHighlightListId" => $blogHighlightListId
            ];
            updateAnotherInfoBlog($dataUpdateInfoBlog);
        }
    }
    load_view('manager', $dataSendView);
}

function getNumDataOfStatusAction() {
    $dataSendAjax = [
        "all"     => count(getListBlogByStatus()),
        "publish" => count(getListBlogByStatus("publish")),
        "pending" => count(getListBlogByStatus("pending")),
        "trash"   => count(getListBlogByStatus("trash"))
    ];
    echo json_encode($dataSendAjax);
}

function changeStatusAction() {
    $idBlog = $_POST['idEl'];
    $statusCurrent = $_POST['statusCurrent'];
    $statusOld = !empty($_POST['statusOld']) ? $_POST['statusOld'] : null;
    $dataInfoUpdateBlog = [
        "status_current" => $statusCurrent,
        "status_old"     => $statusOld
    ];
    $process = updateInfoBlog($dataInfoUpdateBlog, $idBlog);
    $blogItem = getBlogItemById($idBlog);
    if($process) {
        $dataSendAjax = [
            "status"        => "success",
            "statusCurrent" => $blogItem['status_current'],
            "statusOld"     => $blogItem['status_old']
        ];
    } else {
        $dataSendAjax = [
            "status"        => "error",
            "statusCurrent" => $blogItem['status_current'],
            "statusOld"     => $blogItem['status_old']
        ];
    }
    echo json_encode($dataSendAjax);
}

function deleteBlogAction() {
    $idBlog = $_POST['idBlog'];
    $process = handleDeleteBlogById($idBlog);
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
    $searchResult = getSearchRecommentByTitle($strSearch);   
    $dataSendAjax = [
        "searchResult" => $searchResult
    ];
    echo json_encode($dataSendAjax);
}

function setUrlSearchBlogAction() {
    load('helper','string');
    $strSearch     = trim($_POST['strSearch']);
    $urlPath = "?mod=blog&q=".preg_replace('([\s]+)', '+', escape_string($strSearch))."";
    $dataSendAjax = [
        "urlSearch" => $urlPath
    ];
    echo json_encode($dataSendAjax);
}