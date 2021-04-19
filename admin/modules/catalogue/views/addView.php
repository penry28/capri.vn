<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url() ?>">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/add-cate.css">
    <link rel="stylesheet" href="./public/css/layout.css">
    <link rel="stylesheet" href="./public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/fonts/aizo-icon.css">
    <title>Thêm bài viết</title>
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
                                                <h4>Thêm catalogue mới</h4>
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
                                    <div class="grid-column-7">
                                        <a href="<?php echo base_url("?mod=catalogue") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách catalogue</span>
                                            </p>
                                        </a>
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
                                                    <div class="grid-column-6">
                                                        <div class="form-info-left form-info-item-wrap">
                                                            <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Ảnh nền catalogue</span>
                                                            </label>
                                                            <div class="wrap-banner-form d-flex" style="position: relative;">
                                                                <div class="banner-img-demo">
                                                                    <span class="thumbNail" style="width: 328px;height: 328px;">
                                                                        <img id="img-thumbNail-inner" data-exist-img="false" src="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { echo "./public/images/logo/img_prod.png"; } ?>" alt="">
                                                                        <input id="img-thumbNail-inner-url" name="banner_img_thumbNail_url" type="hidden" value="<?php echo set_value("banner_img_thumbNail_url"); ?>">
                                                                    </span>
                                                                </div>
                                                                <div class="banner-img-info">
                                                                    <div class="form-group d-flex justify-center">
                                                                        <label for="image-banner-cate" class="image-banner-cate">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                            <span>Thêm ảnh</span>
                                                                            <input type="file" class="d-none" name="image_banner_cate" id="image-banner-cate">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error("banner_img_thumbNail_url") ?>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-6">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Thông tin bài viết</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="title-catalogue" class="primary-title">Tiêu đề catalogue</label>
                                                                    <input type="text" name="title_catalogue" value="<?php echo set_value("title_catalogue") ?>" id="title-catalogue" class="form-control" placeholder="Tiêu đề catalogue" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("title_catalogue") ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="link-download" class="primary-title">Link download catalogue</label>
                                                                    <input type="text" name="link_download" value="<?php echo set_value("link_download") ?>" id="link-download" class="form-control" placeholder="Link download catalogue" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("link_download") ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="year-created" class="primary-title">Năm xuất bản catalogue</label>
                                                                    <input type="text" name="year_created" value="<?php echo set_value("year_created") ?>" id="year-created" class="form-control" placeholder="Năm xuất bản catalogue" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("year_created") ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="add_new_catalogue" class="add-new-cate">Thêm mới catalogue</button>
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
    <script src="./public/js/catalogue.js"></script>
</body>

</html>