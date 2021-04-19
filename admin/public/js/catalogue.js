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
            url: "?mod=catalogue&action=uploadImgBannerCatalogue",
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

// handle toggle modal choose catalogue publish

$(function() {
    let btnOpenModal = $(".view-action-add.choose-catalogue");
    let btnCloseModal = $("[data-close-modal-choose-catalogue]");
    let modalEl = $("#choose-catalogue");
    btnOpenModal.click(function() {
        modalEl.addClass('open');
    });
    btnCloseModal.click(function() {
        modalEl.removeClass('open');
    });
});

//handle save catalogue publus
$(function() {
    let formSubmit = $(".form-save-catalogue-publish");
    let radioInpCheckList = $(".cataloguePublish-check");
    formSubmit.submit(function() {
        let arrCheckRadioInp = [];
        for (let i = 0; i < radioInpCheckList.length; i++) {
            if (radioInpCheckList[i].checked) {
                let idCatalogue = $(radioInpCheckList[i]).val();
                arrCheckRadioInp.push(idCatalogue);
            }
        }
        if (arrCheckRadioInp.length === 0) {
            alert('Vui lòng chọn 1 catalogue');
        } else {
            $.ajax({
                url: "?mod=catalogue&action=chooseCataloguePublish",
                method: "POST",
                data: { idCatalogue: arrCheckRadioInp[0] },
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