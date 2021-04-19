<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty($titleInfoSupport)) { echo $titleInfoSupport; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:description" content="<?php if(!empty($titleInfoSupport)) { echo $titleInfoSupport; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:title" content="<?php if(!empty($titleInfoSupport)) { echo $titleInfoSupport; } else { echo getInfoSystem()['company_title']; } ?>">
    <meta property="og:url" content="<?php echo $baseURL; ?>">
    <meta property="og:image" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="og:image:alt" content="<?php echo $titleInfoSupport; ?>">
    <meta property="og:image:secure_url" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="twitter:domain" content="<?php echo $baseURL; ?>">
    <meta property="twitter:image" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="twitter:image:src" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $baseURL; ?>">
    <link rel="shortlink" href="<?php echo $baseURL; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/about-us.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <title><?php if(!empty($titleInfoSupport)) { echo $titleInfoSupport; } ?></title>
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
                                        <h4 class="main-title"><?php if(!empty($titleInfoSupport)) { echo $titleInfoSupport; } ?></h4>
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
                <section class="about-info">
                    <div class="container">
                        <div class="grid-row">
                            <div class="grid-column-12 grid-column-lg-11 mx-auto">
                                <div class="txt-box">
                                    <div class="info-inner">
                                        <?php echo $infoSupportProd; ?>
                                    </div>
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
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/aboutus.js") ?>"></script>

</html>