<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $blogCate_title = !empty($blogCateItem['blogCate_title']) ? $blogCateItem['blogCate_title'] : "Tất cả";
        $blogCate_id = !empty($blogCateItem['blogCate_id']) ? '-'.$blogCateItem['blogCate_id'] : '';
        $slug_title = create_slug($blogCate_title);
        $url = base_url("danh-muc-bai-viet/{$slug_title}{$blogCate_id}.html");
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty($blogCateItem['blogCate_desc'])) { echo $blogCateItem['blogCate_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:description" content="<?php if(!empty($blogCateItem['blogCate_desc'])) { echo $blogCateItem['blogCate_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:title" content="<?php if(!empty($blogCateItem['blogCate_title'])) { echo $blogCateItem['blogCate_title']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:url" content="<?php echo $url ?>">
    <meta property="og:image" content="<?php if(!empty($blogCateItem['blogCate_img'])) { echo base_url("admin/{$blogCateItem['blogCate_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="og:image:alt" content="<?php if(!empty($blogCateItem['blogCate_title'])) { echo $blogCateItem['blogCate_title']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:image:secure_url" content="<?php if(!empty($blogCateItem['blogCate_img'])) { echo base_url("admin/{$blogCateItem['blogCate_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php if(!empty($blogCateItem['blogCate_img'])) { echo base_url("admin/{$blogCateItem['blogCate_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:image:src" content="<?php if(!empty($blogCateItem['blogCate_img'])) { echo base_url("admin/{$blogCateItem['blogCate_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/blog.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/detail-blog.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.theme.default.min.css") ?>">
    <title><?php if(!empty($blogCate_title)) { echo $blogCate_title; } else { echo "Danh mục bài viết"; } ?></title>
</head>

<body>
    <div id="capri-app">
        <?php get_menuRespon() ?>
        <div class="wrapper">
            <?php get_header() ?>
            <main id="mainContent" class="content-wrap">
                <?php
                    if(!empty($listBlogCate)) {
                        ?>
                            <section class="sc-banner">
                                <div class="banner-slider-fullWidth">
                                    <div class="slider-wrap">
                                        <div class="slider-info">
                                            <div class="slider-img-thumb d-flex justify-content-center align-items-center">
                                                <?php
                                                    foreach($listBlogCate as $cateBlogItem) {
                                                        if (!empty($cateBlogItem['blogCate_img'])) {
                                                            ?>
                                                                <span data-id-blog-banner="<?php $cateBlogItem['blogCate_id'] ?>" class="thumbNail slider-navication">
                                                                    <img src="<?php echo base_url("admin/".$cateBlogItem['blogCate_img']) ?>" class="img-fluid" alt="<?php echo $cateBlogItem['blogCate_title'] ?>">
                                                                </span>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="slider-list">
                                            <?php
                                                foreach($listBlogCate as $cateBlogItem) {
                                                    if(!empty($cateBlogItem['blogCate_img'])) {
                                                        ?>
                                                            <div class="slide-item">
                                                                <span class="thumbNail">
                                                                    <img src="<?php echo base_url("admin/".$cateBlogItem['blogCate_img']) ?>" class="img-fluid" alt="<?php echo $cateBlogItem['blogCate_title'] ?>">
                                                                </span>
                                                            </div>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            <script>let listSlider=document.querySelectorAll(".slider-list .slide-item");listSlider.length>1?listSlider[0].classList.add("slide-in"):listSlider[0].classList.add("has-only-child");</script>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php 
                    }
                ?>
                <?php
                    if(!empty($listBlogMostView)) {
                        ?>
                            <section class="blog-hot">
                                <div class="container">
                                    <div class="grid-row">
                                        <div class="grid-column-12 mx-auto">
                                            <div class="blog-hot-wrap">
                                                <div class="blog-title">
                                                    <h4>Bài viết được đọc nhiều nhất</h4>
                                                </div>
                                                <div class="blog-carouse-slider">
                                                    <div class="owl-carousel owl-theme">
                                                        <?php
                                                            foreach($listBlogMostView as $blogItem) {
                                                                $slug_title_blog = create_slug($blogItem['blog_title']);
                                                                $blogItem['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogItem['blog_id']}.html");
                                                                $blogCreateData = formatTime($blogItem['created_date']);
                                                                ?>
                                                                    <div class="item blog-item">
                                                                        <div>
                                                                            <a href="<?php echo $blogItem['url'] ?>">
                                                                                <span class="blog-img">
                                                                                    <img src="<?php echo base_url("admin/".$blogItem['blog_img']) ?>" alt="<?php echo $blogItem['blog_title'] ?>">
                                                                                </span>
                                                                            </a>
                                                                            <div class="blog-content">
                                                                                <p class="blog-time">
                                                                                    <span class="label">Ngày đăng: </span>
                                                                                    <span class="info"><?php echo $blogCreateData ?></span>
                                                                                </p>
                                                                                <?php
                                                                                    if(!empty($blogItem['cate_prod_id'])) {
                                                                                        $slug_title_cate = create_slug($blogItem['prodCate']['title_cate']);
                                                                                        $blogItem['prodCate']['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$blogItem['prodCate']['id_cate']}.html");
                                                                                        ?>
                                                                                            <a href="<?php echo $blogItem['prodCate']['url'] ?>" class="blog-category"><?php echo $blogItem['prodCate']['title_cate'] ?></a>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                            <div class="space-empty" style="height: 20px;"></div>
                                                                                        <?php 
                                                                                    }
                                                                                ?>
                                                                                <h2 class="title">
                                                                                    <a href="<?php echo $blogItem['url'] ?>"><?php echo $blogItem['blog_title'] ?></a>
                                                                                </h2>
                                                                                <p class="blog-desc"><?php echo $blogItem['blog_desc'] ?></p>
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
                                </div>
                            </section>
                        <?php
                    } else {
                        ?>
                        <div class='empty-box-margin-top'></div>
                        <?php 
                    }
                ?>
                <section class="blog-list">
                    <div class="container">
                        <div class="grid-row justify-content-between">
                            <div class="grid-column-12 grid-column-lg-9 pr-0 pr-lg-4">
                                <div class="blog-main-content">
                                    <?php
                                        if(!empty($blogHighlight)) {
                                            $slug_title_blog = create_slug($blogHighlight['blog_title']);
                                            $blogHighlight['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogHighlight['blog_id']}.html");
                                            ?>
                                                <div class="blog-highlight">
                                                    <div class="highlight-head">
                                                        <?php
                                                            if(!empty($blogHighlight['cate_prod_id'])) {
                                                                if(!empty($blogHighlight['prodCate'])) {
                                                                    $slug_title_cate = create_slug($blogHighlight['prodCate']['title_cate']);
                                                                    $blogHighlight['prodCate']['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$blogHighlight['prodCate']['id_cate']}.html");
                                                                    ?>
                                                                        <a href="<?php echo $blogHighlight['prodCate']['url'] ?>" class="blog-category"><?php echo $blogHighlight['prodCate']['title_cate'] ?></a>
                                                                    <?php 
                                                                } else {
                                                                    $blogHighlight['prodCate']['url'] = null;
                                                                }
                                                            }
                                                        ?>
                                                        <h2 class="blog-title">
                                                            <a href="<?php echo $blogHighlight['url']; ?>"><?php echo $blogHighlight['blog_title'] ?></a>
                                                        </h2>
                                                        <p class="blog-time">
                                                            <span class="time-title">Ngày đăng:</span>
                                                            <span class="time-value"><?php echo formatTime($blogHighlight['created_date']); ?></span>
                                                        </p>
                                                    </div>
                                                    <div class="highlight-body">
                                                        <div class="blog-highlight-img">
                                                            <a href="<?php echo $blogHighlight['url'] ?>" class="thumbNail">
                                                                <img src="<?php echo base_url("admin/".$blogHighlight['blog_img']) ?>" alt="<?php echo $blogHighlight['blog_title'] ?>">
                                                            </a>
                                                        </div>
                                                        <div class="blog-highlight-desc">
                                                            <p class="blog-desc"><?php echo $blogHighlight['blog_desc'] ?></p>
                                                        </div>
                                                        <div class="button-wp">
                                                            <a href="<?php echo $blogHighlight['url'] ?>" class="blog-read-more">Đọc thêm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php 
                                        }
                                    ?>
                                    <div class="blog-container">
                                        <div class="blog-container-head">
                                            <h4 class="blog-container-title">Bài viết chọn lọc</h4>
                                        </div>
                                        <?php
                                            if(!empty($listBlogTypical)) {
                                                ?>
                                                    <div class="blog-container-body">
                                                        <div class="grid-row">
                                                            <?php
                                                                foreach($listBlogTypical as $blogItem) {
                                                                    $slug_title_blog = create_slug($blogItem['blog_title']);
                                                                    $blogItem['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogItem['blog_id']}.html");
                                                                    ?>
                                                                        <div class="grid-column-12 grid-column-md-6 grid-column-lg-4 blog-item">
                                                                            <div class="blog-img">
                                                                                <a href="<?php echo $blogItem['url'] ?>" class="thumbNail">
                                                                                    <img src="<?php echo base_url("admin/".$blogItem['blog_img']) ?>" alt="<?php echo $blogItem['blog_title'] ?>">
                                                                                </a>
                                                                            </div>
                                                                            <div class="blog-info">
                                                                                <?php
                                                                                    if(!empty($blogItem['prodCate'])) {
                                                                                        $slug_title_cate = create_slug($blogItem['prodCate']['title_cate']);
                                                                                        $blogItem['prodCate']['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$blogItem['prodCate']['id_cate']}.html");
                                                                                        ?>
                                                                                             <a href="<?php echo $blogItem['prodCate']['url'] ?>" class="blog-category"><?php echo $blogItem['prodCate']['title_cate'] ?></a>
                                                                                        <?php 
                                                                                    } else {
                                                                                        ?>
                                                                                            <div class="space-empty" style="height: 12px;"></div>
                                                                                        <?php 
                                                                                    }
                                                                                ?>
                                                                                <h2 class="blog-title">
                                                                                    <a href="<?php echo $blogItem['url']; ?>"><?php echo $blogItem['blog_title'] ?></a>
                                                                                </h2>
                                                                                <p class="blog-time">
                                                                                    <span class="time-title">Ngày đăng: </span>
                                                                                    <span class="time-value"><?php echo formatTime($blogItem['created_date']) ?></span>
                                                                                </p>
                                                                                <p class="blog-desc"><?php echo $blogItem['blog_desc'] ?></p>
                                                                                <div class="button-wp">
                                                                                    <a href="<?php echo $blogItem['url'] ?>" class="blog-read-more">Đọc thêm</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php 
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php 
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-column-12 grid-column-lg-3">
                                <?php
                                    if(!empty(getListAdsByType("ads_blogCate"))) {
                                        ?>
                                            <section class="ads-wrap">
                                                <div class="ads-head">
                                                    <h3>Quảng cáo</h3>
                                                </div>
                                                <div class="ads-body">
                                                    <?php
                                                        foreach(getListAdsByType("ads_blogCate") as $adsItem) {
                                                            ?>
                                                                <div class="ads-item">
                                                                    <div class="ads-img">
                                                                        <a href="<?php echo $adsItem['ads_link'] ?>" target="_blank" title="<?php echo $adsItem['ads_title'] ?>" class="thumbNail">
                                                                            <img src="<?php echo base_url("admin/{$adsItem['ads_img']}") ?>" alt="<?php echo $adsItem['ads_title'] ?>">
                                                                        </a>
                                                                    </div>
                                                                    <div class="ads-title">
                                                                        <a href="<?php echo $adsItem['ads_link'] ?>" target="_blank" class="title"><?php echo $adsItem['ads_title'] ?></a>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </section>
                                        <?php 
                                    }
                                ?>
                                <div class="blog-side-aboutMe">
                                    <div class="about-wrap">
                                        <div class="about-head">
                                            <h4 class="about-title">Về chúng tôi</h4>
                                        </div>
                                        <div class="about-body">
                                            <div class="about-img">
                                                <a href="<?php echo base_url("gioi-thieu.html") ?>" class="thumbNail">
                                                    <img src="<?php echo base_url("public/images/banner/banner-3.jpg") ?>" alt="Giới thiệu về công ty capri">
                                                </a>
                                            </div>
                                            <div class="about-info">
                                                <a href="<?php echo base_url("gioi-thieu.html") ?>" class="read-link">Đọc thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-side-aboutMe">
                                    <div class="about-wrap">
                                        <div class="about-head">
                                            <h4 class="about-title">Connect & Follow</h4>
                                        </div>
                                        <div class="about-body">
                                            <ul class="list-icons d-flex justify-content-center">
                                                <li>
                                                    <a href="" data-modal-open="#modal-contact-form" class="icon-item">
                                                        <span class="fa fa-phone"></span>
                                                    </a>
                                                </li>
                                                <?php
                                                    if(!empty(getInfoSystem()['fanpage_facebook'])) {
                                                        ?>
                                                            <li>
                                                                <a target="_blank" href="<?php echo getInfoSystem()['fanpage_facebook'] ?>" class="icon-item">
                                                                    <span class="fa fa-facebook"></span>
                                                                </a>
                                                            </li>
                                                        <?php 
                                                    }
                                                    if(!empty(getInfoSystem()['zalo'])) {
                                                        ?>
                                                            <li>
                                                                <a target="_blank" href="https://zalo.me/<?php echo getInfoSystem()['zalo'] ?>" class="icon-item">
                                                                    <span class="thumbNail">
                                                                        <img src="<?php echo base_url("public/images/logo-icon/zalo-icon.png") ?>" alt="">
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        <?php 
                                                    }
                                                    if(!empty(getInfoSystem()['youtube_change'])) {
                                                        ?>
                                                            <li>
                                                                <a target="_blank" href="<?php echo getInfoSystem()['youtube_change']; ?>" class="icon-item">
                                                                    <span class="fa fa-youtube-play"></span>
                                                                </a>
                                                            </li>
                                                        <?php 
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-side-bar-blog">
                                    <?php
                                        if(!empty($listBlogMostLove)) {
                                            ?>
                                                <section class="blog-relative-wrap sec-side">
                                                    <div class="header">
                                                        <h4>Tin nhiều lượt thích</h4>
                                                    </div>
                                                    <div class="list-blog-relative">
                                                        <ul>
                                                            <?php
                                                                foreach($listBlogMostLove as $blogItem) {
                                                                    $slug_title_blog = create_slug($blogItem['blog_title']);
                                                                    $blogItem['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogItem['blog_id']}.html");
                                                                    ?>
                                                                        <li class="d-flex blog-item">
                                                                            <div class="img-blog">
                                                                                <a href="<?php echo $blogItem['url']; ?>" class="thumbNail">
                                                                                    <img src="<?php echo base_url("admin/{$blogItem['blog_img']}"); ?>" alt="<?php echo $blogItem['blog_title'] ?>">
                                                                                </a>
                                                                            </div>
                                                                            <a href="<?php echo $blogItem['url']; ?>" class="info-blog">
                                                                                <span class="title-blog"><?php echo $blogItem['blog_title'] ?></span>
                                                                            </a>
                                                                        </li>
                                                                    <?php 
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </section>
                                            <?php 
                                        }
                                    ?>
                                    <section class="intro-socail-wrap">
                                        <?php
                                            if(!empty(getInfoSystem()['fanpage_facebook'])) {
                                                ?>
                                                    <a href="<?php echo getInfoSystem()['fanpage_facebook'] ?>" class="fanpage-change socail-item" target="_blank">Kênh fanpage Capri</a>
                                                <?php 
                                            }
                                            if(!empty(getInfoSystem()['youtube_change'])) {
                                                ?>
                                                    <a href="<?php echo getInfoSystem()['youtube_change']; ?>" class="youtube-change socail-item" target="_blank">Kênh youtube Capri</a>
                                                <?php 
                                            }
                                            if(!empty(getInfoSystem()['zalo'])) {
                                                ?>
                                                    <a href="https://zalo.me/<?php echo getInfoSystem()['zalo']; ?>" class="zalo-change socail-item" target="_blank">Kênh zalo Capri</a>
                                                <?php 
                                            }
                                        ?>
                                    </section>
                                    <?php
                                        if(!empty(listInfoShowroom())) {
                                            ?>
                                                <section class="intro-contact-wrap">
                                                    <div class="header">
                                                        <h3>Thông tin liên hệ</h3>
                                                    </div>
                                                    <div class="body">
                                                        <ul class="list-contact">
                                                            <?php
                                                                foreach(listInfoShowroom() as $showroomItem) {
                                                                    ?>
                                                                        <li class="contact-item">
                                                                            <div class="title"><?php echo $showroomItem['showroom_name'] ?></div>
                                                                            <div class="phone item">
                                                                                <span class="label">SĐT_1:</span>
                                                                                <a href="tel:<?php echo $showroomItem['showroom_phone_1']; ?>" class="d-inline value"><?php echo formatPhone($showroomItem['showroom_phone_1']); ?></a>
                                                                            </div>
                                                                            <?php
                                                                                if(!empty($showroomItem['showroom_phone_2'])) {
                                                                                    ?>
                                                                                        <div class="phone item">
                                                                                            <span class="label">SĐT_2:</span>
                                                                                            <a href="tel:<?php echo $showroomItem['showroom_phone_2']; ?>" class="d-inline value"><?php echo formatPhone($showroomItem['showroom_phone_2']); ?></a>
                                                                                        </div>
                                                                                    <?php 
                                                                                }
                                                                            ?>
                                                                            <div class="address item">
                                                                                <span class="label">ĐC:</span>
                                                                                <a href="https://www.google.com/maps/place/<?php echo $showroomItem['showroom_address']; ?>" class="d-inline value"><?php echo $showroomItem['showroom_address']; ?></a>
                                                                            </div>
                                                                        </li>
                                                                    <?php 
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </section>
                                            <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <?php get_form_contact(); ?>
            <?php get_footer() ?>
        </div>
    </div>
</body>
<script src="<?php echo base_url("public/js/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("public/OwlCarousel/owl.carousel.min.js") ?>"></script>
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/carousel.js") ?>"></script>
</html>