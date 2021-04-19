<div class="mobile-respon-wrap">
    <div class="menu-mobile-list">
        <ul class="list-menu">
            <li>
                <a href="" class="menu-item-respon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li>
                <a href="" class="menu-item-respon">
                    <span>Về Chúng Tôi</span>
                </a>
            </li>
            <li>
                <a href="" class="menu-item-respon has-menu-child d-flex justify-content-between align-items-center">
                    <span>Sản Phẩm</span>
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </a>
                <?php
                    if(!empty(loadListCate(1,0))) {
                        ?>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url('danh-muc-san-pham/tat-ca.html') ?>" class="sub-menu-item">
                                        <span>Tất cả</span>
                                    </a>
                                </li>
                                <?php
                                    foreach(loadListCate(1,0) as $cateItem) {
                                        $slug_title_cate_level_1 = create_slug($cateItem['title_cate']);
                                        $cateItem['url'] = base_url("danh-muc-san-pham/{$slug_title_cate_level_1}-{$cateItem['id_cate']}.html");
                                        ?>
                                            <li>
                                                <a href="<?php echo $cateItem['url']; ?>" class="sub-menu-item">
                                                    <span><?php echo $cateItem['title_cate'] ?></span>
                                                </a>
                                                <?php
                                                    if(!empty(loadListCate(2,$cateItem['id_cate']))) {
                                                        ?>
                                                            <ul class="cp-sub-menu">
                                                                <?php
                                                                    foreach(loadListCate(2,$cateItem['id_cate']) as $item) {
                                                                        $slug_title_cate_level_2 = create_slug($item['title_cate']);
                                                                        $item['url'] = base_url("danh-muc-san-pham/{$slug_title_cate_level_2}-{$item['id_cate']}.html");
                                                                        ?>
                                                                            <li>
                                                                                <a href="<?php echo $item['url'] ?>" class="cp-sub-menu-item">
                                                                                    <span><?php echo $item['title_cate']; ?></span>
                                                                                </a>
                                                                            </li>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </ul>
                                                        <?php 
                                                    }
                                                ?>
                                            </li>
                                        <?php 
                                    }
                                ?>
                            </ul>
                        <?php 
                    }
                ?>
            </li>
            <li>
                <a href="" class="menu-item-respon has-menu-child d-flex justify-content-between align-items-center">
                    <span>Tin Tức</span>
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </a>
                <?php
                    if(!empty(getListBlogCateHeader())) {
                        ?>
                            <ul class="sub-menu policy">
                                <li>
                                    <a href="<?php echo base_url("danh-muc-bai-viet/tat-ca.html") ?>" class="sub-menu-item">
                                        <span>Tất cả</span>
                                    </a>
                                </li>
                                <?php
                                    foreach(getListBlogCateHeader() as $blogCateItem) {
                                        $slug_title_blog = create_slug($blogCateItem['blogCate_title']);
                                        $blogCateItem['url'] = base_url("danh-muc-bai-viet/{$slug_title_blog}-{$blogCateItem['blogCate_id']}.html");
                                        ?>
                                            <li>
                                                <a href="<?php echo $blogCateItem['url'] ?>" class="sub-menu-item">
                                                    <span><?php echo $blogCateItem['blogCate_title'] ?></span>
                                                </a>
                                            </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        <?php 
                    }
                ?>
            </li>
            <li>
                <a href="" class="menu-item-respon">
                    <span>Hỗ Trợ Đại Lý</span>
                </a>
            </li>
            <li>
                <a href="" class="menu-item-respon has-menu-child d-flex justify-content-between align-items-center">
                    <span>Chính Sách</span>
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </a>
                <?php
                    if(!empty(getListPolicy())) {
                        ?>
                            <ul class="sub-menu policy">
                                <?php
                                    foreach(getListPolicy() as $policyItem) {
                                        ?>
                                            <li>
                                                <a href="<?php echo base_url("?mod=policy&id={$policyItem['policy_id']}") ?>" class="sub-menu-item">
                                                    <span><?php echo $policyItem['policy_title'] ?></span>
                                                </a>
                                            </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        <?php 
                    }
                ?>
            </li>
            <?php
                if(!empty(getInfoSystem()['fanpage_facebook'])) {
                    ?>
                        <li>
                            <a target="_blank" href="<?php echo getInfoSystem()['fanpage_facebook']; ?>" class="menu-item-respon __fb-contact">
                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                <span>fb/bepcapri</span>
                            </a>
                        </li>
                    <?php 
                }
                if(!empty(getInfoSystem()['zalo'])) {
                    ?>
                        <li>
                            <a target="_blank" href="https://zalo.me/<?php echo getInfoSystem()['zalo']; ?>" class="menu-item-respon __fb-contact d-flex align-items-center">
                                <span class="thumbNail d-inline mr-1">
                                    <img src="<?php echo base_url("public/images/logo-icon/zalo-min.png"); ?>" width="16">
                                </span>
                                <span>Zalo/<?php echo formatPhone(getInfoSystem()['zalo']); ?></span>
                            </a>
                        </li>
                    <?php 
                }
                if(!empty(getInfoSystem()['youtube_change'])) {
                    ?>
                        <li>
                            <a target="_blank" href="<?php echo getInfoSystem()['youtube_change']; ?>" class="menu-item-respon __yt-movie">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                <span>youtube/bepcapri</span>
                            </a>
                        </li>
                    <?php 
                }
            ?>
        </ul>
    </div>
</div>