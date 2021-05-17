$(document).ready(function() {

    $('.drop-categoria').on('click', function() {
        if ($(window).width() >= 992) {
            location.href = $(this).attr('href');
        }
    });

});