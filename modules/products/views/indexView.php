<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        if(!empty($listProfileProd)) {
            $slug_title = create_slug($listProfileProd['title_product']);
            $url = base_url("san-pham/{$slug_title}-{$listProfileProd['id_product']}.html");
        } else {
            $url = base_url();
        }
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty($listProfileProd['desc_short'])) { echo $listProfileProd['desc_short']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:description" content="<?php if(!empty($listProfileProd['desc_short'])) { echo $listProfileProd['desc_short']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:title" content="<?php if(!empty($listProfileProd['title_product'])) { echo $listProfileProd['title_product']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php if(!empty($listProfileProd['avatar'])) { echo base_url("admin/{$listProfileProd['avatar']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="og:image:alt" content="<?php if(!empty($listProfileProd['title_product'])) { echo $listProfileProd['title_product']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:image:secure_url" content="<?php if(!empty($listProfileProd['avatar'])) { echo base_url("admin/{$listProfileProd['avatar']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php if(!empty($listProfileProd['avatar'])) { echo base_url("admin/{$listProfileProd['avatar']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:image:src" content="<?php if(!empty($listProfileProd['avatar'])) { echo base_url("admin/{$listProfileProd['avatar']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/detail-prod.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.theme.default.min.css") ?>">
    <title><?php if(!empty($listProfileProd['title_product'])) { echo $listProfileProd['title_product']; } else { echo "Sản phẩm Capri"; } ?></title>
</head>

<body>
    <div id="capri-app">
        <?php echo get_menuRespon(); ?>
        <div class="wrapper">
            <?php get_header(); ?>
            <?php
                if(!empty($listProfileProd)) {
                    ?>
                        <main id="mainContent" class="content-wrap">
                            <section class="breadcrum">
                                <div class="container">
                                    <ol class="breadcrum-wrap grid-row align-items-center">
                                        <li class="breadcrum-item __home d-flex align-items-center">
                                            <a href="" class="breadcrum-link-back" title="Về Trang Chủ">
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <?php
                                            if(!empty($cateLevel_1Item)) {
                                                ?>
                                                    <li class="breadcrum-item __nav-1 d-flex align-items-center">
                                                        <?php
                                                            $slug_title_cateLevel_1 = create_slug($cateLevel_1Item['title_cate']);
                                                            $urlCateLevel_1 = base_url("danh-muc-san-pham/{$slug_title_cateLevel_1}-{$cateLevel_1Item['id_cate']}.html");
                                                        ?>
                                                        <a href="<?php echo $urlCateLevel_1; ?>" class="breadcrum-link-back" title="Bếp Điện Từ"><?php echo $cateLevel_1Item['title_cate']; ?></a>
                                                        <?php
                                                            if(!empty($cateListChild)) {
                                                                ?>
                                                                    <div class="breadcrum-cat-menu">
                                                                        <ul>
                                                                            <?php
                                                                                foreach($cateListChild as $cateItem) {
                                                                                    $slug_title_cate_child = create_slug($cateItem['title_cate']);
                                                                                    $cateItem['URL'] = base_url("danh-muc-san-pham/{$slug_title_cate_child}-{$cateItem['id_cate']}.html");
                                                                                    ?>
                                                                                        <li>
                                                                                            <a href="<?php echo $cateItem['URL'] ?>" class="breadcrum-cat-menu-item" title=""><?php echo $cateItem['title_cate'] ?></a>
                                                                                        </li>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                <?php
                                                            }
                                                        ?>
                                                    </li>
                                                <?php
                                            }
                                        ?>
                                        <li class="breadcrum-item __nav-2 d-flex align-items-center">
                                            <a href="javascript:void(0)" class="breadcrum-link-back" title=""><?php echo $listProfileProd['title_product'] ?></a>
                                        </li>
                                    </ol>
                                </div>
                            </section>
                            <section class="view-products-info">
                                <div class="container">
                                    <div class="view-product-wrap">
                                        <div class="grid-row">
                                            <div class="grid-column-12 grid-column-lg-11 mx-auto">
                                                <div class="view-detail-product">
                                                    <div class="grid-row">
                                                        <div class="grid-column-12 grid-column-md-5 grid-column-lg-4">
                                                            <div class="view-images">
                                                                <div class="carousel-slider">
                                                                    <?php
                                                                        if(!empty($listProfileProd['avatar'])) {
                                                                            ?>
                                                                                <div class="owl-carousel owl-theme">
                                                                                    <div class="item" data-modal-open="#show-img-desc">
                                                                                        <span class="thumbNail">
                                                                                            <img src="<?php echo base_url("admin/{$listProfileProd['avatar']}") ?>" alt="<?php echo $listProfileProd['title_product'] ?>">
                                                                                        </span>
                                                                                    </div>
                                                                                    <?php
                                                                                        if(!empty($listImgDesc)) {
                                                                                            foreach($listImgDesc as $imgItem) {
                                                                                                ?>
                                                                                                    <div class="item" data-modal-open="#show-img-desc">
                                                                                                        <span class="thumbNail">
                                                                                                            <img src="<?php echo base_url("admin/{$imgItem['url']}") ?>" alt="<?php echo $listProfileProd['title_product'] ?>">
                                                                                                        </span>
                                                                                                    </div>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="view-more-relative">
                                                                    <div class="grid-row">
                                                                        <?php
                                                                            if(!empty($listImgDesc)) {
                                                                                ?>
                                                                                    <div class="view-more-item">
                                                                                        <a href="" class="pop-gallery __full-mask thumbNail" data-modal-open="#show-img-desc">
                                                                                            <img src="<?php echo base_url("admin/{$listImgDesc[0]['url']}"); ?>" alt="<?php echo $listProfileProd['title_product'] ?>">
                                                                                            <div class="over-gallery">
                                                                                                <p>Xem <?php echo count($listImgDesc); ?> ảnh</p>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                        <?php
                                                                            if (!empty($listProfileProd['avatar'])) {
                                                                                ?>
                                                                                <div class="view-more-item">
                                                                                    <a href="" class="pop-gallery thumbNail"data-modal-open="#show-img-desc">
                                                                                        <img src="<?php echo base_url("admin/{$listProfileProd['avatar']}"); ?>" alt="<?php echo $listProfileProd['title_product'] ?>">
                                                                                    </a>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                        <?php
                                                                            if(!empty($listProfileProd['info_feature_prod'])) {
                                                                                ?>
                                                                                    <div class="view-more-item" data-scroll-button="#features-scroll">
                                                                                        <a href="" class="pop-gallery">
                                                                                            <div class="icon-space">
                                                                                                <img src="<?php echo base_url("public/images/logo-icon/tinh-nang-logo.png") ?>" alt="">
                                                                                            </div>
                                                                                            <div class="text-space">Tính năng</div>
                                                                                        </a>
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                            if(!empty($listProfileProd['info_specifications_prod'])) {
                                                                                ?>
                                                                                    <div class="view-more-item">
                                                                                        <a href="" class="pop-gallery" data-scroll-button="#specifications-scroll">
                                                                                            <div class="icon-space">
                                                                                                <img src="<?php echo base_url("public/images/logo-icon/thong-so-icon.png") ?>" alt="">
                                                                                            </div>
                                                                                            <div class="text-space">Thông Số Kỹ Thuật</div>
                                                                                        </a>
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="grid-column-12 grid-column-md-7 grid-column-lg-8">
                                                            <div class="grid-row">
                                                                <div class="grid-column-12">
                                                                    <div class="view-info">
                                                                        <div class="top-info-wrap">
                                                                            <div class="group-title d-flex align-items-center">
                                                                                <h1 class="title-prod"><?php echo $listProfileProd['title_product'] ?></h1>
                                                                                <?php
                                                                                    if($listProfileProd['vote_type'] != null) {
                                                                                        ?>
                                                                                            <div class="star-wrap" data-num-star="<?php echo $listProfileProd['vote_type'] ?>"></div>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                            <div class="group-relative">
                                                                                <ul class="list-info">
                                                                                    <li>
                                                                                        <?php
                                                                                            if(!empty($cateListChild)) {
                                                                                                $cateItemLevel_2 = loadCateById($listProfileProd['cate_level_2_id']);
                                                                                                $slug_title_cateLevel_2 = create_slug($cateItemLevel_2['title_cate']);
                                                                                                $urlCateLevel_2 = base_url("danh-muc-san-pham/{$slug_title_cateLevel_2}-{$cateItemLevel_2['id_cate']}.html");
                                                                                                ?>
                                                                                                    <span class="key">Danh Mục</span>
                                                                                                    <a href="<?php echo $urlCateLevel_2 ?>" class="value"><?php echo loadCateById($listProfileProd['cate_level_2_id'])['title_cate'] ?></a>
                                                                                                <?php
                                                                                            } else {
                                                                                                $cateItemLevel_1 = loadCateById($listProfileProd['cate_level_1_id']);
                                                                                                if(!empty($cateItemLevel_1)) {
                                                                                                    $slug_title_cateLevel_1 = create_slug($cateItemLevel_1['title_cate']);
                                                                                                    $urlCateLevel_1 = base_url("danh-muc-san-pham/{$slug_title_cateLevel_1}-{$cateItemLevel_1['id_cate']}.html");
                                                                                                    ?>
                                                                                                        <span class="key">Danh Mục</span>
                                                                                                        <a href="<?php echo $urlCateLevel_1; ?>" class="value"><?php echo loadCateById($listProfileProd['cate_level_1_id'])['title_cate'] ?></a>
                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="bottom-info-wrap">
                                                                            <div class="grid-row">
                                                                                <div class="grid-column-12 grid-column-lg-8 pr-0 pr-lg-4">
                                                                                    <div class="info-default">
                                                                                        <?php
                                                                                            if($listProfileProd['stop_sell'] == '1') {
                                                                                                ?>
                                                                                                    <div class="stop-sell">Ngừng kinh doanh</div>
                                                                                                <?php
                                                                                            }
                                                                                            if($listProfileProd['capri_price'] != null) {
                                                                                                ?>
                                                                                                    <div class="info-price __price-curr">
                                                                                                        <span class="key">Giá Capri</span>
                                                                                                        <span class="value"><?php echo currency_format($listProfileProd['capri_price']) ?></span>
                                                                                                        <span class="vat">(Chưa bao gồm VAT)</span>
                                                                                                    </div>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        <?php
                                                                                            if($listProfileProd['market_price'] != null) {
                                                                                                ?>
                                                                                                    <div class="info-price  __price-old">
                                                                                                        <span class="key">Giá trước <i class="highlight">*</i></span>
                                                                                                        <span class="value"><?php echo currency_format($listProfileProd['market_price']) ?></span>
                                                                                                        <div class="discount">
                                                                                                            <span data-discount="<?php echo percent_format($listProfileProd['capri_price'], $listProfileProd['market_price']); ?>"><?php echo percent_format($listProfileProd['capri_price'], $listProfileProd['market_price']); ?></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                    </div>
                                                                                    <?php
                                                                                        if(!empty($listProfileProd['info_basic_prod'])) {
                                                                                            ?>
                                                                                                <div class="info-more">
                                                                                                    <?php echo $listProfileProd['info_basic_prod']; ?>
                                                                                                </div>
                                                                                            <?php
                                                                                        }
                                                                                    ?>
                                                                                    <div class="info-amout d-flex align-items-center">
                                                                                        <div class="choose-amout d-flex align-items-center d-none">
                                                                                            <span class="title">Chọn Số Lượng</span>
                                                                                            <div class="amout-wrap d-flex align-items-center">
                                                                                                <button type="button" class="btn-item" data-button="minus">-</button>
                                                                                                <input type="number" name="amount" id="amount" value="1" autocomplete="off" spellcheck="false" min="1" max="<?php echo $listProfileProd['amount']; ?>">
                                                                                                <button type="button" class="btn-item" data-button="plus">+</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="statusProd" class="status d-flex align-items-center">
                                                                                            <span class="icon-space">
                                                                                                <img src="" width="30" height="30" alt="">
                                                                                            </span>
                                                                                            <span class="text-space"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-wrap d-flex align-items-cente justify-content-between flex-wrap">
                                                                                        <button type="button" class="__btn-1" data-modal-open="#modal-contact-form">
                                                                                            <span class="main-title">Tư Vấn</span>
                                                                                            <span class="sub-title">Chúng tôi sẽ gọi lại cho bạn</span>
                                                                                        </button>
                                                                                        <button type="button" class="__btn-2" data-modal-open="#modal-contact-form">
                                                                                            <span class="main-title">Showroom</span>
                                                                                            <span class="sub-title">Tìm địa chỉ gần nhất</span>
                                                                                        </button>
                                                                                        <button type="button" class="view-more-info">
                                                                                            <span>Xem thêm thông tin</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <?php
                                                                                        if(!empty($listInfoShowroom)) {
                                                                                            ?>
                                                                                                <div class="modal-contact" id="modal-contact-form">
                                                                                                    <div class="modal-mask" data-modal-close="#modal-contact-form"></div>
                                                                                                    <div class="contact-info-wrap">
                                                                                                        <div class="contact-info-head">
                                                                                                            <h4 class="contact-info-title">Capri - Trên 13 năm Uy tín cung cấp dịch vụ Phân Phối Dụng cụ bếp chính hãng toàn quốc</h4>
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
                                                                                </div>
                                                                                <div class="grid-column-12 grid-column-lg-4">
                                                                                    <aside class="view-detail-right">
                                                                                        <div class="mask"></div>
                                                                                        <div class="box-detail care-detail">
                                                                                            <h4 class="box-detail-title d-flex justify-content-between">
                                                                                                <span>Thông tin hữu ích</span>
                                                                                                <span class="close-popup" id="close-modal-info-more">
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            </h4>
                                                                                            <div class="box-detail-body detail-info-wrap">
                                                                                                <div class="care-box-detail">
                                                                                                    <?php
                                                                                                        if(!empty($listInfoSupportProd['content_service_center'])) {
                                                                                                            $listInfoSupportProd['url_content_service_center'] = base_url("ho-tro/trung-tam-bao-hanh.html");
                                                                                                            ?>
                                                                                                                <div class="care-detail-item bao-hanh">
                                                                                                                    <a target="_blank" href="<?php echo $listInfoSupportProd['url_content_service_center'] ?>" class="care-view d-flex align-items-center">
                                                                                                                        <span class="care-icon thumbNail">
                                                                                                                            <img src="<?php echo base_url("public/images/logo-icon/tools-icon-s.png") ?>" alt="Icon bảo hành capri">
                                                                                                                        </span>
                                                                                                                        <span class="txt">Trung tâm bảo hành</span>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                    <?php
                                                                                                        if(!empty($listInfoSupportProd['content_shipping_information'])) {
                                                                                                            $listInfoSupportProd['url_content_shipping_information'] = base_url("ho-tro/thong-tin-van-chuyen.html");
                                                                                                            ?>
                                                                                                                <div class="care-detail-item van-chuyen">
                                                                                                                    <a target="_blank" href="<?php echo $listInfoSupportProd['url_content_shipping_information']; ?>" class="care-view d-flex align-items-center">
                                                                                                                        <span class="care-icon thumbNail">
                                                                                                                            <img src="<?php echo base_url("public/images/logo-icon/giao-hang-toan-quoc-icon.png") ?>" alt="">
                                                                                                                        </span>
                                                                                                                        <span class="txt">Thông tin vận chuyển</span>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                    <?php
                                                                                                        if(!empty($listInfoSupportProd['content_payment_guide'])) {
                                                                                                            $listInfoSupportProd['url_content_payment_guide'] = base_url("ho-tro/huong-dan-thanh-toan.html");
                                                                                                            ?>
                                                                                                                <div class="care-detail-item thanh-toan">
                                                                                                                    <a target="_blank" href="<?php echo $listInfoSupportProd['url_content_payment_guide']; ?>" class="care-view d-flex align-items-center">
                                                                                                                        <span class="care-icon thumbNail">
                                                                                                                            <img src="<?php echo base_url("public/images/logo-icon/dich-vu-uy-tin-icon.png") ?>" alt="">
                                                                                                                        </span>
                                                                                                                        <span class="txt">Hướng dẫn thanh toán</span>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                    <?php
                                                                                                        if(!empty($listProfileProd['list_id_blog_relative'])) {
                                                                                                            ?>
                                                                                                                <div class="care-detail-box blog-huu-ich">
                                                                                                                    <h3 class="title">Bài viết hữu ích</h3>
                                                                                                                    <div class="list-blog">
                                                                                                                        <ul>
                                                                                                                            <?php
                                                                                                                                foreach($listBlog as $blogItem) {
                                                                                                                                    $slug_title = create_slug($blogItem['blog_title']);
                                                                                                                                    $blogItem['url'] = base_url("bai-viet/{$slug_title}-{$blogItem['blog_id']}.html");
                                                                                                                                    ?>
                                                                                                                                        <li>
                                                                                                                                            <a href="<?php echo $blogItem['url']; ?>" class="blog-view-item" title="<?php echo $blogItem['blog_title'] ?>"><?php echo $blogItem['blog_title'] ?></a>
                                                                                                                                        </li>
                                                                                                                                    <?php
                                                                                                                                }
                                                                                                                            ?>
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                    <a href="<?php echo base_url("danh-muc-bai-viet/tat-ca.html") ?>" class="see-more-blog">Xem tất cả bài viết</a>
                                                                                                                </div>
                                                                                                            <?php
                                                                                                        }
                                                                                                    ?>
                                                                                                    <div class="contact-with-capri">
                                                                                                        <h4 class="title">Chat với Capri</h4>
                                                                                                        <div class="contact-info d-flex justify-content-between align-items-center">
                                                                                                            <a href="https://www.facebook.com/bepCapri/" target="_blank" class="contact-item message-chat d-flex align-items-center">
                                                                                                                <span class="icon-img thumbNail">
                                                                                                                    <img src="<?php echo base_url("public/images/logo-icon/messenger-icon.png") ?>" alt="logo messager Capri">
                                                                                                                </span>
                                                                                                                <span class="txt">Capri.vn</span>
                                                                                                            </a>
                                                                                                            <a href="https://zalo.me/02862647173" class="contact-item zalo-chat d-flex align-items-center">
                                                                                                                <span class="icon-img thumbNail">
                                                                                                                    <img src="<?php echo base_url("public/images/logo-icon/zalo-icon.png") ?>" alt="Logo zalo Capri">
                                                                                                                </span>
                                                                                                                <span class="txt">(028) 6264 7173</span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </aside>
                                                                                    <script>
                                                                                        let btnOpenInfo = document.querySelector(".view-more-info");
                                                                                        let popup = document.querySelector(".view-detail-right");
                                                                                        let btnClose_1 = document.getElementById("close-modal-info-more");
                                                                                        let btnClose_2 = document.querySelector(".view-detail-right .mask");
                                                                                        btnOpenInfo.addEventListener('click', () => {
                                                                                            popup.classList.add('respon');
                                                                                        });
                                                                                        btnClose_1.addEventListener('click', () => {
                                                                                            popup.classList.remove('respon');
                                                                                        });
                                                                                        btnClose_2.addEventListener('click', () => {
                                                                                            popup.classList.remove('respon');
                                                                                        });
                                                                                    </script>
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
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="highlight-desc-product">
                                <div class="container">
                                    <div class="grid-row">
                                        <div class="grid-column-12 grid-column-lg-9">
                                            <section class="content-desc-prod">
                                                <?php
                                                    if(!empty($listProfileProd['desc_main'])) {
                                                        echo $listProfileProd['desc_main'];
                                                    }
                                                ?>
                                            </section>
                                            <?php
                                                if(!empty($listProfileProd['info_feature_prod'])) {
                                                    ?>
                                                        <section class="outstanding-features" id="features-scroll">
                                                            <div class="space-description">
                                                                <div class="title-space">
                                                                    <h4>Tính năng nổi bật</h4>
                                                                </div>
                                                                <div class="body-space">
                                                                    <?php echo $listProfileProd['info_feature_prod']; ?>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    <?php
                                                }
                                            ?>
                                            <?php
                                                if(!empty($listProfileProd['info_specifications_prod'])) {
                                                    ?>
                                                        <section class="specifications" id="specifications-scroll">
                                                            <div class="space-description">
                                                                <div class="title-space">
                                                                    <h4>Thông số kỹ thuật</h4>
                                                                </div>
                                                                <div class="body-space">
                                                                    <?php echo $listProfileProd['info_specifications_prod']; ?>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="grid-column-12 grid-column-lg-3">
                                            <?php
                                                if(!empty(getListAdsByType("ads_prod"))) {
                                                    ?>
                                                        <section class="ads-wrap">
                                                            <div class="ads-head">
                                                                <h3>Quảng cáo</h3>
                                                            </div>
                                                            <div class="ads-body">
                                                                <?php
                                                                    foreach(getListAdsByType("ads_prod") as $adsItem) {
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
                                                if(!empty($relativeProduct)) {
                                                    ?>
                                                        <section class="aside-product-recomment">
                                                            <div class="recomment-product">
                                                                <h4 class="title-recomment">Sản phẩm liên quan</h4>
                                                                <div class="list-recomment-prod">
                                                                    <?php
                                                                        foreach($relativeProduct as $prodItem) {
                                                                            $slug_title_prod = create_slug($prodItem['title_product']);
                                                                            $prodItem['url'] = base_url("san-pham/{$slug_title_prod}-{$prodItem['id_product']}.html");
                                                                            $cateLevel_1 = !empty(getCateItemByIdController($prodItem['cate_level_1_id'])) ? getCateItemByIdController($prodItem['cate_level_1_id']) : null;
                                                                            if(!empty($cateLevel_1)) {
                                                                                $slug_title_cate = create_slug(getCateItemByIdController($prodItem['cate_level_1_id'])['title_cate']);
                                                                                $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$prodItem['cate_level_1_id']}.html");
                                                                            } else {
                                                                                $cateProdItem['url'] = null;
                                                                            }
                                                                            ?>
                                                                                <div class="product-item">
                                                                                    <?php
                                                                                        if (!empty($prodItem['hire_purchase'])) {
                                                                                            ?>
                                                                                                <div class="hire-purchase">Trả góp</div>
                                                                                            <?php
                                                                                        }
                                                                                        if(!empty($prodItem['capri_price']) && !empty($prodItem['market_price'])) {
                                                                                            if(((int)$prodItem['market_price'] - (int)$prodItem['capri_price']) > 0) {
                                                                                            ?>
                                                                                                <div class="prod-discount">
                                                                                                    <span><?php echo percent_format($prodItem['capri_price'],$prodItem['market_price']); ?></span>
                                                                                                </div>
                                                                                            <?php
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                    <div class="prod-img">
                                                                                        <a href="<?php echo $prodItem['url'] ?>" class="thumbNail view-prod">
                                                                                            <img src="<?php echo base_url("admin/{$prodItem['avatar']}") ?>" alt="<?php echo $prodItem['title_product'] ?>">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="prod-info">
                                                                                        <a href="<?php echo $prodItem['url'] ?>" class="name-prod view-prod"><?php echo $prodItem['title_product'] ?></a>
                                                                                        <?php
                                                                                            if(!empty($cateLevel_1)) {
                                                                                                ?>
                                                                                                    <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo $cateLevel_1['title_cate']; ?></a>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        <?php
                                                                                            if(!empty($prodItem['vote_type'])) {
                                                                                                ?>
                                                                                                    <div class="product-rate d-flex align-items-center">
                                                                                                        <span class="star-wrap" data-num-star="<?php echo $prodItem['vote_type'] ?>">
                                                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        </span>
                                                                                                        <?php
                                                                                                            if(!empty($prodItem['num_custom_vote'])) {
                                                                                                                echo "<span class='amount-rate'>({$prodItem['num_custom_vote']} đánh giá)</span>";
                                                                                                            }
                                                                                                        ?>
                                                                                                    </div>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        <div class="product-price d-flex align-items-center">
                                                                                            <?php
                                                                                                if(!empty($prodItem['capri_price'])) {
                                                                                                    ?>
                                                                                                        <span class="price-capri"><?php echo currency_format($prodItem['capri_price']) ?></span>
                                                                                                    <?php
                                                                                                }
                                                                                                if(!empty($prodItem['market_price'])) {
                                                                                                    ?>
                                                                                                        <span class="price-old"><?php echo currency_format($prodItem['market_price']) ?></span>
                                                                                                    <?php
                                                                                                }
                                                                                            ?>
                                                                                        </div>
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
                            <?php
                                if(!empty($similarProduct)) {
                                    ?>
                                        <section class="products-relative-recomment">
                                            <div class="container">
                                                <div class="product-relative-wrap">
                                                    <div class="products-relative-head d-flex justify-content-between align-items-center">
                                                        <h2 class="product-relative-title">Sản phẩm tương tự</h2>
                                                        <a href="<?php echo "?mod=cates&id={$listProfileProd['cate_level_2_id']}" ?>" class="product-view-more-button">
                                                            <span class="text-1">Xem tất cả</span>
                                                            <span class="text-2">Thêm</span>
                                                        </a>
                                                    </div>
                                                    <div class="products-relative-body">
                                                        <div class="prod-rela-carousel">
                                                            <div class="owl-carousel owl-theme">
                                                                <?php
                                                                    foreach($similarProduct as $prodItem) {
                                                                        $slug_title_prod = create_slug($prodItem['title_product']);
                                                                        $prodItem['url'] = base_url("san-pham/{$slug_title_prod}-{$prodItem['id_product']}.html");
                                                                        if(!empty(getCateItemByIdController($prodItem['cate_level_1_id']))) {
                                                                            $slug_title_cate = create_slug(getCateItemByIdController($prodItem['cate_level_1_id'])['title_cate']);
                                                                            $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$prodItem['cate_level_1_id']}.html");
                                                                        } else {
                                                                            $cateProdItem['url'] = null;
                                                                        }

                                                                        ?>
                                                                            <div class="item product-item">
                                                                                <?php
                                                                                    if ($prodItem['hire_purchase'] == 1) {
                                                                                        ?>
                                                                                            <div class="hire-purchase">Trả góp</div>
                                                                                        <?php
                                                                                    }
                                                                                    if(!empty($prodItem['capri_price']) && !empty($prodItem['market_price'])) {
                                                                                        if(((int)$prodItem['market_price'] - (int)$prodItem['capri_price']) > 0) {
                                                                                        ?>
                                                                                            <div class="prod-discount">
                                                                                                <span><?php echo percent_format($prodItem['capri_price'],$prodItem['market_price']); ?></span>
                                                                                            </div>
                                                                                        <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                                <div class="prod-img">
                                                                                    <a href="<?php echo $prodItem['url'] ?>" class="thumbNail view-prod">
                                                                                        <img src="<?php echo base_url("admin/{$prodItem['avatar']}") ?>" alt="<?php echo $prodItem['title_product'] ?>">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="prod-info">
                                                                                    <div class='info-top'>
                                                                                        <a href="<?php echo $prodItem['url'] ?>" class="name-prod view-prod"><?php echo $prodItem['title_product'] ?></a>
                                                                                        <?php
                                                                                            if(getCateItemByIdController($prodItem['cate_level_1_id'])) {
                                                                                                ?>
                                                                                                    <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($prodItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        <?php
                                                                                            if (!empty($prodItem['vote_type'])) {
                                                                                                ?>
                                                                                                <div class="product-rate d-flex align-items-center">
                                                                                                    <div class="star-wrap" data-num-star="<?php echo $prodItem['vote_type'] ?>">
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                    <?php
                                                                                                        if(!empty($prodItem['num_custom_vote'])) {
                                                                                                            echo "<span class='amount-rate'>({$prodItem['num_custom_vote']} đánh giá)</span>";
                                                                                                        }
                                                                                                    ?>
                                                                                                </div>
                                                                                            <?php
                                                                                            }
                                                                                        ?>
                                                                                        <div class="product-price d-flex align-items-center">
                                                                                            <?php
                                                                                                if(!empty($prodItem['capri_price'])) {
                                                                                                    ?>
                                                                                                        <span class="price-capri"><?php echo currency_format($prodItem['capri_price']) ?></span>
                                                                                                    <?php
                                                                                                }
                                                                                                if(!empty($prodItem['market_price'])) {
                                                                                                    ?>
                                                                                                        <span class="price-old"><?php echo currency_format($prodItem['market_price']) ?></span>
                                                                                                    <?php
                                                                                                }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    <?php
                                }
                            ?>
                        </main>
                    <?php
                } else {
                    ?>
                        <div class="data-empty">
                            <span class="thumbNail">
                                <img src="<?php echo base_url("public/images/logo-icon/khong-tim-thay-du-lieu.png") ?>" alt="">
                            </span>
                            <span class="notification">Không tồn tại sản phẩm này</span>
                            <a href="<?php echo base_url(); ?>" class="back-home">Quay về trang chủ</a>
                        </div>
                    <?php
                }
            ?>
            <?php get_form_contact(); ?>
            <?php get_footer() ?>
        </div>
    </div>
    <div class="popup-wrap">
        <div class="modal" id="show-img-desc">
            <div class="modal-close" data-modal-close="#show-img-desc">Đóng</div>
            <?php
                if(!empty($listImgDesc)) {
                    ?>
                        <div class="modal-content">

                            <?php
                                foreach($listImgDesc as $imgItem) {
                                    ?>
                                        <div class="img-wrap">
                                            <img src="<?php echo base_url("admin/{$imgItem['url']}"); ?>" alt="<?php echo $listProfileProd['title_product'] ?>">
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                } else {
                    ?>
                        <div class="modal-content">
                            <div class="img-wrap">
                                <img src="<?php echo base_url("admin/{$listProfileProd['avatar']}"); ?>" alt="<?php echo $listProfileProd['title_product'] ?>">
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
<script src="<?php echo base_url("public/js/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("public/OwlCarousel/owl.carousel.min.js") ?>"></script>
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/carousel.js") ?>"></script>
<script src="<?php echo base_url("public/js/product.js") ?>"></script>

</html>