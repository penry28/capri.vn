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

    <title>Admin | Thông tin phản hồi khách hàng</title>
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
                                                <h4>TThông tin phản hồi khách hàng</h4>
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
                                        <a href="<?php echo base_url("?mod=support") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách phản hồi</span>
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
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Thông tin khách hàng</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="name-custommer" class="primary-title">Tên khách hàng</label>
                                                                    <input type="text" disabled name="name_custommer" value="<?php if(!empty($messageSpItem['fullname'])) { echo $messageSpItem['fullname']; } else { echo null; } ?>" id="name-custommer" class="form-control" placeholder="Tên khách hàng phản hồi" autocomplete="off" spellcheck="false">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email-custommer" class="primary-title">Email khách hàng</label>
                                                                    <input type="text" disabled name="email_custommer" value="<?php if(!empty($messageSpItem['email'])) { echo $messageSpItem['email']; } else { echo null; } ?>" id="email-custommer" class="form-control" placeholder="Tên khách hàng phản hồi" autocomplete="off" spellcheck="false">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="phone-custommer" class="primary-title">SĐT khách hàng</label>
                                                                    <input type="text" disabled name="phone_custommer" value="<?php if(!empty($messageSpItem['phone'])) { echo $messageSpItem['phone']; } else { echo null; } ?>" id="phone-custommer" class="form-control" placeholder="Tên khách hàng phản hồi" autocomplete="off" spellcheck="false">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="address-custommer" class="primary-title">Địa chỉ khách hàng</label>
                                                                    <input type="text" disabled name="address_custommer" value="<?php if(!empty($messageSpItem['address'])) { echo $messageSpItem['address']; } else { echo null; } ?>" id="address-custommer" class="form-control" placeholder="Tên khách hàng phản hồi" autocomplete="off" spellcheck="false">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="send-date" class="primary-title">Ngày gửi</label>
                                                                    <input type="text" name="send_date" disabled value="<?php if(!empty($messageSpItem['sent_date'])) { echo formatFullTime($messageSpItem['sent_date']); } else { echo null; } ?>" id="send-date" class="form-control" placeholder="Ngày gửi" autocomplete="off" spellcheck="false">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-6">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                <span>Thông tin phản hồi</span>
                                                            </label>
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="type-message" class="primary-title">Loại phản hồi</label>
                                                                    <input type="text" name="type_message" value="<?php if(!empty($messageSpItem['type'])) { echo formatTypeSupport($messageSpItem['type']); } ?>" disabled id="type-message" placeholder="Loại phản hồi" autocomplete="off" spellcheck="false" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="content-message" class="primary-title">Nội dung phản hồi</label>
                                                                    <textarea name="content_message"  id="content-message" style="height: 152px; width: 100%;" class="form-control" spellcheck="false" placeholder="Ghi mô tả danh mục"><?php if(!empty($messageSpItem['content'])) { echo $messageSpItem['content']; } ?></textarea>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="reply-date" class="primary-title">Ngày trả lời</label>
                                                                    <input type="text" name="reply_date" disabled value="<?php if(!empty(set_value("reply_date"))) { echo formatFullTime(set_value("reply_date")); } else { echo formatFullTime($messageSpItem['reply_date']); } ?>" id="reply-date" class="form-control" placeholder="Ngày trả lời" autocomplete="off" spellcheck="false">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status-mess" class="primary-title">Trạng thái</label>
                                                                    <select name="status_mess" class="form-control" id="status-mess">
                                                                        <option value="">-- Trạng thái phản hồi --</option>
                                                                        <option value="news" <?php if(!empty(set_value("status_mess"))) { if(set_value("status_mess") == 'news') { echo "selected"; } else { echo null; } } else { if(!empty($messageSpItem['status'])) { if($messageSpItem['status'] == 'news') { echo "selected"; } else { echo null; } } } ?>>Chưa xem</option>
                                                                        <option value="seen" <?php if(!empty(set_value("status_mess"))) { if(set_value("status_mess") == 'seen') { echo "selected"; } else { echo null; } } else { if(!empty($messageSpItem['status'])) { if($messageSpItem['status'] == 'seen') { echo "selected"; } else { echo null; } } } ?>>Đã xem</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-12">
                                                        <div class="form-group">
                                                            <button type="submit" name="update_info_message_btn" class="add-new-cate">Cập nhật thông tin</button>
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
<style>
    .form-control[disabled] {
        border: 1px solid #f00!important;
    }
</style>
</html>