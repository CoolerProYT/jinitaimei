$(document).ready(function() {
    checkScroll();
});

$(window).scroll(function() {
    checkScroll();
});

function checkScroll(){
    let scrollTop = $(window).scrollTop();

    if(scrollTop === 0){
        $("nav").removeClass("shadow");
    }
    else{
        $("nav").addClass("shadow");
    }
}
