// slider banner
$(function() {
    let indexSlideInCurrent = $(".banner-slider-fullWidth .slide-item.slide-in").index();
    let listSlides = $(".banner-slider-fullWidth .slide-item");
    let lengthSlides = listSlides.length;

    function slideIn(_n) {
        _n.classList.add('slide-in');
    }

    function slideOut(_n) {
        _n.classList.add('slide-out');
    }

    function slideAction(index) {
        resetSlide();
        slideOut(listSlides[index]);
        indexSlideInCurrent++;
        if (indexSlideInCurrent > lengthSlides - 1) {
            indexSlideInCurrent = 0;
        }
        index = indexSlideInCurrent;
        slideIn(listSlides[index]);
    }

    function slideInit() {
        setTimeout(() => {
            slideAction(indexSlideInCurrent);
            slideInit();
        }, 4000);
    }

    function resetSlide() {
        for (let i = 0; i < listSlides.length; i++) {
            listSlides[i].classList.remove('slide-in');
            listSlides[i].classList.remove('slide-out');
        }
    }
    slideInit();
});

// =========########### HEADER ##########==========//
$(function() {
    menuReponMobile();
    menuReponChildOpenSubMenu();

    function menuReponMobile() {
        let btnOpen = $("#btnOpen-menu-respon");
        let menuRespon = $("#capri-app");
        btnOpen.click(function() {
            event.preventDefault();
            menuRespon.toggleClass('open-res');
        });
    }

    function menuReponChildOpenSubMenu() {
        let btnOpen = $(".menu-mobile-list .list-menu li a.has-menu-child");
        btnOpen.click(function() {
            event.preventDefault();
            $(this).parent().toggleClass('open');
        });
    }
});

$(function() {
    modalToggle();
    scrollPosition();
    chooseAmountProd();

    function modalToggle() {
        let modalOpenButtom = $("[data-modal-open]");
        let modalCloseButton = $("[data-modal-close]");
        modalOpenButtom.click(function(e) {
            event.preventDefault();
            let idEl = $(this).attr('data-modal-open');
            $(idEl).addClass('open');
            $("body").attr('style', 'height: 100vh; overflow: hidden;');
        });
        modalCloseButton.click(function(e) {
            event.preventDefault();
            let idEl = $(this).attr('data-modal-close');
            $(idEl).removeClass('open');
            $("body").removeAttr('style');
        });
    }

    function scrollPosition() {
        let scrollButton = $("[data-scroll-button]");
        scrollButton.click(function() {
            event.preventDefault();
            let idEl = $(this).attr('data-scroll-button');
            let offsetTop = $(idEl).offset().top;
            $("html, body").animate({
                scrollTop: offsetTop - 100
            }, 1500);
        })
    }

    function chooseAmountProd() {
        let btnPlus = $(".amout-wrap button[data-button='plus']");
        let btnMinus = $(".amout-wrap button[data-button='minus']");
        let maxAmount = parseInt($(".amout-wrap #amount").attr('max'));
        let amountIpEl = $(".amout-wrap #amount");
        amoutCurr = amountIpEl.val();
        btnPlus.click(function() {
            amoutCurr++;
            if (amoutCurr <= maxAmount) {
                amountIpEl.val(amoutCurr);
            } else {
                alert('Chỉ còn ' + (maxAmount) + ' sản phẩm trong kho của Capri');
            }
        });
        btnMinus.click(function() {
            amoutCurr--;
            if (amoutCurr >= 1) {
                amountIpEl.val(amoutCurr);
            } else {
                alert('Số sản phẩm phải lớn hơn 1');
            }
        });
    }
})


// toggle form search

$(function() {
    let btnOpenFormSearch = $(".header-bottom .act-user ul.list-act li a.act-item.search");
    let btnCloseFormSearch = $(".form-search-wrap .form-mask");
    let formSearchEl = $(".form-search-wrap");
    btnOpenFormSearch.click(function() {
        event.preventDefault();
        formSearchEl.toggleClass('open');
    });
    btnCloseFormSearch.click(function() {
        formSearchEl.removeClass('open');
    });
});

