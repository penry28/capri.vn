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

    <title>Admin | Danh mục sản phẩm cấp 1</title>
</head>
<style>
    
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
                                                <h4>Thêm danh mục cấp 1 cho sản phẩm</h4>
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
                                        <a href="<?php echo base_url("?mod=cate&controller=cateLevel_1&action=list") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách D.mục cấp 1</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=prod") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách sản phẩm</span>
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
                                                    <div class="grid-column-8">
                                                        <div class="form-info-left form-info-item-wrap">
                                                            <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Banner danh mục</span>
                                                            </label>
                                                            <div class="wrap-banner-form d-flex">
                                                                <div class="banner-img-demo">
                                                                    <span class="thumbNail">
                                                                        <img id="img-thumbNail-inner" data-exist-img="false" src="<?php if(empty(set_value("banner_img_thumbNail_url"))) { echo "./public/images/logo/img_prod.png"; } else { echo set_value("banner_img_thumbNail_url"); } ?>" alt="">
                                                                        <input id="img-thumbNail-inner-url" name="banner_img_thumbNail_url" type="hidden" value="<?php echo set_value("banner_img_thumbNail_url") ?>">
                                                                    </span>
                                                                </div>
                                                                <div class="banner-img-info">
                                                                    <div class="form-group">
                                                                        <label for="image-banner-cate" class="image-banner-cate">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                            <span>Thêm ảnh</span>
                                                                            <input type="file" class="d-none" value="<?php echo set_value("imgBanner") ?>" name="image_banner_cate" id="image-banner-cate">
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="seo-title" class="primary-title">Seo title (alt)</label>
                                                                        <input type="text" name="seo_title" id="seo-title" class="form-control" placeholder="Title seo website" autocomplete="off" spellcheck="false" value="<?php echo set_value("seo_title") ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error("banner_img_thumbNail_url"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-4">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Thông tin danh mục</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="title-cate" class="primary-title">Tên danh mục</label>
                                                                    <input type="text" name="title_cate" value="<?php echo set_value("title_cate") ?>" id="title-cate" class="form-control" placeholder="Tên danh mục" autocomplete="off" spellcheck="false">
                                                                    <span class="error"><?php echo form_error("title_cate") ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="title-cate" class="primary-title">Mô tả danh mục</label>
                                                                    <textarea name="desc_cate" id="desc-cate" class="form-control" spellcheck="false" style="height: 80px; width: 100%;" placeholder="Ghi mô tả danh mục"></textarea>
                                                                    <span class="error"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status-cate" class="primary-title">Trạng thái (mặc định: chờ duyệt)</label>
                                                                    <select name="status_cate" class="form-control" id="status-cate">
                                                                        <option value="">Chọn Trạng thái danh mục</option>
                                                                        <option value="publish" <?php if(set_value("status_cate") == 'publish') { echo "selected"; } else { echo null; } ?>>Hoạt động</option>
                                                                        <option value="pending" <?php if(set_value("status_cate") == 'pending') { echo "selected"; } else { echo null; } ?>>Chờ Duyệt</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="add_new_cate_level_1" class="add-new-cate">Thêm mới danh mục</button>
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
    <script src="./public/js/cate.js"></script>
</body>

</html>