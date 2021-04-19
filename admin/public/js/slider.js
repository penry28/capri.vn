//===== ##### ===== handle toggle popup modal ===== ##### =====//

$(function() {
    let btnOpenModalListSlide = $(".view-info-list-slide");
    let modalListSlide = $("#info-slide");
    let btnSloseModalListSlide = $(".close-modal-slide");
    btnOpenModalListSlide.click(function() {
        modalListSlide.addClass('open');
    });
    btnSloseModalListSlide.click(function() {
        modalListSlide.removeClass('open');
    });
});

//===== ##### ===== handle upload images ===== ##### =====//

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
            url: "?mod=slider&action=uploadImgslide",
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


    getTotalCategoryLevel(1);

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

//===== ##### ===== handle check exists number slide ===== ##### =====//
$(function() {
    let inputElCheck = $("#slide-number");
    inputElCheck.keyup(function() {
        let num_vl = parseInt($(this).val());
        if (!isNaN(num_vl)) {
            checkExistsSlideNum(num_vl);
        }
    });

    function checkExistsSlideNum(num_vl) {
        $.ajax({
            url: "?mod=slider&action=checkExistsSlideNum",
            method: "POST",
            data: { num_vl: num_vl },
            dataType: "json",
            success: (data) => {
                if (data.status === 'error') {
                    $("#slide-number ~ .error").text('Số thứ tự này đã tồn tại');
                } else {
                    $("#slide-number ~ .error").text('');
                }
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }
});