// search handle
$(function() {
    var search = {
        wrapper: "body",
        formSearch: "form.form-search-main",
        inputSearch: "input#str-search[name='strSearch']",
    }
    $(search.wrapper).delegate(search.formSearch, 'submit', function() {
        let strSearch = $(search.inputSearch).val();
        $.ajax({
            url: "?mod=search&action=getURL",
            method: "GET",
            data: { strSearch: strSearch },
            dataType: "text",
            success: (data) => {
                window.location.replace(data);
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        })
        event.preventDefault();
    });
});

// search recomment
$(function() {
    let inputEl = $(".form-search-wrap .form-inner #str-search");
    let spaceAppend = $(".search-recomment");
    let maskForm = $(".form-search-wrap .form-mask");
    maskForm.click(function() {
        spaceAppend.removeClass('open');
    });
    inputEl.keyup(function() {
        let strSearch = $(this).val();
        $.ajax({
            url: "?mod=search&action=recommentSearch",
            method: "GET",
            data: { strSearch: strSearch },
            dataType: "json",
            success: (data) => {
                if (data.length > 0) {
                    handleAppendRecommentSearch(data);
                    if (data.length <= 3) {
                        spaceAppend.attr('style', 'height: auto;');
                    } else {
                        spaceAppend.attr('style', 'height: 300px;');
                    }
                } else {
                    let __html = "<p style='padding: 15px; color: #333;'>Không có sản phẩm nào</p>";
                    spaceAppend.attr('style', 'height: auto;');
                    spaceAppend.addClass('open');
                    spaceAppend.html(__html);
                }
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    function handleAppendRecommentSearch(data) {
        $(".search-recomment").addClass('open');
        let base_url = $(spaceAppend).attr('data-base-url');
        let __html = `<ul class='list-recomment'>`;
        for (let i = 0; i < data.length; i++) {
            __html += `
            <li class="search-recomment-item d-flex justify-between align-items-center">
                <div class="img">
                    <a href="${base_url + 'san-pham/'+(slug_title(data[i]['title_product']))+'-'+(data[i]['id_product'])+''}.html" class="thumbNail">
                        <img src="admin/${data[i]['avatar']}" alt="${data[i]['title_product']}">
                    </a>
                </div>
                <div class="name">
                    <a href="${base_url + 'san-pham/'+(slug_title(data[i]['title_product']))+'-'+(data[i]['id_product'])+''}.html" class="name-view">${data[i]['title_product']}</a>
                </div>
                <div class="cate">
                    <a href="${base_url + 'san-pham/'+(slug_title(data[i]['title_product']))+'-'+(data[i]['id_product'])+''}.html" class="cate-view">Xem thêm</a>
                </div>
            </li>
            `
        }
        __html += `</ul>`;
        spaceAppend.html(__html);
    }


    function slug_title(title) {
        slug = title.toLowerCase();
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        return slug;
    }
});


// handle menu
$(function() {
    let listBtnMenuHover = $("ul.list-menu .dropdown-menu .list-item-menu ul.list-wrap>li");
    listBtnMenuHover.hover(function() {
        console.log(this);
        $(this).find('.sub-menu-dd-sub').stop().fadeIn(200);
    }, function() {
        $(this).find('.sub-menu-dd-sub').stop().fadeOut(200);
    })
});

// handle send support
$(function() {
    let __FORM_EL__ = $("#formSendSupport");
    __FORM_EL__.submit(function() {
        event.preventDefault();
        let fullname_vl = (__FORM_EL__.find("input[name='fullname']")).val();
        let email_vl = (__FORM_EL__.find("input[name='email']")).val();
        let phone_vl = (__FORM_EL__.find("input[name='phone']")).val();
        let address_vl = (__FORM_EL__.find("input[name='address']")).val();
        let type_vl = (__FORM_EL__.find("select[name='type_mess']")).val();
        let content_vl = (__FORM_EL__.find("textarea[name='content']")).val();
        let fullname_er = __FORM_EL__.find(".fullname_er");
        let email_er = __FORM_EL__.find(".email_er");
        let phone_er = __FORM_EL__.find(".phone_er");
        let address_er = __FORM_EL__.find(".address_er");
        let type_er = __FORM_EL__.find(".type_er");
        let error = [];
        let error_status = true;
        // check fullname
        if (fullname_vl.length === 0) {
            fullname_er.text('Vui lòng nhập họ và tên');
            error_status = true;
        } else {
            fullname_er.text(null);
            error_status = false;
        }
        // check email
        if (email_vl.length === 0) {
            email_vl = null;
            email_er.text(null);
        } else {
            if (!checkEmail(email_vl)) {
                email_er.text('Email không hợp lệ');
                error_status = true;
            } else {
                email_er.text(null);
                error_status = false;
            }
        }
        // check phone
        if (phone_vl.length === 0) {
            phone_er.text('Vui lòng nhập số điện thoại');
            error_status = true;
        } else {
            if (!checkPhone(phone_vl)) {
                phone_er.text('Số điện thoại không đúng định dạng');
                error_status = true;
            } else {
                phone_er.text(null);
                error_status = false;
            }
        }

        // check address
        if (address_vl.length === 0) {
            address_er.text('Vui lòng nhập địa chỉ');
            error_status = true;
        } else {
            address_er.text(null);
            error_status = false;
        }

        // check type
        if (type_vl.length === 0) {
            type_er.text('Vui lòng chọn kiểu tư vấn');
            error_status = true;
        } else {
            type_er.text(null);
            error_status = false;
        }

        if (content_vl.length === 0) {
            content_vl = null;
        }

        if (!error_status && checkPhone(phone_vl)) {
            let dataInfoSupport = {
                "fullname": fullname_vl,
                "email": email_vl,
                "phone": phone_vl,
                "address": address_vl,
                "type": type_vl,
                "content": content_vl
            };
            $.ajax({
                url: "?mod=home&action=sendSupport",
                method: "POST",
                data: { dataInfoSupport },
                dataType: "json",
                beforeSend: () => {
                    $(".load-notification-status").addClass('open');
                    $(".load-notification-status .sending").addClass('open');
                },
                success: (data) => {
                    if (data.status === 'success') {
                        $(".load-notification-status .sending").removeClass('open');
                        $(".load-notification-status .sended").addClass('open');
                        setTimeout(function() {
                            $(".load-notification-status .sended").removeClass('open');
                            $(".load-notification-status").removeClass('open');
                        }, 2000);
                    } else {
                        setTimeout(function() {
                            alert('Hệ thống Capri đang gặp sự cố, bạn vui lòng gọi trực tiếp đến công ty Capri để được tư vấn giải đáp');
                        }, 10000);
                    }
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    });

    function checkEmail(email_vl) {
        let reg = /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/;
        if (reg.test(email_vl)) return true;
        return false;
    }

    function checkPhone(phone_vl) {
        if (phone_vl.length !== 10) {
            return false;
        } else {
            let numFirst = parseInt(phone_vl[0]);
            if (numFirst !== 0) {
                return false;
            }
        }
        return true;
    }
});