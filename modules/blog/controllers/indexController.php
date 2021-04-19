<?php
    function construct() {
        load_model('index');
    }


    function indexAction() {
        $idBlogCate = !empty($_GET['id']) ? (int) $_GET['id'] : null;
        $blogCateItem = getBlogCateItem($idBlogCate);
        $listBlogMostLove = getListBlogMostLove(10);
        $listBlogTypical = [];
        if($idBlogCate == null) {
            $listBlogTypical = getListBlogTypical(10);
        } else {
            $listBlogTypical = getListBlogByBlogCateId($idBlogCate);
        }
        $listBogCate = getListBlogCateById();
        $listBlogMostView = getListBlogMostView(10);
        $blogHighlight = getBlogHighLight();
        if(!empty($blogHighlight['cate_prod_id']) && !empty(getProductCateById($blogHighlight['cate_prod_id']))) {
            $blogHighlight['prodCate'] = getProductCateById($blogHighlight['cate_prod_id'])[0];
        }
        foreach($listBlogTypical as $key => $blogItem) {
            if(!empty($blogItem['cate_prod_id']) && !empty(getProductCateById($blogItem['cate_prod_id']))) {
                $blogItem['prodCate'] = getProductCateById($blogItem['cate_prod_id'])[0];
                $listBlogTypical[$key] = $blogItem;
            }
        }
        foreach($listBlogMostView as $key => $blogItem) {
            if(!empty($blogItem['cate_prod_id']) && !empty(getProductCateById($blogItem['cate_prod_id']))) {
                $blogItem['prodCate'] = getProductCateById($blogItem['cate_prod_id'])[0];
                $listBlogMostView[$key] = $blogItem;
            }
        }
        $dataSendView = [
            "listBlogCate"     => $listBogCate,
            "listBlogMostView" => $listBlogMostView,
            "listBlogTypical"  => $listBlogTypical,
            "blogHighlight"    => $blogHighlight,
            "blogCateItem"     => $blogCateItem,
            "listBlogMostLove" => $listBlogMostLove
        ];
        load_view('index', $dataSendView);
    }

    function detailAction() {
        $id = !empty($_GET['id']) ? (int) $_GET['id'] : 0;
        $blogItem = getBlogItemById($id);
        $listBlogMostLove = getListBlogMostLove(10);
        $listBlogRelative = getListBlogRelative($blogItem['blog_parentCate_id']);
        if(!empty($blogItem['cate_prod_id']) && getProductCateById($blogItem['cate_prod_id'])) {
            $blogItem['prodCate']        = getProductCateById($blogItem['cate_prod_id'])[0];
            $blogItem['cateRelative']    = getListCateRelative($blogItem['cate_prod_id']);
            $blogItem['productRelative'] = getListProductRelativeBlog($blogItem['cate_prod_id']);
        }
        $dataSendView = [
            "blogItem"         => $blogItem,
            "listBlogMostLove" => $listBlogMostLove,
            "listBlogRelative" => $listBlogRelative
        ];
        load_view('detail', $dataSendView);
    }

    function handleNumLoveAction() {
        $action = $_POST['action'];
        $idBlog = $_POST['idBlog'];
        $blogItem = getBlogItemById($idBlog);
        if($action == 'plus') {
            $dataUpdateBlog = [
                "num_love" => $blogItem['num_love'] + 1
            ];
        } else {
            $dataUpdateBlog = [
                "num_love" => $blogItem['num_love'] - 1
            ];
        }
        $process     = updateBlogItem($dataUpdateBlog, $idBlog);
        $blogItemNew = getBlogItemById($idBlog);
        if($process) {
            $dataSendAjax = [
                "status"  => "success",
                "numLove" => $blogItemNew['num_love']
            ];
        } else {
            $dataSendAjax = [
                "status"  => "error",
            ];
        }
        echo json_encode($dataSendAjax);
    }
?>