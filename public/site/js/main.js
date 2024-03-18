/* viddeo Mute
===================================*/
$(document).ready(function () {
    "use strict";
    $('.mute').click(function () {
        $('#myVideo').prop('muted', !$('#myVideo').prop('muted'));
        var img_src = $(this).data('status');
        if (img_src === 'run') {
            $(this).attr('src', 'assets/site/images/mute.png');
            $(this).data('status' ,'mute')
        } else {
            $(this).attr('src', 'assets/site/images/speaker.png');
            $(this).data('status' ,'run')
        }
    });
    var about_vid = document.getElementById("about-vid");
    $('.play-btn').click(function () {
        $(this).hide();
        about_vid.paused?about_vid.play():about_vid.pause();
    });
});

/* Gallery
=================================*/
$(document).ready(function () {
    "use strict";
    $('.popup-gallery').magnificPopup({
        type: 'image',
        removalDelay: 300,
        gallery: {
            enabled: true,
            preload: [0, 2],
            navigateByImgClick: true,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            tPrev: 'Previous (Left arrow key)',
            tNext: 'Next (Right arrow key)',
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
        }
    });
    $('.popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 10,
        preloader: true,
        fixedContentPos: false
    });
});

/* Date Picker
=============================*/
$(document).ready(function () {
    "use strict";
    $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        pickerPosition: "bottom-left"
    });
});

/* OWL Slider
===================================*/
$(document).ready(function () {
    "use strict";
    $(".vendors-slid").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 15,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            767: {
                items: 3
            },
            991: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });
    $(".clients-slid").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 15,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            767: {
                items: 2
            },
            991: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });
    $(".team-slid").owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 25,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            767: {
                items: 2
            },
            991: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });
    $(".events-slid").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 25,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            767: {
                items: 2
            },
            991: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });
    $(".opin-lists-slide").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 25,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        items: 1
    });

});

/* Header Show
==============================*/
$(window).scroll(function () {
    "use strict";
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
        $(".header.main-header").addClass("header-scroll");
        $(".header").addClass("cor");
        $(".top-header").addClass("cor");
    } else {
        $(".header.main-header").removeClass("header-scroll");
        $(".header").addClass("cor");
        $(".top-header").removeClass("cor");
    }
});

/*Scroll Top
=============================*/
$(document).ready(function () {
    "use strict";
    $("#print").click( function () {
        window.print();
    });
});

/* Home Section
=============================*/
$(document).ready(function () {
    "use strict";
    function headerSize() {
        var fullH = $(window).innerHeight(),
            halfH = $(window).innerHeight() / 2,
            div = $(".center-height"),
            divHeight = $(".center-height").outerHeight(),
            imageHeight = $(".bottom-height").outerHeight(),
            divHalfHeight = divHeight / 2,
            centerDiv = halfH - divHalfHeight;
        $(".welcome").css({
            height: fullH
        });
        $(".center-height").css({
            top: centerDiv
        });
    }
    headerSize();
    $(window).resize(function () {
        headerSize();
    });
});

/* Counter 
=============================*/
$(document).ready(function () {
    "use strict";
    if ($('#countdown').length) {
        $('#countdown').countdown({
            render: function(data) {
                if (data.years >= 1) {
                    var $days =	(data.years*365)+data.days;
                } else {
                    var $days = data.days;
                }
                $(this.el).html(
                    '<div class="day">' + this.leadingZeros($days) + ' <span>Days</span></div>'+
                    '<div class="hour">' + this.leadingZeros(data.hours, 2) + ' <span>Hours</span></div>'+
                    '<div class="min">' + this.leadingZeros(data.min, 2) + ' <span>Minutes</span></div>'+
                    '<div class="sec">' + this.leadingZeros(data.sec, 2) + ' <span>Seconds</span></div>'
                );
            }
        });
    }
    if ($('#countdown-ar').length) {
        $('#countdown-ar').countdown({
            render: function(data) {
                if (data.years >= 1) {
                    var $days =	(data.years*365)+data.days;
                } else {
                    var $days = data.days;
                }
                $(this.el).html(
                    '<div class="day">' + this.leadingZeros($days) + ' <span>يوم</span></div>'+
                    '<div class="hour">' + this.leadingZeros(data.hours, 2) + ' <span>ساعة</span></div>'+
                    '<div class="min">' + this.leadingZeros(data.min, 2) + ' <span>دقيقة</span></div>'+
                    '<div class="sec">' + this.leadingZeros(data.sec, 2) + ' <span>ثانية</span></div>'
                );
            }
        });
    }
});

/*Scroll Top
=============================*/
$(document).ready(function () {
    "use strict";
    // Scroll to top
    var scrollbutton = $(".up-btn");
    $(window).scroll(function () {
        $(this).scrollTop() >= 700 ? scrollbutton.show() : scrollbutton.hide();
    });
    scrollbutton.click(function () {
        $("html,body").animate({scrollTop: 0}, 600);
    });
});

/*Loading
==========================*/
$(window).on("load", function () {
    "use strict";
    $(".spinner").fadeOut(function () {
        $(this).parent().fadeOut();
        $("body").css({"overflow-y" : "visible"});
        var vid = document.getElementById("myVideo");
        function playVid() {
            vid.play();
        }
        playVid();
    });
});

