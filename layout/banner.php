<?php
    if(!empty(getListSlide())) {
        ?>
            <section class="sc-banner">
                <div class="banner-slider-fullWidth">
                    <div class="slider-wrap h-100">
                        <div class="slider-info">
                            <div class="group-text d-flex flex-column align-items-center">
                                <h2 class="main-title">THƯƠNG HIỆU MANG TẦM QUỐC TẾ</h2>
                                <span class="line-highlight"></span>
                                <?php
                                    if(!empty(getInfoSystem()['company_slogan'])) {
                                        ?>
                                            <h4 class="sub-title sub-title-1"><?php echo getInfoSystem()['company_slogan'] ?></h4>
                                        <?php 
                                    }
                                ?>
                            </div>
                            <div class="highlight-top-banner">
                                <div class="container">
                                    <div class="grid-row">
                                        <div class="grid-column-4 d-flex item-highlight-top">
                                            <div class="item-img">
                                                <span class="thumbNail">
                                                    <img src="<?php echo base_url("public/images/logo-icon/san-pham-bep-thong-min-sang-trong.png"); ?>" alt="Sản phẩm bếp thông minh sang trọng">
                                                </span>
                                            </div>
                                            <div class="item-info">
                                                <strong class="title">
                                                    <span>300</span>
                                                    <span>+</span>
                                                </strong>
                                                <p class="desc">Sản phẩm bếp thông minh, sang trọng</p>
                                            </div>
                                        </div>
                                        <div class="grid-column-4 d-flex item-highlight-top">
                                            <div class="item-img">
                                                <span class="thumbNail">
                                                    <img src="<?php echo base_url("public/images/logo-icon/nhan-su-day-dam-me-nhiet-huyet.png"); ?>" alt="Nhân sự đầy đam mê, nhiệt huyết">
                                                </span>
                                            </div>
                                            <div class="item-info">
                                                <strong class="title">
                                                    <span>100</span>
                                                    <span>+</span>
                                                </strong>
                                                <p class="desc">Nhân sự đầy đam mê, nhiệt huyết</p>
                                            </div>
                                        </div>
                                        <div class="grid-column-4 d-flex item-highlight-top">
                                            <div class="item-img">
                                                <span class="thumbNail">
                                                    <img src="<?php echo base_url("public/images/logo-icon/doi-tac-khach-hang-danh-tin-cay.png"); ?>" alt="Sản phẩm bếp thông minh sang trọng">
                                                </span>
                                            </div>
                                            <div class="item-info">
                                                <strong class="title">
                                                    <span>500</span>
                                                    <span>+</span>
                                                </strong>
                                                <p class="desc">Đối tác khách hàng đáng tin cậy</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-list">
                            <?php
                                if(count(getListSlide()) == 1) {
                                    ?>
                                        <div class="slide-item" style="opacity: 1;">
                                            <span class="thumbNail">
                                                <img src="<?php echo base_url("admin/".getListSlide()[0]['slide_img']) ?>" class="img-fluid" alt="Banner sản phẩm capri">
                                            </span>
                                        </div>
                                    <?php 
                                } else {
                                    $i = 1;
                                    foreach(getListSlide() as $slideItem) {
                                        ?>
                                            <div class="slide-item <?php if($i == 1){ echo "slide-in"; } else { echo null; } ?>">
                                                <span class="thumbNail">
                                                    <img src="<?php echo base_url("admin/".$slideItem['slide_img']) ?>" class="img-fluid" alt="Banner sản phẩm capri <?php echo $i ?>">
                                                </span>
                                            </div>
                                        <?php 
                                        $i++;
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