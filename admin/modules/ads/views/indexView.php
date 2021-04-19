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

    <title>Admin | Danh sách quảng cáo</title>
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
                                                <h4>Danh sách quảng cáo</h4>
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
                                    <div class="grid-column-7">
                                        <a href="<?php echo base_url("?mod=ads&action=add") ?>" class="view-action-add">
                                            <p class="w-100 h-100 d-flex align-items-center">
                                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                                <span>Thêm quảng cáo</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                        if(!empty($listAds)) {
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
                                                                    <span class="thead-title">Sản phẩm</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">D.mục SP</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Blog</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">D.mục Blog</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Trạng thái</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Ngày tạo</span>
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
                                                                $i = 1;
                                                                foreach($listAds as $adsItem) {
                                                                    ?>
                                                                        <tr data-id-ads="<?php echo $adsItem['ads_id'] ?>">
                                                                            <td>
                                                                                <input type="checkbox" name="checkItem" id="checkItem-<?php echo $adsItem['ads_id'] ?>">
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php echo $i ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="thumbNail">
                                                                                    <img src="<?php echo base_url($adsItem['ads_img']); ?>" alt="<?php echo $adsItem['ads_title'] ?>">
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php echo base_url("?mod=ads&action=update&id={$adsItem['ads_id']}") ?>" class="view_vl __value"><?php echo $adsItem['ads_title'] ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php if($adsItem['ads_prod'] == '1') { echo 'Có'; } else { echo "Không"; } ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php if($adsItem['ads_prodCate'] == '1') { echo 'Có'; } else { echo "Không"; } ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php if($adsItem['ads_blog'] == '1') { echo 'Có'; } else { echo "Không"; } ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php if($adsItem['ads_blogCate'] == '1') { echo 'Có'; } else { echo "Không"; } ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value" data-status="<?php echo $adsItem['status_current'] ?>"><?php echo formatStatus($adsItem['status_current']); ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="time_vl __value"><?php echo formatTime($adsItem['create_date']); ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting d-flex align-items-center">
                                                                                    <a href="<?php echo base_url("?mod=ads&action=update&id={$adsItem['ads_id']}") ?>">
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
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/aizo-js-theme.js"></script>
    <script src="./public/js/aizo-popup.js"></script>
</body>

</html>