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
    <title>Admin | Cấu hình email</title>
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
                                                <h4>Thông tin cấu hình email</h4>
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
                                                                <span>Thông tin cấu hình email</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="fullname-email-send" class="primary-title">Tên người gửi</label>
                                                                    <input type="text" name="fullname_email_send" value="<?php if(!empty(set_value("fullname_email_send"))) { echo set_value("fullname_email_send"); } else { if(!empty($infoSystem['fullname_email_send'])) { echo $infoSystem['fullname_email_send']; } else { echo null; } } ?>" id="fullname-email-send" class="form-control" placeholder="Nhập tên người gửi" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("fullname_email_send"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="user-email-send" class="primary-title">Tài khoảng email gửi (Hãy đảm bảo bạn đã bậc kết nối kém an toàn cho email này)</label>
                                                                    <input type="text" name="user_email_send" value="<?php if(!empty(set_value("user_email_send"))) { echo set_value("user_email_send"); } else { if(!empty($infoSystem['user_email_send'])) { echo $infoSystem['user_email_send']; } else { echo null; } } ?>" id="user-email-send" class="form-control" placeholder="Nhập tên tài khoảng email gửi" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("user_email_send"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pass-email-send" class="primary-title">Mật khẩu email gửi</label>
                                                                    <input type="password" name="pass_email_send" value="<?php if(!empty(set_value("pass_email_send"))) { echo set_value("pass_email_send"); } else { if(!empty($infoSystem['pass_email_send'])) { echo $infoSystem['pass_email_send']; } else { echo null; } } ?>" id="pass-email-send" class="form-control" placeholder="Nhập mật khẩu email gửi" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("pass_email_send"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fullname-email-reply" class="primary-title">Tên người nhận</label>
                                                                    <input type="text" name="fullname_email_reply" value="<?php if(!empty(set_value("fullname_email_reply"))) { echo set_value("fullname_email_reply"); } else { if(!empty($infoSystem['fullname_email_reply'])) { echo $infoSystem['fullname_email_reply']; } else { echo null; } } ?>" id="fullname-email-reply" class="form-control" placeholder="Nhập tên người nhận phản hồi" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("fullname_email_reply"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="user-email-reply" class="primary-title">Tài khoảng email nhận</label>
                                                                    <input type="text" name="user_email_reply" value="<?php if(!empty(set_value("user_email_reply"))) { echo set_value("user_email_reply"); } else { if(!empty($infoSystem['user_email_reply'])) { echo $infoSystem['user_email_reply']; } else { echo null; } } ?>" id="user-email-reply" class="form-control" placeholder="Nhập tài khoảng email nhận tin nhắn phản hồi" autocomplete="off" spellcheck="false">
                                                                    <?php echo form_error("user_email_reply"); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="update_new_info_email_system" class="add-new-cate">Cập nhật thông tin</button>
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