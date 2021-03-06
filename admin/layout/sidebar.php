<div class="left-sidebar-pro">
    <aside class="sidebar-wrap">
        <div class="sidebar-header">
            <div class="main-logo">
                <a href="<?php echo base_url(); ?>" class="top-link-sidebar">Capri admin</a>
                <style>.top-link-sidebar{color: #fff; text-align: center; font-size: 1.5rem; padding: 10px 0; font-weight: bold;}</style>
            </div>
        </div>
        <div class="info-profile" id="main-profile-top" data-id-user="<?php echo getInfoUser("user_id") ?>">
            <div class="profile-admin">
                <a class="link-avt-index">
                    <span class="thumbNail">
                        <img src="https://i.pinimg.com/280x280_RS/79/f0/02/79f00234fe8fbed15b6d2d3a06210b75.jpg" alt="">
                    </span>
                    <span class="avatar-wp fa fa-camera" data-type-avt="update"></span>
                </a>
                <h4 class="name-admin"><?php echo getInfoUser("fullname") ?></h4>
            </div>
            <div class="profile-social">
                <ul class="dtl-social">
                    <li>
                        <a href="<?php echo getInfoUser("facebook") ?>" target="_blank" class="dtl-social-item">
                            <i class="icon aizo-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="mailTo:<?php echo getInfoUser("email") ?>" target="_blank" class="dtl-social-item">
                            <i class="icon aizo-mail"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dtl-social-item" target="_blank">
                            <i class="icon aizo-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="left-customer-menu-wrap">
            <div class="customScrollBox-menu">
                <div class="mCS_container">
                    <nav class="navbar-menu-pro">
                        <ul class="dtl-menu">
                            <li>
                                <a href="?" class="l-menu-it has-arrow">
                                    <i class="icon aizo-home icon-wrap"></i>
                                    <span class="l-mn-txt">Trang ch???</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="?mod=catalogue" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Catalogue</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=aboutUs") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">V??? ch??ng t??i</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=aboutUs&action=indexShowroom") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Showroom</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=policy") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Ch??nh s??ch</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=bloghighlight") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">B??i vi???t n???i b???c</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?" class="l-menu-it has-arrow">
                                    <i class="icon aizo-table icon-wrap"></i>
                                    <span class="l-mn-txt">H??? tr??? kh??ch h??ng</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="<?php echo base_url("?mod=support") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh s??ch tin nh???n</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="l-menu-it has-arrow">
                                    <i class="icon aizo-table icon-wrap"></i>
                                    <span class="l-mn-txt">S???n Ph???m</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="<?php echo base_url("?mod=prod&action=add") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Th??m s???n S.P</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=prod") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh s??ch S.P</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=prod&action=support") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Th??ng tin h??? tr???</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="l-menu-it has-arrow">
                                    <i class="icon aizo-table icon-wrap"></i>
                                    <span class="l-mn-txt">Danh m???c S.P</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="<?php echo base_url("?mod=cate&controller=cateLevel_1&action=list") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh m???c c???p 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=cate&controller=cateLevel_2&action=list") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh m???c c???p 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="l-menu-it has-arrow">
                                    <i class="icon aizo-table icon-wrap"></i>
                                    <span class="l-mn-txt">B??i vi???t</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="<?php echo base_url("?mod=blog&action=add") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Th??m b??i vi???t</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=blog") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh s??ch b??i vi???t</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=blog&action=manager") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Qu???n l?? b??i vi???t</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=blogCate") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh m???c b??i vi???t</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="l-menu-it has-arrow">
                                    <i class="icon aizo-table icon-wrap"></i>
                                    <span class="l-mn-txt">Slider</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="<?php echo base_url("?mod=slider&action=add") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Th??m slide</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=slider") ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh s??ch slider</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="l-menu-it has-arrow">
                                    <i class="icon aizo-table icon-wrap"></i>
                                    <span class="l-mn-txt mini-click-non">Qu???ng c??o</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="<?php echo base_url("?mod=ads&action=add"); ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">T???o qu???ng c??o</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=ads"); ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Danh s??ch qu???ng c??o</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="l-menu-it has-arrow">
                                    <i class="icon aizo-table icon-wrap"></i>
                                    <span class="l-mn-txt mini-click-non">Th??ng tin chung</span>
                                </a>
                                <ul class="dtl-submenu-angle collapse">
                                    <li>
                                        <a href="<?php echo base_url("?mod=system"); ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Th??ng tin trang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=system&action=socail"); ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">Th??ng tin li??n h???</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("?mod=system&action=mailConfig"); ?>" class="l-submenu-it">
                                            <span class="minu-subMN-pro">C???u h??nh email</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </aside>
</div>
