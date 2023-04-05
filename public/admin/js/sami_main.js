(function ($) {
    $.fn.cus_toast_auto = function (options){
        let settings = $.extend({
            cus_toast_time: 5000,
            cus_toast_top: "25px",
            cus_toast_bg: "#f2f2f2",
            cus_toast_border: "#008080",
            cus_toast_check_bg: "#198754",
            cus_toast_check_icon: "#ffffff",
            cus_toast_error_bg: "#dc3545",
            cus_toast_error_icon: "#ffffff",
            cus_toast_text: "#666666",
        },options);

        let progress_time = 300;
        let end_time = settings.cus_toast_time + progress_time;
        let progress_css_time = settings.cus_toast_time / 1000;
        $(".cus_toast").toggleClass("active");
        $(".progress").toggleClass("active");

        $(":root").css({
            "--cus_toast_time": progress_css_time + "s",
            "--cus_toast_top": settings.cus_toast_top,
            "--cus_toast_bg": settings.cus_toast_bg,
            "--cus_toast_border": settings.cus_toast_border,
            "--cus_toast_check_bg": settings.cus_toast_check_bg,
            "--cus_toast_check_icon": settings.cus_toast_check_icon,
            "--cus_toast_error_bg": settings.cus_toast_error_bg,
            "--cus_toast_error_icon": settings.cus_toast_error_icon,
            "--cus_toast_text": settings.cus_toast_text,
        });
        let action_class = $(".cus_toast");
        let timer1, timer2;
        timer1 = setTimeout(() => {
            $(".cus_toast").removeClass("active");
        }, settings.cus_toast_time); //1s = 1000 milliseconds

        timer2 = setTimeout(() => {
            $(".progress").removeClass("active");
        }, end_time);

        $(".close").on("click", function () {
            action_class.removeClass("active");
            setTimeout(() => {
                $(".progress").removeClass("active");
            }, progress_time);

            clearTimeout(timer1);
            clearTimeout(timer2);
        });
    };
})(jQuery);

(function ($) {
    $.fn.cus_toast_btn = function () {
        this.on("click", function (options) {
            let settings = $.extend({
                time: 3000,
                top: "25px",
            },options);
            
            let progress_time = 300;
            let end_time = settings.time + progress_time;
            let progress_css_time = settings.time / 1000;
            $(".cus_toast").toggleClass("active");
            $(".progress").toggleClass("active");

            $(":root").css({
                "--time": progress_css_time + "s",
                "--top": settings.top,
                "--cus_toast_bg": settings.cus_toast_bg,
                "--cus_toast_border": settings.cus_toast_border,
                "--cus_toast_check_bg": settings.cus_toast_check_bg,
                "--cus_toast_check_icon": settings.cus_toast_check_icon,
                "--cus_toast_error_bg": settings.cus_toast_error_bg,
                "--cus_toast_error_icon": settings.cus_toast_error_icon,
                "--cus_toast_text": settings.cus_toast_text,
            });

            let timer1, timer2;
            timer1 = setTimeout(() => {
                $(".cus_toast").removeClass("active");
            }, settings.time); //1s = 1000 milliseconds

            timer2 = setTimeout(() => {
                $(".progress").removeClass("active");
            }, end_time);

            $(".close").on("click", function () {
                $(".cus_toast").removeClass("active");
                setTimeout(() => {
                $(".progress").removeClass("active");
                }, progress_time);

                clearTimeout(timer1);
                clearTimeout(timer2);
            });
        });
    };
})(jQuery);


(function ($) {
    $.fn.image_preview = function () {
        this.on("click", function (options) {
            $('body,html').append('\
                <div id="FullImageView">\
                    <img id="FullImage" />\
                    <span id="CloseBtn" onclick="FullViewClose()">&times;</span>\
                </div>\
            ');
            let img_src = $(this).attr("src");
            $("#FullImage").attr("src", img_src);
            $("#FullImageView").css("display", "block");

            $("#CloseBtn").on("click", function () {
                $("#FullImageView").css("display", "none");
            });
        });
    };
})(jQuery);
