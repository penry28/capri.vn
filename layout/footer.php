<footer class="footer-wrap" id="footer">
    <a href="tel:0932939039" class="call-fixed">
        <img src="./public/images/logo-icon/communications.webp" style="max-width: 24px;" alt="">
        <span class="phone-value">(0932) 939.039</span>
    </a>
    <div class="footer-counter">
        <div class="footer-main-info-wrap">
            <div class="container">
                <div class="grid-row mt-3 mt-md-0">
                    <div class="grid-column-12 grid-column-lg-5 p-0">
                        <div class="counter-wrap">
                            <p class="desc">CTY CỔ PHẦN THƯƠNG MẠI XUẤT NHẬP KHẨU KHÂU THỊ</p>
                        </div>
                        <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center">
                            <span class="thumbNail">
                                <img src="<?php echo base_url("public/images/logo-icon/logo-capri.png") ?>" alt="">
                            </span>
                        </a>
                        <?php if( !empty(getInfoSystem()['company_slogan']) ) : ?>
                            <p class="desc-logo"><?php echo getInfoSystem()['company_slogan']; ?></p>
                        <?php endif; ?>
                        <div class="quick-link">
                           <div class="grid-row">
                                <?php if( !empty(getListPolicy()) ) : ?>
                                    <div class="grid-column-6">
                                        <h6 class="title-nav">Chính sách</h6>
                                        <ul>
                                            <?php foreach(getListPolicy() as $policyItem) : ?>
                                                <?php
                                                    $slug_title_policy = create_slug($policyItem['policy_title']);
                                                    $policyItem['url'] = base_url("chinh-sach/{$slug_title_policy}-{$policyItem['policy_id']}.html");
                                                ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo $policyItem['url'] ?>"><?php echo $policyItem['policy_title']; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if( !empty(getListProductSupport()) ) : ?>
                                    <div class="grid-column-6">
                                        <h6 class="title-nav">Hỗ trợ</h6>
                                        <ul>
                                            <?php if(!empty(getListProductSupport()['content_service_center'])) : ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo base_url("ho-tro/trung-tam-bao-hanh.html") ?>">Trung tâm bảo hành</a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(!empty(getListProductSupport()['content_shipping_information'])) : ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo base_url("ho-tro/thong-tin-van-chuyen.html") ?>">Thông tin vận chuyển</a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(!empty(getListProductSupport()['content_payment_guide'])) : ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo base_url("ho-tro/huong-dan-thanh-toan.html") ?>">Hướng dẫn thanh toán</a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                           </div>
                        </div>
                    </div>
                    <div class="grid-column-12 grid-column-lg-4 p-0 p-lg-5">
                        <?php if(!empty(getListBlog())) : ?>
                            <div class="list-blog">
                                <?php foreach(getListBlog() as $blogItem) : ?>
                                    <?php
                                        $slug_title = create_slug($blogItem['blog_title']);
                                        $blogItem['url'] = base_url("bai-viet/{$slug_title}-{$blogItem['blog_id']}.html");
                                    ?>
                                    <a href="<?php echo $blogItem['url'] ?>" class="blog-item">
                                        <span class="figure thumbNail">
                                            <img src="<?php echo base_url("admin/".$blogItem['blog_img']) ?>" alt="<?php echo $blogItem['blog_title'] ?>">
                                        </span>
                                        <p class="list-text">
                                            <span class="category"><?php echo $blogItem['blog_title'] ?></span>
                                            <span class="content"><?php echo $blogItem['blog_desc'] ?></span>
                                        </p>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="grid-column-12 grid-column-lg-3 p-0 p-lg-5">
                        <div class="socal-connect">
                            <?php if( !empty(getInfoSystem()['fanpage_facebook']) ) : ?>
                                <a target="_blank" href="<?php echo getInfoSystem()['fanpage_facebook']; ?>" class="sc--item">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                            <?php if( !empty(getInfoSystem()['zalo']) ) : ?>
                                <a target="_blank" href="https://zalo.me/<?php echo getInfoSystem()['zalo'] ?>" class="sc--item">
                                    <img src="<?php echo base_url("public/images/logo-icon/zalo-min.png") ?>" width="25" alt="">
                                </a>
                            <?php endif; ?>
                            <?php if( !empty(getInfoSystem()['youtube_change']) ) : ?>
                                <a target="_blank" href="<?php echo getInfoSystem()['youtube_change']; ?>" class="sc--item">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <p class="copyright">© Thương hiệu Capri - 2008</p>
                        <a target="_blank" href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=40434" class="certification thumbNail">
                            <img src="<?php echo base_url("public/images/logo-icon/dathongbao.png") ?>" alt="Chứng nhận của capri">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1589834844400849"
  logged_in_greeting="Hi! Capri có thể giúp được gì cho bạn ?"
  logged_out_greeting="Hi! Capri có thể giúp được gì cho bạn ?">
      </div>