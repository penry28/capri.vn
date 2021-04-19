<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        function create_title_search($string) {
               $search = array (
                   "/[ ]/",
                   ) ;
               $replace = array (
                   '+',
                   ) ;
               $string = preg_replace($search, $replace, $string);
               $string = preg_replace('/(-)+/', '+', $string);
               $string = strtolower($string);
               return $string;
         }
        $titleSearch = !empty($keywordSearch) ? $keywordSearch : '';
        $url = base_url("search/?q=".create_title_search($titleSearch)."");
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <meta property="description" content="<?php if(!empty(getInfoSystem()['company_desc'])) { echo getInfoSystem()['company_desc']; } else { echo "Công ty capri"; } ?>">
    <meta property="og:description" content="<?php if(!empty(getInfoSystem()['company_desc'])) { echo getInfoSystem()['company_desc']; } else { echo "Công ty capri"; } ?>">
    <meta property="og:title" content="<?php if(!empty($keywordSearch)) { echo $keywordSearch; } else { echo "Từ khóa tìm kiếm"; } ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
    <meta property="og:image:alt" content="<?php if(!empty($keywordSearch)) { echo $keywordSearch; } else { echo "Từ khóa tìm kiếm"; } ?>">
    <meta property="og:image:secure_url" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
    <meta property="twitter:image:src" content="<?php if(!empty(getInfoSystem()['banner_desc'])) { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } else { echo null; } ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <!--  -->
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/category.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/OwlCarousel/assets/owl.theme.default.min.css") ?>">
    <title><?php if(!empty($keywordSearch)) { echo "Tìm kiếm | ".$keywordSearch; } else { echo "Tìm kiếm"; } ?></title>
</head>

