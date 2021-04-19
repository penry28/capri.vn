<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url() ?>">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/add-product.css">
    <link rel="stylesheet" href="./public/css/layout.css">
    <link rel="stylesheet" href="./public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/fonts/aizo-icon.css">
    <title>Admin | Thêm sản phẩm</title>
</head>

<body>
    <div id="app" class="color_root size_root wrap_root">
        <div class="wrapper">
            <?php get_sidebar() ?>
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
                                                <h4>Thêm sản phẩm</h4>
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
                                        <a href="<?php echo base_url("?mod=prod") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách sản phẩm</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=cate&controller=cateLevel_1&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm danh mục cấp 1</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=cate&controller=cateLevel_2&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm danh mục cấp 2</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="add-product">
                        <div class="root">
                            <div class="container-fluid p-0">
                                <div class="form-add-wrap">
                                    <div class="notifi-main-top"><?php echo form_error("productExists"); ?></div>
                                    <form action="" method="POST" class="form-add-product" id="form-add-product-main">
                                        <div class="grid-row">
                                            <div class="grid-column-6">
                                                <div class="form-space-item">
                                                    <div class="form-group">
                                                        <label for="title-product" class="label-title">Tên sản phẩm</label>
                                                        <div class="icon-label">
                                                            <i class="icon aizo-info"></i>
                                                        </div>
                                                        <input value="<?php echo set_value("title_product") ?>" type="text" name="title_product" id="title-product" class="form-control" autocomplete="off" spellcheck="false" placeholder="Nhập tên sản phẩm (bắt buộc)">
                                                        <?php echo form_error("title_product") ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model-product" class="label-title">module sản phẩm</label>
                                                        <div class="icon-label">
                                                            <i class="icon aizo-info"></i>
                                                        </div>
                                                        <input value="<?php echo set_value("module_product") ?>" type="text" name="module_product" id="module-product" class="form-control" autocomplete="off" spellcheck="false" placeholder="Nhập module sản phẩm (bắt buộc)">
                                                        <?php echo form_error("module_product") ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price-product" class="label-title">Giá Capri</label>
                                                        <div class="icon-label">
                                                            <i class="icon aizo-info"></i>
                                                        </div>
                                                        <input value="<?php echo set_value("price_product") ?>" type="text" name="price_product" id="price-product" class="form-control" autocomplete="off" spellcheck="false" placeholder="Nhập giá sản phẩm (bắt buộc)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price-old-product" class="label-title">Giá thị trường</label>
                                                        <div class="icon-label">
                                                            <i class="icon aizo-info"></i>
                                                        </div>
                                                        <input value="<?php echo set_value("price_old_product") ?>" type="text" name="price_old_product" id="price-old-product" class="form-control" autocomplete="off" spellcheck="false" placeholder="Nhập giá thị trường sản phẩm (bắt buộc)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="amout-product" class="label-title">Số lượng sản phẩm</label>
                                                        <div class="icon-label">
                                                            <i class="icon aizo-info"></i>
                                                        </div>
                                                        <input value="<?php if(!empty(set_value("amout_product"))) { echo set_value("amout_product"); } else { echo 10; } ?>" type="number" name="amout_product" id="amout-product" class="form-control" autocomplete="off" spellcheck="false" placeholder="Nhập số lượng của sản phẩm (ko bắt buộc)">
                                                    </div>    
                                                    <div class="form-group" style="border: 1px solid rgba(255, 255, 255, 0.12);">
                                                        <label for="stop-sell" class="label-title p-2" style="border-bottom: 1px solid rgba(255, 255, 255, 0.12);">Ngừng kinh doanh</label>
                                                        <div class="d-flex align-items-center p-2">
                                                            <div class="select-item mr-2">
                                                                <label for="yes-stop-sell" style="color: #fff; cursor: pointer;">Có</label>
                                                                <input type="radio" <?php if(!empty(set_value("stop_sell")[0])) { if(set_value('stop_sell')[0] == 1) { echo "checked"; } else { echo null; } } else { echo null; } ?> name="stop_sell[]" value="1" id="yes-stop-sell">
                                                            </div>
                                                            <div class="select-item">
                                                                <label for="no-stop-sell" style="color: #fff; cursor: pointer;">Không</label>
                                                                <input type="radio" <?php if(!empty(set_value("stop_sell")[0])) { if(set_value("stop_sell")[0] == 0) { echo "checked"; } else { echo null; } } else { echo "checked"; } ?> name="stop_sell[]" value="0" id="no-stop-sell">
                                                            </div>
                                                        </div>
                                                    </div>                                                
                                                </div>
                                            </div>
                                            <div class="grid-column-6">
                                                <div class="form-space-item">
                                                    <div class="form-group">
                                                        <label for="desc-short" class="label-title">Mô tả ngắn sản phẩm (Seo description)</label>
                                                        <textarea name="desc_short" id="desc-short" class="form-control" style="width: 100%; height: 88px;" spellcheck="false" placeholder="Nhập tô tả ngắn cho sản phẩm (không bắt buộc)"><?php echo set_value("desc_short") ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="wrap-info d-flex justify-between align-items-center">
                                                            <label for="avatar_if">Ảnh avatar sản phẩm</label>
                                                            <button type="button" class="btn-popup" id="avatar_if" data-toggle-modal="#modal-avatar-add-prod">
                                                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                                <span>Thêm</span>
                                                            </button>
                                                            <div class="popup-modal avatar-prod" id="modal-avatar-add-prod">
                                                                <div class="modal-mask" data-close-modal="#modal-avatar-add-prod"></div>
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-head">
                                                                            <h4 class="modal-title">Thêm ảnh sản phẩm</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="grid-row">
                                                                                <div class="grid-column-5">
                                                                                    <div class="main-img-prod">
                                                                                        <span class="thumbNail">
                                                                                            <img id="img-thumbNail-inner" data-exist-img="true" src="<?php if(empty(set_value("avatar_main"))) { echo "./public/images/logo/img_prod.png"; } else { echo set_value("avatar_main"); } ?>" alt="" data-img-name="24.jpg">
                                                                                            <input id="img-thumbNail-inner-url" name="avatar_main" type="hidden" value="<?php echo set_value("avatar_main") ?>">
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="grid-column-6">
                                                                                    <div class="info-img-prod h-100 d-flex flex-column justify-between">
                                                                                        <div class="top-info">
                                                                                            <div class="action">
                                                                                                <label for="add-avatar-img" type="button" class="add-img d-flex align-items-center">
                                                                                                    <span>Thêm ảnh</span>
                                                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                                    <input type="file" name="add_avatar_img" id="add-avatar-img" class="d-none">
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="info">
                                                                                                <div class="form-group">
                                                                                                    <label for="" class="label-title">Seo title (alt)</label>
                                                                                                    <input type="text" name="path-img" class="form-control py-1 px-2" id="path-img" autocomplete="off" spellcheck="false" placeholder="Title seo website">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="button-info" style="align-self: flex-end;">
                                                                                            <div class="info-button-wrap d-flex align-items-center">
                                                                                                <button type="button" class="btn-item" data-close-modal="#modal-avatar-add-prod">Hoàn tất</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php echo form_error("avatar_main") ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="wrap-info d-flex justify-between align-items-center">
                                                            <label for="img-desc-if">Ảnh mô tả sản phẩm</label>
                                                            <button type="button" class="btn-popup" id="img-desc-if" data-toggle-modal="#modal-abum-desc-prod">
                                                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                                <span>Thêm</span>
                                                            </button>
                                                            <div class="popup-modal abum-img-prod" id="modal-abum-desc-prod">
                                                                <div class="modal-mask" data-close-modal="#modal-abum-desc-prod"></div>
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-head">
                                                                            <h4 class="modal-title">Thêm Ảnh Mô Tả Sản Phẩm</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="action-wrap d-flex align-items-center justify-between">
                                                                                <label for="add_desc_img_button">
                                                                                    <span>Thêm Ảnh</span>
                                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                    <input type="file" multiple name="add_desc_img_button" id="add_desc_img_button" class="d-none">
                                                                                </label>
                                                                                <div class="notification-error">
                                                                                    <span class="error"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="list-img-wrap" id="list-img-description">
                                                                                <?php
                                                                                    if(!empty(set_value("imgDesc"))) {
                                                                                        ?>
                                                                                            <div class="wrap-list">
                                                                                                <?php
                                                                                                    foreach( set_value("imgDesc") as $imgItem) {
                                                                                                        ?>
                                                                                                            <div class="img-wrap-item d-flex">
                                                                                                                <div class="img-wrap">
                                                                                                                    <span class="thumbNail">
                                                                                                                        <img src="<?php echo $imgItem ?>" alt="">
                                                                                                                        <input type="hidden" name="imgDesc[]" value="<?php echo $imgItem ?>">
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <div class="info-wrap">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="seo-title-1" class="title-label">Seo title (alt)</label>
                                                                                                                        <input type="text" name="seo-title[]" id="seo-title-1" class="form-control py-1 px-2" placeholder="Title seo website">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php 
                                                                                                    }
                                                                                                ?>
                                                                                            </div>
                                                                                        <?php 
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="button-wrap d-flex justify-end">
                                                                                <button type="button" class="btn-item" data-close-modal="#modal-abum-desc-prod">Hoàn tất</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="border: 1px solid rgba(255, 255, 255, 0.12);">
                                                        <label for="" class="label-title p-2" style="border-bottom: 1px solid rgba(255, 255, 255, 0.12);">Cho trả góp</label>
                                                        <div class="d-flex align-items-center p-2">
                                                            <div class="select-item mr-2">
                                                                <label for="yes-installment" style="color: #fff; cursor: pointer;">Có</label>
                                                                <input type="radio" <?php if(!empty(set_value("hire_purchase")[0])) { if(set_value("hire_purchase")[0] == 1) { echo "checked"; } else { echo null; } } else { echo null; } ?> name="hire_purchase[]" value="1" id="yes-installment">
                                                            </div>
                                                            <div class="select-item">
                                                                <label for="no-installment" style="color: #fff; cursor: pointer;">Không</label>
                                                                <input type="radio" <?php if(!empty(set_value("hire_purchase")[0])) { if(set_value("hire_purchase")[0] == 0) { echo "checked"; } else { echo null; } } else { echo "checked"; } ?>  name="hire_purchase[]" value="0" id="no-installment">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group" style="border: 1px solid rgba(255, 255, 255, 0.12);">
                                                        <label for="" class="label-title p-2" style="border-bottom: 1px solid rgba(255, 255, 255, 0.12);">Chứng nhận chất lượng</label>
                                                        <div class="p-2">
                                                            <select name="vote_type" id="vote-type" class="form-control">
                                                                <option value="5"   <?php if(set_value("vote_type") == 5)   { echo "selected"; } else { echo null; } ?> >5 sao</option>
                                                                <option value="4.5" <?php if(set_value("vote_type") == 4.5) { echo "selected"; } else { echo null; } ?> >4.5 sao</option>
                                                                <option value="4"   <?php if(set_value("vote_type") == 4)   { echo "selected"; } else { echo null; } ?> >4 sao</option>
                                                                <option value="3.5" <?php if(set_value("vote_type") == 3.5) { echo "selected"; } else { echo null; } ?> >3.5 sao</option>
                                                                <option value="3"   <?php if(set_value("vote_type") == 3)   { echo "selected"; } else { echo null; } ?> >3 sao</option>
                                                                <option value="2.5" <?php if(set_value("vote_type") == 2.5) { echo "selected"; } else { echo null; } ?> >2.5 sao</option>
                                                                <option value="2"   <?php if(set_value("vote_type") == 2)   { echo "selected"; } else { echo null; } ?> >2 sao</option>
                                                                <option value="1.5" <?php if(set_value("vote_type") == 1.5) { echo "selected"; } else { echo null; } ?> >1.5 sao</option>
                                                                <option value="1"   <?php if(set_value("vote_type") == 1)   { echo "selected"; } else { echo null; } ?> >1 sao</option>
                                                            </select>
                                                            <div class="num-customer-vote-wrap">
                                                                <label for="num-customer-vote">Số người đánh giá</label>
                                                                <input type="number" name="num_custom_vote" class="form-control" min="1" value="50" id="num-customer-vote" autocomplete="off" spellcheck="false" placeholder="Nhập số khách hàng đánh giá">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-column-12">
                                                <div class="form-space-item">
                                                    <div class="form-group">
                                                        <label for="info-basic-prod" class="label-title">Thông tin cơ bản sản phẩm</label>
                                                        <textarea name="info_basic_prod" id="info-basic-prod" class="ckeditor form-control" placeholder="Nhập thông tin cơ bản sản phẩm" spellcheck="false"><?php echo set_value("info_basic_prod") ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-column-12">
                                                <div class="form-space-item">
                                                    <div class="form-group">
                                                        <label for="info-feature-prod" class="label-title">Tính năng sản phẩm</label>
                                                        <textarea name="info_feature_prod" id="info-feature-prod" class="ckeditor form-control" placeholder="Nhập thông tin mô tả tính năng sản phẩm" spellcheck="false"><?php echo set_value("info_feature_prod"); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-column-12">
                                                <div class="form-space-item">
                                                    <div class="form-group">
                                                        <label for="info-specifications-prod" class="label-title">Thông số kỹ thuật sản phẩm</label>
                                                        <textarea name="info_specifications_prod" id="info-specifications-prod" class="ckeditor form-control" placeholder="Nhập thông tin thông số kỹ thuật của sản phẩm" spellcheck="false"><?php echo set_value("info_specifications_prod"); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-column-12">
                                                <div class="form-space-item">
                                                    <div class="form-group">
                                                        <label for="desc-main" class="label-title">Mô tả sản phẩm</label>
                                                        <textarea name="prod_desc_main" class="ckeditor form-control" placeholder="Nhập tô tả chi tiết cho sản phẩm (bắt buộc)" spellcheck="false"><?php echo set_value("prod_desc_main"); ?></textarea>
                                                        <?php echo form_error("prod_desc_main") ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-column-12">
                                                <div class="grid-row">
                                                    <div class="grid-column-6">
                                                        <div class="form-space-item">
                                                            <div class="form-choose-category">
                                                                <div class="form-choose-head">
                                                                    <h4 class="title-main-top">Chọn danh mục & Thương hiệu</h4>
                                                                </div>
                                                                <div class="form-choose-body">
                                                                    <div class="form-group">
                                                                        <label class="label-title" for="select-level-1">Danh mục cấp 1</label>
                                                                        <select name="cate_level_1" id="select-level-1" class="form-control">
                                                                            <option value="">--- Chọn danh mục cấp 1 ---</option>
                                                                            <?php
                                                                                foreach($listCate as $cateItem) {
                                                                                    ?>
                                                                                        <option value="<?php echo $cateItem['id_cate'] ?>"><?php echo $cateItem['title_cate'] ?></option>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                        <?php echo form_error("cate_level_1") ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="label-title" for="select-level-2">Danh mục cấp 2</label>
                                                                        <select name="cate_level_2" id="select-level-2" class="form-control">
                                                                            <option value="">--- Chọn danh mục cấp 2 ---</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="label-title" for="status">Trạng thái (mặc định: chờ duyệt)</label>
                                                                        <select name="status" id="status" class="form-control">
                                                                            <option value="">--- Chọn trạng thái bài viết ---</option>
                                                                            <option value="publish">Hoạt động</option>
                                                                            <option value="pending">Chờ duyệt</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" name="addProdSubmit" class="add-prod-submit">Thêm sản phẩm</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-6">
                                                        <div class="form-space-item">
                                                            <div class="form-choose-blog">
                                                                <div class="form-choose-head">
                                                                    <h4 class="title-main-top">Chọn blog tiêu biểu hiện thị</h4>
                                                                    <div class="form-group">
                                                                        <div class="form-search-blog">
                                                                            <input type="text" name="strSearchBlog" id="searchBlogInput" spellcheck="false" autocomplete="off" style="padding-right: 100px!important;" placeholder="Nhập tiêu đề của bài blog" class="form-control p-2">
                                                                            <button class="button-search-blog" name="clearStrSearch" type="button">Clear</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-filter-by-cate">
                                                                            <select name="cate_filter_select" class="form-control" id="cate-filter-select" aria-placeholder="filter danh mục bài viết">
                                                                                <?php
                                                                                    foreach($listCateLevel_2 as $cateItem) {
                                                                                        ?>
                                                                                            <option value="<?php echo $cateItem['id_cate'] ?>"><?php echo $cateItem['title_cate'] ?></option>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                            <button type="button" name="clear" class="filter-by-cate-blog">Clear</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    if(!empty($listBlog)) {
                                                                        ?>
                                                                            <div class="form-choose-body">
                                                                                <div class="list-blog-wrap">
                                                                                    <ul>
                                                                                        <?php
                                                                                            foreach($listBlog as $blogItem) {
                                                                                                ?>
                                                                                                    <li class="blog-item">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <input type="checkbox" name="blogRelative[]" value="<?php echo $blogItem['blog_id'] ?>" class="grid-column-1" id="blog-id-<?php echo $blogItem['blog_id'] ?>" data-id-blog="<?php echo $blogItem['blog_id'] ?>">
                                                                                                            <label for="blog-id-<?php echo $blogItem['blog_id'] ?>" class="title-blog grid-column-10 d-flex justify-content-center align-items-center">
                                                                                                                <span class="blog-title"><?php echo $blogItem['blog_title'] ?></span>
                                                                                                                <span class="select-btn">Chọn</span>
                                                                                                            </label>
                                                                                                            <a href="" class="view-blog">Xem</a>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                    </ul>
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
                                        </div>
                                    </form>
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
    <script src="./public/js/product.js"></script>
    <!-- /upload file/ -->
    <script src="public/Ckeditor/ckeditor/ckeditor.js"></script>
</body>

</html>