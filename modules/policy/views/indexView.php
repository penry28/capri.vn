<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $slug_title = create_slug($policyItem['policy_title']);
        $url = base_url("chinh-sach/{$slug_title}-{$policyItem['policy_id']}.html");
    ?>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="<?php if(!empty($policyItem['policy_desc'])) { echo $policyItem['policy_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:description" content="<?php if(!empty($policyItem['policy_desc'])) { echo $policyItem['policy_desc']; } else { echo getInfoSystem()['company_desc']; } ?>">
    <meta property="og:title" content="<?php if(!empty($policyItem['policy_title'])) { echo $policyItem['policy_title']; } else { echo "Chính sách công ty Capri"; } ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="og:image:alt" content="<?php if(!empty($policyItem['policy_title'])) { echo $policyItem['policy_title']; } else { echo "Chính sách công ty Capri"; } ?>">
    <meta property="og:image:secure_url" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="twitter:domain" content="<?php echo $url; ?>">
    <meta property="twitter:image" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <meta property="twitter:image:src" content="<?php echo base_url("admin/".getInfoSystem()['banner_desc']."") ?>">
    <?php get_seo(); ?>
    <link rel="dns-prefetch" href="<?php echo $url; ?>">
    <link rel="shortlink" href="<?php echo $url; ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/about-us.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <title><?php if(!empty($policyItem)) { echo $policyItem['policy_title']; } else { echo "Chính sách"; } ?></title>
</head>

<body>
    <div id="capri-app">
        <?php echo get_menuRespon() ?>
        <div class="wrapper">
            <?php get_header() ?>
            <main id="mainContent" class="content-wrap">
                <?php get_banner() ?>
                <?php
                    if(!empty($policyItem)) {
                        ?>
                            <section class="about-us-top">
                                <div class="root">
                                    <div class="bg-deco">
                                        <img src="<?php echo base_url("public/images/banner/home3d_cvsxd8.png") ?>" alt="">
                                    </div>
                                    <div class="container fixed-width">
                                        <div class="grid-row justify-content-center">
                                            <div class="grid-column-12 grid-column-lg-7">
                                                <div class="group-title">
                                                    <h4 class="main-title"><?php echo $policyItem['policy_title'] ?></h4>
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
                                                <div class="title-inner">
                                                    <h2>Thông Tin Về Chính Sách</h2>
                                                </div>
                                                <div class="info-inner">
                                                    <?php echo $policyItem['policy_content'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php 
                    } else {
                        ?>
                            <div class="data-empty">
                                <span class="thumbNail">
                                    <img src="<?php echo base_url("public/images/logo-icon/khong-tim-thay-du-lieu.png") ?>" alt="">
                                </span>
                                <span class="notification">Không tồn tại chính sách này</span>
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
<script src="<?php echo base_url("public/js/jqueryApp.js") ?>"></script>
<script src="<?php echo base_url("public/js/aboutus.js") ?>"></script>

</html>