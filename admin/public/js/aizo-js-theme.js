class AizoJsApp {
    constructor() {
        this.handleMenuSidebar();
    }
    handleMenuSidebar() {
        this.handleToggleClassActiveMenu();
        this.checkActiveMenu();
    }

    checkActiveMenu() {
        let listMenuItem = document.querySelectorAll('.mCS_container ul.dtl-menu > li');
        listMenuItem.forEach(nodeItem => {
            if (nodeItem.classList.contains('active')) {
                nodeItem.children[1].classList.add('in');
            } else {
                nodeItem.children[1].classList.remove('in');
                nodeItem.setAttribute('style', '');
            }
        });
    }

    handleToggleClassActiveMenu() {
        let listMenuItem = document.querySelectorAll('.mCS_container ul.dtl-menu > li');
        listMenuItem.forEach(nodeItem => {
            nodeItem.children[0].addEventListener('click', () => {
                console.log('click');
                if (nodeItem.classList.contains('active')) {
                    nodeItem.classList.remove('active');
                } else {
                    nodeItem.classList.add('active');
                }
                this.checkActiveMenu();
                event.preventDefault();
            });
        });
    }
}

var app = new AizoJsApp();