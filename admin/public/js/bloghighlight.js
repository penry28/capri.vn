$(function() {
    let selectBlog_1 = $("#headline-blog-1");
    let selectBlog_2 = $("#headline-blog-2");

    handleSelectBlog_1();
    handleSelectBlog_2();

    function handleSelectBlog_1() {
        selectBlog_1.change(function() {
            let idBlog = parseInt($(this).val());
            let spaceAppend = $("#img-thumbNail-inner-1");
            let spaceInput = $("#inp-thumbNail-inner-1");
            getBlogItemById(idBlog, spaceAppend, spaceInput);
        });
    }

    function handleSelectBlog_2() {
        selectBlog_2.change(function() {
            let idBlog = parseInt($(this).val());
            let spaceAppend = $("#img-thumbNail-inner-2");
            let spaceInput = $("#inp-thumbNail-inner-2");
            getBlogItemById(idBlog, spaceAppend, spaceInput);
        });
    }

    function getBlogItemById(idBlog, spaceAppend, spaceInput) {
        $.ajax({
            url: "?mod=bloghighlight&action=getBlogItemById",
            method: "POST",
            data: { idBlog: idBlog },
            dataType: "json",
            success: (data) => {
                spaceAppend.attr('src', data.blogItem['blog_img']);
                spaceInput.attr('value', data.blogItem['blog_img']);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    }
});