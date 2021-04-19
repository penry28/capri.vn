$(document).ready(function() {
    let listBtnCateOption = $("section.space-top .box-action-filter-prod .list-action-item .action-item");
    let spaceCateSlide = $("[data-space-cate-append]");

    __construct()

    function __construct() {
        spaceCateSlide.stop().fadeOut(200);
        handleShowSpaceCate();
    }

    listBtnCateOption.click(function() {
        event.preventDefault();
        listBtnCateOption.removeClass('active');
        $(this).addClass('active');
        handleShowSpaceCate();
    });

    function handleShowSpaceCate() {
        console.log('ok');
        let activeOption = $("section.space-top .box-action-filter-prod .list-action-item .action-item.active").attr('data-space-cate-btn');
        console.log(activeOption);
        let spaceActive = undefined;
        for (let i = 0; i < spaceCateSlide.length; i++) {
            let idSpaceCate = $(spaceCateSlide[i]).attr('id');
            if (idSpaceCate === activeOption) {
                spaceActive = spaceCateSlide[i];
            }
        }
        spaceCateSlide.stop().fadeOut(200);
        $(spaceActive).stop().fadeIn(200);
    }
});