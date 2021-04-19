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
            url: "?mod=cate&action=uploadImgBanner",
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


    // getTotalCategoryLevel(1);

    function getTotalCategoryLevel(levelId) {
        $.ajax({
            url: "?mod=cate&action=getCateByLevel",
            method: "POST",
            data: { levelCate: levelId },
            dataType: "json",
            success: (data) => {
                let spaceAppend = $("#cate-parent-id");
                appendDataHTMLCateLevel_1(spaceAppend, data.listCate);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        })
    }

    function appendDataHTMLCateLevel_1(spaceAppend, dataAppend) {
        let __html = `<option value="">---- Chọn danh mục cấp 1 ----</option>`;
        for (let i = 0; i < dataAppend.length; i++) {
            __html += `<option value="${dataAppend[i].id_cate}">${dataAppend[i].title_cate}</option>`;
        }
        spaceAppend.html(__html);
    }
});


// handle choose cate highlight
$(function() {
    let formSubmit = $(".form-save-cate-highlight");
    let checkBoxListEl = $(".cateHighlight-check");
    formSubmit.submit(function() {
        let listCheckArr = [];
        for (let i = 0; i < checkBoxListEl.length; i++) {
            if (checkBoxListEl[i].checked) {
                let idCate = $(checkBoxListEl[i]).val();
                listCheckArr.push(idCate);
            }
        }
        if (listCheckArr.length === 0) {
            alert('Vui lòng chọn 1 danh mục');
            event.preventDefault();
        } else {
            $.ajax({
                url: "?mod=cate&controller=cateLevel_1&action=chooseCateHighlight",
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


// ########## ========== HANDLE CATE PRODUCT ========== ########## //
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
            "level": parseInt(dataConfig['wrapperDataNumStatus'].attr('data-level'))
        }
        $.ajax({
            url: "?mod=cate&action=getNumDataOfStatus",
            method: "POST",
            data: { level: spaceAppenData['level'] },
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
            console.log(this);
            let statusOld = $(this).attr('data-status-old');
            let idCate = parseInt($(this).parents('tr[data-prod-cate-id]').attr('data-prod-cate-id'));
            changeStatus(statusOld, null, idCate, 'restore');
            event.preventDefault();
        });
    }

    function changeStatusProd() {
        let listBtnChange = $(".switch.status .btn-change-status");
        listBtnChange.click(function() {
            let statusCurrent = $(this).attr("data-status");
            statusCurrent = statusCurrent === 'publish' ? 'pending' : 'publish';
            let idCate = parseInt($(this).parents('tr[data-prod-cate-id]').attr('data-prod-cate-id'));
            changeStatus(statusCurrent, null, idCate, 'change');
        });
    }

    function intoTrashProd() {
        let listBtnTrash = $("section.main-table .operation-list-setting button[data-action='trash']");
        listBtnTrash.click(function() {
            let statusCurrent = 'trash';
            let statusOld = $(this).parents('tr[data-prod-cate-id]').find('.__status__').attr('data-status');
            let idCate = parseInt($(this).parents('tr[data-prod-cate-id]').attr('data-prod-cate-id'));
            changeStatus(statusCurrent, statusOld, idCate, 'trash');
        });
    }

    function deleteProd() {
        let listBtnDelete = $("section.main-table .operation-list-setting button[data-action='delete']");
        listBtnDelete.click(function() {
            if (confirm('Sẽ không thể khôi phục danh mục này')) {
                let idCate = parseInt($(this).parents('tr[data-prod-cate-id]').attr('data-prod-cate-id'));
                $.ajax({
                    url: "?mod=cate&action=deleteCateProd",
                    method: "POST",
                    data: { idCate: idCate },
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

    function changeStatus(statusCurrent, statusOld, idEl, actions) {
        $.ajax({
            url: "?mod=cate&action=changeStatus",
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
                        let spaceAppendStatus = $("section.main-table table.table-wrap tr[data-prod-cate-id=" + (idEl) + "] .__status__");
                        let spaceAppendStatusBtn = $("section.main-table table.table-wrap tr[data-prod-cate-id=" + (idEl) + "] .btn-change-status");
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
            event.preventDefault();
            $.ajax({
                url: "?mod=cate&controller=cateLevel_1&action=setUrlSearchCateProd",
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
            let level = parseInt($(this).attr('data-level'));
            handleSearch(strSearch, level);
        });


        function handleSearch(strSearch, level) {
            $.ajax({
                url: "?mod=cate&action=recommentSearch",
                method: "GET",
                data: { strSearch: strSearch, level: level },
                dataType: "json",
                success: (data) => {
                    if (data['searchResult'].length > 0) {
                        formRecommentSearch.stop().fadeIn(300);
                        handleAppendRecommentSearch(data['searchResult'], level);
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

        function handleAppendRecommentSearch(data, level) {
            let url = undefined;
            if (level === 1) {
                url = "?mod=cate&controller=cateLevel_1&action=update&id=";
            } else {
                url = "?mod=cate&controller=cateLevel_2&action=update&id=";
            }
            let __html = ``;
            let spaceAppendDataRecommentSearch = $(".form-search-action .search-recomment");
            let base_url = spaceAppendDataRecommentSearch.attr('data-baseurl');
            for (let i = 0; i < data.length; i++) {
                __html += `
                <div class="search-vl-item">
                    <div class="img-wrap">
                        <span class="thumbNail">
                            <img src="${data[i]['img_banner']}" alt="">
                        </span>
                    </div>
                    <div class="info-wrap">
                        <span class="name">${data[i]['title_cate']}</span>
                        <div class="action d-flex">
                            <a href="${base_url + url + data[i]['id_cate']}" class="act-item update">Update</a>
                            <a href="" class="act-item keyword">Chọn từ khóa</a>
                        </div>
                    </div>
                </div>`
            }
            spaceAppendDataRecommentSearch.html(__html);
        }
    }
});