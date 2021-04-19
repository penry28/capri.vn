<?php
    function getListBlog() {
        return db_fetch_array("SELECT `blog_id`,`blog_title` FROM `tbl_blog` WHERE `status_current` = 'publish'");
    }
    function getBlogItemById($idBlog) {
        return db_fetch_row("SELECT `blog_img` FROM `tbl_blog` WHERE `status_current` = 'publish' AND `blog_id` = '$idBlog'");
    }
    function updateBlogItem($dataUpdateBlog, $idBlog) {
        return db_update("tbl_blog", $dataUpdateBlog, "`blog_id` = '{$idBlog}'");
    }
    function resetBlogClient() {
        $listBLogClient = db_fetch_array("SELECT `blog_id` FROM `tbl_blog` WHERE `client_blog` = '1'");
        foreach($listBLogClient as $blogItem) {
            $dataUpdateBlog = [
                "client_blog" => '0'
            ];
            updateBlogItem($dataUpdateBlog, $blogItem['blog_id']);
        }
    }
    function getListBlogClient() {
        return db_fetch_array("SELECT * FROM `tbl_blog` WHERE `client_blog` = '1'");
    }
?>