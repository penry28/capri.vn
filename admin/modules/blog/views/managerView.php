<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/add-cate.css">
    <link rel="stylesheet" href="./public/css/layout.css">
    <link rel="stylesheet" href="./public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/fonts/aizo-icon.css">
    <!-- /upload file/ -->
    <link rel="stylesheet" href="public/upload_file/fine-uploader.min.css">
    <title>Admin | Quản lý bài viết</title>
</head>
<style>
    .lits-blog-typical .typical-item {
        padding: 5px;
        border: 1px solid rgba(225,225,225,0.12);
        margin: 5px;
        color: #fff;
    }
    .lits-blog-typical .typical-item .blog-button {
        background-color: #fff;
        padding: 5px 10px;
        color: var(--main-color);
        border-radius: 5px;
        margin-left: 10px;
        cursor: pointer;
    }
</style>
<body>
    <div id="app" class="color_root size_root wrap_root">
        <div class="wrapper">
            <?php echo get_sidebar() ?>
            <div class="all-content-wp">
                <?php get_header(); ?>
                <div id="main-content-wrap">
                    <section class="breadcrumb-list">
                        <div class="container-fluid p-0">
                            <div class="root bg-style-global">
                                <div class="grid-row">
                                    <div class="grid-column-6">
                                        <div class="breadcrumb-left d-flex align-items-center">
                                            <div class="breadcrumb-icon">
                                                <i class="icon aizo-home"></i>
                                            </div>
                                            <div class="breadcrumb-ctn">
                                                <h4>Quản lý bài viết</h4>
                                                <p>Welcome to CAPRI</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-column-6">
                                        <div class="breadcrumb-right">
                                            <ul class="list-info-more d-flex align-items-center">
                                                <li class="time-curr d-flex align-items-center">
                                                    <span class="icon aizo-alarm-clock mr-1"></span>
                                                    <span>11:32:59</span>
                                                </li>
                                                <li class="px-3">
                                                    <span>-</span>
                                                </li>
                                                <li class="date-curr">
                                                    <span>03/10/2020</span>
                                                </li>
                                                <li class="px-3">
                                                    <span>-</span>
                                                </li>
                                                <li class="online-curr d-flex align-items-cente">
                                                    <span class="icon aizo-user mr-1"></span>
                                                    <span class="online-notifi">100 online</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="add-cate-prod">
                        <div class="root">
                            <div class="container-fluid">
                                <div class="grid-grid">
                                    <div class="grid-column-12">
                                        <div class="form-add-cate" class="cate-level-1">
                                            <form action="" method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                <div class="grid-row">
                                                    <div class="grid-column-11 mx-auto">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Quản lý danh mục bài viết</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="title-cate" class="primary-title">Lựa chọn bài viết chọn lọc</label>
                                                                    <?php
                                                                        if(!empty($listBlog)) {
                                                                            ?>
                                                                                <div class="lits-blog-typical">
                                                                                    <ul>
                                                                                        <?php
                                                                                            foreach($listBlog as $blogItem) {
                                                                                                ?>
                                                                                                    <li class="typical-item">
                                                                                                        <label for="blog-id-<?php echo $blogItem['blog_id'] ?>">
                                                                                                            <input type="checkbox" name="typical_blog[]" id="blog-id-<?php echo $blogItem['blog_id'] ?>" value="<?php echo $blogItem['blog_id'] ?>">
                                                                                                            <span class="blog-title"><?php echo $blogItem['blog_title'] ?></span>
                                                                                                            <span class="blog-button">Chọn</span>
                                                                                                        </label>
                                                                                                    </li>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                    </ul>
                                                                                </div>
                                                                                <?php echo form_error("typical_blog") ?>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="title-cate" class="primary-title">Chọn một bài viết nổi bậc</label>
                                                                    <?php
                                                                        if(!empty($listBlog)) {
                                                                            ?>
                                                                                <div class="lits-blog-typical">
                                                                                    <ul>
                                                                                        <?php
                                                                                            foreach($listBlog as $blogItem) {
                                                                                                ?>
                                                                                                    <li class="typical-item">
                                                                                                        <label for="blog_highlight-id-<?php echo $blogItem['blog_id'] ?>">
                                                                                                            <input type="radio" name="blog_highlight[]" id="blog_highlight-id-<?php echo $blogItem['blog_id'] ?>" value="<?php echo $blogItem['blog_id'] ?>">
                                                                                                            <span class="blog-title"><?php echo $blogItem['blog_title'] ?></span>
                                                                                                            <span class="blog-button">Chọn</span>
                                                                                                        </label>
                                                                                                    </li>
                                                                                                <?php 
                                                                                            }
                                                                                        ?>
                                                                                    </ul>
                                                                                </div>
                                                                                <?php echo form_error('blog_highlight'); ?>
                                                                            <?php 
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="save_manager_btn" class="add-new-cate">Lưu cập nhật</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/aizo-js-theme.js"></script>
    <script src="./public/js/aizo-popup.js"></script>
    <script src="./public/js/blogCate.js"></script>
    <script src="./public/js/plugins/ckeditor/ckeditor.js"></script>
    <!-- /upload file/ -->
    <script src="public/upload_file/fine-uploader.min.css"></script>
</body>

</html>