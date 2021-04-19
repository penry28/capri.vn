<section class="contact-form-wrap">
    <div class="container">
        <div class="mask-wrap"></div>
        <div class="grid-row position-relative form-main-bottom">
            <div class="grid-column-12 grid-column-lg-6 p-2">
                <div class="group-title">
                    <h3 class="block-title">ĐỂ LẠI THÔNG TIN TƯ VẤN</h3>
                    <p class="block-desc">Capri sở hữu cho mình tính năng thông minh, tinh tế, tận tâm, sang trọng, thời thượng, dịch vụ hoàn hảo, sản phẩm đồng bộ, sản phẩm tin cậy số 1 trong ngành thiết bị bếp tại Việt Nam. Với vị thế của mình, Capri luôn nỗ lực mang đến giải pháp chăm sóc gia đình hoàn hảo cho người phụ nữ Việt, giúp họ tận hưởng cuộc sống hạnh phúc và tiện ích...</p>
                    <div class="block-link d-flex align-items-center">
                        <?php
                            if(!empty(getInfoSystem()['fanpage_facebook'])) {
                                ?>
                                    <a href="<?php echo getInfoSystem()['fanpage_facebook']; ?>" class="link-view-item d-flex justify-between align-items-center" target="_blank">
                                        <span class="thumbNail">
                                            <img src="<?php echo base_url("./public/images/logo-icon/facebook.png"); ?>" alt="">
                                        </span>
                                        <span class="title">Facebook</span>
                                    </a>
                                <?php
                            }
                            if(!empty(getInfoSystem()['zalo'])) {
                                ?>
                                    <a href="https://zalo.me/<?php echo getInfoSystem()['zalo']; ?>" class="link-view-item d-flex justify-between align-items-center" target="_blank">
                                        <span class="thumbNail">
                                            <img src="<?php echo base_url("./public/images/logo-icon/zalo-icon.png"); ?>" alt="">
                                        </span>
                                        <span class="title">Zalo</span>
                                    </a>
                                <?php
                            }
                            if(!empty(getInfoSystem()['youtube_change'])) {
                                ?>
                                    <a href="<?php echo getInfoSystem()['youtube_change']; ?>" class="link-view-item d-flex justify-between align-items-center" target="_blank">
                                        <span class="thumbNail">
                                            <img src="<?php echo base_url("./public/images/logo-icon/youtube.png"); ?>" alt="">
                                        </span>
                                        <span class="title">Youtube</span>
                                    </a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="grid-column-12 grid-column-lg-6 p-0 p-lg-2">
                <div class="load-notification-status flex-column">
                    <div class="sending d-flex flex-column">
                        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        <span class="text">Đang gửi ...</span>
                    </div>
                    <div class="sended">
                        <span class="title-top">Gửi phản hồi thành công !</span>
                    </div>
                </div>
                <form action="" method="post" id="formSendSupport">
                    <div class="block-wrap">
                        <div class="block-desc">
                            <p>Điền đầy đủ thông tin để nhận được những ưu đãi mới nhất từ chúng tôi. Cảm ơn quý khách!</p>
                        </div>
                        <div class="block-form grid-row">
                            <div class="grid-column-6 p-1">
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Họ và tên" autocomplete="off" spellcheck="false">
                                <span class="fullname_er error"></span>
                            </div>
                            <div class="grid-column-6 p-1">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" spellcheck="false">
                                <span class="email_er error"></span>
                            </div>
                            <div class="grid-column-6 p-1">
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Số điện thoại" autocomplete="off" spellcheck="false">
                                <span class="phone_er error"></span>
                            </div>
                            <div class="grid-column-6 p-1">
                                <input type="address" name="address" id="address" class="form-control" placeholder="Địa chỉ" autocomplete="off" spellcheck="false">
                                <span class="address_er error"></span>
                            </div>
                            <div class="grid-column-12 p-1">
                                <select name="type_mess" id="type_mess" class="form-control">
                                    <option value=""> -- Bạn muốn tư vấn về ..? -- </option>
                                    <option value="product">Sản phẩm</option>
                                    <option value="service">Dịch vụ</option>
                                    <option value="feedback">Góp ý</option>
                                    <option value="other">Khác...</option>
                                </select>
                                <span class="type_er error"></span>
                            </div>
                            <div class="grid-column-12 p-1">
                                <textarea name="content" id="content" class="form-control" placeholder="Nội dung" spellcheck="false"></textarea>
                            </div>
                            <div class="grid-column-12 p-1">
                                <button type="submit" class="form-button">Gửi thông tin</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>