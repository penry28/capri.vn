<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $url = base_url();
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty(getInfoSystem()['company_desc'])) { echo getInfoSystem()['company_desc']; } else { echo null; } ?>">
    <meta property="og:description" content="<?php if(!empty(getInfoSystem()['company_desc'])) { echo getInfoSystem()['company_desc']; } else { echo null; } ?>">
    <meta property="og:title" content="<?php if(!empty(getInfoSystem()['company_title'])) { echo getInfoSystem()['company_title']; } else { echo null; } ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
    <meta property="og:image:alt" content="<?php if(!empty(getInfoSystem()['company_title'])) { echo getInfoSystem()['company_title']; } else { echo null; } ?>">
    <meta property="og:image:secure_url" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
    <meta property="twitter:image:src" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
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
    <title>Capri | Trang chủ</title>
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
                <section class="space-top">
                    <div class="space-top-wrap">
                        <div class="grid-row">
                            <div class="grid-column-11 mx-auto">
                                <?php
                                    if(!empty($listCateHighlight)) {
                                        ?>
                                            <section class="box-product-wrap">
                                                <div class="box-head d-flex justify-content-center align-items-center">
                                                    <div class="group-title d-flex justify-center align-items-center">
                                                        <h4 class="primary-title">SẢM PHẨM MỚI</h4>
                                                    </div>
                                                </div>
                                                <div class="box-action-filter-prod">
                                                    <div class="grid-row">
                                                        <div class="grid-column-10 grid-column-lg-9 mx-auto">
                                                            <div class="box-action-wrap">
                                                                <ul class="list-action-item d-flex justify-center align-items-center owl-carousel owl-theme">
                                                                    <?php
                                                                        $i=1;
                                                                        foreach($listCateHighlight as $cateItem) {
                                                                            ?>
                                                                                <li class="item">
                                                                                    <a href="javascript:void(0)" rel="cate-option" class="action-item <?php if($i==1) { echo "active"; } ?>"  data-space-cate-btn="#spaceCate-<?php echo $cateItem['id_cate']; ?>">
                                                                                        <span><?php echo $cateItem['title_cate'] ?></span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php
                                                                        $i++;
                                                                        }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-body products-relative-body">
                                                    <?php
                                                        foreach($listCateHighlight as $cateItem) {
                                                            $listProductByCateId = loadProdByCate($cateItem['id_cate'],$cateItem['level']);
                                                            ?>
                                                                <div class="carousel-product-by-typical" data-space-cate-append id="#spaceCate-<?php echo $cateItem['id_cate']; ?>">
                                                                    <?php
                                                                        if(!empty($listProductByCateId)) {
                                                                            ?>
                                                                                <div class="owl-carousel owl-theme">
                                                                                <?php
                                                                                    foreach($listProductByCateId as $productItem) {
                                                                                        $slug_title_prod = create_slug($productItem['title_product']);
                                                                                        $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                                        $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                                        $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                                                        ?>
                                                                                            <div class="item product-item">
                                                                                                <?php
                                                                                                    if($productItem['hire_purchase'] == '1') {
                                                                                                        ?>
                                                                                                            <div class="hire-purchase">Trả góp</div>
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
                                                                                                    <div class="info-top">
                                                                                                        <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                                                        <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                                                        <div class="product-rate d-flex align-items-center">
                                                                                                            <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                                                            <?php
                                                                                                                if(!empty($productItem['num_custom_vote'])) {
                                                                                                                    echo "<span class='amount-rate'>({$productItem['num_custom_vote']} đánh giá)</span>";
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
                                                                                                        <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">Gọi tư vấn</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                                <p style="text-align: center; padding: 10px;">Danh mục <a class="d-inline" style="border-bottom: 1px solid #cb0606;color: #cb0606;" href="<?php echo base_url("danh-muc-san-pham/".create_slug($cateItem['title_cate'])."-{$cateItem['id_cate']}.html") ?>"><?php echo $cateItem['title_cate']; ?></a> Chưa có sản phẩm nào ...!</p>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </section>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="space-top">
                    <div class="space-top-wrap">
                        <div class="grid-row">
                            <div class="grid-column-11 mx-auto">
                                <?php
                                    if(!empty($productTypical)) {
                                        ?>
                                            <section class="box-product-wrap">
                                                <div class="box-head d-flex justify-content-center align-items-center">
                                                    <div class="group-title d-flex justify-center align-items-center">
                                                        <h4 class="primary-title">SẢM PHẨM BÁN CHẠY</h4>
                                                    </div>
                                                </div>
                                                <div class="box-body products-relative-body">
                                                    <div class="carousel-product-by-typical">
                                                        <div class="owl-carousel owl-theme">
                                                            <?php
                                                                foreach($productTypical as $productItem) {
                                                                    $slug_title_prod = create_slug($productItem['title_product']);
                                                                    $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                    $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                    $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                                    ?>
                                                                        <div class="item product-item">
                                                                            <?php
                                                                                if($productItem['hire_purchase'] == '1') {
                                                                                    ?>
                                                                                        <div class="hire-purchase">Trả góp</div>
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
                                                                                <div class="info-top">
                                                                                    <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                                    <a href="<?php echo $cateProdItem['url']; ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                                    <div class="product-rate d-flex align-items-center">
                                                                                        <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                                        <?php
                                                                                            if(!empty($productItem['num_custom_vote'])) {
                                                                                                echo "<span class='amount-rate'>({$productItem['num_custom_vote']} đánh giá)</span>";
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
                                            </section>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="grid-column-12">
                                <div class="grid-row">
                                    <div class="grid-column-12">
                                        <div class="category-title">
                                            <h3 class="sub-title">Danh mục</h3>
                                        </div>
                                    </div>
                                    <?php
                                        if(!empty($listTotalCate)) {
                                            ?>
                                                <div class="grid-column-12">
                                                    <div class="category-list">
                                                        <div class="slider-cate-prod owl-carousel owl-theme">
                                                            <?php
                                                                foreach($listTotalCate as $cateItem) {
                                                                    $slug_title = create_slug($cateItem['title_cate']);
                                                                    $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title}-{$cateItem['id_cate']}.html");
                                                                    ?>
                                                                        <div class="item category-item">
                                                                            <a href="<?php echo $cateItem['url'] ?>" class="cate-view-link">
                                                                                <span class="thumbNail">
                                                                                    <img src="<?php echo base_url("admin/{$cateItem['img_banner']}") ?>" alt="<?php echo $cateItem['title_cate'] ?>">
                                                                                </span>
                                                                                <h2 class="name"><?php echo $cateItem['title_cate'] ?></h2>
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        } else {
                                            echo "Chưa có bấc kỳ danh mục nào";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                    if(!empty($blogHighlight[0])) {
                        $slug_title = create_slug($blogHighlight[0]['blog_title']);
                        $blogHighlight[0]['url'] = base_url("bai-viet/{$slug_title}-{$blogHighlight[0]['blog_id']}.html");
                        ?>
                            <section class="space-kitchen">
                                <div class="space-slide">
                                    <span class="thumbNail">
                                        <img src="<?php echo base_url("admin/{$blogHighlight[0]['blog_img']}") ?>" alt="<?php echo $blogHighlight[0]['blog_title'] ?>">
                                    </span>
                                    <div class="caption">
                                        <div class="group-txt">
                                            <h3>
                                                <a href='<?php echo $blogHighlight[0]['url'] ?>' class='title'><?php echo $blogHighlight[0]['blog_title'] ?></a>
                                            </h3>
                                            <a href="<?php echo $blogHighlight[0]['url'] ?>" class="view-link">
                                                <span>Xem chi tiết</span>
                                                <span class="arrow-wrap"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php
                    }
                ?>
                <section class="blog-news">
                    <div class="blog-wrapper">
                        <div class="decoration">
                            <span class="circle animated __cir-1"></span>
                            <span class="circle animated __cir-2"></span>
                            <span class="circle animated __cir-3"></span>
                            <span class="circle animated __cir-4"></span>
                        </div>
                        <div class="container" style="position: relative;">
                            <div class="grid-row">
                                <div class="grid-column-12">
                                    <div class="title-wrap group-title d-flex justify-center align-items-center">
                                        <h4 class="primary-title">Bài viết</h4>
                                        <h4 class="second-title">Capri</h4>
                                    </div>
                                </div>
                                <div class="grid-column-12">
                                    <div class="grid-row">
                                        <?php
                                            if(!empty($blogNewPosted)) {
                                                foreach ($blogNewPosted as $blogItem) {
                                                    $slug_title = create_slug($blogItem['blog_title']);
                                                    $blogItem['url'] = base_url("bai-viet/{$slug_title}-{$blogItem['blog_id']}.html");
                                                    ?>
                                                        <div class="grid-column-12 grid-column-lg-3">
                                                            <div class="blog-item">
                                                                <a href="<?php echo $blogItem['url'] ?>">
                                                                    <span class="blog-img thumbNail">
                                                                        <img src="<?php echo base_url("admin/".$blogItem['blog_img']) ?>" alt="<?php echo $blogItem['blog_title'] ?>">
                                                                    </span>
                                                                </a>
                                                                <?php
                                                                    if(!empty($blogItem['prodCate'])) {
                                                                        $slug_title_cate = create_slug($blogItem['prodCate']['title_cate']);
                                                                        $blogItem['prodCate']['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$blogItem['prodCate']['id_cate']}.html");
                                                                        ?>
                                                                            <a href="<?php echo $blogItem['prodCate']['url'] ?>" class="blog-cate-prod"><?php echo $blogItem['prodCate']['title_cate'] ?></a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                            <div class="space-empty" style="height: 23px;"></div>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                <h2>
                                                                    <a class="blog-title" href="<?php echo $blogItem['url'] ?>"><?php echo $blogItem['blog_title'] ?></a>
                                                                </h2>
                                                                <p class="blog-desc"><?php echo $blogItem['blog_desc'] ?></p>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                            } else {
                                                echo "Chưa có bấc kỳ bài viết nào";
                                            }
                                        ?>
                                        <div class="grid-column-12 grid-column-lg-6">
                                            <?php
                                                if(!empty(getCatalogue())) {
                                                    ?>
                                                        <div class="blog-item  __full-img">
                                                            <a href="<?php echo getCatalogue()['catalogue_link'] ?>" target="_blank">
                                                                <span class="blog-img thumbNail">
                                                                    <img src="<?php echo base_url("admin/".getCatalogue()['catalogue_banner']) ?>" alt="<?php echo getCatalogue()['catalogue_title'] ?>">
                                                                </span>
                                                                <p class="blog-desc">Catalogue <strong><?php echo getCatalogue()['catalogue_year'] ?></strong></p>
                                                            </a>
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
                    if(!empty($blogHighlight[1])) {
                        $slug_title = create_slug($blogHighlight[1]['blog_title']);
                        $blogHighlight[1]['url'] = base_url("bai-viet/{$slug_title}-{$blogHighlight[1]['blog_id']}.html");
                        ?>
                            <section class="space-kitchen">
                                <div class="space-slide">
                                    <span class="thumbNail">
                                        <img src="<?php echo base_url("admin/{$blogHighlight[1]['blog_img']}") ?>" alt="<?php echo $blogHighlight[1]['blog_title'] ?>">
                                    </span>
                                    <div class="caption">
                                        <div class="group-txt">
                                            <h3>
                                                <a href='<?php echo $blogHighlight[1]['url'] ?>' class="title"><?php echo $blogHighlight[1]['blog_title'] ?></a>
                                            </h3>
                                            <a href="<?php echo $blogHighlight[1]['url'] ?>" class="view-link">
                                                <span>Xem chi tiết</span>
                                                <span class="arrow-wrap"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php
                    }
                ?>
            </main>
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
</html>