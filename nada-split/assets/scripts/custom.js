$(document).ready(function() {
    $('.navbar-nav__menu .menu-item-has-children').addClass('navbar-nav__menu-w-sub');
    $('.navbar-nav__menu .menu-item-has-children').children('a').addClass('with-submenu');
    $('#sb_instagram #sbi_images').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows : false
});
    $('#collapse_link').click(function (e) {
        e.preventDefault();
        $(this).next().slideToggle( 600 );
    });
});
