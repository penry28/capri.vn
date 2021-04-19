$(function() {
    $("#image-banner-cate").change(function() {
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
            url: "?mod=blog&action=uploadImgBannerBlog",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: data => {
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


$(function() {
    filterProductByCateId();

    function filterProductByCateId() {
        let btnFilter = $("#cate-prod-id");
        btnFilter.change(function() {
            let idCate = parseInt($(this).val());
            getListProductByCateLevel2(idCate);
        });
    }

    function getListProductByCateLevel2(idCate) {
        $.ajax({
            url: "?mod=blog&action=getListProdCateLevel2",
            method: "POST",
            data: { idCate: idCate },
            dataType: "json",
            success: (data) => {
                appendDataListProd(data);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }

    function appendDataListProd(data) {
        let spaceAppend = $("#product-blog");
        let __html = `<option value=''>Chọn sản phẩm cho bài viết</option>`;
        if (data.length === 0) {
            __html += `<option value=''>Không có sản phẩm nào</option>`;
        } else {
            for (let i = 0; i < data.length; i++) {
                __html += `<option value='${data[i]['id_product']}'>${data[i]['title_product']}</option>`;
            }
        }
        spaceAppend.html(__html);
    }
});

// ########## ========== HANDLE BLOG ========== ########## //
$(function() {
    let dataConfig = {
        "wrapperDataNumStatus": $(".select-section .select-status")
    };

    __construct();

    function __construct() {
        activeElOptionStatusByStatus();
        loadDataNumStatus();
        restoreStatus();
        changeStatusBlog();
        intoTrashBlog();
        deleteBlog();
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
            url: "?mod=blog&action=getNumDataOfStatus",
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
            let idBlog = parseInt($(this).parents('tr[data-id-blog]').attr('data-id-blog'));
            changeStatus(statusOld, null, idBlog, 'restore');
        });
    }

    function changeStatusBlog() {
        let listBtnChange = $(".switch.status .btn-change-status");
        listBtnChange.click(function() {
            let statusCurrent = $(this).attr("data-status");
            statusCurrent = statusCurrent === 'publish' ? 'pending' : 'publish';
            let idBlog = parseInt($(this).parents('tr[data-id-blog]').attr('data-id-blog'));
            changeStatus(statusCurrent, null, idBlog, 'change');
        });
    }

    function intoTrashBlog() {
        let listBtnTrash = $("section.main-table .operation-list-setting button[data-action='trash']");
        listBtnTrash.click(function() {
            let statusCurrent = 'trash';
            let statusOld = $(this).parents('tr[data-id-blog]').find('.__status__').attr('data-status');
            let idBlog = parseInt($(this).parents('tr[data-id-blog]').attr('data-id-blog'));
            changeStatus(statusCurrent, statusOld, idBlog, 'trash');
        });
    }

    function changeStatus(statusCurrent, statusOld, idEl, actions) {
        $.ajax({
            url: "?mod=blog&action=changeStatus",
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
                        let spaceAppendStatus = $("section.main-table table.table-wrap tr[data-id-blog=" + (idEl) + "] .__status__");
                        let spaceAppendStatusBtn = $("section.main-table table.table-wrap tr[data-id-blog=" + (idEl) + "] .btn-change-status");
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

    function deleteBlog() {
        let listBtnDelete = $("section.main-table .operation-list-setting button[data-action='delete']");
        listBtnDelete.click(function() {
            if (confirm('Sẽ không thể khôi phục sản phẩm này')) {
                let idBlog = parseInt($(this).parents('tr[data-id-blog]').attr('data-id-blog'));
                $.ajax({
                    url: "?mod=blog&action=deleteBlog",
                    method: "POST",
                    data: { idBlog: idBlog },
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
        })
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
                url: "?mod=blog&action=recommentSearch",
                method: "GET",
                data: { strSearch: strSearch },
                dataType: "json",
                success: (data) => {
                    if (data['searchResult'].length > 0) {
                        formRecommentSearch.stop().fadeIn(300);
                        handleAppendRecommentSearch(data['searchResult']);
                        if (data['searchResult'].length <= 3) {
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
                            <img src="${data[i]['blog_img']}" alt="">
                        </span>
                    </div>
                    <div class="info-wrap">
                        <span class="name">${data[i]['blog_title']}</span>
                        <div class="action d-flex">
                            <a href="${base_url + '?mod=blog&action=update&id=' + data[i]['blog_id']}" class="act-item update">Update</a>
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
                url: "?mod=blog&action=setUrlSearchBlog",
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
    });
});