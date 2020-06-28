$(document).ready(function(){
    /*==========================*/
    /* Nav */
    /*==========================*/
    $('.nav-menu-icon a').on('click', function() {
        if ($('nav').hasClass('slide-menu')){
            $('nav').removeClass('slide-menu');
            $(this).removeClass('active');
        }else {
            $('nav').addClass('slide-menu');
            $(this).addClass('active');
        }
        return false;
    });
    /*==========================*/
    /* Mobile Nav */
    /*==========================*/
    if ($(window).width() < 1051) {
        $('nav ul li a').click(function(){
            $(this).next('ul').toggle();
            $(this).toggleClass('active');
        });
    }

});
