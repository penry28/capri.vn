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
    <title>Admin | Cập nhật danh mục bài viết</title>
</head>

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
                                                <h4>Cập nhật danh mục blog</h4>
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
                    <section class="section-top-act">
                        <div class="root">
                            <div class="container-fluid">
                                <div class="grid-row">
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=blogCate") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách danh mục bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=blogCate&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm danh mục bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=blog") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=blog&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                        if(!empty($blogCateItem)) {
                            ?>
                                <section class="add-cate-prod">
                                    <div class="root">
                                        <div class="container-fluid">
                                            <div class="grid-grid">
                                                <div class="grid-column-12">
                                                    <div class="form-add-cate" class="cate-level-1">
                                                        <form action="" method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                            <div class="grid-row">
                                                                <div class="grid-column-6">
                                                                    <div class="form-info-left form-info-item-wrap">
                                                                        <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Banner danh mục blog</span>
                                                                        </label>
                                                                        <div class="wrap-banner-form d-flex">
                                                                            <div class="banner-img-demo">
                                                                                <span class="thumbNail" style="width: 328px;height: 328px;">
                                                                                    <img id="img-thumbNail-inner" data-exist-img="false" src="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { if(!empty($blogCateItem['blogCate_img'])) { echo $blogCateItem['blogCate_img']; } else { echo "./public/images/logo/img_prod.png"; } } ?>" alt="<?php if(!empty(set_value("title_cate"))) { echo set_value("title_cate"); } else { echo $blogCateItem['blogCate_title']; } ?>">
                                                                                    <input id="img-thumbNail-inner-url" name="banner_img_thumbNail_url" type="hidden" value="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { if(!empty($blogCateItem['blogCate_img'])) { echo $blogCateItem['blogCate_img']; } else { echo null; } } ?>">
                                                                                </span>
                                                                            </div>
                                                                            <div class="banner-img-info">
                                                                                <div class="form-group d-flex justify-center">
                                                                                    <label for="image-banner-cate" class="image-banner-cate">
                                                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                                        <span>Thêm ảnh</span>
                                                                                        <input type="file" class="d-none" value="" name="image_banner_cate" id="image-banner-cate">
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="grid-column-6">
                                                                    <div class="form-info-right form-info-item-wrap">
                                                                        <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Thông tin danh mục</span>
                                                                        </label>
                                                                        <div class="info-wrap-form">
                                                                            <div class="form-group">
                                                                                <label for="title-cate" class="primary-title">Tên danh mục</label>
                                                                                <input type="text" name="title_cate" value="<?php if(!empty(set_value("title_cate"))) { echo set_value("title_cate"); } else { echo $blogCateItem['blogCate_title']; } ?>" id="title-cate" class="form-control" placeholder="Tên danh mục" autocomplete="off" spellcheck="false">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="title-cate" class="primary-title">Mô tả danh mục</label>
                                                                                <textarea name="desc_cate" id="desc-cate" class="form-control" spellcheck="false" style="height: 80px; width: 100%;" placeholder="Ghi mô tả danh mục"><?php if(!empty(set_value("desc_cate"))) { echo set_value("desc_cate"); } else { echo $blogCateItem['blogCate_desc']; } ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status-cate" class="primary-title">Trạng thái (mặc định: chờ duyệt)</label>
                                                                                <select name="status_cate" class="form-control" id="status-cate">
                                                                                    <option value="">Chọn Trạng thái danh mục</option>
                                                                                    <option value="publish" <?php if(!empty(set_value("status_cate"))) { if(set_value("status_cate") == 'publish') { echo "selected"; } else { echo null; } } else { if($blogCateItem['status_current'] == 'publish') { echo "selected"; } else { echo null; } } ?>>Hoạt động</option>
                                                                                    <option value="pending" <?php if(!empty(set_value("status_cate"))) { if(set_value("status_cate") == 'pending') { echo "selected"; } else { echo null; } } else { if($blogCateItem['status_current'] == 'pending') { echo "selected"; } else { echo null; } } ?>>Chờ Duyệt</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" name="update_blog_cate_blog_btn" class="add-new-cate">Cập nhật danh mục</button>
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
                            <?php 
                        }
                    ?>
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