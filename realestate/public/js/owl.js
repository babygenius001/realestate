$(document).ready(function () {
    $('#owl__header').owlCarousel({
        dots: false,
        loop:true,
        margin:10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $('#owl__news').owlCarousel({
        dots: false,
        loop: true,
        margin: 0,
        nav: false,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive:{
            0:{
                items: 1
            },
            500:{
                items: 2
            },
            600:{
                items: 3
            },
            1000:{
                items: 4
            }
        }
    })
    $('#owl__brand').owlCarousel({
        dots: false,
        loop: true,
        margin: 0,
        nav: false,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive:{
            0:{
                items: 2
            },
            500:{
                items: 3
            },
            600:{
                items: 4
            },
            1000:{
                items: 5
            }
        }
    })

});