<body>
    <div id="capri-app">
        <?php get_menuRespon(); ?>
        <div class="wrapper">
            <?php get_header(); ?>
            <main id="mainContent" class="content-wrap">
                <section class="breadcrum"></section>
                <div class="container">
                    <div class="category-wrap-top">
                        <div class="grid-row">
                            <div class="grid-column-12 grid-column-lg-2 d-none d-lg-block">
                                <aside class="aside-main-filter">
                                    <section class="box-wrap category-related">
                                        <div class="box-title">
                                            <h4>Tìm kiếm sản phẩm</h4>
                                        </div>
                                        <div class="box-body">
                                            <?php if(!empty($keywordSearch)) : ?>
                                                <ul class="list-category">
                                                    <li>
                                                        <span class="d-block"><strong>Từ khóa: </strong> <?php echo $keywordSearch ?></span>
                                                        <span class="d-block"><strong>Số lượng: </strong><?php echo count($searchResult); ?> sản phẩm</span>
                                                    </li>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </section>
                                    <?php if(!empty($listBlogReadMost)) : ?>
                                        <section class="box-wrap filter-by-price">
                                            <div class="box-title">
                                                <h4>Bài viết đọc nhiều nhất</h4>
                                            </div>
                                            <div class="box-body">
                                                <ul>
                                                    <?php foreach($listBlogReadMost as $blogItem) : ?>
                                                        <?php
                                                            $slug_title_blog = create_slug($blogItem['blog_title']);
                                                            $blogItem['url'] = base_url("bai-viet/{$slug_title_blog}-{$blogItem['blog_id']}.html");
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo $blogItem['url'] ?>" class="blog-item"><?php echo $blogItem['blog_title'] ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <a href="<?php echo base_url("danh-muc-bai-viet/tat-ca.html") ?>" class="read-total-blog">Xem tất cả bài viết ...</a>
                                            </div>
                                        </section>
                                    <?php endif; ?>
                                </aside>
                            </div>
                            <div class="grid-column-12 grid-column-lg-10">
                                <div class="category-container">
                                    <?php if( !empty($listCate) ) : ?>
                                        <section class="banner-highlight">
                                            <div class="category-slider">
                                                <div class="carousel-category-slider-wrap">
                                                    <div class="owl-carousel owl-theme">
                                                        <?php foreach($listCate as $cateItem) : ?>
                                                            <?php
                                                                $slug_title_cate = create_slug($cateItem['title_cate']);
                                                                $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html");
                                                            ?>
                                                            <div class="item banner-category-item">
                                                                <a href="<?php echo $cateItem['url'] ?>" class="view-category-link thumbNail">
                                                                    <img src="<?php echo base_url("admin/{$cateItem['img_banner']}") ?>" alt="<?php echo $cateItem['title_cate'] ?>">
                                                                </a>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    <?php endif; ?>
                                    <section class="box-product-wrap">
                                        <div class="box-head d-flex justify-content-between align-items-center">
                                            <h4 class="box-title">Sản phẩm tìm kiếm</h4>
                                        </div>
                                        <?php if( !empty($searchResult) ) : ?>
                                            <div class="box-body products-relative-body">
                                                <div class="carousel-product-by-category">
                                                    <div class="owl-carousel owl-theme">
                                                        <?php foreach( $searchResult as $productItem ) : ?>
                                                            <?php
                                                                $slug_title_prod = create_slug($productItem['title_product']);
                                                                $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                            ?>
                                                            <div class="item product-item">
                                                                <?php if( $productItem['hire_purchase'] == '1' ) : ?>
                                                                    <div class="hire-purchase">Trả góp</div>
                                                                <?php endif; ?>
                                                                <?php if( !empty($productItem['capri_price']) && !empty($productItem['market_price']) ) : ?>
                                                                    <?php if( ((int)$productItem['market_price'] - (int)$productItem['capri_price']) > 0 ) : ?>
                                                                        <div class="prod-discount">
                                                                            <span><?php echo percent_format($productItem['capri_price'],$productItem['market_price']); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <div class="prod-img">
                                                                    <a href="<?php echo $productItem['url'] ?>" class="thumbNail view-prod">
                                                                        <img src="<?php echo base_url("admin/{$productItem['avatar']}") ?>" alt="<?php echo $productItem['title_product']; ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="prod-info">
                                                                    <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product']; ?></a>
                                                                    <a href="<?php echo $cateProdItem['url'] ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                    <div class="product-rate d-flex align-items-center">
                                                                        <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                        <?php if(!empty($productItem['num_custom_vote'])) : ?>
                                                                            <span class='amount-rate'>(<?php {{ echo $productItem['num_custom_vote']; }} ?> đánh giá)</span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="product-price d-flex align-items-center">
                                                                        <?php if( !empty($productItem['capri_price']) ) : ?>
                                                                            <span class="price-capri"><?php echo currency_format($productItem['capri_price']) ?></span>
                                                                        <?php endif; ?>
                                                                        <?php if( !empty(!empty($productItem['market_price'])) ) : ?>
                                                                            <span class="market-capri"><?php echo currency_format($productItem['market_price']) ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="btn-wrap">
                                                                        <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">Gọi tư vấn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <p>Không có sản phẩm nào ! Cho từ khóa tìm kiếm <strong><?php echo $keywordSearch; ?>.</strong></p>
                                        <?php endif; ?>
                                    </section>
                                    <?php if( !empty($productNewAdded) ) : ?>
                                        <section class="box-product-wrap">
                                            <div class="box-head d-flex justify-content-between align-items-center">
                                                <h4 class="box-title">Sản phẩm mới</h4>
                                            </div>
                                            <div class="box-body products-relative-body">
                                                <div class="carousel-product-by-category">
                                                    <div class="owl-carousel owl-theme">
                                                        <?php foreach($productNewAdded as $productItem) : ?>
                                                            <?php
                                                                $slug_title_prod = create_slug($productItem['title_product']);
                                                                $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                            ?>
                                                            <div class="item product-item">
                                                                <?php if( $productItem['hire_purchase'] == '1' ) : ?>
                                                                    <div class="hire-purchase">Trả góp</div>
                                                                <?php endif; ?>
                                                                <?php if( !empty($productItem['capri_price']) && !empty($productItem['market_price']) ) : ?>
                                                                    <?php if( ((int)$productItem['market_price'] - (int)$productItem['capri_price']) > 0 ) : ?>
                                                                        <div class="prod-discount">
                                                                            <span><?php echo percent_format($productItem['capri_price'],$productItem['market_price']); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <div class="prod-img">
                                                                    <a href="<?php echo $productItem['url'] ?>" class="thumbNail view-prod">
                                                                        <img src="<?php echo base_url("admin/".$productItem['avatar']) ?>" alt="<?php echo $productItem['title_product'] ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="prod-info">
                                                                    <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                    <a href="<?php echo $cateProdItem['url'] ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                    <div class="product-rate d-flex align-items-center">
                                                                        <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                        <?php if( !empty($productItem['num_custom_vote']) ) : ?>
                                                                            <span class='amount-rate'>(<?php {{ echo $productItem['num_custom_vote']; }} ?> đánh giá)</span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="product-price d-flex align-items-center">
                                                                        <?php if( !empty($productItem['capri_price']) ) : ?>
                                                                            <span class="price-capri"><?php echo currency_format($productItem['capri_price']) ?></span>
                                                                        <?php endif; ?>
                                                                        <?php if( !empty($productItem['market_price']) ) : ?>
                                                                            <span class="market-capri"><?php echo currency_format($productItem['market_price']) ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="btn-wrap">
                                                                        <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">Gọi tư vấn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    <?php else :?>
                                        <p>Không có sản phẩm nào !</strong></p>
                                    <?php endif; ?>
                                    <?php if( !empty($totalProduct) ) : ?>
                                        <section class="box-product-wrap">
                                            <div class="box-head d-flex justify-content-between align-items-center">
                                                <h4 class="box-title">Tất cả sản phẩm</h4>
                                            </div>
                                            <div class="box-body products-relative-body">
                                                <div class="carousel-product-by-category">
                                                    <div class="owl-carousel owl-theme">
                                                        <?php foreach( $totalProduct as $productItem ) : ?>
                                                            <?php
                                                                $slug_title_prod = create_slug($productItem['title_product']);
                                                                $productItem['url'] = base_url("san-pham/{$slug_title_prod}-{$productItem['id_product']}.html");
                                                                $slug_title_cate = create_slug(getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']);
                                                                $cateProdItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$productItem['cate_level_1_id']}.html");
                                                            ?>
                                                            <div class="item product-item">
                                                                <?php if( $productItem['hire_purchase'] == '1' ) : ?>
                                                                    <div class="hire-purchase">Trả góp</div>
                                                                <?php endif; ?>
                                                                <?php if( !empty($productItem['capri_price']) && !empty($productItem['market_price']) ) : ?>
                                                                    <?php if( ((int)$productItem['market_price'] - (int)$productItem['capri_price']) > 0 ) : ?>
                                                                        <div class="prod-discount">
                                                                            <span><?php echo percent_format($productItem['capri_price'],$productItem['market_price']); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <div class="prod-img">
                                                                    <a href="<?php echo $productItem['url'] ?>" class="thumbNail view-prod">
                                                                        <img src="<?php echo base_url("admin/".$productItem['avatar']) ?>" alt="<?php echo $productItem['title_product'] ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="prod-info">
                                                                    <a href="<?php echo $productItem['url'] ?>" class="name-prod view-prod"><?php echo $productItem['title_product'] ?></a>
                                                                    <a href="<?php echo $cateProdItem['url'] ?>" class="brand-prod view-prod"><?php echo getCateItemByIdController($productItem['cate_level_1_id'])['title_cate']; ?></a>
                                                                    <div class="product-rate d-flex align-items-center">
                                                                        <span class="star-wrap" data-num-star="<?php echo $productItem['vote_type'] ?>"></span>
                                                                        <?php if(!empty($productItem['num_custom_vote'])): ?>
                                                                            <span class='amount-rate'>(<?php {{ echo $productItem['num_custom_vote']; }} ?> đánh giá)</span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="product-price d-flex align-items-center">
                                                                        <?php if( !empty($productItem['capri_price']) ) : ?>
                                                                            <span class="price-capri"><?php echo currency_format($productItem['capri_price']) ?></span>
                                                                        <?php endif; ?>
                                                                        <?php if( !empty($productItem['market_price']) ) : ?>
                                                                            <span class="market-capri"><?php echo currency_format($productItem['market_price']) ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="btn-wrap">
                                                                        <a href="javascript:void(0)" data-modal-open="#modal-contact-form" class="btn">Gọi tư vấn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    <?php else : ?>
                                        <p>Không có sản phẩm nào !</p>
                                    <?php endif; ?>
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