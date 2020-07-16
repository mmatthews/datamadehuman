document.addEventListener("DOMContentLoaded", function () {


    let sliders = []
    let slider_els = document.querySelectorAll('.swiper-container');

    slider_els.forEach(function (slider_el) {

        //console.log('slider initted')

        let numslides = slider_el.querySelectorAll('.swiper-slide').length;
        let next = slider_el.parentNode.querySelector('.swiper-next')
        let prev = slider_el.parentNode.querySelector('.swiper-prev')

        //console.log(next) 

        if (numslides > 1) {
            let slider = new Swiper(slider_el, {
                speed: 400,
                autoplay: {
                    delay: 15000,
                },
                loop: true,
                //centeredSlides: true,
                navigation: {
                    nextEl: next,
                    prevEl: prev,
                },
                slideToClickedSlide: true,
                slidesPerView: 2,
                spaceBetween: 16,
                breakpoints: {
                    480: {
                        slidesPerView:3,
                        spaceBetween: 16
                    },
                    // when window width is >= 640px
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 16
                    },
                    1028: {
                        slidesPerView: 5,
                        spaceBetween: 16
                    }                    
                },                    
                //effect: 'fade',
                //fadeEffect: {
                //crossFade: true
                //},
            });

            sliders.push(slider)
        }

    })

});


