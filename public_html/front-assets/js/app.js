function openNav() {
    $("#mySidenav").toggleClass('show');
    $('body').toggleClass('overflow-hidden');
}
function searchPop(){
    $(".over_lay1").css('width',"100%");
    $(".search_container").css('left',"0");
}

$().ready(function() {
    $('.single-item').slick({
        infinite: true,
        arrows: false,
        autoplay: true,
    });
    // Back to top
    var amountScrolled = 200;
    var amountScrolledNav = 25;

    $(window).scroll(function() {
        if ( $(window).scrollTop() > amountScrolled ) {
            $('button.back-to-top').addClass('show');
        } else {
            $('button.back-to-top').removeClass('show');
        }
    });

    $('button.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $(".over_lay1").click(function () {
        $(".over_lay1").css('width',"0%");
        $(".search_container").css('left',"-360px");
    });
});