<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title_slug = create_slug($blogItem['blog_title']);
        $url = base_url("bai-viet/{$title_slug}-{$blogItem['blog_id']}.html");
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty($blogItem['blog_desc'])) { echo $blogItem['blog_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:description" content="<?php if(!empty($blogItem['blog_desc'])) { echo $blogItem['blog_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:title" content="<?php if(!empty("blog_title")) { echo $blogItem['blog_title']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php if(!empty($blogItem['blog_img'])) { echo base_url("admin/{$blogItem['blog_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="og:image:alt" content="<?php if(!empty("blog_title")) { echo $blogItem['blog_title']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:image:secure_url" content="<?php if(!empty($blogItem['blog_img'])) { echo base_url("admin/{$blogItem['blog_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php if(!empty($blogItem['blog_img'])) { echo base_url("admin/{$blogItem['blog_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:image:src" content="<?php if(!empty($blogItem['blog_img'])) { echo base_url("admin/{$blogItem['blog_img']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/detail-blog.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/detail-prod.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.theme.default.min.css") ?>">
    <title><?php if(!empty($blogItem['blog_title'])) { echo $blogItem['blog_title']; } else { echo "Chi tiết bài viết"; }; ?></title>
</head>

<body>
    <div id="capri-app">
        <?php get_menuRespon() ?>
        <div class="wrapper">
            <?php get_header() ?>
            <main id="mainContent" class="content-wrap">
                <?php
                    if(!empty($blogItem)) {
                        ?>
                            <div class="wrap-mainContent">
                                <div class="container">
                                    <div class="grid-row">
                                        <div class="grid-column-12 grid-column-md-1">
                                            <aside class="sidebar position-relative">
                                                <div class="box-social-share">
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>">
                                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="grid-column-12 grid-column-md-11">
                                            <div class="grid-row">
                                                <div class="grid-column-12 grid-column-lg-9">
                                                    <div class="main-content-blog">
                                                        <section class="blog-detail-content-wrap">
                                                            <div class="blog-detail-title">
                                                                <?php
                                                                    if(!empty($blogItem['prodCate'])) {
                                                                        $slug_title_cate = create_slug($blogItem['prodCate']['title_cate']);
                                                                        $url_cate = base_url("danh-muc-san-pham/{$slug_title_cate}-{$blogItem['prodCate']['id_cate']}.html");
                                                                        ?>
                                                                            <a href="<?php echo $url_cate; ?>" class="category"><?php echo $blogItem['prodCate']['title_cate'] ?></a>
                                                                        <?php 
                                                                    }
                                                                ?>
                                                                <h2 class="blog-title"><?php echo $blogItem['blog_title'] ?></h2>
                                                                <div class="info d-flex justify-content-center align-items-center">
                                                                    <p class="time">Ngày đăng - <?php echo formatTime($blogItem['created_date']) ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="blog-detail-content">
                                                                <?php
                                                                    echo $blogItem['blog_content'];
                                                                ?>
                                                            </div>
                                                        </section>
                                                        <section class="blog-analysis">
                                                            <div class="grid-row justify-content-between">
                                                                <div class="grid-column-12 grid-column-md-5">
                                                                    <?php
                                                                        if(!empty($blogItem['cateRelative'])) {
                                                                            ?>
                                                                                <div class="cate-relative">
                                                                                    <ul class="list-cate d-flex align-items-center flex-wrap">
                                                                                        <?php
                                                                                            foreach($blogItem['cateRelative'] as $cateItem) {
                                                                                                $slug_title_cate = create_slug($cateItem['title_cate']);
                                                                                                $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html");
                                                                                                ?>
                                                                                                    <li>
                                                                                                        <a href="<?php echo $cateItem['url']; ?>"><?php echo $cateItem['title_cate'] ?></a>
                                                                                                    </li>
                                                                                                <?php 
                                                                                            }
                                                                                        ?>
                                                                                    </ul>
                                                                                </div>
                                                                            <?php 
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="grid-column-12 grid-column-md-6">
                                                                    <ul class="action d-flex justify-content-end">
                                                                        <li>
                                                                            <a href="" class="item love" data-status-love="false" data-id-blog="<?php echo $blogItem['blog_id'] ?>">
                                                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                                                <span class="love-value"><?php echo $blogItem['num_love'] ?></span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>">
                                                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="grid-column-12 grid-column-lg-3">
                                                    <div class="main-side-bar-blog">
                                                        <?php
                                                            if(!empty(getListAdsByType("ads_blog"))) {
                                                                ?>
                                                                    <section class="ads-wrap">
                                                                        <div class="ads-head">
                                                                            <h3>Quảng cáo</h3>
                                                                        </div>
                                                                        <div class="ads-body">
                                                                            <?php
                                                                                foreach(getListAdsByType("ads_blog") as $adsItem) {
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
                                                        <?php
                                                            if(!empty($listBlogRelative)) {
                                                                ?>
                                                                    <section class="blog-relative-wrap sec-side">
                                                                        <div class="header">
                                                                            <h4>Tin liên quan</h4>
                                                                        </div>
                                                                        <div class="list-blog-relative">
                                                                            <ul>
                                                                                <?php
                                                                                    foreach($listBlogRelative as $blogItem) {
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
                                                        <?php
                                                            if(!empty($blogItem['productRelative'])) {
                                                                ?>
                                                                    <section class="aside-product-recomment">
                                                                        <div class="recomment-product">
                                                                            <h4 class="title-recomment">Sản phẩm liên quan</h4>
                                                                            <div class="list-recomment-prod">
                                                                                <?php
                                                                                    foreach($blogItem['productRelative'] as $prodItem) {
                                                                                        $prodItem['profileUrl'] = "?mod=products&id={$prodItem['id_product']}";
                                                                                        ?>
                                                                                            <div class="product-item">
                                                                                                <?php
                                                                                                    if (!empty($prodItem['hire_purchase'])) {
                                                                                                        ?>
                                                                                                            <div class="hire-purchase">Trả góp</div>
                                                                                                        <?php
                                                                                                    }
                                                                                                    if(!empty($prodItem['capri_price'])) {
                                                                                                        ?>
                                                                                                            <div class="prod-discount">
                                                                                                                <span><?php echo percent_format($prodItem['capri_price'], $prodItem['market_price']); ?></span>
                                                                                                            </div>
                                                                                                        <?php
                                                                                                    }
                                                                                                ?>
                                                                                                <div class="prod-img">
                                                                                                    <a href="<?php echo $prodItem['profileUrl']; ?>" class="thumbNail view-prod">
                                                                                                        <img src="<?php echo base_url("admin/{$prodItem['avatar']}") ?>" alt="<?php echo $prodItem['title_product'] ?>">
                                                                                                    </a>
                                                                                                </div>
                                                                                                <div class="prod-info">
                                                                                                    <a href="" class="name-prod view-prod"><?php echo $prodItem['title_product'] ?></a>
                                                                                                    <?php
                                                                                                        if(!empty($prodItem['vote_type'])) {
                                                                                                            ?>
                                                                                                                <div class="product-rate d-flex align-items-center">
                                                                                                                    <span class="star-wrap" data-num-star="<?php echo $prodItem['vote_type'] ?>"></span>
                                                                                                                    <?php 
                                                                                                                        if(!empty($prodItem['num_custom_vote'])) {
                                                                                                                            echo "<span class='amount-rate'>({$prodItem['num_custom_vote']} đánh giá)</span>";
                                                                                                                        }
                                                                                                                    ?>
                                                                                                                </div>
                                                                                                            <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                    <?php
                                                                                                        if(!empty($prodItem['capri_price'])) {
                                                                                                            ?>
                                                                                                                <div class="product-price d-flex align-items-center">
                                                                                                                    <span class="price-capri"><?php echo $prodItem['capri_price'] ?></span>
                                                                                                                    <span class="price-old"><?php echo $prodItem['market_price'] ?></span>
                                                                                                                </div>
                                                                                                            <?php 
                                                                                                        }
                                                                                                    ?>
                                                                                                    <div class="btn-wrap">
                                                                                                        <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">Gọi tư vấn</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php 
                                                                                    }
                                                                                ?>
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
                                    </div>
                                </div>
                            </div>
                        <?php 
                    } else {
                        ?>
                            <div class="data-empty">
                                <span class="thumbNail">
                                    <img src="<?php echo base_url("public/images/logo-icon/khong-tim-thay-du-lieu.png") ?>" alt="">
                                </span>
                                <span class="notification">Không tồn tại bài viết này</span>
                                <a href="<?php echo base_url(); ?>" class="back-home">Quay về trang chủ</a>
                            </div>
                        <?php 
                    }
                ?>
            </main>
            <?php get_form_contact(); ?>
            <?php get_footer() ?>
        </div>
    </div>
</body>
<script src="<?php echo base_url("public/js/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("public/OwlCarousel/owl.carousel.min.js") ?>"></script>
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/blog.js") ?>"></script>
<script src="<?php echo base_url("public/js/product.js") ?>"></script>
</html>