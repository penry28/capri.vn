<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $url = base_url("gioi-thieu.html");
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty($totalInfoAboutUs['desc_video'])) { echo $totalInfoAboutUs['desc_video']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:description" content="<?php if(!empty($totalInfoAboutUs['desc_video'])) { echo $totalInfoAboutUs['desc_video']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:title" content="<?php if(!empty($totalInfoAboutUs['desc_video'])) { echo $totalInfoAboutUs['desc_video']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php if(!empty($totalInfoAboutUs['thumbnail'])) { echo base_url("admin/{$totalInfoAboutUs['thumbnail']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="og:image:alt" content="<?php if(!empty($totalInfoAboutUs['desc_video'])) { echo $totalInfoAboutUs['desc_video']; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:image:secure_url" content="<?php if(!empty($totalInfoAboutUs['thumbnail'])) { echo base_url("admin/{$totalInfoAboutUs['thumbnail']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php if(!empty($totalInfoAboutUs['thumbnail'])) { echo base_url("admin/{$totalInfoAboutUs['thumbnail']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <meta property="twitter:image:src" content="<?php if(!empty($totalInfoAboutUs['thumbnail'])) { echo base_url("admin/{$totalInfoAboutUs['thumbnail']}"); } else { echo base_url("admin/".getInfoSystem()['banner_desc'].""); } ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/about-us.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <title>Giới thiệu công ty</title>
</head>

<body>
    <div id="capri-app">
        <?php echo get_menuRespon() ?>
        <div class="wrapper">
            <?php get_header() ?>
            <main id="mainContent" class="content-wrap">
                <?php get_banner() ?>
                <section class="about-us-top">
                    <div class="root">
                        <div class="bg-deco">
                            <img src="<?php echo base_url("public/images/banner/home3d_cvsxd8.png") ?>" alt="">
                        </div>
                        <div class="container fixed-width">
                            <div class="grid-row justify-content-center">
                                <div class="grid-column-12 grid-column-lg-7">
                                    <div class="group-title">
                                        <h4 class="main-title">Về Công Ty Chúng Tôi</h4>
                                    </div>
                                </div>
                                <div class="grid-column-12 grid-column-lg-5">
                                    <span class="illustration thumbNail">
                                        <img src="<?php echo base_url("public/images/banner/home3d_cvsxd8.png") ?>" alt="">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="space-video-intro">
                    <div class="root">
                        <div class="modal video-popup" id="modal-video">
                            <div class="modal-mask" data-close-popup="#modal-video"></div>
                            <div class="modal-content">
                                <span class="close-modal" data-close-popup="#modal-video">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                                <div class="video-iframe">
                                    <iframe id="video-popup" style="width: 100%; height: 100%" src="<?php echo $totalInfoAboutUs['iframe_video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="container fixed-width">
                            <div class="grid-row">
                                <div class="grid-column-12 grid-column-lg-7">
                                    <div class="video-wrap">
                                        <span class="video-thumbNail thumbNail">
                                            <img src="<?php echo base_url("admin/".$totalInfoAboutUs['thumbnail']) ?>" alt="<?php echo $totalInfoAboutUs['title_video'] ?>">
                                        </span>
                                        <div class="control">
                                            <button type="button">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </button>
                                            <span class="line-highlight"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-12 grid-column-lg-5">
                                    <div class="video-intro-content">
                                        <div class="group-title">
                                            <h4 class="main-title"><?php echo $totalInfoAboutUs['title_video'] ?></h4>
                                            <p class="desc"><?php echo $totalInfoAboutUs['desc_video'] ?></p>
                                        </div>
                                        <?php
                                            if(!empty($totalInfoAboutUs['content_video'])) {
                                                ?> 
                                                    <div class="text-paragraph-wrap">
                                                        <?php echo $totalInfoAboutUs['content_video'] ?>
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
                    if(!empty($totalInfoAboutUs['desc_company'])) {
                        ?>
                            <section class="about-info">
                                <div class="container">
                                    <div class="grid-row">
                                        <div class="grid-column-12 grid-column-lg-11 mx-auto">
                                            <div class="txt-box">
                                                <div class="title-inner">
                                                    <h2>Giới Thiệu Sơ Lược</h2>
                                                </div>
                                                <div class="info-inner">
                                                    <?php echo $totalInfoAboutUs['desc_company'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php 
                    }
                ?>
                <?php
                    if(!empty($totalInfoAboutUs['content_cooperation'])) {
                        ?> 
                            <section class="about-info-another __1">
                                <div class="root">
                                    <div class="container">
                                        <div class="grid-row">
                                            <div class="grid-column-12 grid-column-lg-8 mx-auto">
                                                <div class="txt-info">
                                                    <div class="info-title">
                                                        <h4>HỢP TÁC MANG TẦM CHIẾN LƯỢC</h4>
                                                    </div>
                                                    <div class="info-content">
                                                        <?php echo $totalInfoAboutUs['content_cooperation'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php
                    }
                ?>
                <?php
                    if(!empty($totalInfoAboutUs['content_highlight_company'])) {
                        ?>
                            <section class="about-info-another __2">
                                <div class="root">
                                    <div class="container">
                                        <div class="grid-row">
                                            <div class="grid-column-12 mx-auto">
                                                <div class="txt-info">
                                                    <div class="info-title">
                                                        <h4>THẾ MẠNH VÀ THÀNH TỰU</h4>
                                                    </div>
                                                    <div class="info-content">
                                                        <?php echo $totalInfoAboutUs['content_highlight_company'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php 
                    }
                ?>
                <?php
                    if(!empty($totalInfoAboutUs['content_system_showroom'])) {
                        ?>
                            <section class="about-info-another __1 __3">
                                <div class="root">
                                    <div class="container">
                                        <div class="grid-row">
                                            <div class="grid-column-12 grid-column-lg-8 mx-auto">
                                                <div class="txt-info">
                                                    <div class="info-title">
                                                        <h4>HỆ THỐNG SHOWROOM</h4>
                                                    </div>
                                                    <div class="info-content">
                                                        <?php echo $totalInfoAboutUs['content_system_showroom'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php
                    }
                ?>
                <?php
                    if(!empty($listShowroom)) {
                        ?>
                            <section class="about-info-another __4">
                                <div class="root">
                                    <div class="container">
                                        <div class="grid-row list-conpany-info">
                                            <?php
                                                foreach($listShowroom as $showroomItem) {
                                                    ?>
                                                        <div class="grid-column-12 grid-column-lg-6">
                                                            <div class="box-companyinfo">
                                                                <h3 class="name-companyinfo"><?php echo $showroomItem['showroom_name'] ?></h3>
                                                                <ul class="company-info">
                                                                    <li class="bt-location">
                                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                        <a href="https://www.google.com/maps/place/<?php echo $showroomItem['showroom_address'] ?>" target="_blank"><?php echo $showroomItem['showroom_address'] ?></a>
                                                                    </li>
                                                                    <li class="bt-phone">
                                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                                        <p>
                                                                            <a href="tel:<?php echo $showroomItem['showroom_phone_1'] ?>"><?php echo formatPhone($showroomItem['showroom_phone_1']) ?></a>
                                                                            <?php
                                                                                if(!empty($showroomItem['showroom_phone_2'])) {
                                                                                    ?>
                                                                                        <span>-</span>
                                                                                        <a href="tel:<?php echo $showroomItem['showroom_phone_2'] ?>"><?php echo formatPhone($showroomItem['showroom_phone_2']) ?></a>
                                                                                    <?php 
                                                                                }
                                                                            ?>
                                                                        </p>
                                                                    </li>
                                                                    <?php
                                                                        if(!empty($showroomItem['showroom_email'])) {
                                                                            ?>
                                                                                <li>
                                                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                                                    <a target="_blank" href="mailTo:<?php echo $showroomItem['showroom_email']; ?>"><?php echo $showroomItem['showroom_email']; ?></a>
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
                            </section>
                        <?php 
                    }
                ?>
                <?php get_form_contact(); ?>
            </main>
            <?php get_footer() ?>
        </div>
    </div>
</body>
<script src="<?php echo base_url("public/js/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/aboutus.js") ?>"></script>

</html>