$(document).on('scroll', function(){
    if ( $(window).scrollTop() > 30) {
        $('.fixed-top').addClass('scrolled');
    } else {
        $('.fixed-top').removeClass('scrolled');
    }
});

$(document).on('scroll', function(){
    if ( $(window).scrollTop() > 30) {
        $('.navbar a').addClass('scrolled');
    } else {
        $('.navbar a').removeClass('scrolled');
    }
});

$(document).on('scroll', function(){
    if ( $(window).scrollTop() > 30) {
        $('.login').addClass('scrolled');
    } else {
        $('.login').removeClass('scrolled');
    }
});

$(document).on('scroll', function(){
    if ( $(window).scrollTop() > 30) {
        $('.logout').addClass('scrolled');
    } else {
        $('.logout').removeClass('scrolled');
    }
});


