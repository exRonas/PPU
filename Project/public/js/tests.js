$(function () {
    $(".main__wrapper").css("translate", "-4000px");

    let width = window.innerWidth;
    check(width);

    function check(width) {
        if (width > 992) {
            $(".card__block").addClass(["smoth", "d-none"]);
            $(".card__block:eq(1)").addClass("center");
            $(".card__block:eq(0)").addClass("side");
            $(".card__block:eq(2)").addClass("side");
            $('.card__block:last').addClass("last");
            binds(width);
        } else {
            $(".card__block")
                .addClass("d-none")
                .removeClass("smoth")
                .removeClass("center")
                .removeClass("side");
            binds(width);
        }
    }

    function binds(width) {
        if (width > 992) {
            $(".card__block").each(function (index, param) {
                if ($(param).hasClass("center") || $(param).hasClass("side")) {
                    $(param).removeClass("d-none");
                }
            });
            let current = $(".center");
            $(".btn__next").bind("click", function (e) {

                $(".btn__next").addClass("disabled");
                setTimeout(function() {
                    $(".btn__next").removeClass("disabled");
                }, 400);
                
                if (!$(current).next().hasClass("last")) {
                    $(current)
                        .next(".card__block")
                        .addClass("center")
                        .css("scale", "1.1");
                    $(current).css("scale", "0.9");
                    $(current).removeClass("center");
                    $(current)
                        .prev(".card__block")
                        .fadeIn(300, function (e) {
                            $(current).prev(".card__block").addClass("d-none");
                            $(current).addClass("side");
                            current = $(current).next(".card__block");
                            $(current)
                                .next(".card__block")
                                .removeClass("d-none")
                                .addClass("side")
                                .fadeOut(0)
                                .fadeIn(600);
                        });
                }
            });

            $(".btn__prev").bind("click", function (e) {
                $(".btn__prev").addClass("disabled");
                setTimeout(function() {
                    $(".btn__prev").removeClass("disabled");
                }, 400);
                if (!$(current).prev().hasClass("first")) {
                    $(current)
                        .prev(".card__block")
                        .addClass("center")
                        .css("scale", "1.1");
                    $(current).css("scale", "0.9");
                    $(current).removeClass("center");
                    $(current)
                        .next(".card__block")
                        .fadeIn(300, function (e) {
                            $(current).next(".card__block").addClass("d-none");
                            $(current).addClass("side");
                            current = $(current).prev(".card__block");
                            $(current)
                                .prev(".card__block")
                                .removeClass("d-none")
                                .addClass("side")
                                .fadeOut(0)
                                .fadeIn(600);
                        });
                }
            });
        } else {
            let current = $(".first").removeClass("d-none");
            $(current).css("display", "block").addClass("col-9");
            $(".btn__next").bind("click", function (e) {
                $(".btn__next").addClass("disabled");
                setTimeout(function() {
                    $(".btn__next").removeClass("disabled");
                }, 400);
                

                if ($(current).next().length) {
                    $(current).fadeOut(400, function () {
                        $(current).css("display", "none");
                        current = $(current)
                            .next(".card__block")
                            .removeClass("d-none");
                        $(current)
                            .addClass("col-9")
                            .css("display", "block")
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
                if ($(current).prev().length) {
                    $(current).fadeOut(400, function () {
                        $(current).css("display", "none");
                        current = $(current)
                            .prev(".card__block")
                            .removeClass("d-none");
                        $(current)
                            .addClass("col-9")
                            .css("display", "block")
                            .fadeOut(0)
                            .fadeIn(400);
                    });
                }
            });
        }
    }
});
