<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/list-product.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/fonts/aizo-icon.css") ?>">
    <title>Admin | Danh sách sản phẩm</title>
</head>

<body>
    <div id="app" class="color_root size_root wrap_root" data-app-name="list">
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
                                                <h4>Danh sách sản phẩm</h4>
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
                                    <div class="grid-column-3">
                                        <a href="<?= base_url("?mod=prod&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm sản phẩm</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?= base_url("?mod=cate&controller=cateLevel_1&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm danh mục cấp 1</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-3">
                                        <a href="<?= base_url("?mod=cate&controller=cateLevel_2&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm danh mục cấp 2</span>
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
                                    <div class="grid-column-5"></div>
                                    <div class="grid-column-7">
                                        <div class="select-section section-right" data-status-current="<?php echo $status; ?>">
                                            <ul class="select-status d-flex justify-end">
                                                <li class="all">
                                                    <a href="<?= base_url("?mod=prod"); ?>" class="action-item">
                                                        <label class="label">Tất cả</label>
                                                        <span class="value">0</span>
                                                    </a>
                                                </li>
                                                <li class="publish">
                                                    <a href="<?= base_url("?mod=prod&status=publish"); ?>" class="action-item">
                                                        <label class="label">Đã đăng</label>
                                                        <span class="value">0</span>
                                                    </a>
                                                </li>
                                                <li class="pending">
                                                    <a href="<?= base_url("?mod=prod&status=pending"); ?>" class="action-item">
                                                        <label class="label">Chờ xét duyệt</label>
                                                        <span class="value">0</span>
                                                    </a>
                                                </li>
                                                <li class="trash">
                                                    <a href="<?= base_url("?mod=prod&status=trash"); ?>" class="action-item">
                                                        <label class="label">Thùng rác</label>
                                                        <span class="value">0</span>
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
                        if(!empty($listProd)) {
                            ?>
                                <section class="section-top-act">
                                    <div class="root">
                                        <div class="container-fluid">
                                            <div class="grid-row justify-content-end">
                                                <div class="grid-column-3 px-3">
                                                    <a href="" class="view-action-add h-100" data-modal-button="#modal-choose-prod-typical" style="display: flex; justify-content: center; align-items: center;">Chỉ định sản phẩm bán chạy</a>
                                                </div>
                                                <div class="grid-column-9">
                                                    <div class="form-sction section-right">
                                                        <div class="form-wrap">
                                                            <form action="" data-status="<?= $status; ?>" data-page="<?= $page; ?>" method="GET" class="form-search-action" name="form-search-action">
                                                                <div class="grid-row">
                                                                    <div class="grid-column-8 position-relative">
                                                                        <input type="text" class="form-control" name="strSearch" id="strSearch" value="<?= !empty($q) ? $q : null; ?>" spellcheck="false" autocomplete="off" placeholder="Nhập tên sản phẩm, mã model sản phẩm, tên danh mục để tìm kiếm...">
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
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
                                                                    <span class="thead-title">Model</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Số lượng</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">D.mục cấp 1</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">D.mục cấp 2</span>
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
                                                                $i = 1;
                                                                foreach($listProd as $prodItem) {
                                                                    $prodUrlUpdate = base_url("?mod=prod&action=update&id={$prodItem['id_product']}");
                                                                    ?>
                                                                        <tr data-id-prod="<?= $prodItem['id_product'] ?>">
                                                                            <td>
                                                                                <span class="__value"><?= $i ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="thumbNail">
                                                                                    <img src="<?= base_url("{$prodItem['avatar']}") ?>" alt="<?php $prodItem['title_product'] ?>">
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?= $prodUrlUpdate; ?>" class="view_vl __value"><?= $prodItem['title_product'] ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?= $prodItem['module_product'] ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?= $prodItem['amount'] ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php if(!empty(cateItemById($prodItem['cate_level_1_id'])['id_cate'])) { echo base_url("?mod=cate&controller=cateLevel_1&action=update&id=".cateItemById($prodItem['cate_level_1_id'])['id_cate'].""); } ?>" class="view_vl __value"><?php if(!empty(cateItemById($prodItem['cate_level_1_id'])['title_cate'])) { echo cateItemById($prodItem['cate_level_1_id'])['title_cate']; }; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php if(!empty(cateItemById($prodItem['cate_level_2_id'])['id_cate'])) { echo base_url("?mod=cate&controller=cateLevel_2&action=update&id=".cateItemById($prodItem['cate_level_2_id'])['id_cate'].""); } ?>" class="view_vl __value"><?php if(!empty(cateItemById($prodItem['cate_level_2_id'])['title_cate'])) { echo cateItemById($prodItem['cate_level_2_id'])['title_cate']; }; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?= formatTime($prodItem['create_date']) ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value __status__" data-status="<?= $prodItem['status_current']; ?>"><?= formatStatus($prodItem['status_current']) ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                    if($prodItem['status_current'] == 'trash') {
                                                                                        ?>
                                                                                            <div class="operation-list-setting d-flex align-items-center">
                                                                                                <button type="button" class="button" class="pd-setting" title="Khôi phục trạng thái" data-status-old="<?= $prodItem['status_old']; ?>" data-action="restore">
                                                                                                    <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        <?php 
                                                                                    } else {
                                                                                        ?>
                                                                                            <div class="switch status">
                                                                                                <label for="status" class="btn-change-status" data-status="<?= $prodItem['status_current'] ?>" data-active="<?= $prodItem['status_current'] == 'publish' ? 'on' : 'off'; ?>">
                                                                                                    <span class="lever"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting d-flex align-items-center">
                                                                                    <a href="<?= base_url("?mod=prod&action=update&id={$prodItem['id_product']}") ?>">
                                                                                        <button type="button" class="button" class="pd-setting" title="Edit" data-action='edit'>
                                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                        </button>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting">
                                                                                    <button type="button" class="button" class="pd-setting" title="<?= $prodItem['status_current'] != 'trash' ? 'Thùng rác' : 'Xóa vĩnh viễn'; ?>" data-action="<?= $prodItem['status_current'] == 'trash' ? 'delete' : 'trash'; ?>">
                                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                                    </button>
                                                                                    <span class="active-name"><?= $prodItem['status_current'] != "trash" ? "Rác" : "Xóa" ?></span>
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
                                        $url    = "?mod=prod";
                                        get_pagination($totalPage, $page, "{$url}{$status}{$q}");
                                    ?>
                                </section>
                            <?php 
                        }
                    ?>
                    <?php
                        if(!empty($listTotalProd)) {
                            ?>
                                <div class="space-popup-wrap">
                                    <div class="modal" id="modal-choose-prod-typical">
                                        <div class="modal-mask" data-close-modal="#modal-choose-prod-typical"></div>
                                        <div class="modal-content">
                                            <form method="post" class="form-save-products-typical" name="form_save-products-typical">
                                                <div class="modal-header">
                                                    <h3 class="d-flex justify-center align-items-center">
                                                        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
                                                        <span>Chọn sản phẩm bán chạy</span>
                                                    </h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="list-catalogue-choose">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <td>STT</td>
                                                                    <td>Ảnh</td>
                                                                    <td>Tiêu đề</td>
                                                                    <td>Tiêu biểu</td>
                                                                    <td>Trạng thái</td>
                                                                    <td>Ngày tạo</td>
                                                                    <td>Chọn sản phẩm</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $i = 1;
                                                                    foreach($listTotalProd as $prodItem) {
                                                                        ?>
                                                                            <tr data-id-prod="<?= $prodItem['id_product']; ?>">
                                                                                <td>
                                                                                    <span><?= $i; ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="thumbNail">
                                                                                        <img src="<?= base_url($prodItem['avatar']); ?>" alt="">
                                                                                    </span>
                                                                                </td>
                                                                                <td>
                                                                                    <a href=""><?= $prodItem['title_product']; ?></a>
                                                                                </td>
                                                                                <td>
                                                                                    <span><?php if($prodItem['product_typical'] == '1') { echo "Có"; } else { echo "Không"; } ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <span><?= formatStatus($prodItem['status_current']); ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <span><?= formatTime($prodItem['create_date']); ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex justify-center align-items-center btn-choose">
                                                                                        <input type="checkbox" <?php if($prodItem['product_typical'] == '1') { echo  "checked"; } else { echo null; } ?> name="prodTypical[]" class="prodTypical-check" id="catalogue-<?= $prodItem['id_product'] ?>" value="<?= $prodItem['id_product'] ?>">
                                                                                        <label for="catalogue-<?= $prodItem['id_product'] ?>">Chọn</label>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php 
                                                                        $i++;
                                                                    }
                                                                ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>STT</td>
                                                                    <td>Ảnh</td>
                                                                    <td>Tiêu đề</td>
                                                                    <td>Tiêu biểu</td>
                                                                    <td>Trạng thái</td>
                                                                    <td>Ngày tạo</td>
                                                                    <td>Chọn sản phẩm</td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-foot">
                                                    <div class="btn-wrap">
                                                        <button type="button" class="btn btn-close"  data-close-modal="#modal-choose-prod-typical">Đóng cửa sổ</button>
                                                        <button type="submit" name="save_prod_typical" class="btn btn-save">Lưu thông tin</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url("public/js/jquery.min.js") ?>"></script>
    <script src="<?= base_url("public/js/aizo-js-theme.js") ?>"></script>
    <script src="<?= base_url("public/js/aizo-popup.js") ?>"></script>
    <script src="<?= base_url("public/js/product.js") ?>"></script>
</body>
<style class="popup">.modal{position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(0,0,0,.5);display:flex;justify-content:center;align-items:center;z-index:-1;opacity:0;visibility:hidden}.modal.open{z-index:10000;opacity:1;visibility:visible}.modal .modal-mask{position:absolute;top:0;left:0;width:100%;height:100%;z-index:1}.modal .modal-content{width:80%;transform:translateX(120px);height:auto;background-color:#fff;position:relative;z-index:2;box-shadow:0 0 10px rgba(0,0,0,.5)}.modal .modal-content .modal-header h3{font-size:1.5rem;padding:10px 0;text-align:center;color:#fff;background-color:var(--secound-color)}.modal .modal-content .modal-body{padding:10px 10px;height:400px;overflow:auto}.modal .modal-content .modal-body table{width:100%}.modal .modal-content .modal-body table tr td{padding:10px 15px;border:1px solid rgba(0,0,0,.3);vertical-align:middle;text-align:center}.btn-choose label{cursor:pointer;background-color:var(--main-color);color:var(--primary-color);padding:2px 7px;border-radius:7px;margin-left:9px}.modal .modal-content .modal-body table tr td .thumbNail{display:block;width:90px;height:auto}.modal .modal-content .modal-body table tr td .thumbNail img{object-fit:contain;width:100%;height:100%}.modal .modal-content .modal-body table tr:nth-child(2n){background-color:#eee}.modal .modal-content .modal-foot{padding:10px 0;display:flex;justify-content:flex-end;align-items:center;background-color:var(--secound-color)}.modal .modal-content .modal-foot button.btn{margin-right:15px;padding:5px 10px;cursor:pointer;background-color:#fff;border:1px solid #fff;font-size:1rem;color:var(--secound-color)}</style>
<script>
    $(function() {
    let btnOpenModal = $("[data-modal-button='#modal-choose-prod-typical']");
    let btnCloseModal = $("[data-close-modal]");
    let modalEl = $("#choose-catalogue");
    btnOpenModal.click(function() {
        event.preventDefault();
        let modalName = $(this).attr('data-modal-button');
        $(modalName).addClass('open');
    });
    btnCloseModal.click(function() {
        event.preventDefault();
        let modalName = $(this).attr('data-close-modal');
        $(modalName).removeClass('open');
    });
});
</script>
</html>