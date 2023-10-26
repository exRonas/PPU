$(function(){
    let current = $(".first");
    $(".btn__next").bind("click", function (e) {
        $(".btn__next").addClass("disabled");
        setTimeout(function() {
            $(".btn__next").removeClass("disabled");
        }, 400);
        

        if ($(current).next('.tests__wrapper').length) {
            $(current).fadeOut(400, function () {
                $(current).addClass('d-none')
                current = $(current)
                    .next(".tests__wrapper")
                    .removeClass("d-none");
                $(current)
                    .fadeOut(0)
                    .fadeIn(400);
            });
        }
    });

    $(".btn__prev").bind("click", function (e) {
        $(".btn__prev").addClass("disabled");
        setTimeout(function() {
            $(".btn__prev").removeClass("disabled");
        }, 400);

        if ($(current).prev('.tests__wrapper').length) {
            $(current).fadeOut(400, function () {
                $(current).addClass('d-none')
                current = $(current)
                    .prev(".tests__wrapper")
                    .removeClass("d-none");
                $(current)
                    .fadeOut(0)
                    .fadeIn(400);
            });
        }
    });

    $('.page_list').bind('click', function(e){
// #ФИЧА Пиздато, сделать так везде
        let next = $(".page-"+$(this).attr('num'));
        
        $(current).fadeOut(400, function(){
            $(current).addClass('d-none');
            current = $(next).removeClass('d-none');
            $(current).fadeOut(0).fadeIn(400);
        })
    })
})