<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("public/css/reset.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/global.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/base.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/css/layout.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/fonts/aizo-icon.css"); ?>">
    <title>ADMIN | Trang chủ</title>
</head>

<body>
    <div id="app" class="color_root size_root wrap_root">
        <div class="wrapper">
            <?php get_sidebar(); ?>
            <div class="all-content-wp">
                <?php get_header() ?>
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
                                            <h4>Trang chủ</h4>
                                            <p>Welcome to CAPRI</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-6"></div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="list-statistics">
                    <div class="container-fluid p-0">
                        <div class="root">
                            <div class="grid-row">
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tổng tin nhắn</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=support"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalMessageSupportAll; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 78%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tin nhắn mới</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=support&status=news"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalMessageSupportNew; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 78%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tổng D.M sản phẩm</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=cate&controller=cateLevel_1&action=list"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalProdCate; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 78%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tổng sản phẩm</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=prod"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalProd; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 78%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tổng danh mục bài viết</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=blogCate"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalCateBlog; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 78%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tổng bài viết</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=blog"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalBlog; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 78%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tổng quảng cáo</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=ads"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalAds; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 100%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <h4 class="name-sta__">Tổng slide home</h4>
                                        <div class="vertical-center-box d-flex justify-between">
                                            <div class="vertical-box-left">
                                                <a href="<?= base_url("?mod=slider"); ?>" class="label bg-blue">
                                                    <span>Xem chi tiết</span>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="ertical-box-right">
                                                <h4 class="data"><?= $totalSlideHome; ?></h4>
                                            </div>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 100%;" class="progress-bar bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("?mod=cate&controller=cateLevel_1&action=add"); ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm D.M Cấp 1</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("?mod=cate&controller=cateLevel_2&action=add"); ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm D.M Cấp 2</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("?mod=prod&action=add") ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm sản phẩm</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("?mod=blogCate&action=add") ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm D.M bài viết</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("?mod=blog&action=add") ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm bài viết</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("") ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm slider</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("?mod=slider&action=add") ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm quảng cáo</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column-3 statistics-item">
                                    <div class="statistics-item-wrap bg-style-global">
                                        <div class="vertical-box-left">
                                            <a href="<?= base_url("?mod=bloghighlight"); ?>" class="label bg-blue" style="padding: 10px 10px; width: 100%; display: block; font-size: 1.1rem;">
                                                <span>Thêm bài viết nổi bậc</span>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="analysis-box-wrap analysis-1">
                    <div class="container-fluid">
                        <div class="root">
                            <div class="grid-row">
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="space-popup-wrap">
            <div id="popup-message" class="popup-modal">
                <div class="modal-mask" data-close-modal="#popup-message"></div>
                <div class="modal-dialog">
                    <span class="close-modal" data-close-modal="#popup-message">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                    <div class="modal-content">
                        <div class="modal-head">
                            <h4 class="title d-flex justify-center align-items-center">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                <span>Bình Luận Khách Hàng</span>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="customer-wrap d-flex">
                                <div class="space-customer-comment d-flex">
                                    <div class="img-customer">
                                        <a href="" class="view-customer thumbNail">
                                            <img src="./public/images/customer/bui-vu-luan.jpg" alt="Khách hàng Lê Vũ Hoàn Vy">
                                        </a>
                                    </div>
                                    <div class="info-customer">
                                        <a href="" class="name-customer">Bùi Vũ Luân</a>
                                        <p class="time-sended">18:58</p>
                                        <a href="" class="type-message">TMS: sản phẩm (#AZ12345)</a>
                                        <a href="" class="view-profile">Xem profile</a>
                                    </div>
                                </div>
                                <div class="space-customer-analytics">
                                    <div class="list-info">
                                        <ul>
                                            <li>
                                                <span class="key">Status mess</span>
                                                <span class="value">Đang xem</span>
                                            </li>
                                            <li>
                                                <span class="key">bad words</span>
                                                <span class="value">Có</span>
                                                <button class="view-bad-words">
                                                    <span>Xem</span>
                                                    <div class="list-bad-words">
                                                        <span class="bad-word-item">fuck you 1</span>
                                                        <span class="bad-word-item">fuck you 2</span>
                                                        <span class="bad-word-item">fuck you 3</span>
                                                    </div>
                                                </button>
                                            </li>
                                            <li>
                                                <span class="key">number edits</span>
                                                <span class="value">3</span>
                                            </li>
                                            <li>
                                                <span class="key">Phone number</span>
                                                <a href="tel:0385763717" class="value d-inline">0385763717</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="message-wrap">
                                <div class="message-text">
                                    <textarea name="info-message-text" id="info-message-text" class="d-none"></textarea>
                                    <div class="info-message-text-input" contenteditable="false" spellcheck="false">Bạn có thể tư vấn giúp mình được không</div>
                                </div>
                                <div class="message-img action-wrap d-flex">
                                    <div class="list-images">
                                        <ul class="d-flex align-items-center">
                                            <li>
                                                <span data-img-comment class="thumbNail" title="Click vào để xem ảnh">
                                                    <img src="./public/images/prod/gas-am-1.jpg" alt="">
                                                </span>
                                            </li>
                                            <li>
                                                <span data-img-comment class="thumbNail" title="Click vào để xem ảnh">
                                                    <img src="./public/images/prod/gas-am-1.jpg" alt="">
                                                </span>
                                            </li>
                                            <li>
                                                <span data-img-comment class="thumbNail" title="Click vào để xem ảnh">
                                                    <img src="./public/images/prod/gas-am-1.jpg" alt="">
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="show-full-img" id="show-full-img">
                                            <div class="mask" id="btn-close-show-full-img"></div>
                                            <span class="thumbNail">
                                                <img id="srcImgAppend-full-img" src="" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="list-button">
                                        <button type="submit" class="button-item btn-approval">Duyệt</button>
                                        <button type="submit" class="button-item btn-edit">Sửa</button>
                                        <button type="submit" class="button-item btn-delete">Xóa</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-message">
                                <div class="form-reply-wrap">
                                    <div class="fast-message d-flex justify-between align-items-center">
                                        <div class="fast-message-list">
                                            <div class="fast-message-input d-flex">
                                                <button type="button" id="buttonOpen-fastMessage" class="choose-answer-btn">Chọn câu trả lời nhanh</button>
                                                <button type="button" id="buttonEdit-fastMessage" class="edit-answer-fast" title="Edit câu trả lời nhanh">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                                <div class="table-edit-fast-message" id="table-edit-fast-message">
                                                    <div class="table-edit-wrap">
                                                        <div class="table-head">
                                                            <h4 class="title">Cập nhật tin nhắn trả lời nhanh</h4>
                                                        </div>
                                                        <div class="table-body">
                                                            <ul class="list-fast-message">
                                                                <li class="fast-message-item">
                                                                    <input type="text" name="" id="" autocomplete="off" spellcheck="false" value="Bạn vui lòng để lại số điện thoại shop sẽ gọi để tư vấn cho bạn nhé.">
                                                                </li>
                                                                <li class="fast-message-item">
                                                                    <input type="text" name="" id="" autocomplete="off" spellcheck="false" value="Sản phẩm này hiện tại đang hết hàng rồi quý khách.">
                                                                </li>
                                                                <li class="fast-message-item">
                                                                    <input type="text" name="" id="" autocomplete="off" spellcheck="false" value="Hi bạn, Cảm ơn bạn đã phải hồi.">
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="table-footer d-flex">
                                                            <button type="button" class="cancel-adit" id="cancel-edit-modal-act">Hủy Bỏ</button>
                                                            <button type="button" class="update">Lưu Thay Đổi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fast-message-recomment" id="fast-message-recomment">
                                                <ul>
                                                    <li>
                                                        <a href="" class="recomment-message-item">Bạn vui lòng để lại số điện thoại shop sẽ gọi để tư vấn cho bạn nhé</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="recomment-message-item">Sản phẩm này hiện tại đang hết hàng rồi quý khách</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="recomment-message-item">Hi bạn, Cảm ơn bạn đã phải hồi.</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="add-fast-message d-flex align-items-center">
                                            <div class="space-input">
                                                <input type="text" name="add-fast-message-input" class="add-fast-message-input" autocomplete="off" spellcheck="false" placeholder="Thêm Tin Nhắn Trả Lời Nhanh...">
                                            </div>
                                            <div class="space-button">
                                                <button type="submit" class="add-fast-message-btn" class="add-fast-message-btn">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-message">
                                        <div class="input-message-text">
                                            <textarea name="reply-message-text" id="reply-message-text" class="d-none"></textarea>
                                            <div title="Nhập tin nhắn trả lời khách hàng" class="reply-message-text-input" contenteditable="true" spellcheck="false"></div>
                                        </div>
                                        <div class="input-message-images">
                                            <input type="file" name="image-reply" id="image-reply" class="d-none">
                                            <label for="image-reply" class="image-reply">
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                <span>Gửi ảnh</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="action-message d-flex justify-between align-items-center">
                                        <div class="member-reply">
                                            <input type="text" name="member-reply-name" id="member-reply-name" placeholder="Người trả lời" autocomplete="off" spellcheck="false">
                                        </div>
                                        <div class="btn-send-reply-wrap">
                                            <button type="submit" class="btn-send-reply" name="btn-send-message">Gửi trả lời</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/aizo-js-theme.js"></script>
    <script src="./public/js/aizo-popup.js"></script>
</body>

</html>