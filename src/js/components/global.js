const global = {

    init: () => {
        global.bindEvents();
        global.parallax();
        global.scroller();
    },


    bindEvents: () => {

        document.querySelectorAll('[expand]').forEach(expand => {
            expand.addEventListener('click', e => {
                expand.closest('.expandable').classList.toggle('active')
            })
        })
    },

    parallax: () => {
        var image = document.getElementsByClassName('parallax');
        new simpleParallax(image, {
            //customWrapper: document.getElementById('header'),
        });        
    },

    scroller: () => {
        // instantiate the scrollama
        const scroller = scrollama();

        // setup the instance, pass callback functions
        scroller
        .setup({
            step: ".section",
            offset: 0.2
        })
        .onStepEnter(response => {
            // { element, index, direction }
            console.log(response.index)
            if(response.index == 3){
                document.querySelector('.who.section').classList.add('animate')
            }
        })
        .onStepExit(response => {
            // { element, index, direction }
            document.querySelector('.who.section').classList.remove('animate')            
        });

        // setup resize event
        window.addEventListener("resize", scroller.resize);        
    }
}

document.addEventListener('DOMContentLoaded', function (e) {
    global.init();
})