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
    <title>Admin | Update slider</title>
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
                                                <h4>Cập nhật slide</h4>
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
                    <?php
                        if(!empty($slideItem)) {
                            ?>
                                <section class="add-cate-prod">
                                    <div class="root">
                                        <div class="container-fluid">
                                            <div class="grid-grid">
                                                <div class="grid-column-12">
                                                    <div class="form-add-cate" class="cate-level-1">
                                                        <form action="" method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                            <div class="grid-row">
                                                                <div class="grid-column-12">
                                                                    <div class="form-info-left form-info-item-wrap">
                                                                        <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Ảnh slide</span>
                                                                        </label>
                                                                        <div class="form-group wrap-banner-form d-flex">
                                                                            <div class="banner-img-demo" style="width: 100%;">
                                                                                <span class="thumbNail" style="width: 100%;height: 450px;">
                                                                                    <img id="img-thumbNail-inner" data-exist-img="false" src="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { echo $slideItem['slide_img']; } ?>" alt="">
                                                                                    <input id="img-thumbNail-inner-url" name="banner_img_thumbNail_url" type="hidden" value="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { echo $slideItem['slide_img']; } ?>">
                                                                                </span>
                                                                            </div>
                                                                            <div class="banner-img-info" style="width: 15%">
                                                                                <div class="form-group d-flex justify-center">
                                                                                    <label for="image-banner-cate" class="image-banner-cate">
                                                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                                        <span>Thêm ảnh</span>
                                                                                        <input type="file" class="d-none" value="" name="image_banner_cate" id="image-banner-cate">
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php echo form_error("slide_number"); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="grid-column-12">
                                                                    <div class="form-info-right form-info-item-wrap">
                                                                        <label for="info-slide-title" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Thông tin slide</span>
                                                                        </label>
                                                                        <div class="info-wrap-form">
                                                                            <div class="form-group">
                                                                                <label for="slide-number" class="primary-title">Danh sách slide và số thứ tự đã tồn tại</label>
                                                                                <button type="button" class="view-info-list-slide">
                                                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                                    <span>Xem thông tin</span>
                                                                                </button>
                                                                                <div class="modal" id="info-slide">
                                                                                    <div class="modal-mask close-modal-slide"></div>
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-head">
                                                                                            <div class="modal-title d-flex justify-between align-items-center">
                                                                                                <h4>
                                                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                                    <span>Danh sách slide</span>
                                                                                                </h4>
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <button type="button" class="close-modal close-modal-slide">
                                                                                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="list-slide">
                                                                                                <?php
                                                                                                    foreach($listSlide as $slideItem__) {
                                                                                                        ?>
                                                                                                            <div class="slide-item d-flex" data-slide-id=<?php echo $slideItem__['slide_id'] ?>>
                                                                                                                <div class="slide-img">
                                                                                                                    <span class="thumbNail">
                                                                                                                        <img src="<?php echo $slideItem__['slide_img'] ?>" alt="Slide">
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <div class="slide-info">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="sider-info-4" class="primary-title">Ngày tạo</label>
                                                                                                                        <input type="text" name="" disabled value="<?php echo formatTime($slideItem__['create_date']) ?>" min="1" class="form-control" id="slider-info-<?php echo $slideItem['slide_id'] ?>" placeholder="Số thứ tự của slide" autocomplete="off" spellcheck="false">
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="sider-info-4" class="primary-title">Số thứ tự</label>
                                                                                                                        <input type="number" disabled name="" value="<?php echo $slideItem__['slide_number'] ?>" min="1" class="form-control" id="slider-info-<?php echo $slideItem['slide_id'] ?>" placeholder="Số thứ tự của slide" autocomplete="off" spellcheck="false">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php 
                                                                                                    }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="slide-number" class="primary-title">Số thứ tự slide</label>
                                                                                <input type="number" min="1" value="<?php if(!empty(set_value("slide_number"))) { echo set_value("slide_number"); } else { echo $slideItem['slide_number']; } ?>" name="slide_number" id="slide-number" class="form-control" autocomplete="off" spellcheck="false" placeholder="Nhập số thứ tự hiển thị của slide">
                                                                                <span class="error"></span>
                                                                                <?php echo form_error("slide_number") ?>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status-slide" class="primary-title">Trạng thái (mặc định: chờ duyệt)</label>
                                                                                <select name="status_slide" class="form-control" id="status-slide">
                                                                                    <option value="">Chọn Trạng thái danh mục</option>
                                                                                    <option value="publish" <?php if(!empty(set_value("status_slide"))) { if(set_value("status_slide") == 'publish') { echo "selected"; } else { echo null; } } else { if($slideItem['status_current'] == 'publish') { echo "selected"; } else { echo null; } } ?>>Hoạt động</option>
                                                                                    <option value="pending" <?php if(!empty(set_value("status_slide"))) { if(set_value("status_slide") == 'pending') { echo "selected"; } else { echo null; } } else { if($slideItem['status_current'] == 'pending') { echo "selected"; } else { echo null; } } ?>>Chờ Duyệt</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" name="update_slide_btn" class="add-new-cate">Cập nhật slide</button>
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
    <script src="./public/js/slider.js"></script>
    <!-- /upload file/ -->
    <script src="public/upload_file/fine-uploader.min.css"></script>
</body>

</html>