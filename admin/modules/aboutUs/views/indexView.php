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
    <!-- /upload file/ -->
    <link rel="stylesheet" href="public/upload_file/fine-uploader.min.css">
    <title>Giới thiệu công ty</title>
</head>
<style>
    .title-highlight {
        color: #4e4f5a;
        margin-bottom: 10px;
        display: inline-block;
        background-color: #ffff;
        padding: 10px 10px;
        font-weight: bold;
    }

    .box-add-wrap .box-info-showroow-item {
        background-color: #152036;
        padding: 10px;
    }

    .box-add-wrap .box-info-showroow-item .label-title {
        display: block;
        color: var(--primary-color);
        margin-bottom: 10px;
        border-bottom: 1px solid rgba(225, 225, 225, 0.3);
        padding: 10px;
    }
    .box-add-wrap .box-info-showroow-item .form-control {
        background-color: var(--secound-color);
        border: 1px solid rgba(225, 225, 225, 0.12);
        border-radius: 0;
        color: var(--primary-color);
        position: relative;
    }
    .form-info-left .error {
        font-size: .8rem;
        color: #ff4f4f;
        font-style: italic;
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
                                                <h4>Giới thiệu công ty</h4>
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
                                            <form method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                <div class="grid-row">
                                                    <div class="grid-column-6">
                                                        <div class="form-info-left form-info-item-wrap">
                                                            <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Video mô tả công ty</span>
                                                            </label>
                                                            <div class="wrap-banner-form d-flex" style="position: relative;">
                                                                <div class="banner-img-demo">
                                                                    <span class="thumbNail" style="width: 320px;height: 320px;">
                                                                        <img id="img-thumbNail-inner" data-exist-img="false" src="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { if(!empty($infoIntroCompany['thumbnail'])) { echo $infoIntroCompany['thumbnail']; } else { echo "./public/images/logo/img_prod.png"; } } ?>" alt="<?php if(!empty($infoIntroCompany['title_video'])) { echo $infoIntroCompany['title_video']; } else { echo "Ảnh nền video giới thiệu capri"; } ?>">
                                                                        <input id="img-thumbNail-inner-url" name="banner_img_thumbNail_url" type="hidden" value="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { if(!empty($infoIntroCompany['thumbnail'])) { echo $infoIntroCompany['thumbnail']; } else { echo null; } } ?>">
                                                                        <?php echo form_error("banner_img_thumbNail_url") ?>
                                                                    </span>
                                                                </div>
                                                                <div class="banner-img-info">
                                                                    <div class="form-group d-flex justify-center">
                                                                        <label for="image-banner-cate" class="image-banner-cate">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                            <span>Thêm ảnh nền</span>
                                                                            <input type="file" class="d-none" name="image_banner_cate" id="image-banner-cate">
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
                                                                <span>Thông tin về video</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="title-video" class="primary-title">Tiêu đề video</label>
                                                                    <input type="text" name="title_video" value="<?php if(!empty(set_value("title_video"))) { echo set_value("title_video"); } else { if(!empty($infoIntroCompany['title_video'])) { echo $infoIntroCompany['title_video']; } else { echo null; } } ?>" id="title-video" class="form-control" placeholder="Tiêu đề video" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("title_video"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="desc-video" class="primary-title">Trích dẫn (Mô tả video)</label>
                                                                    <textarea name="desc_video" id="desc-video" class="form-control" spellcheck="false" style="height: 80px; width: 100%;" placeholder="Mô tả video"><?php if(!empty(set_value("desc_video"))) { echo set_value("desc_video"); } else { if(!empty(set_value("desc_video"))) { echo set_value("desc_video"); } else { if(!empty($infoIntroCompany['desc_video'])) { echo $infoIntroCompany['desc_video']; } else { echo null; } } } ?></textarea>
                                                                    <?php echo form_error("desc_video") ?>
                                                                </div>
                                                                <div class="form-group" style="margin-bottom: 2px;">
                                                                    <label for="iframe-video" class="primary-title">Iframe video công ty</label>
                                                                    <input type="text" name="iframe_video" value="<?php if(!empty(set_value("iframe_video"))) { echo set_value("iframe_video"); } else { if(!empty($infoIntroCompany['iframe_video'])) { echo $infoIntroCompany['iframe_video']; } else { echo null; } } ?>" id="iframe-video" class="form-control" placeholder="Sử dụng iframe youtube để load video" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("iframe_video"); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="content-video" class="title-highlight">(*) Nội dung chính cho video</label>
                                                            <textarea name="content_video" class="ckeditor" id="content-video" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_video"))) { echo set_value("content_video"); } else { if(!empty($infoIntroCompany['content_video'])) { echo $infoIntroCompany['content_video']; } else { echo null; } } ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="desc-company" class="title-highlight">(*) Mô tả sơ lược về công ty</label>
                                                            <textarea name="desc_company" class="ckeditor" id="desc-company" style="width: 100%; height: 500px;"><?php if(!empty(set_value("desc_company"))) { echo set_value("desc_company"); } else { if(!empty($infoIntroCompany['desc_company'])) { echo $infoIntroCompany['desc_company']; } else { echo null; } } ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="content-cooperation" class="title-highlight">(*) Nội dung hợp tác tầm chiến lược</label>
                                                            <textarea name="content_cooperation" class="ckeditor" id="content-cooperation" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_cooperation"))) { echo set_value("content_cooperation"); } else { if(!empty($infoIntroCompany['content_cooperation'])) { echo $infoIntroCompany['content_cooperation']; } else { echo null; } } ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="content-highlight-company" class="title-highlight">(*) Nội dung thế mạnh và thành tựu</label>
                                                            <textarea name="content_highlight_company" class="ckeditor" id="content-highlight-company" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_highlight_company"))) { echo set_value("content_highlight_company"); } else { if(!empty($infoIntroCompany['content_highlight_company'])) { echo $infoIntroCompany['content_highlight_company']; } else { echo null; } } ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="content-system-showroom" class="title-highlight">(*) Nội dung hệ thống showroom</label>
                                                            <textarea name="content_system_showroom" class="ckeditor" id="content-system-showroom" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_system_showroom"))) { echo set_value("content_system_showroom"); } else { if(!empty($infoIntroCompany['content_system_showroom'])) { echo $infoIntroCompany['content_system_showroom']; } else { echo null; } } ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <button type="submit" name="updateInfoAbout_btn" class="add-new-cate">Cập Nhật Thông Tin Giới thiệu</button>
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
    <script src="./public/js/aboutus.js"></script>
    <!-- /upload file/ -->
    <script src="public/Ckeditor/ckeditor/ckeditor.js"></script>
</body>

</html>