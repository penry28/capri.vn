<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/list-product.css">
    <link rel="stylesheet" href="./public/css/layout.css">

    <link rel="stylesheet" href="./public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/fonts/aizo-icon.css">

    <title>Admin | Danh sách bài viết</title>
</head>
<style>
    .name-blog {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 250px;
    }
</style>
<body>
    <div id="app" class="color_root size_root wrap_root">
        <div class="wrapper">
            <?php get_sidebar() ?>
            <div class="all-content-wp">
                <?php get_header(); ?>
                <div id="main-content-wrap">
                    <section class="breadcrumb-list">
                        <div class="container-fluid p-0">
                            <div class="root bg-style-global">
                                <div class="grid-row">
                                    <div class="grid-column-6">
                                        <div class="breadcrumb-left d-flex align-items-center">
                                            <div class="breadcrumb-icon">
                                                <i class="icon aizo-home"></i>
                                            </div>
                                            <div class="breadcrumb-ctn">
                                                <h4>Danh sách bài viết</h4>
                                                <p>Welcome to CAPRI</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-column-6"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section-top-act">
                        <div class="root">
                            <div class="container-fluid">
                                <div class="grid-row">
                                    <div class="grid-column-7">
                                        <a href="<?= base_url("?mod=blog&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm bài viết</span>
                                            </p>
                                        </a>
                                        <a href="<?= base_url("?mod=blogCate") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Danh mục bài viết</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section-top-act">
                        <div class="root">
                            <div class="container-fluid">
                                <div class="grid-row">
                                    <div class="grid-column-6">
                                        <div class="form-sction section-right">
                                            <div class="form-wrap">
                                                <form action="" data-status="<?= $status; ?>" data-page="<?= $page; ?>" method="GET" class="form-search-action">
                                                    <div class="grid-row">
                                                        <div class="grid-column-8 position-relative">
                                                            <input type="text" class="form-control" value="<?= !empty($q) ? $q : null; ?>" name="strSearch" id="strSearch" value="<?php if(!empty($q)) { echo $q; } else { echo null; } ?>" spellcheck="false" autocomplete="off" placeholder="Nhập tên bài viết bạn muốn tìm kiếm ...">
                                                            <div class="search-recomment" data-baseurl="<?= base_url(); ?>"></div>
                                                        </div>
                                                        <div class="grid-column-4 px-2">
                                                            <button type="submit" name="searchBtn">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                <span>Tìm kiếm</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-column-6">
                                        <div class="select-section section-right" data-status-current="<?= $status; ?>">
                                            <ul class="select-status d-flex justify-end">
                                                <li class="all">
                                                    <a href="<?= base_url("?mod=blog"); ?>" class="action-item">
                                                        <label class="label">Tất cả</label>
                                                        <span class="value"></span>
                                                    </a>
                                                </li>
                                                <li class="publish">
                                                    <a href="<?= base_url("?mod=blog&status=publish"); ?>" class="action-item">
                                                        <label class="label">Đã đăng</label>
                                                        <span class="value"></span>
                                                    </a>
                                                </li>
                                                <li class="pending">
                                                    <a href="<?= base_url("?mod=blog&status=pending"); ?>" class="action-item">
                                                        <label class="label">Chờ xét duyệt</label>
                                                        <span class="value"></span>
                                                    </a>
                                                </li>
                                                <li class="trash">
                                                    <a href="<?= base_url("?mod=blog&status=trash"); ?>" class="action-item">
                                                        <label class="label">Thùng rác</label>
                                                        <span class="value"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                        if(!empty($listBlog)) {
                            ?>
                                <section class="main-table">
                                    <div class="root">
                                        <div class="container-fluid p-0">
                                            <div class="grid-row">
                                                <div class="grid-column-12">
                                                    <table class="table-wrap">
                                                        <thead>
                                                            <tr>
                                                                <td>
                                                                    <span class="thead-title">STT</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Ảnh</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Tiêu đề</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Danh mục</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Lược thích</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Nổi bậc</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Chọn lọc</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Ngày tạo</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Trạng thái</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">C.N Trạng Thái</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Cập nhật</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Tác vụ</span>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $i=1;
                                                                foreach($listBlog as $blogItem) {
                                                                    ?>
                                                                        <tr data-id-blog="<?= $blogItem['blog_id'] ?>">
                                                                            <td>
                                                                                <span class="__value"><?= $i; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="thumbNail">
                                                                                    <img src="<?= $blogItem['blog_img'] ?>" alt="<?= $blogItem['blog_title'] ?>">
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?= base_url("?mod=blog&action=update&id={$blogItem['blog_id']}") ?>" class="view_vl __value name-blog"><?= $blogItem['blog_title']; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?= !empty(loadCateBlogById($blogItem['blog_parentCate_id'])) ? base_url("?mod=blogCate&action=update&id=".loadCateBlogById($blogItem['blog_parentCate_id'])['blogCate_id']."") : null; ?>" class="view_vl __value name-blog"><?= !empty(loadCateBlogById($blogItem['blog_parentCate_id'])) ? loadCateBlogById($blogItem['blog_parentCate_id'])['blogCate_title'] : null; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <span class=" __value"><?= $blogItem['num_love'] ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <div class=" __value"><?php if($blogItem['blog_highlight'] == 1) { echo "<span class='checked'></span>"; } else { echo null; } ?></div>
                                                                            </td>
                                                                            <td>
                                                                                <div class=" __value"><?php if($blogItem['typical_post'] == 1) { echo "<span class='checked'></span>"; } else { echo null; } ?></div>
                                                                            </td>
                                                                            <td>
                                                                                <span class="time_vl __value"><?= formatTime($blogItem['created_date']) ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value __status__" data-status='<?= $blogItem['status_current'] ?>'><?= formatStatus($blogItem['status_current']) ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                    if($blogItem['status_current'] == 'trash') {
                                                                                        ?>
                                                                                            <div class="operation-list-setting d-flex align-items-center">
                                                                                                <button type="button" class="button" class="pd-setting" title="Khôi phục trạng thái" data-status-old="<?= $blogItem['status_old']; ?>" data-action="restore">
                                                                                                    <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                            <div class="switch status">
                                                                                                <label for="status" class="btn-change-status" data-status="<?= $blogItem['status_current'] ?>" data-active="<?= $blogItem['status_current'] == 'publish' ? 'on' : 'off'; ?>">
                                                                                                    <span class="lever"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting d-flex align-items-center">
                                                                                    <a class="w-100 d-flex align-items-center" href="<?= base_url("?mod=blog&action=update&id={$blogItem['blog_id']}") ?>">
                                                                                        <button type="button" class="button" class="pd-setting" title="Edit" data-action='edit'>
                                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                        </button>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting">
                                                                                    <button type="button" class="button" class="pd-setting" title="<?= $blogItem['status_current'] != 'trash' ? 'Thùng rác' : 'Xóa vĩnh viễn'; ?>" data-action="<?= $blogItem['status_current'] == 'trash' ? 'delete' : 'trash'; ?>">
                                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                                    </button>
                                                                                    <span class="active-name"><?= $blogItem['status_current'] != "trash" ? "Rác" : "Xóa" ?></span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="pagination">
                                    <?php
                                        $status = !empty($status) ? "&status={$status}" : '';
                                        $q      = !empty($q) ? "&q=".preg_replace('([\s]+)', '+', escape_string($q))."" : '';
                                        $url    = "?mod=blog";
                                        get_pagination($totalPage, $page, "{$url}{$status}{$q}");
                                    ?>
                                </section>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url("public/js/jquery.min.js") ?>"></script>
    <script src="<?= base_url("public/js/aizo-js-theme.js"); ?>"></script>
    <script src="<?= base_url("public/js/aizo-popup.js"); ?>"></script>
    <script src="<?= base_url("public/js/blog.js"); ?>"></script>

</body>

</html>