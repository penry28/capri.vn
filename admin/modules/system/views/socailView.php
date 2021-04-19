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
    <title>Admin | Thông Tin mạng xã hội công ty</title>
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
                                                <h4>Thông tin mạng xã hội công ty</h4>
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
                                                    <div class="grid-column-12">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Thông tin mạng xã hội công ty</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="fanpage-facebook" class="primary-title">Fanpage facebook</label>
                                                                    <input type="text" name="fanpage_facebook" value="<?php if(!empty(set_value("fanpage_facebook"))) { echo set_value("fanpage_facebook"); } else { if(!empty($infoSystem['fanpage_facebook'])) { echo $infoSystem['fanpage_facebook']; } else { echo null; } } ?>" id="fanpage-facebook" class="form-control" placeholder="Nhập đường link Fanpage facebook" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("fanpage_facebook"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="youtube-change" class="primary-title">Youtube change </label>
                                                                    <input type="text" name="youtobe_change" value="<?php if(!empty(set_value("youtobe_change"))) { echo set_value("youtobe_change"); } else { if(!empty($infoSystem['youtube_change'])) { echo $infoSystem['youtube_change']; } else { echo null; } } ?>" id="youtube-change" class="form-control" placeholder="Nhập đường link Youtube change" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("youtobe_change"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="zalo-app" class="primary-title">Zalo</label>
                                                                    <input type="text" name="zalo_app" value="<?php if(!empty(set_value("zalo_app"))) { echo set_value("zalo_app"); } else { if(!empty($infoSystem['zalo'])) { echo $infoSystem['zalo']; } else { echo null; } } ?>" id="zalo-app" class="form-control" placeholder="Nhập số điện thoại có sử dụng Zalo" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("zalo_app"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="update_new_info_socail_system" class="add-new-cate">Cập nhật thông tin</button>
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