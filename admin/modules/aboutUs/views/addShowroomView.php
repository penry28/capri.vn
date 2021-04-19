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
    <title>Admin | Thêm Showroom</title>
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
                    <section class="section-top-act">
                        <div class="root">
                            <div class="container-fluid">
                                <div class="grid-row">
                                    <div class="grid-column-7">
                                        <a href="<?php echo base_url("?mod=aboutUs&action=indexShowroom") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách showroom</span>
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
                                                        <div class="box-add-wrap">
                                                            <div class="grid-row">
                                                                <div class="grid-column-6 mx-auto p-3">
                                                                    <div class="box-info-showroow-item">
                                                                        <div class="form-group">
                                                                            <label for="showroom-name" class="label-title">Tên showroom</label>
                                                                            <input type="text" value="<?php echo set_value("showroomName") ?>" name="showroomName" id="showroom-name" class="form-control" placeholder="Tên showroom" autocomplete="off" spellcheck="false">
                                                                            <?php echo form_error("showroomName") ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="showroom-address" class="label-title">Địa chỉ showroom</label>
                                                                            <input type="text" value="<?php echo set_value("showroomAddress") ?>" name="showroomAddress" id="showroom-address" class="form-control" placeholder="Địa chỉ showroom" autocomplete="off" spellcheck="false">
                                                                            <?php echo form_error("showroomAddress") ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="" class="label-title">Số điện thoại liên hệ</label>
                                                                            <div class="grid-row">
                                                                                <div class="grid-column-6 pr-2">
                                                                                    <label for="showroom-phone-1" class="label-title">Số điện thoại 1 (bắt buộc)</label>
                                                                                    <input type="text" name="showroomPhone_1" value="<?php echo set_value("showroomPhone_1") ?>" id="showroom-phone-1" class="form-control" placeholder="Số điện thoại 1" autocomplete="off" spellcheck="false">
                                                                                    <?php echo form_error("showroomPhone_1") ?>
                                                                                </div>
                                                                                <div class="grid-column-6 pl-2">
                                                                                    <label for="showroom-phone-2" class="label-title">Số điện thoại 2</label>
                                                                                    <input type="text" name="showroomPhone_2" value="<?php echo set_value("showroomPhone_2") ?>" id="showroom-phone-2" class="form-control" placeholder="Số điện thoại 2" autocomplete="off" spellcheck="false">
                                                                                    <?php echo form_error("showroomPhone_2") ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="showroom-email" class="label-title">Email liên hệ</label>
                                                                            <input type="text" name="showroomEmail" id="showroom-email" class="form-control" placeholder="Email liên hệ" autocomplete="off" spellcheck="false">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="status-current" class="label-title">Trạng thái showroom (Mặt định: chờ duyệt)</label>
                                                                            <select name="status_current" id="status-current" class="form-control">
                                                                                <option value="">-- Chọn trạng thái showroom --</option>
                                                                                <option value="publish" <?php if(set_value("status_current") == 'publish') { echo "selected"; } else { echo null; } ?>>Hoặc động</option>
                                                                                <option value="pending" <?php if(set_value("status_current") == 'pending') { echo "selected"; } else { echo null; } ?>>Chờ duyệt</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="submit" class="add-new-cate" name="addShowroom_btn">Thêm Showroom</button>
                                                                        </div>
                                                                    </div>
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
    <script src="./public/js/aboutus.js"></script>
    <!-- /upload file/ -->
    <script src="public/Ckeditor/ckeditor/ckeditor.js"></script>
</body>

</html>