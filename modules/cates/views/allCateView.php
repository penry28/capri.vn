<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $url = base_url("danh-muc-san-pham/tat-ca.html");
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty(getInfoSystem()['company_desc'])) { echo getInfoSystem()['company_desc']; } else { echo null; } ?>">
    <meta property="og:description" content="<?php if(!empty(getInfoSystem()['company_desc'])) { echo getInfoSystem()['company_desc']; } else { echo null; } ?>">
    <meta property="og:title" content="<?php if(!empty(getInfoSystem()['company_title'])) { echo getInfoSystem()['company_title']; } else { echo null; } ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="og:image:alt" content="<?php if(!empty(getInfoSystem()['company_title'])) { echo getInfoSystem()['company_title']; } else { echo null; } ?>">
    <meta property="og:image:secure_url" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="twitter:image:src" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/style.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/category.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.theme.default.min.css") ?>">
    <title>Danh m???c s???n ph???m</title>
</head>
<?php
?>
<body>
    <div id="capri-app">
        <?php get_menuRespon(); ?>
        <div class="wrapper">
            <?php get_header(); ?>
            <main id="mainContent" class="content-wrap">
                <?php get_banner() ?>
                <section class="breadcrum">
                    <div class="container">
                        <ol class="breadcrum-wrap grid-row align-items-center">
                            <li class="breadcrum-item __home d-flex align-items-center">
                                <a href="<?php echo base_url(); ?>" class="breadcrum-link-back" title="V??? Trang Ch???">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </a>
                            </li>
                            <?php
                                if(!empty($listCateLevel_1)) {
                                    ?>
                                        <li class="breadcrum-item __nav-1 d-flex align-items-center">
                                        <a href="javascript:void(0)" class="breadcrum-link-back" title="B???p ??i???n T???">T???t c??? danh m???c</a>
                                        <div class="breadcrum-cat-menu">
                                            <ul>
                                                <?php
                                                    foreach($listCateLevel_1 as $cateItem) {
                                                        $slugTitleCateLevel_1 = create_slug($cateItem['title_cate']);
                                                        $cateItem['url'] = base_url("danh-muc-san-pham/{$slugTitleCateLevel_1}-{$cateItem['id_cate']}.html");
                                                        ?>
                                                            <li>
                                                                <a href="<?php echo $cateItem['url']; ?>" class="breadcrum-cat-menu-item" title="<?php echo $cateItem['title_cate']; ?>"><?php echo $cateItem['title_cate']; ?></a>
                                                            </li>
                                                        <?php 
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ol>
                    </div>
                </section>
                <section class="list-all-cate">
                    <div class="container">
                        <div class="grid-row">
                            <div class="grid-column-12 grid-column-lg-2 sidebar-column">
                                <aside class="aside-main-filter">
                                    <?php
                                        if(!empty($listCateLevel_1)) {
                                            ?>
                                                <section class="box-wrap category-related">
                                                    <div class="box-title">
                                                        <h4>T???t c??? danh m???c</h4>
                                                    </div>
                                                    <?php
                                                        if(!empty($listCateLevel_1)) {
                                                            ?>
                                                                <div class="box-body">
                                                                    <ul class="list-category">
                                                                        <?php
                                                                            foreach($listCateLevel_1 as $cateItem) {
                                                                                $slug_title_cate = create_slug($cateItem['title_cate']);
                                                                                $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html");
                                                                                ?>
                                                                                    <li>
                                                                                        <a href="<?php echo $cateItem['url'] ?>"><?php echo $cateItem['title_cate'] ?></a>
                                                                                    </li>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                </section>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if(!empty(getListAdsByType("ads_prodCate"))) {
                                            ?>
                                                <section class="ads-wrap">
                                                    <div class="ads-head">
                                                        <h3>Qu???ng c??o</h3>
                                                    </div>
                                                    <div class="ads-body">
                                                        <?php
                                                            foreach(getListAdsByType("ads_prodCate") as $adsItem) {
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
                                        if(!empty($listBlogReadMost)) {
                                            ?>
                                                <section class="box-wrap filter-by-price">
                                                    <div class="box-title">
                                                        <h4>B??i vi???t ?????c nhi???u nh???t</h4>
                                                    </div>
                                                    <div class="box-body">
                                                        <ul>
                                                            <?php
                                                                foreach($listBlogReadMost as $blogItem) {
                                                                    $slug_title_blog = create_slug($blogItem['blog_title']);
                                                                    $blogItem['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogItem['blog_id']}.html");
                                                                    ?>
                                                                        <li>
                                                                            <a href="<?php echo $blogItem['url']; ?>" class="blog-item"><?php echo $blogItem['blog_title'] ?></a>
                                                                        </li>
                                                                    <?php 
                                                                }
                                                            ?>
                                                        </ul>
                                                        <a href="<?php echo base_url("danh-muc-bai-viet/tat-ca.html") ?>" class="read-total-blog">Xem t???t c??? b??i vi???t ...</a>
                                                    </div>
                                                </section>
                                            <?php 
                                        }
                                    ?>
                                    <div class="main-side-bar-blog p-0">
                                        <?php
                                            if(!empty($listBlogMostLove)) {
                                                ?>
                                                    <section class="blog-relative-wrap sec-side">
                                                        <div class="header">
                                                            <h4>Tin nhi???u l?????t th??ch</h4>
                                                        </div>
                                                        <div class="list-blog-relative">
                                                            <ul>
                                                                <?php
                                                                    foreach($listBlogMostLove as $blogItem) {
                                                                        $slug_title_blog = create_slug($blogItem['blog_title']);
                                                                        $blogItem['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogItem['blog_id']}.html");
                                                                        ?>
                                                                            <li class="d-flex blog-item">
                                                                                <a href="<?php echo $blogItem['url']; ?>" class="info-blog">
                                                                                    <span class="title-blog"><?php echo $blogItem['blog_title'] ?></span>
                                                                                </a>
                                                                            </li>
                                                                        <?php 
                                                                    }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                        <a href="<?php echo base_url("danh-muc-bai-viet/tat-ca.html") ?>" class="read-total-blog">Xem t???t c??? b??i vi???t ...</a>
                                                    </section>
                                                <?php 
                                            }
                                        ?>
                                        <section class="intro-socail-wrap">
                                            <?php
                                                if(!empty(getInfoSystem()['fanpage_facebook'])) {
                                                    ?>
                                                        <a href="<?php echo getInfoSystem()['fanpage_facebook'] ?>" class="fanpage-change socail-item" target="_blank">K??nh fanpage Capri</a>
                                                    <?php 
                                                }
                                                if(!empty(getInfoSystem()['youtube_change'])) {
                                                    ?>
                                                        <a href="<?php echo getInfoSystem()['youtube_change']; ?>" class="youtube-change socail-item" target="_blank">K??nh youtube Capri</a>
                                                    <?php 
                                                }
                                                if(!empty(getInfoSystem()['zalo'])) {
                                                    ?>
                                                        <a href="https://zalo.me/<?php echo getInfoSystem()['zalo']; ?>" class="zalo-change socail-item" target="_blank">K??nh zalo Capri</a>
                                                    <?php 
                                                }
                                            ?>
                                        </section>
                                        <?php
                                            if(!empty(listInfoShowroom())) {
                                                ?>
                                                    <section class="intro-contact-wrap">
                                                        <div class="header">
                                                            <h3>Th??ng tin li??n h???</h3>
                                                        </div>
                                                        <div class="body">
                                                            <ul class="list-contact">
                                                                <?php
                                                                    foreach(listInfoShowroom() as $showroomItem) {
                                                                        ?>
                                                                            <li class="contact-item">
                                                                                <div class="title"><?php echo $showroomItem['showroom_name'] ?></div>
                                                                                <div class="phone item">
                                                                                    <span class="label">S??T_1:</span>
                                                                                    <a href="tel:<?php echo $showroomItem['showroom_phone_1']; ?>" class="d-inline value"><?php echo formatPhone($showroomItem['showroom_phone_1']); ?></a>
                                                                                </div>
                                                                                <?php
                                                                                    if(!empty($showroomItem['showroom_phone_2'])) {
                                                                                        ?>
                                                                                            <div class="phone item">
                                                                                                <span class="label">S??T_2:</span>
                                                                                                <a href="tel:<?php echo $showroomItem['showroom_phone_2']; ?>" class="d-inline value"><?php echo formatPhone($showroomItem['showroom_phone_2']); ?></a>
                                                                                            </div>
                                                                                        <?php 
                                                                                    }
                                                                                ?>
                                                                                <div class="address item">
                                                                                    <span class="label">??C:</span>
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
                                </aside>
                            </div>
                            <div class="grid-column-12 grid-column-lg-10 content-column">
                                <section class="all-cate-box-wrap">
                                    <div class="cate-box-head">
                                        <div class="group-title d-flex justify-center align-items-center flex-column">
                                            <h4 class="title">DANH M???C S???N PH???M</h4>
                                            <p class="desc">Capri s??? h???u cho m??nh t??nh c??ch th??ng minh, tinh t???, t???n t??m, sang tr???ng, th???i th?????ng, d???ch v??? ho??n h???o, s???n ph???m ?????ng b???, ti??n phong v??? c??ng ngh??? v?? tin c???y s??? 1 trong ng??nh thi???t b??? b???p t???i Vi???t Nam.</p>
                                        </div>
                                    </div>
                                    <?php
                                        if(!empty($listCateLevel_1)) {
                                            ?>
                                                <div class="cate-box-body">
                                                    <div class="grid-row">
                                                        <?php
                                                            $i=1;
                                                            foreach($listCateLevel_1 as $cateItem) {
                                                                $slug_title_cate = create_slug($cateItem['title_cate']);
                                                                $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html");
                                                                ?>
                                                                    <div class="<?php if($i == 1 && ( $i%2 != 0)) { ?>cate-item grid-column-12 mb-3 mb-md-0 p-0 p-md-2 h__last<?php } else { ?>cate-item grid-column-12 grid-column-md-6 mb-3 mb-md-0 p-0 p-md-2<?php } ?>">
                                                                        <div class="cate-item-wrap">
                                                                            <div class="cate-img">
                                                                                <span class="thumbNail">
                                                                                    <img src="<?php echo base_url("admin/{$cateItem['img_banner']}") ?>" alt="<?php echo $cateItem['title_cate']; ?>">
                                                                                </span>
                                                                            </div>
                                                                            <div class="cate-info">
                                                                                <a href="<?php echo $cateItem['url']; ?>" class="title-cate">
                                                                                    <div class="title-main d-flex flex-column align-items-center">
                                                                                        <span class="view-title"><?php echo $cateItem['title_cate']; ?></span>
                                                                                        <span class="view-cate">Xem chi ti???t !</span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php 
                                                                $i++;
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php 
                                        } else {
                                            ?>
                                                <div class="data-empty">
                                                    <span class="thumbNail">
                                                        <img src="<?php echo base_url("public/images/logo-icon/khong-tim-thay-du-lieu.png") ?>" alt="">
                                                    </span>
                                                    <span class="notification">Ch??a c?? danh m???c s???n ph???m n??o</span>
                                                    <a href="<?php echo base_url(); ?>" class="back-home">Quay v??? trang ch???</a>
                                                </div>
                                            <?php 
                                        }
                                    ?>
                                </section>
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
<script src="<?php echo base_url("public/js/carousel.js") ?>"></script>
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/category.js") ?>"></script>
<script src="<?php echo base_url("public/js/home.js") ?>"></script>
<style>
    @media screen and (min-width: 1280px) {
        section.breadcrum {
            margin-top: 0;
        }
    }
</style>
</html>