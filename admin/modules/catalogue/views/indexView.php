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

    <title>Admin | Danh sách cataloue</title>
</head>

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
                                                <h4>Danh sách catalogue</h4>
                                                <p>Welcome to CAPRI</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-column-6">
                                        <div class="breadcrumb-right">
                                            <ul class="list-info-more d-flex align-items-center">
                                                <li class="time-curr d-flex align-items-center">
                                                    <span class="icon aizo-alarm-clock mr-1"></span>
                                                    <span>11:32:59</span>
                                                </li>
                                                <li class="px-3">
                                                    <span>-</span>
                                                </li>
                                                <li class="date-curr">
                                                    <span>03/10/2020</span>
                                                </li>
                                                <li class="px-3">
                                                    <span>-</span>
                                                </li>
                                                <li class="online-curr d-flex align-items-cente">
                                                    <span class="icon aizo-user mr-1"></span>
                                                    <span class="online-notifi">100 online</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section-top-act">
                        <div class="root">
                            <div class="container-fluid">
                                <div class="grid-row">
                                    <div class="grid-column-4">
                                        <a href="<?php echo base_url("?mod=catalogue&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm catalogue</span>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="grid-column-4">
                                        <a href="javascript:void(0)" class="view-action-add choose-catalogue">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Chọn catalogue hiển thị</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                        if(!empty($listCatalogue)) {
                            ?>
                                <section class="section-top-act">
                                    <div class="root">
                                        <div class="container-fluid">
                                            <div class="grid-row">
                                                <div class="grid-column-5">
                                                    <div class="form-section section-left">
                                                        <div class="form-wrap">
                                                            <form action="" method="POST" class="form-select-action">
                                                                <select name="actions-wrap" class="form-control">
                                                                    <option value="">Tác vụ</option>
                                                                    <option value="">Hoạt Động</option>
                                                                    <option value="">Chờ xét duyệt</option>
                                                                    <option value="">Xóa vĩnh viễn</option>
                                                                    <option value="">Bỏ vào thùng rác</option>
                                                                </select>
                                                                <button type="submit" class="btn-action-work">Áp dụng</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-column-7">
                                                    <div class="select-section section-right">
                                                        <ul class="select-status d-flex justify-end">
                                                            <li class="all">
                                                                <a href="" class="active action-item">
                                                                    <label class="label">Tất cả</label>
                                                                    <span class="value">100</span>
                                                                </a>
                                                            </li>
                                                            <li class="publish">
                                                                <a href="" class="action-item">
                                                                    <label class="label">Đã đăng</label>
                                                                    <span class="value">100</span>
                                                                </a>
                                                            </li>
                                                            <li class="pending">
                                                                <a href="" class="action-item">
                                                                    <label class="label">Chờ xét duyệt</label>
                                                                    <span class="value">100</span>
                                                                </a>
                                                            </li>
                                                            <li class="trash">
                                                                <a href="" class="action-item">
                                                                    <label class="label">Thùng rác</label>
                                                                    <span class="value">100</span>
                                                                </a>
                                                            </li>
                                                        </ul>
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
                                                                    <input type="checkbox" name="checkAll" id="checkAll">
                                                                </td>
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
                                                                    <span class="thead-title">link download</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Năm ra catalogue</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Trạng thái</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Ngày tạo</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Ngày update</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Tác vụ</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Chi tiết</span>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $i=1;
                                                                foreach($listCatalogue as $catalogueItem) {
                                                                    ?>
                                                                        <tr data-id-catalogue="<?php echo $catalogueItem['catalogue_id'] ?>">
                                                                            <td>
                                                                                <input type="checkbox" name="checkItem" id="checkItem-<?php echo $catalogueItem['catalogue_id'] ?>">
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php echo $i; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="thumbNail">
                                                                                    <img src="<?php echo base_url($catalogueItem['catalogue_banner']); ?>" alt="<?php echo $catalogueItem['catalogue_title'] ?>">
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php echo base_url("?mod=catalogue&action=update&id={$catalogueItem['catalogue_id']}") ?>" class="view_vl __value"><?php echo $catalogueItem['catalogue_title'] ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <a target="_blank" href="<?php echo $catalogueItem['catalogue_link'] ?>" class="view_vl __value"><?php echo $catalogueItem['catalogue_link'] ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <span class=" __value"><?php echo $catalogueItem['catalogue_year'] ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php if($catalogueItem['publish_status'] == '1') { echo "Hoạt động"; } else { echo null; } ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="time_vl __value"><?php echo formatTime($catalogueItem['created_date']); ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="time_vl __value"><?php echo formatTime($catalogueItem['update_date']); ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting d-flex align-items-center">
                                                                                    <a href="<?php echo base_url("?mod=catalogue&action=update&id={$catalogueItem['catalogue_id']}") ?>">
                                                                                        <button type="button" class="button" class="pd-setting" title="Edit" data-action='edit'>
                                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                                        </button>
                                                                                    </a>
                                                                                    <button type="button" class="button" class="pd-setting" title="Trash" data-action="trash">
                                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="switch status">
                                                                                    <label for="status" data-modules="product_cat" class="btn-change-status" data-active="on">
                                                                                        <span class="lever"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting">
                                                                                    <button type="button" class="button" class="pd-view" title="info" data-action="view">
                                                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                }
                                                                $i++;
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php 
                        }
                    ?>
                </div>
                <div class="space-popup-wrap">
                    <div class="modal" id="choose-catalogue">
                        <div class="modal-mask" data-close-modal-choose-catalogue></div>
                        <div class="modal-content">
                            <form method="post" class="form-save-catalogue-publish">
                                <div class="modal-header">
                                    <h3 class="d-flex justify-center align-items-center">
                                        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
                                        <span>Chọn catalogue hiển thị</span>
                                    </h3>
                                </div>
                                <div class="modal-body">
                                    <?php
                                        if(!empty($listCatalogue)) {
                                            ?>
                                                <div class="list-catalogue-choose">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td>STT</td>
                                                                <td>Ảnh</td>
                                                                <td>Tiêu đề</td>
                                                                <td>Link download</td>
                                                                <td>Năm khởi tạo</td>
                                                                <td>Chọn catalogue</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $i=1;
                                                                foreach($listCatalogue as $catalogueItem) {
                                                                    ?> 
                                                                        <tr>
                                                                            <td>
                                                                                <span><?php echo $i; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="thumbNail">
                                                                                    <img src="<?php echo $catalogueItem['catalogue_banner']; ?>" alt="<?php  echo $catalogueItem['catalogue_title'] ?>">
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php echo base_url("?mod=catalogue&action=update&id={$catalogueItem['catalogue_id']}") ?>"><?php echo $catalogueItem['catalogue_title']; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <a target="_blank" href="<?php echo $catalogueItem['catalogue_link'] ?>">Download</a>
                                                                            </td>
                                                                            <td>
                                                                                <span><?php echo $catalogueItem['catalogue_year'] ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex justify-center align-items-center btn-choose">
                                                                                    <input type="radio" name="cataloguePublish[]" class="cataloguePublish-check" id="catalogue-<?php echo $catalogueItem['catalogue_id'] ?>" value="<?php echo $catalogueItem['catalogue_id'] ?>">
                                                                                    <label for="catalogue-<?php echo $catalogueItem['catalogue_id'] ?>">Chọn</label>
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
                                                                <td>Link download</td>
                                                                <td>Năm khởi tạo</td>
                                                                <td>Chọn catalogue</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            <?php 
                                        }
                                    ?>
                                </div>
                                <div class="modal-foot">
                                    <div class="btn-wrap">
                                        <button type="button" class="btn btn-close" data-close-modal-choose-catalogue>Đóng cửa sổ</button>
                                        <button type="submit" name="save_catalogue_publish" class="btn btn-save">Lưu thông tin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/aizo-js-theme.js"></script>
    <script src="./public/js/aizo-popup.js"></script>
    <script src="./public/js/catalogue.js"></script>
</body>
<style>
    .modal {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: -1;
        opacity: 0;
        visibility: hidden;
    }

    .modal.open {
        z-index: 10000;
        opacity: 1;
        visibility: visible;
    }

    .modal .modal-mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    .modal .modal-content {
        width: 60%;
        height: auto;
        background-color: #fff;
        position: relative;
        z-index: 2;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    .modal .modal-content .modal-header h3 {
        font-size: 1.5rem;
        padding: 10px 0;
        text-align: center;
        color: #fff;
        background-color: var(--secound-color);
    }

    .modal .modal-content .modal-body {
        padding: 10px 10px;
        height: 400px;
        overflow: auto;
    }
    .modal .modal-content .modal-body table {
        width: 100%;
    }
    .modal .modal-content .modal-body table tr td {
        padding: 10px 15px;
        border: 1px solid rgba(0,0,0,0.3);
        vertical-align: middle;
        text-align: center;
    }

    .btn-choose label {
        cursor: pointer;
        background-color: var(--main-color);
        color: var(--primary-color);
        padding: 2px 7px;
        border-radius: 7px;
        margin-left: 9px;
    }

    .modal .modal-content .modal-body table tr td .thumbNail {
        display: block;
        width: 90px;
        height: auto;
    }

    .modal .modal-content .modal-body table tr td .thumbNail img {
        object-fit: contain;
        width: 100%;
        height: 100%;
    }

    .modal .modal-content .modal-body table tr:nth-child(2n) {
        background-color: #eeeeee;
    }

    .modal .modal-content .modal-foot {
        padding: 10px 0;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        background-color: var(--secound-color);
    }

    .modal .modal-content .modal-foot button.btn {
        margin-right: 15px;
        padding: 5px 10px;
        cursor: pointer;
        background-color: #fff;
        border: 1px solid #fff;
        font-size: 1rem;
        color: var(--secound-color);
    }
</style>
</html>