loadStar();

function loadStar() {
    let starEl = document.querySelectorAll('[data-num-star]');
    starEl.forEach(el => {
        let numStar = el.getAttribute('data-num-star');
        appendStar(el, numStar);
    });

    function appendStar(el, numStar) {
        let __html_star = loadHTMLStar(numStar);
        el.innerHTML = __html_star;
    }

    function loadHTMLStar(numStar) {
        numStar = parseFloat(numStar);
        switch (numStar) {
            case 5:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    `;
                }
            case 4.5:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    `;
                }
            case 4:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    `;
                }
            case 3.5:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    `;
                }
            case 3:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    `;
                }
            case 2.5:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    `;
                }
            case 2:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    `;
                }
            case 1.5:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    `;
                }
            case 1:
                {
                    return `
                    <i class="fa fa-star" aria-hidden="true"></i>
                    `;
                }
        }
    }
}

$(function() {
    checkStatusProd();

    function checkStatusProd() {
        let numProd = parseInt($("input[name='amount']").attr('max'));
        let imgStatus = '';
        let textStatus = '';
        if (numProd > 0) {
            imgStatus = './public/images/logo-icon/Cart-Y.png';
            textStatus = 'C??n h??ng';
        } else {
            imgStatus = './public/images/logo-icon/close-icon.png';
            textStatus = 'H???t h??ng';
        }
        let spaceAppendIMG = $("#statusProd img");
        let spaceAppendtext = $("#statusProd .text-space");
        spaceAppendIMG.attr('src', imgStatus);
        spaceAppendtext.text(textStatus);
    }
})