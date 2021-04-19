<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('lib','validationForm');
    if(isset($_POST['add_blog_highlight_btn'])) {
        $error = [];
        global $error;
        // check blog 1
        if(empty($_POST['blog_1'])) {
            $error['blog_1'] = "<span class='error'>(*) Vui lòng chọn 1 bài blog</span>";
        } else {
            $idBlog_1 = $_POST['blog_1'];
        }
        
        // check blog 2
        if(empty($_POST['blog_2'])) {
            $error['blog_2'] = "<span class='error'>(*) Vui lòng chọn 1 bài blog</span>";
        } else {
            $idBlog_2 = $_POST['blog_2'];
        }

        // check error
        if(empty($error)) {
            $dataUpdateBlog = [
                "client_blog" => '1'
            ];
            resetBlogClient();
            updateBlogItem($dataUpdateBlog, $idBlog_1);
            updateBlogItem($dataUpdateBlog, $idBlog_2);
        }
    }
    $listBlog = getListBlog();
    $listBlogClient = getListBlogClient();
    $dataSendView = [
        "listBlog"       => $listBlog,
        "listBlogClient" => $listBlogClient
    ];
    load_view('index', $dataSendView);
}

function bloghihglightAction() {
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

function getBlogItemByIdAction() {
    $idBlog = (int)$_POST['idBlog'];
    $blogItem = getBlogItemById($idBlog);
    $dataSendAjax = [
        "blogItem" => $blogItem
    ];
    echo json_encode($dataSendAjax);
}