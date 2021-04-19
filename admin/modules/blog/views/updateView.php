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
    <title>Admin | Cập nhật bài viết</title>
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
                                                <h4>Cập nhật bài viết</h4>
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
                                        <a href="<?php echo base_url("?mod=blog") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=blog&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=blogCate") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh sách danh mục bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?php echo base_url("?mod=blogCate&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm danh mục bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                        if(!empty($blogItem)) {
                            ?>
                                <section class="add-cate-prod">
                                    <div class="root">
                                        <div class="container-fluid">
                                            <div class="grid-grid">
                                                <div class="grid-column-12">
                                                    <div class="form-add-cate" class="cate-level-1">
                                                        <form action="" method="POST" class="form-wrap" id="formUploadCategory" data-cate-level="1">
                                                            <div class="grid-row">
                                                                <div class="grid-column-6">
                                                                    <div class="form-info-left form-info-item-wrap">
                                                                        <label for="banner-cate" class="top-title d-flex align-items-center">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                            <span>Ảnh mô tả bài viết</span>
                                                                        </label>
                                                                        <div class="wrap-banner-form d-flex" style="position: relative;">
                                                                            <div class="banner-img-demo">
                                                                                <span class="thumbNail" style="width: 328px;height: 328px;">
                                                                                    <img id="img-thumbNail-inner" data-exist-img="false" src="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { echo $blogItem['blog_img']; } ?>" alt="<?php if(!empty(set_value("title_blog"))) { echo set_value("title_blog"); } else { echo $blogItem['blog_title']; } ?>">
                                                                                    <input id="img-thumbNail-inner-url" name="banner_img_thumbNail_url" type="hidden" value="<?php if(!empty(set_value("banner_img_thumbNail_url"))) { echo set_value("banner_img_thumbNail_url"); } else { echo $blogItem['blog_img']; } ?>">
                                                                                </span>
                                                                            </div>
                                                                            <div class="banner-img-info">
                                                                                <div class="form-group d-flex justify-center">
                                                                                    <label for="image-banner-cate" class="image-banner-cate">
                                                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                                        <span>Thêm ảnh</span>
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
                                                                            <span>Thông tin bài viết</span>
                                                                        </label>
                                                                        <div class="info-wrap-form">
                                                                            <div class="form-group">
                                                                                <label for="title-blog" class="primary-title">Tiêu đề bài viết</label>
                                                                                <input type="text" name="title_blog" value="<?php if(!empty(set_value("title_blog"))) { echo set_value("title_blog"); } else { echo $blogItem['blog_title']; } ?>" id="title-blog" class="form-control" placeholder="Tiêu đề bài viết" autocomplete="off" spellcheck="false">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="title-blog" class="primary-title">Danh mục sản phẩm cho bài viết</label>
                                                                                <select name="cate_prod_id" id="cate-prod-id" class="form-control">
                                                                                    <option value="">--- Chọn danh mục sản phẩm ---</option>
                                                                                    <?php
                                                                                        if(!empty($listCateProdLevel_2)) {
                                                                                            foreach ($listCateProdLevel_2 as $cateItem) {
                                                                                                ?>
                                                                                                    <option <?php if(!empty(set_value("cate_prod_id"))) { if(set_value("cate_prod_id") == $cateItem['id_cate']) { echo "selected"; } else { echo null; } } else { if($blogItem['cate_prod_id'] == $cateItem['id_cate']) { echo "selected"; } else { echo null; } } ?> value="<?php echo $cateItem['id_cate'] ?>"><?php echo $cateItem['title_cate'] ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        } else {
                                                                                            ?>
                                                                                                <option value="">Không có danh mục nào</option>
                                                                                            <?php 
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="product-blog" class="primary-title">Sản phẩm cho bài viết</label>
                                                                                <select name="product_blog" id="product-blog" class="form-control">
                                                                                    <option value="">--- Bài viết thuộc sản phẩm ---</option>
                                                                                    <?php
                                                                                        if(!empty($listProd)) {
                                                                                            foreach($listProd as $prodItem) {
                                                                                                ?>
                                                                                                    <option <?php if(!empty(set_value("product_blog"))) { if(set_value("product_blog") == $prodItem['id_product']) { echo "selected"; } else { echo null; } } else { if($blogItem['product_blog_id'] == $prodItem['id_product']) { echo "selected"; } else { echo null; } } ?> value="<?php echo $prodItem['id_product'] ?>"><?php echo $prodItem['title_product'] ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        } else {
                                                                                            echo "<option value=''>Không có sản phẩm nào</option>";
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="desc-blog" class="primary-title">Trích dẫn (Mô tả bài viết)</label>
                                                                                <textarea name="desc_blog" id="desc-blog" class="form-control" spellcheck="false" style="height: 80px; width: 100%;" placeholder="Ghi mô tả danh mục"><?php echo $blogItem['blog_desc'] ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status-blog" class="primary-title">Trạng thái (mặc định: chờ duyệt)</label>
                                                                                <select name="status_blog" class="form-control" id="status-blog">
                                                                                    <option value="">Chọn Trạng thái bài viết</option>
                                                                                    <option <?php if(!empty(set_value("status_blog"))) { if(set_value("status_blog") == 'publish') { echo "selected"; } else { echo null; } } else { if($blogItem['status_current'] == 'publish') { echo "selected"; } else { echo null; } } ?> value="publish">Hoạt động</option>
                                                                                    <option <?php if(!empty(set_value("status_blog"))) { if(set_value("status_blog") == 'pending') { echo "selected"; } else { echo null; } } else { if($blogItem['status_current'] == 'pending') { echo "selected"; } else { echo null; } } ?> value="pending">Chờ Duyệt</option>
                                                                                    <option <?php if(!empty(set_value("status_blog"))) { if(set_value("status_blog") == 'system') { echo "selected"; } else { echo null; } } else { if($blogItem['status_current'] == 'system') { echo "selected"; } else { echo null; } } ?> value="system">Hệ thống</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="grid-column-6">
                                                                    <div class="form-info-right form-info-item-wrap">
                                                                        <div class="info-wrap-form">
                                                                            <div class="form-group">
                                                                                <label for="blogCate-id" class="primary-title">Danh mục cho bài viết này</label>
                                                                                <select name="blogCate_id" id="blogCate-id" class="form-control">
                                                                                    <option value="">--- Danh mục của bài viết ---</option>
                                                                                    <?php
                                                                                        if(!empty($listBlogCate)) {
                                                                                            foreach($listBlogCate as $blogCateItem) {
                                                                                                ?>
                                                                                                    <option <?php if(!empty(set_value("blogCate_id"))) { if(set_value("blogCate_id") == $blogCateItem['blogCate_id']) { echo "selected"; } else { echo null; } } else { if($blogItem['blog_parentCate_id'] == $blogCateItem['blogCate_id']) { echo "selected"; } else { echo null; }  } ?> value="<?php echo $blogCateItem['blogCate_id']; ?>"><?php echo $blogCateItem['blogCate_title']; ?></option>
                                                                                                <?php 
                                                                                            }
                                                                                        } else {
                                                                                            ?>
                                                                                                <option value="">Chưa có danh mục bài viết nào</option>
                                                                                            <?php 
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="grid-column-6">
                                                                    <div class="form-info-right form-info-item-wrap">
                                                                        <div class="info-wrap-form">
                                                                            <div class="form-group">
                                                                                <label for="video-intro" class="primary-title">Iframe video cho bài viết</label>
                                                                                <input type="text" name="video_intro" value="<?php if(!empty(set_value("video_intro"))) { echo set_value("video_intro"); } else { echo $blogItem['video_intro']; } ?>" id="video-intro" class="form-control" placeholder="Sử dụng iframe youtube để load video" autocomplete="off" spellcheck="false">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="grid-column-12">
                                                                    <div class="form-group">
                                                                        <textarea name="blog_content" class="ckeditor" id="blog-content" style="width: 100%; height: 500px;"><?php if(!empty(set_value("blog_content"))) { echo set_value("blog_content"); } else { echo $blogItem['blog_content']; } ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" name="update_blog_btn" class="add-new-cate">Cập nhật bài viết</button>
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