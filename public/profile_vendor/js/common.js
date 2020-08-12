$(document).ready(function () {

    $('.call-menu').click(function(){
        $('.menu-xs').addClass('menu-show');
    });
    $('.close-menu').on('click', function () {
        $('.menu-xs').removeClass('menu-show');
    });
    $('.call-video').click(function(){
        $('.modal-video').addClass('video-show');
    });
    $('.close-modal').click(function(){
        $('.modal-video').removeClass('video-show');
    });
    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
});







