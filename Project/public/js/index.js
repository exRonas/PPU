$(function () {
    
    let num = 0;
    const inter = setInterval(function(){
        $('.error_block:eq('+num+')').hide(1200);
        num++;
    }, 1200)
    setTimeout(function(){
        clearInterval(inter);
    }, $('.error_block').length*1200)
})