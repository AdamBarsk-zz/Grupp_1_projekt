function sizeCheck() {
    if($(window).innerWidth() > 990) {
        $('#sizeCheck').addClass('row-eq-height').removeClass('row');
    } else {
        $('#sizeCheck').addClass('row').removeClass('row-eq-height');
    }
}

sizeCheck();

$(window).bind('resize',function(){
    sizeCheck();
});
