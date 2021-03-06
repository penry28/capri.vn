<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $title_slug = !empty($cateParent) ? create_slug($cateParent['title_cate']) : 'tat-ca';
        $id_cate = !empty($cateParent) ? "-".$cateParent['id_cate'] : '';
        $url = base_url("danh-muc-san-pham/{$title_slug}{$id_cate}.html");
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty($cateParent['cate_desc'])) { echo $cateParent['cate_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:description" content="<?php if(!empty($cateParent['cate_desc'])) { echo $cateParent['cate_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:title" content="<?php if(!empty($cateParent['title_cate'])) { echo $cateParent['title_cate']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:url" content="<?php echo $url ?>">
    <meta property="og:image" content="<?php if(!empty($cateParent['img_banner'])) { echo base_url("admin/{$cateParent['img_banner']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="og:image:alt" content="<?php if(!empty($cateParent['title_cate'])) { echo $cateParent['title_cate']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:image:secure_url" content="<?php if(!empty($cateParent['img_banner'])) { echo base_url("admin/{$cateParent['img_banner']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php if(!empty($cateParent['img_banner'])) { echo base_url("admin/{$cateParent['img_banner']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:image:src" content="<?php if(!empty($cateParent['img_banner'])) { echo base_url("admin/{$cateParent['img_banner']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/category.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.theme.default.min.css") ?>">
    <title><?php if(!empty($cateParent['title_cate'])) { echo $cateParent['title_cate']; } else { echo "Danh m???c s???n ph???m"; } ; ?></title>
</head>

<body>
    <div id="capri-app">
        <?php get_menuRespon() ?>
        <div class="wrapper">
            <?php get_header() ?>
            <main id="mainContent" class="content-wrap">
                <?php if(!empty($cateParent)) : ?>
                    <section class="breadcrum">
                        <div class="container">
                            <ol class="breadcrum-wrap grid-row align-items-center">
                                <li class="breadcrum-item __home d-flex align-items-center">
                                    <a href="<?php echo base_url(); ?>" class="breadcrum-link-back" title="V??? Trang Ch???">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <?php if( $cateParent['level'] == 2 ) : ?>
                                    <?php
                                        $cateLevel_1        = getCateItemByIdController($cateParent['parent_id']);
                                        $slug_title_cate    = create_slug($cateLevel_1['title_cate']);
                                        $cateLevel_1['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateLevel_1['id_cate']}.html");
                                        $listCateChild      = getCateByLevelAndParentIdController(2, $cateLevel_1['id_cate']);
                                    ?>
                                    <li class="breadcrum-item __nav-1 d-flex align-items-center">
                                        <a href="<?php echo $cateLevel_1['url'] ?>" class="breadcrum-link-back" title="<?php echo $cateLevel_1['title_cate']; ?>"><?php echo $cateLevel_1['title_cate']; ?></a>
                                        <?php if( !empty($listCateChild) ) : ?>
                                            <div class="breadcrum-cat-menu">
                                                <ul>
                                                    <?php foreach( $listCateChild as $cateItem ) : ?>
                                                        <?php
                                                            $slug_title_cate = create_slug($cateItem['title_cate']);
                                                            $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html");
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo $cateItem['url'] ?>" class="breadcrum-cat-menu-item" title=""><?php echo $cateItem['title_cate'] ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endif; ?>
                                <li class="breadcrum-item __nav-1 d-flex align-items-center">
                                    <a href="javascript:void(0)" class="breadcrum-link-back" title="<?php {{ echo $cateParent['title_cate']; }} ?>"><?php {{ echo $cateParent['title_cate']; }} ?></a>
                                    <?php if( !empty($cateChild) ) : ?>
                                        <div class="breadcrum-cat-menu">
                                            <ul>
                                                <?php foreach($cateChild as $cateItem) : ?>
                                                    <?php {{ $slug_title_cate = create_slug($cateItem['title_cate']); }} ?>
                                                    <?php {{ $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html"); }} ?>
                                                    <li>
                                                        <a href="<?php {{ echo $cateItem['url']; }} ?>" class="breadcrum-cat-menu-item" title="<?php {{ echo $cateItem['title_cate']; }} ?>"><?php {{ echo $cateItem['title_cate']; }} ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            </ol>
                        </div>
                    </section>
                <?php endif; ?>
                <div class="container">
                    <div class="category-wrap-top">
                        <div class="grid-row">
                            <div class="grid-column-12 grid-column-lg-2 sidebar-column">
                                <aside class="aside-main-filter">
                                    <?php if(!empty($cateParent)) : ?>
                                        <section class="box-wrap category-related">
                                            <div class="box-title">
                                                <h4><?php echo $cateParent['title_cate'] ?></h4>
                                            </div>
                                            <?php if(!empty($cateChild)) : ?>
                                                <div class="box-body">
                                                    <ul class="list-category">
                                                        <?php foreach( $cateChild as $cateItem ) : ?>
                                                            <?php
                                                                $slug_title_cate = create_slug($cateItem['title_cate']);
                                                                $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html");
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo $cateItem['url'] ?>"><?php echo $cateItem['title_cate'] ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </section>
                                    <?php endif; ?>
                                    <?php if(!empty(getListAdsByType("ads_prodCate"))) : ?>
                                        <section class="ads-wrap">
                                            <div class="ads-head">
                                                <h3>Qu???ng c??o</h3>
                                            </div>
                                            <div class="ads-body">
                                                <?php foreach( getListAdsByType("ads_prodCate") as $adsItem ) : ?>
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
                                                <?php endforeach; ?>
                                            </div>
                                        </section>
                                    <?php endif; ?>
                                    <?php if(!empty($listBlogReadMost)) : ?>
                                        <section class="box-wrap filter-by-price">
                                            <div class="box-title">
                                                <h4>B??i vi???t ?????c nhi???u nh???t</h4>
                                            </div>
                                            <div class="box-body">
                                                <ul>
                                                    <?php foreach( $listBlogReadMost as $blogItem ) : ?>
                                                        <?php
                                                            $slug_title_blog = create_slug($blogItem['blog_title']);
                                                            $blogItem['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogItem['blog_id']}.html");
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo $blogItem['url']; ?>" class="blog-item"><?php echo $blogItem['blog_title'] ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <a href="<?php echo base_url("danh-muc-bai-viet/tat-ca.html") ?>" class="read-total-blog">Xem t???t c??? b??i vi???t ...</a>
                                            </div>
                                        </section>
                                    <?php endif; ?>
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
                                            if(!empty($listInfoShowroom)) {
                                                ?>
                                                    <div class="modal-contact" id="modal-contact-form">
                                                        <div class="modal-mask" data-modal-close="#modal-contact-form"></div>
                                                        <div class="contact-info-wrap">
                                                            <div class="contact-info-head">
                                                                <h4 class="contact-info-title">Capri - Tr??n 13 n??m Uy t??n cung c???p d???ch v??? Ph??n Ph???i D???ng c??? b???p ch??nh h??ng to??n qu???c</h4>
                                                            </div>
                                                            <div class="contact-info-body">
                                                                <div class="phone-box-hotline">
                                                                    <div class="box-hotline-title">
                                                                        <i class="fa fa-phone-square"></i>
                                                                        <span>Hotline:</span>
                                                                    </div>
                                                                    <div class="box-hotline-info">
                                                                        <ul class="d-flex flex-column align-items-start">
                                                                            <?php
                                                                                foreach($listInfoShowroom as $showroomItem) {
                                                                                    ?>
                                                                                        <li class="d-flex">
                                                                                            <a href="tel:<?php echo $showroomItem['showroom_phone_1'] ?>" class="phone">
                                                                                                <span class="number-phone"><?php echo formatPhone($showroomItem['showroom_phone_1']) ?></span>
                                                                                            </a>
                                                                                            <a href="https://www.google.com/maps/place/<?php echo $showroomItem['showroom_address'] ?>" target="_blank" class="address"><?php echo $showroomItem['showroom_address'] ?></a>
                                                                                        </li>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
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
                                <div class="category-container">
                                    <?php
                                        if(!empty($cateParent)) {
                                            $slug_title_cate_1 = create_slug($cateParent['title_cate']);
                                            $cateParent['url'] = base_url("danh-muc-san-pham/{$slug_title_cate_1}-{$cateParent['id_cate']}.html");
                                            ?>
                                                <section class="banner-highlight">
                                                    <div class="category-slider">
                                                        <div class="carousel-category-slider-wrap">
                                                            <div class="owl-carousel owl-theme">
                                                                <div class="item banner-category-item">
                                                                    <a href="<?php echo $cateParent['url']; ?>" class="view-category-link thumbNail">
                                                                        <img src="<?php echo base_url("admin/".$cateParent['img_banner']) ?>" alt="<?php echo $cateParent['title_cate'] ?>">
                                                                    </a>
                                                                </div>
                                                                <?php
                                                                    if(!empty($cateChild)) {
                                                                        foreach($cateChild as $cateItem) {
                                                                            $slug_title_cate_2 = create_slug($cateItem['title_cate']);
                                                                            $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate_2}-{$cateItem['id_cate']}.html");
                                                                            ?>
                                                                                <div class="item banner-category-item">
                                                                                    <a href="<?php echo $cateItem['url']; ?>" class="view-category-link thumbNail">
                                                                                        <img src="<?php echo base_url("admin/".$cateItem['img_banner']) ?>" alt="<?php echo $cateItem['title_cate'] ?>">
                                                                                    </a>
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if(!empty($productsSellWell)) {
                                            ?>
                                                <section class="box-product-wrap">
                                                    <div class="box-head d-flex justify-content-between align-items-center">
                                                        <h4 class="box-title">S???n ph???m b??n ch???y</h4>
                                                    </div>
                                                    <div class="box-body products-relative-body">
                                                        <div class="carousel-product-by-category">
                                                            <div class="owl-carousel owl-theme">
                                                                <?php
                                                                    foreach($productsSellWell as $productItem) {
                                                                        $slug_title_prod = create_slug($productItem['title_product']);
                                                                        $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                        $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                        $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                                        ?>
                                                                            <div class="item product-item">
                                                                                <?php
                                                                                    if(!empty($productItem['hire_purchase'])) {
                                                                                        ?>
                                                                                            <div class="hire-purchase">Tr??? g??p</div>
                                                                                        <?php
                                                                                    }
                                                                                    if(!empty($productItem['capri_price']) && !empty($productItem['market_price'])) {
                                                                                        if(((int)$productItem['market_price'] - (int)$productItem['capri_price']) > 0) {
                                                                                        ?>
                                                                                            <div class="prod-discount">
                                                                                                <span><?php echo percent_format($productItem['capri_price'],$productItem['market_price']); ?></span>
                                                                                            </div>
                                                                                        <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                                <div class="prod-img">
                                                                                    <a href="<?php echo $productItem['url'] ?>" class="thumbNail view-prod">
                                                                                        <img src="<?php echo base_url("admin/".$productItem['avatar']) ?>" alt="<?php echo $productItem['title_product'] ?>">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="prod-info">
                                                                                    <div class='info-top'>
                                                                                        <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                                        <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                                        <div class="product-rate d-flex align-items-center">
                                                                                            <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                                            <?php
                                                                                                if(!empty($productItem['num_custom_vote'])) {
                                                                                                    echo "<span class='amount-rate'>({$productItem['num_custom_vote']} ????nh gi??)</span>";
                                                                                                }
                                                                                            ?>
                                                                                        </div>
                                                                                        <div class="product-price d-flex align-items-center">
                                                                                            <?php
                                                                                                if(!empty($productItem['capri_price'])) {
                                                                                                    ?>
                                                                                                        <span class="price-capri"><?php echo currency_format($productItem['capri_price']) ?></span>
                                                                                                    <?php
                                                                                                }
                                                                                                if(!empty($productItem['market_price'])) {
                                                                                                    ?>
                                                                                                        <span class="price-old"><?php echo currency_format($productItem['market_price']) ?></span>
                                                                                                    <?php
                                                                                                }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="btn-wrap">
                                                                                        <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">G???i t?? v???n</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            <?php
                                        } else {
                                            ?>
                                                <p>Kh??ng c?? s???n ph???m n??o !</strong></p>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if(!empty($productNewAdded)) {
                                            ?>
                                                <section class="box-product-wrap">
                                                    <div class="box-head d-flex justify-content-between align-items-center">
                                                        <h4 class="box-title">S???n ph???m m???i</h4>
                                                    </div>
                                                    <div class="box-body products-relative-body">
                                                        <div class="carousel-product-by-category">
                                                            <div class="owl-carousel owl-theme">
                                                                <?php
                                                                    foreach($productNewAdded as $productItem) {
                                                                        $slug_title_prod = create_slug($productItem['title_product']);
                                                                        $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                        $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                        $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                                        ?>
                                                                            <div class="item product-item">
                                                                                <?php
                                                                                    if($productItem['hire_purchase'] == '1') {
                                                                                        ?>
                                                                                            <div class="hire-purchase">Tr??? g??p</div>
                                                                                        <?php
                                                                                    }
                                                                                    if(!empty($productItem['capri_price']) && !empty($productItem['market_price'])) {
                                                                                        if(((int)$productItem['market_price'] - (int)$productItem['capri_price']) > 0) {
                                                                                        ?>
                                                                                            <div class="prod-discount">
                                                                                                <span><?php echo percent_format($productItem['capri_price'],$productItem['market_price']); ?></span>
                                                                                            </div>
                                                                                        <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                                <div class="prod-img">
                                                                                    <a href="<?php echo $productItem['url'] ?>" class="thumbNail view-prod">
                                                                                        <img src="<?php echo base_url("admin/".$productItem['avatar']) ?>" alt="<?php echo $productItem['title_product'] ?>">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="prod-info">
                                                                                    <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                                    <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                                    <div class="product-rate d-flex align-items-center">
                                                                                        <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                                        <?php
                                                                                            if(!empty($productItem['num_custom_vote'])) {
                                                                                                echo "<span class='amount-rate'>({$productItem['num_custom_vote']} ????nh gi??)</span>";
                                                                                            }
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="product-price d-flex align-items-center">
                                                                                        <?php
                                                                                            if(!empty($productItem['capri_price'])) {
                                                                                                ?>
                                                                                                    <span class="price-capri"><?php echo currency_format($productItem['capri_price']) ?></span>
                                                                                                <?php
                                                                                            }
                                                                                            if(!empty($productItem['market_price'])) {
                                                                                                ?>
                                                                                                    <span class="price-old"><?php echo currency_format($productItem['market_price']) ?></span>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="btn-wrap">
                                                                                        <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">G???i t?? v???n</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            <?php
                                        } else {
                                            ?>
                                                <p>Kh??ng c?? s???n ph???m n??o !</strong></p>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if(!empty($cateChild)) {
                                            foreach ($cateChild as $cateItem) {
                                                $listProduct = getListProductByCateId($cateItem['id_cate'], 2);
                                                if(!empty($listProduct)) {
                                                ?>
                                                    <section class="box-product-wrap">
                                                        <div class="box-head d-flex justify-content-between align-items-center">
                                                            <h4 class="box-title"><?php echo $cateItem['title_cate'] ?></h4>
                                                        </div>
                                                        <div class="box-body products-relative-body">
                                                            <div class="carousel-product-by-category">
                                                                <div class="owl-carousel owl-theme">
                                                                    <?php
                                                                        foreach($listProduct as $productItem) {
                                                                            $slug_title_prod = create_slug($productItem['title_product']);
                                                                            $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                            $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                            $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                                            ?>
                                                                                <div class="item product-item">
                                                                                    <?php
                                                                                        if(!empty($productItem['hire_purchase'])) {
                                                                                            ?>
                                                                                                <div class="hire-purchase">Tr??? g??p</div>
                                                                                            <?php
                                                                                        }
                                                                                        if(!empty($productItem['capri_price']) && !empty($productItem['market_price'])) {
                                                                                            ?>
                                                                                                <div class="prod-discount">
                                                                                                    <span><?php echo percent_format($productItem['capri_price'],$productItem['market_price']); ?></span>
                                                                                                </div>
                                                                                            <?php
                                                                                        }
                                                                                    ?>
                                                                                    <div class="prod-img">
                                                                                        <a href="<?php echo $productItem['url'] ?>" class="thumbNail view-prod">
                                                                                            <img src="<?php echo base_url("admin/".$productItem['avatar']) ?>" alt="<?php echo $productItem['title_product'] ?>">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="prod-info">
                                                                                        <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                                        <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                                        <div class="product-rate d-flex align-items-center">
                                                                                            <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                                            <?php
                                                                                                if(!empty($productItem['num_custom_vote'])) {
                                                                                                    echo "<span class='amount-rate'>({$productItem['num_custom_vote']} ????nh gi??)</span>";
                                                                                                }
                                                                                            ?>
                                                                                        </div>
                                                                                        <?php
                                                                                            if(!empty($productItem['capri_price'])) {
                                                                                                ?>
                                                                                                    <div class="product-price d-flex align-items-center">
                                                                                                        <span class="price-capri"><?php echo currency_format($productItem['capri_price']); ?></span>
                                                                                                        <span class="price-old"><?php echo currency_format($productItem['market_price']); ?></span>
                                                                                                    </div>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        <div class="btn-wrap">
                                                                                            <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">G???i t?? v???n</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                <?php
                                                }
                                            }
                                        } else {
                                            $listTotalProductByCate = getListProductByCateId($cateParent['id_cate'], $cateParent['level']);
                                            if(!empty($listTotalProductByCate)) {
                                                ?>
                                                    <section class="box-product-wrap">
                                                        <div class="box-head d-flex justify-content-between align-items-center">
                                                            <h4 class="box-title">T???t c??? s???n ph???m</h4>
                                                        </div>
                                                        <div class="box-body products-relative-body">
                                                            <div class="carousel-product-by-category">
                                                                <div class="owl-carousel owl-theme">
                                                                    <?php
                                                                        foreach($listTotalProductByCate as $productItem) {
                                                                            $slug_title_prod = create_slug($productItem['title_product']);
                                                                            $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                            $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                            $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                                            ?>
                                                                                <div class="item product-item">
                                                                                    <?php
                                                                                        if(!empty($productItem['hire_purchase'])) {
                                                                                            ?>
                                                                                                <div class="hire-purchase">Tr??? g??p</div>
                                                                                            <?php
                                                                                        }
                                                                                        if(!empty($productItem['capri_price']) && !empty($productItem['market_price'])) {
                                                                                            ?>
                                                                                                <div class="prod-discount">
                                                                                                    <span><?php echo percent_format($productItem['capri_price'],$productItem['market_price']); ?></span>
                                                                                                </div>
                                                                                            <?php
                                                                                        }
                                                                                    ?>
                                                                                    <div class="prod-img">
                                                                                        <a href="<?php echo $productItem['url'] ?>" class="thumbNail view-prod">
                                                                                            <img src="<?php echo base_url("admin/".$productItem['avatar']) ?>" alt="<?php echo $productItem['title_product'] ?>">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="prod-info">
                                                                                        <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                                        <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                                        <div class="product-rate d-flex align-items-center">
                                                                                            <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                                            <?php if( !empty($productItem['num_custom_vote']) ) : ?>
                                                                                                <span class='amount-rate'>(<?php {{ echo $productItem['num_custom_vote']; }} ?> ????nh gi??)</span>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                        <?php if( !empty($productItem['capri_price']) ) : ?>
                                                                                            <div class="product-price d-flex align-items-center">
                                                                                                <span class="price-capri"><?php echo currency_format($productItem['capri_price']); ?></span>
                                                                                                <span class="price-old"><?php echo currency_format($productItem['market_price']); ?></span>
                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                        <div class="btn-wrap">
                                                                                            <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">G???i t?? v???n</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php get_form_contact(); ?>
            <?php get_footer(); ?>
        </div>
    </div>
</body>
<script src="<?php echo base_url("public/js/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("public/OwlCarousel/owl.carousel.min.js") ?>"></script>
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/carousel.js") ?>"></script>
<script src="<?php echo base_url("public/js/category.js") ?>"></script>
</html>