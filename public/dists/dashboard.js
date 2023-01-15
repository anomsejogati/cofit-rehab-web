$(document).on('mouseenter', '.menuBtn', function () {

    $('.menuBtn').removeClass('active');
    $(this).addClass('active');

})


$(document).on('mouseleave', '.menuBtn', function () {

    $('.menuBtn').removeClass('active');

})