// choose favicon img
$(function() {
    let btnFavicon = $("#image-banner-favicon");
    let btnBannerDesc = $("#image-banner-desc");
    btnFavicon.change(function() {
        let spaceAppendImg = $("#favicon-inner");
        let url = "?mod=system&action=uploadImage";
        let spaceAppendSrcImg = $("#favicon-inner-url");
        showPreview(this, spaceAppendImg, url, spaceAppendSrcImg);
    });
    btnBannerDesc.change(function() {
        let spaceAppendImg = $("#banner_desc-inner");
        let url = "?mod=system&action=uploadImage";
        let spaceAppendSrcImg = $("#banner_desc-inner-url");
        showPreview(this, spaceAppendImg, url, spaceAppendSrcImg);
    });

    function showPreview(objFileInput, __spaceAppendImg, url, spaceAppendSrcImg) {
        if (objFileInput.files[0]) {
            if (checkExtenFile(objFileInput.files[0])) {
                if (fileSize(objFileInput.files[0])) {
                    let fileReader = new FileReader();
                    let spaceAppendImg = __spaceAppendImg;
                    let formData = new FormData();
                    formData.append('file', objFileInput.files[0]);
                    fileReader.onload = function(e) {
                        let srcImg = objFileInput.files[0].name;
                        spaceAppendImg.attr('src', e.target.result);
                        appendImgURLtoInputHidden(formData, url, spaceAppendSrcImg);
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

    function appendImgURLtoInputHidden(formData, url, __spaceAppendSrcImg) {
        console.log(formData);
        console.log(url);
        console.log(__spaceAppendSrcImg);
        $.ajax({
            url: url,
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: data => {
                if (data.status === 'success') {
                    let spaceAppendSrcImg = __spaceAppendSrcImg;
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