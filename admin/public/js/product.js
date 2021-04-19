$(function() {
    $("#add-avatar-img").change(function() {
        showPreview(this);
    });

    function showPreview(objFileInput) {
        if (objFileInput.files[0]) {
            if (checkExtenFile(objFileInput.files[0])) {
                if (fileSize(objFileInput.files[0])) {
                    let fileReader = new FileReader();
                    let spaceAppendImg = $("#img-thumbNail-inner");
                    let formData = new FormData();
                    formData.append('file', objFileInput.files[0]);
                    fileReader.onload = function(e) {
                        let srcImg = objFileInput.files[0].name;
                        spaceAppendImg.attr('src', e.target.result);
                        appendImgURLtoInputHidden(formData);
                        spaceAppendImg.attr('data-exist-img', 'true');
                        spaceAppendImg.attr('data-img-name', srcImg);
                    }
                    fileReader.readAsDataURL(objFileInput.files[0]);
                } else {
                    notificationAlert('', 'Kích thước file không được vược quá 5MB');
                }
            } else {
                notificationAlert('', 'File ảnh không hợp lệ chúng tôi chỉ chấp nhận định dạng file ( .jpg, .png, .jpeg, .gif )');
            }
        }
    }

    function checkExtenFile(objFileInput) {
        let extenFileInput = objFileInput.name.split('.').pop().toLowerCase();
        let extenFileAllow = ['jpg', 'png', 'jpeg', 'gif'];
        if ($.inArray(extenFileInput, extenFileAllow) == -1) {
            return false;
        }
        return true;
    }

    function fileSize(objFileInput) {
        let fSize = objFileInput.size;
        if (fSize > 5242880) {
            return false;
        }
        return true;
    }

    function notificationAlert(spaceAppend, notifiText) {
        if (spaceAppend.length === 0) {
            alert(notifiText);
        } else {
            alert('Chức năng này kỹ thuật viên chưa hoàn thành');
        }
    }

    function appendImgURLtoInputHidden(formData) {
        $.ajax({
            url: "?mod=prod&action=uploadImgAvatar",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: data => {
                console.log(data);
                if (data.status === 'success') {
                    let spaceAppendSrcImg = $("#img-thumbNail-inner-url");
                    spaceAppendSrcImg.val(data.pathFile);
                } else {
                    notificationAlert('', 'Upload ảnh không thành công');
                }
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }
});



// ===== ##### ----- upload muti img for product description ----- ##### ===== //

$(function() {
    $("#add_desc_img_button").change(function() {
        showImageDescription(this);
    });

    function showImageDescription(objMutiFileInput) {
        let coreFile = {
            minFile: 0,
            maxFile: 10
        }
        let spaceErrorEl = $(".notification-error .error");
        let numFileUpload = (objMutiFileInput.files).length;
        if (numFileUpload === coreFile.minFile) {
            spaceErrorEl.text('Bạn vui lòng chọn ít nhất 1 ảnh');
        } else {
            if (numFileUpload >= coreFile.maxFile) {
                spaceErrorEl.text('Chỉ được upload ' + (coreFile.maxFile) + ' ảnh mô tả');
            } else {
                let processedCheckExtenFile = checkExtenFile(objMutiFileInput.files);
                if (processedCheckExtenFile.status === 'success') {
                    let processedCheckFileSize = checkFileSize(objMutiFileInput.files);
                    if (processedCheckFileSize.status === 'success') {
                        let formData = new FormData();
                        for (let i = 0; i < (objMutiFileInput.files).length; i++) {
                            let fileReader = new FileReader();
                            let fileIMG = objMutiFileInput.files[i];
                            fileReader.readAsDataURL(fileIMG);
                            formData.append('file[]', fileIMG, fileIMG.name);
                        }
                        uploadFileImgToFolder(formData);
                    } else {
                        alert(processedCheckFileSize.notifiError);
                    }
                } else {
                    alert(processedCheckExtenFile.notifiError);
                }
            }
        }
    }

    function checkExtenFile(objMutiFileInput) {
        let arrFiles = [];
        for (let i = 0; i < objMutiFileInput.length; i++) {
            let objData = {
                index: i,
                exten: objMutiFileInput[i].name.split('.').pop().toLowerCase()
            }
            arrFiles.push(objData);
        }

        let extenFileAllow = ['jpg', 'png', 'jpeg', 'gif'];
        let arrFileError = [];
        let numSuccess = 0;
        for (let i = 0; i < arrFiles.length; i++) {
            if ($.inArray(arrFiles[i].exten, extenFileAllow) == -1) {
                arrFileError.push(arrFiles[i])
            } else {
                numSuccess++;
            }
        }
        if (numSuccess === arrFiles.length) {
            return {
                status: "success"
            }
        } else {
            return {
                status: "error",
                notifiError: getErrorFileExten(arrFileError)
            }
        }

        function getErrorFileExten(arrFileError) {
            let textError = 'Các file bị lỗi là: ';
            for (let i = 0; i < arrFileError.length; i++) {
                textError += `[vị trí thứ: ${arrFileError[i].index + 1} - đuôi file (.${arrFileError[i].exten}) không được phép], `;
            }
            return textError;
        }
    }


    function checkFileSize(objMutiFileInput) {
        let arrFiles = [];
        for (let i = 0; i < objMutiFileInput.length; i++) {
            let objData = {
                index: i,
                size: objMutiFileInput[i].size
            }
            arrFiles.push(objData);
        }

        let fileSizeAllow = 5242880; // 5MB
        let arrFileError = [];
        let numSuccess = 0;
        for (let i = 0; i < arrFiles.length; i++) {
            if (arrFiles[i].size > fileSizeAllow) {
                arrFileError.push(arrFiles[i]);
            } else {
                numSuccess++;
            }
        }
        if (numSuccess === arrFiles.length) {
            return {
                status: "success"
            }
        } else {
            return {
                status: "error",
                notifiError: getErrorFileSize(arrFileError)
            }
        }

        function getErrorFileSize(arrFileError) {
            let textError = "Các file bị lỗi là: ";
            for (let i = 0; i < arrFileError.length; i++) {
                textError += `[vị trí thứ: ${arrFileError[i].index + 1} - file size (${arrFileError[i].size}) quá lớn], `;
            }
            textError += "kích thước cho phép chỉ tối đa 5MB";
            return textError;
        }
    }

    function uploadFileImgToFolder(formData) {
        $.ajax({
            url: "?mod=prod&action=uploadMultiImgAvatar",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: () => {
                console.log('uploading file ....');
            },
            success: (data) => {
                if (data.status === 'success') {
                    appendImgToHTML(data.listUrlImg);
                } else {
                    alert('upload file ảnh mô tả sản phẩm không thành công');
                }
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }

    function appendImgToHTML(listUrlImg) {
        let __html = `<div class='wrap-list'>`;
        for (let i = 0; i < listUrlImg.length; i++) {
            __html += ` <div class="img-wrap-item d-flex">
                            <div class="img-wrap">
                                <span class="thumbNail">
                                    <img src="${listUrlImg[i]}" alt="">
                                    <input type='hidden' name='imgDesc[]' value='${listUrlImg[i]}'/>
                                </span>
                            </div>
                            <div class="info-wrap">
                                <div class="form-group">
                                    <label for="seo-title-1" class="title-label">Seo title (alt)</label>
                                    <input type="text" name="seo-title[]" id="seo-title-1" class="form-control py-1 px-2" placeholder="Title seo website">
                                </div>
                            </div>
                        </div>`;
        }
        __html += `</div>`;
        let spaceAppend = $("#list-img-description");
        spaceAppend.html(__html);
    }
});

$(function() {
    var detail_item_product = {
        "wrapper": "#main-content-wp-basic.add-product",
        "btn_add": ".action-detail-item[data-action='add']",
        "btn_delete": ".action-detail-item[data-action='delete']",
        "num_detail_item_curr": 1,
        "btn_add_detail_option": ".btn-add-detail-item",
        "place_append_detail_item": ".basic-space",
    }
    $(detail_item_product.wrapper).delegate(detail_item_product.btn_add, 'click', function() {
        let num_add = 1;
        let place_append = $(detail_item_product.place_append_detail_item + "[data-detail_item=" + (detail_item_product.num_detail_item_curr) + "]");
        $(place_append).find(detail_item_product.btn_add).attr('data-action', 'delete');
        $(place_append).find(detail_item_product.btn_delete).text('Xóa');
        detail_item_product.num_detail_item_curr++;
        add_detail_item_product(num_add, place_append);
        event.preventDefault();
    });
    //bắt sự kiện để xóa đi một phần tử của detail item product
    $(detail_item_product.wrapper).delegate(detail_item_product.btn_delete, 'click', function() {
        let id_detail_item = $(this).parents('.detail-item').attr('data-detail_item');
        $(detail_item_product.place_append_detail_item + "[data-detail_item=" + (id_detail_item) + "]").remove();
        event.preventDefault();
    });


    // hàm này dùng để tính toán và gửi dữ kiệu cho hàm sinh ra thành phần detail item products
    function add_detail_item_product(num_add, place_append) {
        let html_input_detail_item_product = "";
        html_input_detail_item_product += creat_input_detail_item_product(detail_item_product.num_detail_item_curr);
        $(place_append).after(html_input_detail_item_product);
    }

    function creat_input_detail_item_product(detail_id) {
        return "<div class=\"detail-item basic-space\" data-detail_item=\"" + (detail_id) + "\">\n" +
            "                                            <div class=\"grid-row\">\n" +
            "                                                <div class=\"grid-column-12\">\n" +
            "                                                    <div class=\"grid-row\">\n" +
            "                                                        <div class=\"grid-column-1 px-1\">\n" +
            "                                                            <span class=\"check-detail\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span>\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-4 px-1\">\n" +
            "                                                            <input type=\"text\" name=\"name_detail_basic[]\" class=\"form-control shadow-none px-3\" autocomplete='off' spellcheck='false' placeholder=\"Nhập tên chi tiết\">\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-5 px-1\">\n" +
            "                                                            <input type=\"text\" name=\"value_detail_basic[]\" class=\"form-control shadow-none px-3\" autocomplete='off' spellcheck='false' placeholder=\"Nhập giá trị\">\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-2 px-1\">\n" +
            "                                                            <a href=\"\" class=\"action-detail-item\" data-action=\"add\">Thêm</a>\n" +
            "                                                        </div>\n" +
            "                                                    </div>\n" +
            "                                                </div>\n" +
            "                                            </div>\n" +
            "                                        </div>"
    }

});


$(function() {
    var detail_item_product = {
        "wrapper": "#main-content-wp-future.add-product",
        "btn_add": ".action-detail-item[data-action='add']",
        "btn_delete": ".action-detail-item[data-action='delete']",
        "num_detail_item_curr": 1,
        "btn_add_detail_option": ".btn-add-detail-item",
        "place_append_detail_item": ".future-space",
    }
    $(detail_item_product.wrapper).delegate(detail_item_product.btn_add, 'click', function() {
        let num_add = 1;
        let place_append = $(detail_item_product.place_append_detail_item + "[data-detail_item=" + (detail_item_product.num_detail_item_curr) + "]");
        $(place_append).find(detail_item_product.btn_add).attr('data-action', 'delete');
        $(place_append).find(detail_item_product.btn_delete).text('Xóa');
        detail_item_product.num_detail_item_curr++;
        add_detail_item_product(num_add, place_append);
        event.preventDefault();
    });
    //bắt sự kiện để xóa đi một phần tử của detail item product
    $(detail_item_product.wrapper).delegate(detail_item_product.btn_delete, 'click', function() {
        let id_detail_item = $(this).parents('.detail-item').attr('data-detail_item');
        $(detail_item_product.place_append_detail_item + "[data-detail_item=" + (id_detail_item) + "]").remove();
        event.preventDefault();
    });


    // hàm này dùng để tính toán và gửi dữ kiệu cho hàm sinh ra thành phần detail item products
    function add_detail_item_product(num_add, place_append) {
        let html_input_detail_item_product = "";
        html_input_detail_item_product += creat_input_detail_item_product(detail_item_product.num_detail_item_curr);
        $(place_append).after(html_input_detail_item_product);
    }

    function creat_input_detail_item_product(detail_id) {
        return "<div class=\"detail-item future-space\" data-detail_item=\"" + (detail_id) + "\">\n" +
            "                                            <div class=\"grid-row\">\n" +
            "                                                <div class=\"grid-column-12\">\n" +
            "                                                    <div class=\"grid-row\">\n" +
            "                                                        <div class=\"grid-column-1 px-1\">\n" +
            "                                                            <span class=\"check-detail\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span>\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-1 px-1\">\n" +
            "                                                            <input type=\"text\" name=\"name_detail_future[]\" class=\"form-control shadow-none px-3\" autocomplete='off' spellcheck='false' placeholder=\"Nhập tên chi tiết\">\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-8 px-1\">\n" +
            "                                                            <input type=\"text\" name=\"value_detail_future[]\" class=\"form-control shadow-none px-3\" autocomplete='off' spellcheck='false' placeholder=\"Nhập giá trị\">\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-2 px-1\">\n" +
            "                                                            <a href=\"\" class=\"action-detail-item\" data-action=\"add\">Thêm</a>\n" +
            "                                                        </div>\n" +
            "                                                    </div>\n" +
            "                                                </div>\n" +
            "                                            </div>\n" +
            "                                        </div>"
    }

});


$(function() {
    var detail_item_product = {
        "wrapper": "#main-content-wp-specifications.add-product",
        "btn_add": ".action-detail-item[data-action='add']",
        "btn_delete": ".action-detail-item[data-action='delete']",
        "num_detail_item_curr": 1,
        "btn_add_detail_option": ".btn-add-detail-item",
        "place_append_detail_item": ".specifications-space",
    }
    $(detail_item_product.wrapper).delegate(detail_item_product.btn_add, 'click', function() {
        let num_add = 1;
        let place_append = $(detail_item_product.place_append_detail_item + "[data-detail_item=" + (detail_item_product.num_detail_item_curr) + "]");
        $(place_append).find(detail_item_product.btn_add).attr('data-action', 'delete');
        $(place_append).find(detail_item_product.btn_delete).text('Xóa');
        detail_item_product.num_detail_item_curr++;
        add_detail_item_product(num_add, place_append);
        event.preventDefault();
    });
    //bắt sự kiện để xóa đi một phần tử của detail item product
    $(detail_item_product.wrapper).delegate(detail_item_product.btn_delete, 'click', function() {
        let id_detail_item = $(this).parents('.detail-item').attr('data-detail_item');
        $(detail_item_product.place_append_detail_item + "[data-detail_item=" + (id_detail_item) + "]").remove();
        event.preventDefault();
    });


    // hàm này dùng để tính toán và gửi dữ kiệu cho hàm sinh ra thành phần detail item products
    function add_detail_item_product(num_add, place_append) {
        let html_input_detail_item_product = "";
        html_input_detail_item_product += creat_input_detail_item_product(detail_item_product.num_detail_item_curr);
        $(place_append).after(html_input_detail_item_product);
    }

    function creat_input_detail_item_product(detail_id) {
        return "<div class=\"detail-item specifications-space\" data-detail_item=\"" + (detail_id) + "\">\n" +
            "                                            <div class=\"grid-row\">\n" +
            "                                                <div class=\"grid-column-12\">\n" +
            "                                                    <div class=\"grid-row\">\n" +
            "                                                        <div class=\"grid-column-1 px-1\">\n" +
            "                                                            <span class=\"check-detail\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></span>\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-4 px-1\">\n" +
            "                                                            <input type=\"text\" name=\"name_detail_specifications[]\" class=\"form-control shadow-none px-3\" autocomplete='off' spellcheck='false' placeholder=\"Nhập tên chi tiết\">\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-5 px-1\">\n" +
            "                                                            <input type=\"text\" name=\"value_detail_specifications[]\" class=\"form-control shadow-none px-3\" autocomplete='off' spellcheck='false' placeholder=\"Nhập giá trị\">\n" +
            "                                                        </div>\n" +
            "                                                        <div class=\"grid-column-2 px-1\">\n" +
            "                                                            <a href=\"\" class=\"action-detail-item\" data-action=\"add\">Thêm</a>\n" +
            "                                                        </div>\n" +
            "                                                    </div>\n" +
            "                                                </div>\n" +
            "                                            </div>\n" +
            "                                        </div>"
    }

});



$(function() {
    // handle category
    // loadCategory(1, 0, "#select-level-1");
    selectCateLevel2();

    function loadCategory(level, parent_id, spaceAppend) {
        $.ajax({
            url: "?mod=cate&action=loadCate",
            method: "POST",
            data: { level: parseInt(level), parent_id: parseInt(parent_id) },
            dataType: "json",
            success: (data) => {
                appendListCate(data.listCate, spaceAppend);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }

    function appendListCate(listCate, spaceAppend) {
        let __html = `<option value="">---Chọn 1 danh mục---</option>`;
        if (listCate.length > 0) {
            for (let i = 0; i < listCate.length; i++) {
                __html += `<option value='${listCate[i]['id_cate']}'>${listCate[i]['title_cate']}</option>`;
            }
        } else {
            __html += `<option value="">Không có danh mục nào</option>`;
        }
        $(`${spaceAppend}`).html(__html);
    }

    function selectCateLevel2() {
        let btnSelect = $("#select-level-1");
        btnSelect.change(function() {
            let idCate = $(this).val();
            loadCategory(2, idCate, "#select-level-2");
        });
    }
});

// filter blog by cate level 2
$(function() {
    let btnFilter = $("#cate-filter-select");
    let btnClear = $(".form-filter-by-cate button[name='clear']");
    let searchInput = $("#searchBlogInput");
    let btnClearSeach = $(".form-search-blog button[name='clearStrSearch']");
    btnFilter.change(function() {
        let cateId = parseInt($(this).val());
        loadListBlogByCateId(cateId);
    });
    btnClear.click(function() {
        $("#cate-filter-select").val('');
        loadListBlogByCateId(null);
    });
    btnClearSeach.click(function() {
        $("#searchBlogInput").val('');
        loadListBlogByCateId(null);
    });

    searchInput.keyup(function() {
        let strSearch = $(this).val();
        loadListBLogByTitleSearch(strSearch);
    });

    function loadListBLogByTitleSearch(strSearch) {
        $.ajax({
            url: "?mod=prod&action=loadBlogBytitle",
            method: "POST",
            data: { strSearch: strSearch },
            dataType: "json",
            success: (data) => {
                appendListBlogHTML(data['listBlog']);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }

    function loadListBlogByCateId(cateId) {
        $.ajax({
            url: "?mod=prod&action=loadListBlogByCateId",
            method: "POST",
            data: { cateId: cateId },
            dataType: "json",
            success: (data) => {
                appendListBlogHTML(data['listBlog']);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }

    function appendListBlogHTML(data) {
        let spaceAppend = $(".list-blog-wrap");
        let __html = `<ul>`;
        for (let i = 0; i < data.length; i++) {
            __html +=
                `<li class='blog-item'>
                    <div class="d-flex align-items-center">
                        <input type="checkbox" name="blogRelative[]" value="${data[i]['blog_id']}" class="grid-column-1" id="blog-id-${data[i]['blog_id']}" data-id-blog="${data[i]['blog_id']}">
                        <label for="blog-id-${data[i]['blog_id']}" class="title-blog grid-column-10 d-flex justify-content-center align-items-center">
                            <span class="blog-title">${data[i]['blog_title']}</span>
                            <span class="select-btn">Chọn</span>
                        </label>
                        <a href="" class="view-blog">Xem</a>
                    </div>
                </li>`;
        }
        __html += `</ul>`;
        spaceAppend.html(__html);
    }
});


// handle choose product typical
$(function() {
    let formSubmit = $(".form-save-products-typical");
    let checkBoxListEl = $(".prodTypical-check");
    formSubmit.submit(function() {
        let listCheckArr = [];
        for (let i = 0; i < checkBoxListEl.length; i++) {
            if (checkBoxListEl[i].checked) {
                let idProd = $(checkBoxListEl[i]).val();
                listCheckArr.push(idProd);
            }
        }
        if (listCheckArr.length === 0) {
            alert('Vui lòng chọn 1 sản phẩm');
        } else {
            $.ajax({
                url: "?mod=prod&action=chooseProdTypical",
                method: "POST",
                data: { listCheckArr: listCheckArr },
                dataType: "json",
                success: (data) => {
                    if (data.status === 'error') {
                        event.preventDefault();
                        alert('Cập nhật không thành công');
                    }
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    });
});

// ########## ========== HANDLE PRODUCT ========== ########## //
$(function() {
    let dataConfig = {
        "wrapperDataNumStatus": $(".select-section .select-status")
    };
    __construct();

    function __construct() {
        activeElOptionStatusByStatus();
        loadDataNumStatus();
        restoreStatus();
        changeStatusProd();
        intoTrashProd();
        deleteProd();
    }

    function activeElOptionStatusByStatus() {
        let status = $(".select-section.section-right").attr('data-status-current');
        let classActive = status.length !== 0 ? '.' + status : '.all';
        classActive = classActive + ' .action-item';
        dataConfig['wrapperDataNumStatus'].find(classActive).addClass('active');
    }

    function loadDataNumStatus() {
        let spaceAppenData = {
            "all": dataConfig['wrapperDataNumStatus'].find('.all .value'),
            "publish": dataConfig['wrapperDataNumStatus'].find('.publish .value'),
            "pending": dataConfig['wrapperDataNumStatus'].find('.pending .value'),
            "trash": dataConfig['wrapperDataNumStatus'].find('.trash .value'),
        }

        $.ajax({
            url: "?mod=prod&action=getNumDataOfStatus",
            method: "POST",
            dataType: "json",
            success: (data) => {
                spaceAppenData['all'].text(data['all']);
                spaceAppenData['publish'].text(data['publish']);
                spaceAppenData['pending'].text(data['pending']);
                spaceAppenData['trash'].text(data['trash']);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }

    function restoreStatus() {
        let listBtnRestore = $("section.main-table .operation-list-setting button[data-action='restore']");
        listBtnRestore.click(function() {
            let statusOld = $(this).attr('data-status-old');
            let idProd = parseInt($(this).parents('tr[data-id-prod]').attr('data-id-prod'));
            changeStatus(statusOld, null, idProd, 'restore');
        });
    }

    function changeStatusProd() {
        let listBtnChange = $(".switch.status .btn-change-status");
        listBtnChange.click(function() {
            let statusCurrent = $(this).attr("data-status");
            statusCurrent = statusCurrent === 'publish' ? 'pending' : 'publish';
            let idProd = parseInt($(this).parents('tr[data-id-prod]').attr('data-id-prod'));
            changeStatus(statusCurrent, null, idProd, 'change');
        });
    }

    function intoTrashProd() {
        let listBtnTrash = $("section.main-table .operation-list-setting button[data-action='trash']");
        listBtnTrash.click(function() {
            let statusCurrent = 'trash';
            let statusOld = $(this).parents('tr[data-id-prod]').find('.__status__').attr('data-status');
            let idProd = parseInt($(this).parents('tr[data-id-prod]').attr('data-id-prod'));
            changeStatus(statusCurrent, statusOld, idProd, 'trash');
        });
    }

    function deleteProd() {
        let listBtnDelete = $("section.main-table .operation-list-setting button[data-action='delete']");
        listBtnDelete.click(function() {
            if (confirm('Sẽ không thể khôi phục sản phẩm này')) {
                let idProd = parseInt($(this).parents('tr[data-id-prod]').attr('data-id-prod'));
                $.ajax({
                    url: "?mod=prod&action=deleteProd",
                    method: "POST",
                    data: { idProd: idProd },
                    dataType: "json",
                    success: (data) => {
                        if (data.status === 'success') {
                            location.reload();
                        } else {
                            alert('Xóa không thành công');
                        }
                    }
                })
            };
        });
    }

    function changeStatus(statusCurrent, statusOld, idEl, actions) {
        $.ajax({
            url: "?mod=prod&action=changeStatus",
            method: "POST",
            data: {
                statusCurrent: statusCurrent,
                statusOld: statusOld,
                idEl: idEl
            },
            dataType: "json",
            success: data => {
                if (data.status === 'success') {
                    if (actions === 'restore' || actions === 'trash' || actions === 'delete') {
                        location.reload();
                    } else {
                        let spaceAppendStatus = $("section.main-table table.table-wrap tr[data-id-prod=" + (idEl) + "] .__status__");
                        let spaceAppendStatusBtn = $("section.main-table table.table-wrap tr[data-id-prod=" + (idEl) + "] .btn-change-status");
                        if (statusCurrent === 'publish') {
                            spaceAppendStatus.attr("data-status", "publish");
                            spaceAppendStatus.text('Hoạt động');
                            spaceAppendStatusBtn.attr('data-active', 'on');
                            spaceAppendStatusBtn.attr('data-status', 'publish');
                        } else {
                            spaceAppendStatus.attr("data-status", "pending");
                            spaceAppendStatus.text('Chờ duyệt');
                            spaceAppendStatusBtn.attr('data-active', 'off');
                            spaceAppendStatusBtn.attr('data-status', 'pending');
                        }
                        loadDataNumStatus();
                    }
                } else {
                    alert('Cập nhật trạng thái không thành công');
                }
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }
});

//handle search

$(function() {
    search__construct();

    function search__construct() {
        handleSearchAction();
    }

    function handleSearchAction() {
        let inpSearchEl = $(".form-search-action input[name='strSearch']");
        let formRecommentSearch = $(".form-search-action .search-recomment");

        inpSearchEl.blur(function() {
            formRecommentSearch.stop().fadeOut(300);
        });

        inpSearchEl.focus(function() {
            let strSearch = $(this).val();
            if (strSearch.length > 0) {
                handleSearch(strSearch);
            }
        });

        inpSearchEl.keyup(function() {
            let strSearch = $(this).val();
            handleSearch(strSearch);
        });


        function handleSearch(strSearch) {
            $.ajax({
                url: "?mod=prod&action=recommentSearch",
                method: "GET",
                data: { strSearch: strSearch },
                dataType: "json",
                success: (data) => {
                    if (data.length > 0) {
                        formRecommentSearch.stop().fadeIn(300);
                        handleAppendRecommentSearch(data);
                        if (data.length <= 3) {
                            formRecommentSearch.attr('style', 'height: auto;');
                        } else {
                            formRecommentSearch.attr('style', 'height: 300px;');
                        }
                        handleSelectKeyword();
                    } else {
                        let __html = "<p style='padding: 15px;'>Không có sản phẩm nào</p>";
                        formRecommentSearch.attr('style', 'height: auto;');
                        formRecommentSearch.addClass('open');
                        formRecommentSearch.html(__html);
                    }
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }

        function handleSelectKeyword() {
            let keywordEl = $(".form-search-action .search-recomment .search-vl-item .action .act-item.keyword");
            keywordEl.click(function() {
                event.preventDefault();
                let keyword = $(this).parents('.info-wrap').find('.name').text();
                inpSearchEl.val(keyword);
            });
        }

        function handleAppendRecommentSearch(data) {
            let __html = ``;
            let spaceAppendDataRecommentSearch = $(".form-search-action .search-recomment");
            let base_url = spaceAppendDataRecommentSearch.attr('data-baseurl');
            for (let i = 0; i < data.length; i++) {
                __html += `
                <div class="search-vl-item">
                    <div class="img-wrap">
                        <span class="thumbNail">
                            <img src="${data[i]['avatar']}" alt="">
                        </span>
                    </div>
                    <div class="info-wrap">
                        <span class="name">${data[i]['title_product']}</span>
                        <div class="action d-flex">
                            <a href="${base_url + '?mod=prod&action=update&id=' + data[i]['id_product']}" class="act-item update">Update</a>
                            <a href="" class="act-item keyword">Chọn từ khóa</a>
                        </div>
                    </div>
                </div>`
            }
            spaceAppendDataRecommentSearch.html(__html);
        }
    }
});


//hanle search action main
$(function() {
    var search = {
        wrapper: "body",
        formSearch: $(".form-sction .form-search-action"),
        inputSearch: $(".form-sction .form-search-action input[name='strSearch']"),
        btnSearch: $(".form-sction .form-search-action").find("button[name='searchBtn']")
    };
    search['formSearch'].submit(function() {
        event.preventDefault();
    });

    search['btnSearch'].click(function() {
        let strSearch = $(search['inputSearch']).val();
        if (strSearch.length === 0) {
            alert('Vui lòng nhập từ khóa tìm kiếm');
            event.preventDefault();
        } else {
            $.ajax({
                url: "?mod=prod&action=setUrlSearchProd",
                method: "POST",
                data: {
                    strSearch: strSearch,
                },
                dataType: "json",
                success: (data) => {
                    window.location.replace(data['urlSearch']);
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    })
});