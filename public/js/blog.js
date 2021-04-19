$(function() {
    let btnLove = $(".blog-analysis .action .love");
    let idBlog = btnLove.attr('data-id-blog');
    checkLocalStoreLove(idBlog);
    btnLove.click(function() {
        event.preventDefault();
        let idBlog = $(this).attr('data-id-blog');
        if (!checkLocalStoreLove(idBlog)) {
            saveLocalStoreLove(idBlog);
            changeStatusLove('true');
            deleteLocalStoreUnLove(idBlog);
            handleNumStatusAjax(idBlog, 'plus');
        } else {
            if (!checkLocalStoreUnLove(idBlog)) {
                saveLocalStoreUnLove(idBlog);
                deleteLocalStoreLove(idBlog);
                handleNumStatusAjax(idBlog, 'minus');
            }
        }
    });

    // check local store love and unlove
    function checkLocalStoreLove(idBlog) {
        let strLocal = "loveBlog_" + idBlog;
        let localBlogid = localStorage.getItem(strLocal);
        if (localBlogid === null) {
            changeStatusLove('false');
            return false;
        } else {
            changeStatusLove('true');
            return true;
        }
    }

    function checkLocalStoreUnLove(idBlog) {
        let strLocal = "UnloveBlog_" + idBlog;
        let localBlogid = localStorage.getItem(strLocal);
        if (localBlogid === null) {
            changeStatusLove('false');
            return false;
        } else {
            changeStatusLove('true');
            return true;
        }
    }

    // save local store love and Unlove
    function saveLocalStoreLove(idBlog) {
        let strLocal = "loveBlog_" + idBlog;
        localStorage.setItem(strLocal, idBlog);
    }

    function saveLocalStoreUnLove(idBlog) {
        let strLocal = "UnloveBlog_" + idBlog;
        localStorage.setItem(strLocal, idBlog);
    }

    function changeStatusLove(status) {
        btnLove.attr('data-status-love', status);
    }

    // delete local store love and unLove
    function deleteLocalStoreLove(idBlog) {
        let strLocal = "loveBlog_" + idBlog;
        localStorage.removeItem(strLocal);
    }

    function deleteLocalStoreUnLove(idBlog) {
        let strLocal = "UnloveBlog_" + idBlog;
        localStorage.removeItem(strLocal);
    }

    // handle num love ajax
    function handleNumStatusAjax(idBlog, action) {
        $.ajax({
            url: "?mod=blog&action=handleNumLove",
            method: "POST",
            data: { idBlog: idBlog, action: action },
            dataType: "json",
            success: (data) => {
                if (data.status === 'success') {
                    let spaceAppendNumLove = $(".blog-analysis .action .love .love-value");
                    spaceAppendNumLove.text(data.numLove);
                } else {
                    alert("Chức năng này hiện tại đang trong quá trình hoàn thiện, xin quý khách thông cảm, xin cảm ơn .!");
                }
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        })
    }
});