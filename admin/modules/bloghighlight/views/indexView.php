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
    <title>Capri admin | Bài viết nổi bậc</title>
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
                                                <h4>Chọn 2 bài viết nổi bậc</h4>
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
                                                    <div class="grid-column-7">
                                                        <div class="form-info-left form-info-item-wrap">
                                                            <div class="wrap-banner-form d-flex">
                                                                <div class="banner-img-demo" style="width: 100%;">
                                                                    <span class="thumbNail" style="width: 100%;height: 328px;">
                                                                        <img id="img-thumbNail-inner-1" data-exist-img="false" src="<?php if(!empty(set_value("inp-thumbNail-inner-1"))) { echo set_value("inp-thumbNail-inner-1"); } else { if(!empty($listBlogClient[0])) { echo $listBlogClient[0]['blog_img']; } else { echo "./public/images/logo/img_prod.png"; } } ?>" alt="">
                                                                        <input type="text" name="inp-thumbNail-inner-1" id="inp-thumbNail-inner-1" class="d-none" value="<?php if(!empty(set_value("inp-thumbNail-inner-1"))) { echo set_value("inp-thumbNail-inner-1"); } else { if(!empty($listBlogClient[0])) { echo $listBlogClient[0]['blog_img']; } else { echo null; } } ?>">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-5">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="headline-blog-1" class="primary-title">Chọn bài viết 1</label>
                                                                    <select name="blog_1" id="headline-blog-1" class="form-control">
                                                                        <option value="">-- Chọn 1 bài viết nổi bật --</option>
                                                                        <?php
                                                                            if(!empty($listBlog)) {
                                                                                foreach($listBlog as $blogItem) {
                                                                                    ?>
                                                                                        <option <?php if(!empty(set_value("blog_1"))) { if(set_value("blog_1") == $blogItem['blog_id']) { echo "selected"; } else { echo null; } } else { if(!empty($listBlogClient[0])) { if($listBlogClient[0]['blog_id'] == $blogItem['blog_id']) { echo "selected"; } else { echo null; } } } ?>  value="<?php echo $blogItem['blog_id'] ?>"><?php echo $blogItem['blog_title'] ?></option>
                                                                                    <?php
                                                                                }
                                                                            } else {
                                                                                ?>
                                                                                    <option value="">Bạn chưa thêm bài viết nào</option>
                                                                                <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    <?php echo form_error("blog_1") ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-row">
                                                    <div class="grid-column-7">
                                                        <div class="form-info-left form-info-item-wrap">
                                                            <div class="wrap-banner-form d-flex">
                                                                <div class="banner-img-demo" style="width: 100%">
                                                                    <span class="thumbNail" style="width: 100%;height: 328px;">
                                                                        <img id="img-thumbNail-inner-2" data-exist-img="false" src="<?php if(!empty(set_value("inp-thumbNail-inner-2"))) { echo set_value("inp-thumbNail-inner-2"); } else { if(!empty($listBlogClient[1])) { echo $listBlogClient[1]['blog_img']; } else { echo "./public/images/logo/img_prod.png"; } } ?>" alt="">
                                                                        <input type="text" name="inp-thumbNail-inner-2" id="inp-thumbNail-inner-2" class="d-none" value="<?php if(!empty(set_value("inp-thumbNail-inner-2"))) { echo set_value("inp-thumbNail-inner-2"); } else { if(!empty($listBlogClient[1])) { echo $listBlogClient[1]['blog_img']; } else { echo null; } } ?>">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-column-5">
                                                        <div class="form-info-right form-info-item-wrap">
                                                            <div class="info-wrap-form">
                                                                <div class="form-group">
                                                                    <label for="headline-blog-2" class="primary-title">Chọn bài viết 2</label>
                                                                    <select name="blog_2" id="headline-blog-2" class="form-control">
                                                                        <option value="">-- Chọn 1 bài viết nổi bật --</option>
                                                                        <?php
                                                                            if(!empty($listBlog)) {
                                                                                foreach($listBlog as $blogItem) {
                                                                                    ?>
                                                                                        <option <?php if(!empty(set_value("blog_2"))) { if(set_value("blog_2") == $blogItem['blog_id']) { echo "selected"; } else { echo null; } } else { if(!empty($listBlogClient[1])) { if($listBlogClient[1]['blog_id'] == $blogItem['blog_id']) { echo "selected"; } else { echo null; } } } ?> value="<?php echo $blogItem['blog_id'] ?>"><?php echo $blogItem['blog_title'] ?></option>
                                                                                    <?php
                                                                                }
                                                                            } else {
                                                                                ?>
                                                                                    <option value="">Bạn chưa thêm bài viết nào</option>
                                                                                <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    <?php echo form_error("blog_2") ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-row">
                                                    <div class="grid-column-12">
                                                        <div class="form-info-item-wrap">
                                                            <button type="submit" name="add_blog_highlight_btn" class="add-new-cate">Chọn 2 bài viết này là nổi bậc</button>
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
    <script src="./public/js/bloghighlight.js"></script>
    <!-- /upload file/ -->
</body>

</html>