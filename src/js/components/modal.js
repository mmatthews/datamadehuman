const modal = {
    
    current_modal: null,

    init: () => {
        modal.bindEvents();
    },

    openModal: (target) => {
        modal.current_modal = document.getElementById(target);
        modal.current_modal.classList.add('open')
        modal.lockBody()
    },
    
    closeModal: () => {
        modal.current_modal.classList.remove('open')        
        modal.unlockBody()
        //modal.stopVideo()
    },

    stopVideo: () => {
        if(modal_videos.current_video || modal_videos.yt_player){
            window.setTimeout(function(){
                videos.stopVideo()
            }, 1000)
        }
    },

    lockBody: () => {
        document.documentElement.classList.add('locked');
    },

    unlockBody: () => {
        document.documentElement.classList.remove('locked');
    },

    bindEvents: () => {
        /*
        let open_buttons = document.querySelectorAll('[modal-open]')
        open_buttons.forEach(button => {
            button.addEventListener('click', function(e){
                let target = button.getAttribute('modal');
                modal.openModal(target)
                console.log(target)
                // GTM
                //if(target == 'register') dataLayer.push({'event': 'registerOpen'});
            })
        })
        */

        document.querySelectorAll('a[href="#modal-contact"]').forEach(button => {
            button.addEventListener('click', e => {
                modal.openModal('register')
            })
        })

        document.querySelectorAll('a[href="#modal-terms"]').forEach(button => {
            button.addEventListener('click', e => {
                modal.openModal('terms')
            })
        })
        
        document.querySelectorAll('a[href="#modal-privacy"]').forEach(button => {
            button.addEventListener('click', e => {
                modal.openModal('privacy')
            })
        })        

        let close_buttons = document.querySelectorAll('[modal-close]')
        close_buttons.forEach(button => {
            button.addEventListener('click', function(e){
                modal.closeModal()
            })
        })

        let modal_bg = document.querySelectorAll('.modal--bg');
        modal_bg.forEach(bg => {
            bg.addEventListener('click', function(e){
                modal.closeModal()
            })
        })

        // Close modal with ESC
        document.onkeyup = function(evt) {
            evt = evt || window.event;
            var isEscape = false;
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc");
            } else {
                isEscape = (evt.keyCode === 27);
            }
            if (isEscape) {
                modal.closeModal()
            }
        };        
    }
}

document.addEventListener('DOMContentLoaded', function(e){
    modal.init();
})