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
    <title>Admin | Hỗ trợ sản phẩm</title>
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
                                                <h4>Hỗ trợ sản phẩm</h4>
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
                                    <div class="grid-column-4">
                                        <a href="<?php echo base_url("?mod=prod") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách sản phẩm</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-4">
                                        <a href="<?php echo base_url("?mod=prod&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm sản phẩm</span>
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
                                            <form method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                <div class="grid-row">
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="content-service-center" class="title-highlight">(*) Trung tâm bảo hành</label>
                                                            <textarea name="content_service_center" class="ckeditor" id="content-service-center" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_service_center"))) { echo set_value("content_service_center"); } else { if(!empty($infoSupportProd['content_service_center'])) { echo $infoSupportProd['content_service_center']; } else { echo null; } } ?></textarea>
                                                            <?php echo form_error("content_service_center"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="content-shipping-information" class="title-highlight">(*) Thông tin vận chuyển</label>
                                                            <textarea name="content_shipping_information" class="ckeditor" id="content-shipping-information" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_shipping_information"))) { echo set_value("content_shipping_information"); } else { if(!empty($infoSupportProd['content_shipping_information'])) { echo $infoSupportProd['content_shipping_information']; } else { echo null; } } ?></textarea>
                                                            <?php echo form_error("content_shipping_information"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <label for="content-payment-guide" class="title-highlight">(*) Hướng dẫn thanh toán</label>
                                                            <textarea name="content_payment_guide" class="ckeditor" id="content-payment-guide" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_payment_guide"))) { echo set_value("content_payment_guide"); } else { if(!empty($infoSupportProd['content_payment_guide'])) { echo $infoSupportProd['content_payment_guide']; } else { echo null; } } ?></textarea>
                                                            <?php echo form_error("content_payment_guide"); ?>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12 p-3">
                                                        <div class="form-group">
                                                            <button type="submit" name="updateInfosupportProd_btn" class="add-new-cate">Cập Nhật Thông Tin Hỗ Trợ Sản Phẩm</button>
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