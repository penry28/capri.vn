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

    <title>Admin | Danh sách khách hàng cần hỗ trợ</title>
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
                                                <h4>Danh sách khách hàng cần hỗ trợ</h4>
                                                <p>Welcome to CAPRI</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-column-6"></div>
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
                                        <div class="form-sction section-right">
                                            <div class="form-wrap">
                                                <form action="" data-status="<?= $status; ?>" data-page="<?= $page; ?>" method="GET" class="form-search-action" name="form-search-action">
                                                    <div class="grid-row">
                                                        <div class="grid-column-8 position-relative">
                                                            <input type="text" class="form-control" name="strSearch" id="strSearch" value="<?= !empty($q) ? $q : null; ?>" spellcheck="false" autocomplete="off" placeholder="Nhập số điện thoại bạn muốn tìm kiếm ...">
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
                                    <div class="grid-column-5">
                                        <div class="select-section section-right" data-status-current="<?php echo $status; ?>">
                                            <ul class="select-status d-flex justify-end">
                                                <li class="all">
                                                    <a href="<?= base_url("?mod=support") ?>" class="action-item">
                                                        <label class="label">Tất cả</label>
                                                        <span class="value"></span>
                                                    </a>
                                                </li>
                                                <li class="news">
                                                    <a href="<?= base_url("?mod=support&status=news") ?>" class="action-item">
                                                        <label class="label">Chưa xem</label>
                                                        <span class="value"></span>
                                                    </a>
                                                </li>
                                                <li class="seen">
                                                    <a href="<?= base_url("?mod=support&status=seen") ?>" class="action-item">
                                                        <label class="label">Đã xem</label>
                                                        <span class="value"></span>
                                                    </a>
                                                </li>
                                                <li class="trash">
                                                    <a href="<?= base_url("?mod=support&status=trash") ?>" class="action-item">
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
                        if(!empty($listMessageSupport)) {
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
                                                                    <span class="thead-title">Tên khách hàng</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">email</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">SĐT</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Ngày gửi</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Ngày trả lời</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Loại</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">Trạng thái</span>
                                                                </td>
                                                                <td>
                                                                    <span class="thead-title">C.N Trạng thái</span>
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
                                                                foreach($listMessageSupport as $messSpItem) {
                                                                    ?>
                                                                        <tr data-id-support="<?php echo $messSpItem['support_id']; ?>">
                                                                            <td>
                                                                                <span class="__value"><?php echo $i; ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php echo base_url("?mod=support&action=info&id={$messSpItem['support_id']}"); ?>" class="view_vl __value"><?php echo $messSpItem['fullname']; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="mailTo:<?php echo $messSpItem['email']; ?>" target="_blank" class="view_vl __value"><?php echo $messSpItem['email']; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="tel:<?php echo $messSpItem['phone']; ?>" target="_blank" class="view_vl __value"><?php echo $messSpItem['phone']; ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php echo formatTime($messSpItem['sent_date']) ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value"><?php echo formatTime($messSpItem['reply_date']) ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="time_vl __value"><?php echo formatTypeSupport($messSpItem['type']); ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <span class="__value __status__" data-status="<?php echo $messSpItem['status']; ?>"><?php echo formatStatusSupport($messSpItem['status']); ?></span>
                                                                            </td>
                                                                            <td style="padding: 40px 5px;">
                                                                                <?php
                                                                                    if($messSpItem['status'] == 'trash') {
                                                                                        ?>
                                                                                            <div class="operation-list-setting d-flex align-items-center">
                                                                                                <button type="button" class="button" class="pd-setting" title="Khôi phục trạng thái" data-status-old="<?= $messSpItem['status_old']; ?>" data-action="restore">
                                                                                                    <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        <?php 
                                                                                    } else {
                                                                                        ?>
                                                                                            <div class="switch status">
                                                                                                <label for="status" class="btn-change-status" data-status="<?= $messSpItem['status'] ?>" data-active="<?= $messSpItem['status'] == 'seen' ? 'on' : 'off'; ?>">
                                                                                                    <span class="lever"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting">
                                                                                    <button type="button" class="button" class="pd-setting" title="<?= $messSpItem['status'] != 'trash' ? 'Thùng rác' : 'Xóa vĩnh viễn'; ?>" data-action="<?= $messSpItem['status'] == 'trash' ? 'delete' : 'trash'; ?>">
                                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                                    </button>
                                                                                    <span class="active-name"><?= $messSpItem['status'] != "trash" ? "Rác" : "Xóa" ?></span>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="operation-list-setting">
                                                                                    <a href="<?php echo base_url("?mod=support&action=info&id={$messSpItem['support_id']}"); ?>">
                                                                                        <button type="button" class="button" class="pd-view" title="info" data-action="view">
                                                                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                                        </button>
                                                                                    </a>
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
                                        $url    = "?mod=support";
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
    <script src="<?= base_url("public/js/aizo-js-theme.js") ?>"></script>
    <script src="<?= base_url("public/js/aizo-popup.js") ?>"></script>
    <script src="<?= base_url("public/js/supportcustomer.js") ?>"></script>
</body>

</html>