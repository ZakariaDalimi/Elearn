$(document).ready(function () {
    $('.counter').counterUp({
        delay : 10,
        time: 1000
    }) 

    $('.about-area .owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 8000,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            560: {
                items: 2
            }
        }
    })

    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover:false,
        responsive: [{
            breakpoint: 99,
            setting: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 768,
            setting: {
                slidesToShow: 2
            }
        }]
    });
});