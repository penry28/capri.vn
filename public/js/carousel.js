// carousel
$(function() {
    carousel('.box-slider-prod-wrap .owl-carousel', 1);
    carousel('.category-slider-owlCarousel', 1);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        })
    }
});
// category slider prod
$(function() {
    carousel('.carousel-slider .owl-carousel', 1);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        })
    }
});
// category slider prod
$(function() {
    carousel('.blog-carouse-slider .owl-carousel', 5);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                414: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: mainItem
                }
            }
        })
    }
});
// category slider prod
$(function() {
    carousel('.slider-cate-prod', 6);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 5
                },
                1200: {
                    items: mainItem
                }
            }
        })
    }
});

// category product relative
$(function() {
    carousel('.prod-rela-carousel .owl-carousel', 5);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: mainItem
                }
            }
        })
    }
});

// category banner alider
$(function() {
    carousel('.carousel-category-slider-wrap .owl-carousel', 1);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
            }
        })
    }
});

// product category slider
$(function() {
    carousel('.carousel-product-by-category .owl-carousel', 4);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1000: {
                    items: mainItem - 1
                },
                1200: {
                    items: mainItem
                }
            }
        })
    }
});


// product typical slider
$(function() {
    carousel('.carousel-product-by-typical .owl-carousel', 5);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1000: {
                    items: mainItem - 1
                },
                1200: {
                    items: mainItem
                }
            }
        })
    }
});


// cate prod slider choose
$(function() {
    carousel('.box-action-filter-prod .list-action-item', 3);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        })
    }
});

// product by site all cate
$(function() {
    carousel('.carousel-product-by-all-cate .owl-carousel', 4);

    function carousel(carouselName, mainItem) {
        let carousel = $(carouselName)
        $(carousel).owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: mainItem
                }
            }
        })
    }
});