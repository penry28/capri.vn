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
    <title>Admin | Thông Tin Về Công Ty</title>
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
                                                <h4>Thông tin về công ty</h4>
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
                                                    <div class="grid-column-4">
                                                        <div class="form-info-left form-info-item-wrap">
                                                            <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Icon thương hiệu website</span>
                                                            </label>
                                                            <div class="wrap-banner-form d-flex">
                                                                <div class="banner-img-demo">
                                                                    <span class="thumbNail" style="width: 160px;height: 160px;">
                                                                        <img id="favicon-inner" data-exist-img="false" src="<?php if(!empty(set_value("favicon_inner_url"))) { echo set_value("favicon_inner_url"); } else { if(!empty($infoSystem['favicon_img'])) { echo $infoSystem['favicon_img']; } else { echo  "./public/images/logo/img_prod.png"; } } ?>" alt="">
                                                                        <input id="favicon-inner-url" name="favicon_inner_url" type="hidden" value="<?php if(!empty(set_value("favicon_inner_url"))) { echo set_value("favicon_inner_url"); } else { if(!empty($infoSystem['favicon_img'])) { echo $infoSystem['favicon_img']; } else { echo  null; } } ?>">
                                                                    </span>
                                                                </div>
                                                                <div class="banner-img-info">
                                                                    <div class="form-group d-flex justify-center">
                                                                        <label for="image-banner-favicon" class="image-banner-cate">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                            <span>Thêm ảnh</span>
                                                                            <input type="file" class="d-none" value="" name="image_banner_cate" id="image-banner-favicon">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error("favicon_inner_url"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-7">
                                                        <div class="form-info-left form-info-item-wrap">
                                                            <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Ảnh mô tả website</span>
                                                            </label>
                                                            <div class="wrap-banner-form d-flex">
                                                                <div class="banner-img-demo">
                                                                    <span class="thumbNail" style="width: 420px;height: 400px;">
                                                                        <img id="banner_desc-inner" data-exist-img="false" src="<?php if(!empty(set_value("banner_desc_inner_url"))) { echo set_value("banner_desc_inner_url"); } else { if(!empty($infoSystem['banner_desc'])) { echo $infoSystem['banner_desc']; } else { echo "./public/images/logo/img_prod.png"; } } ?>" alt="">
                                                                        <input id="banner_desc-inner-url" name="banner_desc_inner_url" type="hidden" value="<?php if(!empty(set_value("banner_desc_inner_url"))) { echo set_value("banner_desc_inner_url"); } else { if(!empty($infoSystem['banner_desc'])) { echo $infoSystem['banner_desc']; } else { echo null; } } ?>">
                                                                    </span>
                                                                </div>
                                                                <div class="banner-img-info">
                                                                    <div class="form-group d-flex justify-center">
                                                                        <label for="image-banner-desc" class="image-banner-cate">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                            <span>Thêm ảnh</span>
                                                                            <input type="file" class="d-none" value="" name="image_banner_cate" id="image-banner-desc">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error("banner_desc_inner_url"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Thông tin về website</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="company-name" class="primary-title">Tên công ty</label>
                                                                    <input type="text" name="company_name" value="<?php if(!empty(set_value("company_name"))) { echo set_value("company_name"); } else { if(!empty($infoSystem['company_name'])) { echo $infoSystem['company_name']; } else { echo null; } } ?>" id="company-name" class="form-control" placeholder="Tên công ty" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("company_name"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="company-slogan" class="primary-title">Slogan công ty</label>
                                                                    <input type="text" name="company_slogan" value="<?php if(!empty(set_value("company_slogan"))) { echo set_value("company_slogan"); } else { if(!empty($infoSystem['company_slogan'])) { echo $infoSystem['company_slogan']; } else { echo null; } } ?>" id="company-name" class="form-control" placeholder="Slogan công ty" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("company_slogan"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="company-title" class="primary-title">Tiêu đề website</label>
                                                                    <input type="text" name="company_title" value="<?php if(!empty(set_value("company_title"))) { echo set_value("company_title"); } else { if(!empty($infoSystem['company_title'])) { echo $infoSystem['company_title']; } else { echo null; } } ?>" id="company-title" class="form-control" placeholder="Tên công ty" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("company_title"); ?>                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="company-desc" class="primary-title">Mô tả website</label>
                                                                    <textarea name="company_desc" id="company-desc" class="form-control" spellcheck="false" style="height: 80px; width: 100%;" placeholder="Thông tin mô tả website"><?php if(!empty(set_value("company_desc"))) { echo set_value("company_desc"); } else { if(!empty($infoSystem['company_desc'])) { echo $infoSystem['company_desc']; } else { echo null; } } ?></textarea>
                                                                    <?php echo form_error("company_desc"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="seo-tap-search" class="primary-title">Từ khóa tìm kiếm google</label>
                                                                    <textarea name="seo_tap_search" id="seo-tap-search" class="form-control" spellcheck="false" style="height: 80px; width: 100%;" placeholder="Thông tin mô tả website"><?php if(!empty(set_value("seo_tap_search"))) { echo set_value("seo_tap_search"); } else { if(!empty($infoSystem['seo_tap_search'])) { echo $infoSystem['seo_tap_search']; } else { echo null; } } ?></textarea>
                                                                    <?php echo form_error("seo_tap_search"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="update_new_cate_blog" class="add-new-cate">Cập nhật thông tin hệ thống</button>
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
    <script src="./public/js/system.js"></script>
    <script src="./public/js/plugins/ckeditor/ckeditor.js"></script>
    <!-- /upload file/ -->
    <script src="public/upload_file/fine-uploader.min.css"></script>
</body>

</html>