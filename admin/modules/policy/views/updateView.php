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
    <title>Admin | Cập nhật chính sách</title>
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
                                                <h4>Cập nhật chính sách</h4>
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
                                        <a href="<?php echo base_url("?mod=policy") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách chính sách</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-4">
                                        <a href="<?php echo base_url("?mod=policy&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm chính sách</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                        if(!empty($policyItem)) {
                            ?>
                                <section class="add-cate-prod">
                                    <div class="root">
                                        <div class="container-fluid">
                                            <div class="grid-grid">
                                                <div class="grid-column-11 mx-auto">
                                                    <div class="form-add-cate" class="cate-level-1">
                                                        <form action="" method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                            <div class="grid-row">
                                                                <div class="grid-column-12">
                                                                    <div class="form-info-right form-info-item-wrap">
                                                                        <label for="info-cate-title" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Cập Nhật Thông Tin Về Chính Sách</span>
                                                                        </label>
                                                                        <div class="info-wrap-form">
                                                                            <div class="form-group mb-2">
                                                                                <label for="title-policy" class="primary-title">Tên chính sách</label>
                                                                                <input type="text" name="title_policy" value="<?php if(!empty(set_value("title_policy"))) { echo set_value("title_policy"); } else { if(!empty($policyItem['policy_title'])) { echo $policyItem['policy_title']; } else { echo null; } } ?>" id="title-policy" class="form-control" placeholder="Tên chính sách" autocomplete="off" spellcheck="false">
                                                                                <?php echo form_error("title_policy"); ?>
                                                                            </div>
                                                                            <div class="form-group mb-2">
                                                                                <label for="desc-policy" class="primary-title">Mô tả chính sách( dùng để seo )</label>
                                                                                <textarea type="text" name="desc_policy" id="desc-policy" class="form-control" placeholder="Mô tả chính sách" autocomplete="off" spellcheck="false"><?php if(!empty(set_value("desc_policy"))) { echo set_value("desc_policy"); } else { if(!empty($policyItem['policy_desc'])) { echo $policyItem['policy_desc']; } else { echo null; } } ?></textarea>
                                                                                <?php echo form_error("desc_policy") ?>
                                                                            </div>
                                                                            <div class="form-group mb-2">
                                                                                <label for="" class="primary-title"></label>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="content-policy" class="primary-title">Nội dung chính sách</label>
                                                                                <textarea name="content_policy" class="ckeditor" id="content-policy" style="width: 100%; height: 500px;"><?php if(!empty(set_value("content_policy"))) { echo set_value("content_policy"); } else { if(!empty($policyItem['policy_content'])) { echo $policyItem['policy_content']; } else { echo null; } } ?></textarea>
                                                                                <?php echo form_error("content_policy"); ?>
                                                                            </div>
                                                                            <div class="form-group mb-2">
                                                                                <label for="status-policy" class="primary-title">Trạng thái (Mặt định: chờ duyệt)</label>
                                                                                <select name="status_policy" class="form-control" id="status-policy">
                                                                                    <option value="">--Chọn trạng thái chính sách--</option>
                                                                                    <option value="publish" <?php if(!empty(set_value("status_policy"))) { if(set_value("status_policy") == 'publish') { echo "selected"; } else { echo null; } } else { if(!empty($policyItem['status_current'] == 'publish')) { echo "selected"; } else { echo null; } } ?>>Hoạt động</option>
                                                                                    <option value="pending" <?php if(!empty(set_value("status_policy"))) { if(set_value("status_policy") == 'pending') { echo "selected"; } else { echo null; } } else { if(!empty($policyItem['status_current'] == 'pending')) { echo "selected"; } else { echo null; } } ?>>Chờ duyệt</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" name="update_new_policy_btn" class="add-new-cate">Cập nhật thông tin chính sách</button>
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
    <script src="./public/js/blog.js"></script>
    <!-- /upload file/ -->
    <script src="public/Ckeditor/ckeditor/ckeditor.js"></script>
</body>

</html>