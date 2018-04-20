/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };


    var Sage = {
        // All pages
        'common': {
            init: function () {
                $(window).scroll(function () {
                    if ($(document).scrollTop() > 25) {
                        $('.site-nav').addClass('shrink');
                    } else {
                        $('.site-nav').removeClass('shrink');
                    }
                });
                AOS.init();
                document.documentElement.setAttribute("data-browser", navigator.userAgent);
                $('.photo-gallery').each(function () { // the containers for all your galleries
                    $(this).magnificPopup({
                        delegate: 'a', // the selector for gallery item
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                });
                $('.lazyYT').lazyYT({
                    display_title: false, // display title in video's info bar
                    default_ratio: '16:9',
                    display_duration: false, // display video duration in bottom right
                });
                $("#modal").iziModal({
                    width: '90%',
                    navigateCaption: false,
                    theme: '',
                    restoreDefaultContent: true,
                });
                $("#testimonials-modal").iziModal({
                    width: '90%',
                    navigateCaption: false,
                    theme: '',
                    restoreDefaultContent: true,
                });
        

//        $(document).on('click', '.trigger', function (event) {
//         event.preventDefault();
//         $('#modal-iframe').iziModal('open', event); // Use "event" to get URL href
//         });
//         $("#modal-iframe").iziModal({
//         iframe: true,
//         width: '90%',
//         iframeHeight: 800,
//         });
            },

            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function () {
                $('.home-slider').slick({
                    infinite: true,
                    slidesToShow: 1,
                    speed: 500,
                    fade: true,
                    cssEase: 'linear',
                    autoplay: true
                });
                $('.services-slider').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                arrows: false,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                });

            }
        },
        'archive': {
            init: function () {
                var switchFlag = true;
                $('.staff-listing').find('img').unbind('mouseover').bind('mouseover', function () {
                    if (!isMobile.any()) {
                        if (switchFlag) {
                            var video = $(this).siblings('video');
                            if (video.length > 0) {
                                $(this).hide();
                                $(this).closest(".item").find(".thumb").css("width", "33%");
                                $(this).closest(".item").find(".staff-text").css("width", "66%");
                                video.show();
                                video[0].play();
                            }
                        } else {
                            switchFlag = true;
                        }
                    }
                });

                $('.staff-listing').find('video').unbind('mouseout').bind('mouseout', function (e) {
                    if (!isMobile.any()) {
                        var img = $(this).siblings('img');
                        if (img.length > 0) {
                            $(this)[0].pause();
                            $(this).hide();
                            img.show();
                            $(this).closest(".item").find(".thumb").css("width", "16.66%");
                            $(this).closest(".item").find(".staff-text").css("width", "83.33%");
                            e = e || window.event;
                            element = document.elementFromPoint(e.clientX, e.clientY);
                            if (element.tagName === "IMG") {
                                switchFlag = false;
                            }
                        }
                    }
                });
            }
        },
        'post_type_archive_press': {
            init: function () {

                /**
                 * Click Press-Media Image
                 */

                function playVideo(){
                    if($(".press-item").length>0){
                        $(".press-item").find("a").unbind('click').bind('click',function(e){
                            $("#press-video-modal").find(".responsive-embed").empty();
                            var embedData='';
                            if($(this).attr("data-bright-id") != ""){
                                embedData='<iframe src="//players.brightcove.net/5704890279001/S1av60ZEM_default/index.html?videoId='+$(this).attr("data-bright-id")+'&autoplay=true" allowfullscreen webkitallowfullscreen mozallowfullscreen' +
                                    '  class="press-video"></iframe></div>';
                            }
                            if($(this).attr("data-youtube-id") != ""){
                                embedData='<iframe src="https://www.youtube.com/embed/'+$(this).attr("data-youtube-id")+'?autoplay=1" allowfullscreen webkitallowfullscreen mozallowfullscreen'+
                                    ' class="press-video"></iframe>';
                            }
                            console.log(embedData);
                            $("#press-video-modal").find(".responsive-embed").html(embedData);
                        });
                    }
                }
                
                playVideo();

                /**
                 * Video Posting AJAX Loading
                 */

                var ppp = 8;
                var pageNumber = 1;
                var column = 4;
                var pressCategory = '';

                function load_press_posts() {
                    pageNumber++;
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: ajax_posts.ajaxurl,
                        data: {
                            column: column,
                            pageNumber: pageNumber,
                            ppp: ppp,
                            action: 'press_more_post_ajax',
                            pressCategory: pressCategory,
                        },

                        success: function (data) {
                            if (data.length) {
                                $(".video-content").append(data);
                                playVideo();
                            } else {
                                $("#video_load_more").attr("disabled", true);
                            }
                            $("#video_load_more").find(".ajax-loading").css("display", "none");
                            $("#video_load_more").find(".static-icons").css("display", "inline-block");
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log("Ajax Request Error");
                        }

                    });
                    return false;
                }

                if ($("#video_load_more").length > 0) {
                    $("#video_load_more").unbind("click").bind("click", function (event) { // When btn is pressed.
                        event.preventDefault();

                        if (!$("#video_load_more").attr("disabled")) {
                            $(this).find(".ajax-loading").css("display", "inline-block");
                            $(this).find(".static-icons").css("display", "none");
                            load_press_posts();
                        }
                    });
                }

                if ($('#select-press').length > 0) {
                    $("#select-press").unbind("change").bind("change", function (event) {
                        pressCategory = $(this).val();
                        pageNumber = 0;

                        $('.video-content').empty();
                        $("#video_load_more").attr("disabled", false);
                        load_press_posts();
                    });
                }

                /**
                 * Article AJAX Loading
                 */

                var articlePPP = 5;
                var articlePageNumber = 1;
                function load_press_articles() {
                    articlePageNumber++;
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: ajax_posts.ajaxurl,
                        data: {
                            pageNumber: articlePageNumber,
                            ppp: articlePPP,
                            action: 'press_more_article_ajax',
                        },

                        success: function (data) {
                            if (data.length) {
                                $(".articles-content").append(data);
                            } else {
                                $("#article_load_more").attr("disabled", true);
                            }
                            $("#article_load_more").find(".ajax-loading").css("display", "none");
                            $("#article_load_more").find(".static-icons").css("display", "inline-block");
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                           console.log("Ajax Request Error");
                        }
                    });
                    return false;
                }

                if ($("#article_load_more").length > 0) {
                    $("#article_load_more").unbind("click").bind("click", function (event) { // When btn is pressed.
                        event.preventDefault();
                        if (!$("#article_load_more").attr("disabled")) {
                            $(this).find(".ajax-loading").css("display", "inline-block");
                            $(this).find(".static-icons").css("display", "none");
                            load_press_articles();
                        }
                    });
                }

                /**
                 * Video Modal on Press-Media Page
                 */

                $("#press-video-modal").iziModal({
                    width: '70%',
                    navigateCaption: false,
                    theme: '',
                    restoreDefaultContent: true,
                });



            }
        }

    };
    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };
    // Load Events
    $(document).ready(UTIL.loadEvents);


})(jQuery); // Fully reference jQuery after this point.
