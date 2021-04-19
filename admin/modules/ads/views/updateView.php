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
    <title>Admin | Update quảng cáo</title>
</head>
<style>
    .space-appear .list-space-appear li {
        padding: 5px 0;
        color: var(--primary-color);
    }

    .space-appear .list-space-appear li .button {
        background-color: var(--primary-color);
        border-radius: 5px;
        color: var(--main-color);
        padding: 2px 2px;
        cursor: pointer;
        font-size: .9rem;
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
                                                <h4>Update quảng cáo</h4>
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
                                        <a href="<?php echo base_url("?mod=ads") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách quảng cáo</span>
                                            </p>
                                        </a>
                                        <a href="<?php echo base_url("?mod=ads&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm quảng cáo</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                        if(!empty($adsItem)) {
                            ?>
                                <section class="add-cate-prod">
                                    <div class="root">
                                        <div class="container-fluid">
                                            <div class="grid-grid">
                                                <div class="grid-column-12">
                                                    <div class="form-add-cate" class="cate-level-1">
                                                        <form action="" method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                            <input type="hidden" name="checkExists_id" value="0">
                                                            <div class="grid-row">
                                                                <div class="grid-column-6">
                                                                    <div class="form-info-left form-info-item-wrap">
                                                                        <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Ảnh quảng cáo</span>
                                                                        </label>
                                                                        <div class="wrap-banner-form d-flex" style="position: relative;">
                                                                            <div class="banner-img-demo">
                                                                                <span class="thumbNail" style="width: 328px;height: 328px;">
                                                                                    <img id="img-thumbNail-inner" data-exist-img="false" src="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { if(!empty($adsItem['ads_img'])) { echo $adsItem['ads_img']; } else { echo "./public/images/logo/img_prod.png"; } } ?>" alt="">
                                                                                    <input id="img-thumbNail-inner-url" name="banner_img_thumbNail_url" type="hidden" value="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { if(!empty($adsItem['ads_img'])) { echo $adsItem['ads_img']; } else { echo null; } } ?>">
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
                                                                        <?php echo form_error("banner_img_thumbNail_url"); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="grid-column-6">
                                                                    <div class="form-info-right form-info-item-wrap">
                                                                        <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Thông tin quảng cáo</span>
                                                                        </label>
                                                                        <div class="info-wrap-form">
                                                                            <div class="form-group">
                                                                                <label for="ads-title" class="primary-title">Tiêu đề quảng cáo</label>
                                                                                <input type="text" name="ads_title" value="<?php if(!empty(set_value("ads_title"))) { echo set_value("ads_title"); } else { if(!empty($adsItem['ads_title'])) { echo $adsItem['ads_title']; } else { echo null; } } ?>" id="ads-title" class="form-control" placeholder="Tiêu đề quảng cáo" autocomplete="off" spellcheck="false">
                                                                                <?php echo form_error("ads_title"); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="ads-link" class="primary-title">Link quảng cáo</label>
                                                                                <input type="text" name="ads_link" value="<?php if(!empty(set_value("ads_link"))) { echo set_value("ads_link"); } else { if(!empty($adsItem['ads_link'])) { echo $adsItem['ads_link']; } else { echo null; } } ?>" id="ads-link" class="form-control" placeholder="Link quảng cáo" autocomplete="off" spellcheck="false">
                                                                                <?php echo form_error("ads_link"); ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status-ads" class="primary-title">Trạng thái (Mặc định: chờ duyệt)</label>
                                                                                <select name="status_ads" id="status-ads" class="form-control">
                                                                                    <option value="">-- Trạng thái cho quảng cáo --</option>
                                                                                    <option value="publish" <?php if(!empty(set_value("status_ads"))) { if(set_value("status_ads") == 'publish') { echo "selected"; } else { echo null; } } else { if(!empty($adsItem['status_current'])) { if($adsItem['status_current'] == 'publish') { echo "selected"; } else { echo null; } } } ?>>Hoạt động</option>
                                                                                    <option value="pending" <?php if(!empty(set_value("status_ads"))) { if(set_value("status_ads") == 'pending') { echo "selected"; } else { echo null; } } else { if(!empty($adsItem['status_current'])) { if($adsItem['status_current'] == 'pending') { echo "selected"; } else { echo null; } } } ?>>Chờ duyệt</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="space-appear">
                                                                                    <label for="" class="primary-title">Nơi hiển thị</label>
                                                                                    <ul class="list-space-appear">  
                                                                                        <li>
                                                                                            <label for="space-product">
                                                                                                <input type="checkbox" <?php if(!empty($adsItem['ads_prod'])) { if($adsItem['ads_prod'] == '1') { echo "checked"; } else { echo null; }} ?> class="checkbox" name="space_product" value="1" id="space-product">
                                                                                                <span class="title">Chi tiết sản phẩm</span>
                                                                                                <span class="button">Chọn</span>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label for="space-productCate">
                                                                                                <input type="checkbox" <?php if(!empty(set_value("space_productCate"))) { if(set_value("space_productCate") == '1') { echo "checked"; } else { echo null; } } else { if(!empty($adsItem['ads_prodCate'])) { if($adsItem['ads_prodCate'] == '1') { echo "checked"; } else { echo null; } } } ?> class="checkbox" name="space_productCate" value="1" id="space-productCate">
                                                                                                <span class="title">Danh mục sản phẩm</span>
                                                                                                <span class="button">Chọn</span>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label for="space-blog">
                                                                                                <input type="checkbox" <?php if(!empty(set_value("space_blog"))) { if(set_value("space_blog") == '1') { echo "checked"; } else { echo null; } } else { if(!empty($adsItem['ads_blog'])) { if($adsItem['ads_blog'] == '1') { echo "checked"; } else { echo null; } } } ?> class="checkbox" name="space_blog" value="1" id="space-blog">
                                                                                                <span class="title">Chi tiết bài viết</span>
                                                                                                <span class="button">Chọn</span>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label for="space-blogCate">
                                                                                                <input type="checkbox" <?php if(!empty(set_value("space_blogCate"))) { if(set_value("space_blogCate") == '1') { echo "checked"; } else { echo null; } } else { if(!empty($adsItem['ads_blogCate'])) { if($adsItem['ads_blogCate'] == '1') { echo "checked"; } else { echo null; } } } ?> class="checkbox" name="space_blogCate" value="1" id="space-blogCate">
                                                                                                <span class="title">Danh mục bài viết</span>
                                                                                                <span class="button">Chọn</span>
                                                                                            </label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" name="update_new_ads_btn" class="add-new-cate">Update quảng cáo</button>
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
    <script src="./public/js/ads.js"></script>
</body>

</html>