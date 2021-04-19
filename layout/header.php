<header id="header" class="root header-wrap bg">
    <div class="header-top">
        <div class="header-custom-wrap">
            <div class="marquee-wrap">
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
                <div class="marquee-item">Mang tiện nghi, sung túc đến mọi gia đình</div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="grid-row justify-content-between align-items-center">
                <div class="logo">
                    <a href="<?php echo base_url() ?>" class="link-view thumbNail">
                        <img src="<?php echo base_url("public/images/logo-icon/logo-capri-mini.png") ?>" alt="" width="60" height="50" class="mini-logo">
                        <img src="<?php echo base_url("public/images/logo-icon/logo-capri.png") ?>" alt="" class="full-logo img-fluid">
                    </a>
                </div>
                <nav>
                    <div class="navigation">
                        <ul class="list-menu d-flex justify-content-center align-items-center">
                            <li class="active">
                                <a href="<?php echo base_url() ?>" class="menu-item icon-wrap">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("gioi-thieu.html") ?>" class="menu-item">
                                    <span>Giới thiệu</span>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a href="<?php echo base_url("danh-muc-san-pham/tat-ca.html"); ?>" class="menu-item">
                                    <span>Sản Phẩm <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                </a>
                                <?php if( !empty(getCate(1, 0)) ) : ?>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-wrap">
                                            <div class="dropdown-box-left box-item">
                                                <div class="list-item-menu">
                                                    <ul class="list-wrap">
                                                        <?php foreach( getCate(1, 0) as $cateItem ) : ?>
                                                            <?php
                                                                $slug_title_cate = create_slug($cateItem['title_cate']);
                                                                $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate}-{$cateItem['id_cate']}.html");
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo $cateItem['url']; ?>" class="item-dd-mn">
                                                                    <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                                                    <span><?php echo $cateItem['title_cate']; ?></span>
                                                                </a>
                                                                <?php if( !empty(getCate(2, $cateItem['id_cate'])) ) : ?>
                                                                    <div class="sub-menu-dd-sub">
                                                                        <div class="sub-drop-mn">
                                                                            <ul class="list-sub-wrap">
                                                                                <?php foreach( getCate(2, $cateItem['id_cate']) as $subCateItem ) : ?>
                                                                                    <?php
                                                                                        $slug_title_sub_cate = create_slug($subCateItem['title_cate']);
                                                                                        $subCateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_sub_cate}-{$subCateItem['id_cate']}.html");
                                                                                    ?>
                                                                                    <li>
                                                                                        <a href="<?php echo $subCateItem['url']; ?>" class="item-s-dd-mn">
                                                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                                                            <span><?php echo $subCateItem['title_cate']; ?></span>
                                                                                        </a>
                                                                                    </li>
                                                                                <?php endforeach; ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </li>
                            <li class="position-relative">
                                <a href="<?php echo base_url("danh-muc-bai-viet/tat-ca.html") ?>" class="menu-item">
                                    <span>Tin Tức <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                </a>
                                <?php if( !empty(getListBlogCateHeader()) ) : ?>
                                    <ul class="sub-menu">
                                        <?php foreach( getListBlogCateHeader() as $blogCateItem ) : ?>
                                            <?php
                                                $slug_string = create_slug($blogCateItem['blogCate_title']);
                                                $blogCateItem['url'] = base_url("danh-muc-bai-viet/{$slug_string}-{$blogCateItem['blogCate_id']}.html");
                                            ?>
                                            <li>
                                                <a href="<?php echo $blogCateItem['url'] ?>" class="submenu-item">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                    <span><?php echo $blogCateItem['blogCate_title'] ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <li class="position-relative">
                                <a href="javascript:void(0)" class="menu-item">
                                    <span>Chính Sách <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                </a>
                                <?php if( !empty(getListPolicy()) ) : ?>
                                    <ul class="sub-menu">
                                        <?php foreach( getListPolicy() as $policyItem ) : ?>
                                            <?php
                                                $slug_string = create_slug($policyItem['policy_title']);
                                                $policyItem['url'] = base_url("chinh-sach/{$slug_string}-{$policyItem['policy_id']}.html");
                                            ?>
                                            <li>
                                                <a href="<?php echo $policyItem['url'] ?>" class="submenu-item">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                    <span><?php echo $policyItem['policy_title'] ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo getCatalogue()['catalogue_link'] ?>" target="_blank" class="menu-item">
                                    <span>Catalogue <i class="fa fa-download" aria-hidden="true"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="act-user">
                    <ul class="list-act d-flex justify-content-center align-items-center">
                        <li>
                            <a href="" class="act-item link-view search">
                                <i class="icon fa fa-search" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="act-item link-view bars-menu" id="btnOpen-menu-respon">
                                <i class="fa fa-bars open" aria-hidden="true"></i>
                                <i class="fa fa-times close" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="form-search-wrap">
        <div class="form-mask"></div>
        <div class="form-inner position-relative">
            <form method="GET" class="form-search-main">
                <input type="text" name="strSearch" id="str-search" placeholder="Nhập tên, model sản phẩm để tìm kiếm..." spellcheck="false" autocomplete="off">
                <button type="submit" id="sm-s">
                    <span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <span class="text">Tìm Kiếm</span>
                </button>
            </form>
            <div class="search-recomment position-absolute" data-base-url="<?php echo base_url(); ?>"></div>
        </div>
    </div>
</header>