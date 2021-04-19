$(function() {
    let btnOpenPopupVideo = $("section.space-video-intro .video-wrap .control button[type=button]");
    let btnClosePopupVideo = $("[data-close-popup='#modal-video']");
    let popupVideo = $("#modal-video");
    btnOpenPopupVideo.click(function() {
        event.preventDefault();
        popupVideo.toggleClass('open');
    });
    btnClosePopupVideo.click(function() {
        event.preventDefault();
        popupVideo.removeClass('open');
        stopVideo();
    });

    function stopVideo() {
        console.log('stop video');
        let iframeVideo = $("#video-popup");
        iframeVideo.stopVideo();
    }
});