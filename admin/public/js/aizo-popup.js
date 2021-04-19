// ==========########## AIZO POPUP ##########========== //
// ----------===== toggle popup element  ====-----------//
togglePopupModalGlobal();

function togglePopupModalGlobal() {
    let btnListOpen = document.querySelectorAll('[data-toggle-modal]');
    let btnListClose = document.querySelectorAll('[data-close-modal]');
    let classToggle = 'open';
    btnListOpen.forEach(nodeBtn => {
        nodeBtn.addEventListener('click', function() {
            event.preventDefault();
            let valueToggleModal = this.getAttribute('data-toggle-modal');
            let modalName = document.querySelector(valueToggleModal);
            modalName.classList.add(classToggle);
        });
    });
    btnListClose.forEach(nodeBtn => {
        nodeBtn.addEventListener('click', function() {
            event.preventDefault();
            let valueToggleModal = this.getAttribute('data-close-modal');
            let modalName = document.querySelector(valueToggleModal);
            modalName.classList.remove(classToggle);
        });
    });
}
// ----------===== popup message comment =====----------//
// popupFastMessageComment();
// popupEditFastMessageComment();
// popupOpenFullImageComment();
// clearClassOpenAuthorTop();


function clearClassOpenAuthorTop() {
    let btn = document.querySelectorAll(".right-act-aizo ul.list li a.item");
    btn.forEach(nodeBtn => {
        nodeBtn.addEventListener('click', function() {
            event.preventDefault();
            clearClass();
            this.classList.add('open');
        });
    });

    function clearClass() {
        for (let i = 0; i < btn.length; i++) {
            btn[i].classList.remove('open');
        }
    }
}

function popupFastMessageComment() {
    let btnOpen = document.getElementById("buttonOpen-fastMessage");
    let popupModal = document.getElementById("fast-message-recomment");
    btnOpen.addEventListener('click', () => {
        if (popupModal.classList.contains('open')) {
            popupModal.classList.remove('open');
        } else {
            popupModal.classList.add('open');
        }
    });
}

function popupEditFastMessageComment() {
    let btnOpen = document.getElementById("buttonEdit-fastMessage");
    let popupModal = document.getElementById("table-edit-fast-message");
    let btnClose = document.getElementById("cancel-edit-modal-act");
    btnOpen.addEventListener('click', () => {
        if (popupModal.classList.contains('open')) {
            if (confirm('Bạn thực sự muốn hủy bỏ thay đổi này')) {
                popupModal.classList.remove('open');
            }
        } else {
            popupModal.classList.add('open');
        }
    });
    btnClose.addEventListener('click', () => {
        if (confirm('Bạn thực sự muốn hủy bỏ thay đổi này')) {
            popupModal.classList.remove('open');
        }
    });
}

function popupOpenFullImageComment() {
    let btnImg = document.querySelectorAll("[data-img-comment]");
    let srcImgAppend = document.getElementById("srcImgAppend-full-img");
    let popupModal = document.getElementById("show-full-img");
    let btnClose = document.getElementById("btn-close-show-full-img");
    btnImg.forEach(nodeBtn => {
        nodeBtn.addEventListener('click', function(e) {
            let srcImg = e.target.getAttribute('src');
            srcImgAppend.setAttribute('src', srcImg);
            popupModal.classList.add('open');
        });
    });
    btnClose.addEventListener('click', () => {
        popupModal.classList.remove('open');
    });
}

function functionNotFunction() {
    alert('Chức năng này hiện tại chưa nghĩ ra nên làm gì');
}