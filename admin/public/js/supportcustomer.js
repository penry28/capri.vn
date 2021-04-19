$(function() {

    let dataConfig = {
        "wrapperDataNumStatus": $(".select-section .select-status")
    };

    __construct();

    function __construct() {
        activeElOptionStatusByStatus();
        loadDataNumStatus();
        restoreStatus();
        changeStatusSupportCustomer();
        intoTrashSupportCustomer();
        deleteSupportCustomer();
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
            "news": dataConfig['wrapperDataNumStatus'].find('.news .value'),
            "seen": dataConfig['wrapperDataNumStatus'].find('.seen .value'),
            "trash": dataConfig['wrapperDataNumStatus'].find('.trash .value'),
        }

        $.ajax({
            url: "?mod=support&action=getNumDataOfStatus",
            method: "POST",
            dataType: "json",
            success: (data) => {
                spaceAppenData['all'].text(data['all']);
                spaceAppenData['news'].text(data['news']);
                spaceAppenData['seen'].text(data['seen']);
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
            let idSupport = parseInt($(this).parents('tr[data-id-support]').attr('data-id-support'));
            changeStatus(statusOld, null, idSupport, 'restore');
        });
    }

    function changeStatusSupportCustomer() {
        let listBtnChange = $(".switch.status .btn-change-status");
        listBtnChange.click(function() {
            let statusCurrent = $(this).attr("data-status");
            statusCurrent = statusCurrent === 'news' ? 'seen' : 'news';
            let idSupport = parseInt($(this).parents('tr[data-id-support]').attr('data-id-support'));
            changeStatus(statusCurrent, null, idSupport, 'change');
        });
    }

    function intoTrashSupportCustomer() {
        let listBtnTrash = $("section.main-table .operation-list-setting button[data-action='trash']");
        listBtnTrash.click(function() {
            let statusCurrent = 'trash';
            let statusOld = $(this).parents('tr[data-id-support]').find('.__status__').attr('data-status');
            let idSupport = parseInt($(this).parents('tr[data-id-support]').attr('data-id-support'));
            changeStatus(statusCurrent, statusOld, idSupport, 'trash');
        });
    }

    function changeStatus(statusCurrent, statusOld, idEl, actions) {
        $.ajax({
            url: "?mod=support&action=changeStatus",
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
                        let spaceAppendStatus = $("section.main-table table.table-wrap tr[data-id-support=" + (idEl) + "] .__status__");
                        let spaceAppendStatusBtn = $("section.main-table table.table-wrap tr[data-id-support=" + (idEl) + "] .btn-change-status");
                        if (statusCurrent === 'news') {
                            spaceAppendStatus.attr("data-status", "news");
                            spaceAppendStatus.text('Đã đọc');
                            spaceAppendStatusBtn.attr('data-active', 'off');
                            spaceAppendStatusBtn.attr('data-status', 'news');
                        } else {
                            spaceAppendStatus.attr("data-status", "seen");
                            spaceAppendStatus.text('Đã xem');
                            spaceAppendStatusBtn.attr('data-active', 'on');
                            spaceAppendStatusBtn.attr('data-status', 'seen');
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

    function deleteSupportCustomer() {
        let listBtnDelete = $("section.main-table .operation-list-setting button[data-action='delete']");
        listBtnDelete.click(function() {
            if (confirm('Sẽ không thể khôi phục thông tin hỗ trợ này')) {
                let idSupport = parseInt($(this).parents('tr[data-id-support]').attr('data-id-support'));
                $.ajax({
                    url: "?mod=support&action=deleteSupportCustomer",
                    method: "POST",
                    data: { idSupport: idSupport },
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
                url: "?mod=support&action=recommentSearch",
                method: "GET",
                data: { strSearch: strSearch },
                dataType: "json",
                success: (data) => {
                    console.log(data);
                    if (data['rearchResult'].length > 0) {
                        formRecommentSearch.stop().fadeIn(300);
                        handleAppendRecommentSearch(data['rearchResult']);
                        if (data['rearchResult'].length <= 3) {
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
                    <div class="info-wrap">
                        <span class="name">${data[i]['phone']}</span>
                        <span class="">${data[i]['fullname']}</span>
                        <span class="">${formatTypeSupportCustomer(data[i]['type'])}</span>
                        <div class="action d-flex">
                            <a href="${base_url + '?mod=support&action=info&id=' + data[i]['support_id']}" class="act-item update">Xem chi tiết</a>
                            <a href="" class="act-item keyword">Chọn từ khóa</a>
                        </div>
                    </div>
                </div>`
            }
            spaceAppendDataRecommentSearch.html(__html);
        }

        function formatTypeSupportCustomer(typeEn) {
            let typeVi = {
                "product": "Sản phẩm",
                "service": "Dịch vụ",
                "feedback": "Phản hồi",
                "other": "Khác"
            };
            return typeVi[typeEn];
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
                url: "?mod=support&action=setUrlSearchSupport",
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