var scrollAnimate = {
    elements: [],
    init: function() {
        $.each($('.animate'), function(i, v) {

            var element_height = $(v).outerHeight();
            var position = $(v).offset();

            scrollAnimate.elements[i] = [];

            scrollAnimate.elements[i].el = v;
            scrollAnimate.elements[i].height = element_height;
            scrollAnimate.elements[i].xtop = position.top;
            scrollAnimate.elements[i].bottom = position.top + element_height;
            scrollAnimate.elements[i].delay = $(v).attr('data-delay');

        });

        $(window).on('resize orientationchange', function() { scrollAnimate.update_viewport(); });

        $(window).load(function() { setTimeout(function() { scrollAnimate.update_viewport(); }, 500) });

        window.addEventListener('scroll', function(e) {
            distanceY = window.pageYOffset || document.documentElement.scrollTop;

            $.each(scrollAnimate.elements, function(i, v) {

                height = scrollAnimate.elements[i].height;
                xtop = scrollAnimate.elements[i].xtop;
                bottom = scrollAnimate.elements[i].bottom;
                delay = scrollAnimate.elements[i].delay;

                if (parseInt(distanceY + scrollAnimate.viewport_height) > parseInt(parseInt(xtop) + parseInt(delay))) {
                    $(scrollAnimate.elements[i].el).addClass('on');
                }else {
                    $(scrollAnimate.elements[i].el).removeClass('on');
                }
            });


        });
    },
    update_viewport: function() {
        scrollAnimate.body_height = $(document).height();
        scrollAnimate.viewport_height = $(window).height();
    }
};

var GravyStudioTheme = {
    init: function() {
        scrollAnimate.init();
    }
};

/* Counter */

function countUp(){

    $('.number').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({ countNum: $this.text()}).animate({
                countNum: countTo
            },
            {

                duration: 3000,
                easing:'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                    //alert('finished');
                }

            });
    });
}

$(document).on('click', 'a', function(event){

    if( $(this).parent().hasClass('btn-contact') && $('#contact').length ){

        event.preventDefault();

        $('html, body').animate({
            scrollTop: $( '#contact' ).offset().top - 100
        }, 500);
    }
});

$(document).ready( function () {

    $('header').affix({});

    /* Sliders */

    $('.gallery-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        autoplaySpeed: 3000,
        arrows: true,
        nextArrow: '<i class="slick-next"></i>',
        prevArrow: '<i class="slick-prev"></i>'
    });

    $('.texts-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.logos-slider'
    });

    $('.logos-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 0,
        asNavFor: '.texts-slider',
        arrows: false,
        centerMode: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    autoplay: true,
                    autoplaySpeed: 3000,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slick-slide').on('mouseenter', function (e) {
        $(this).click();

    });

    $('.slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        fade: true,
        autoplaySpeed: 5000,
        arrows: false,
        nextArrow: '<i class="zmdi zmdi-chevron-right slick-next"></i>',
        prevArrow: '<i class="zmdi zmdi-chevron-left slick-prev"></i>'
    });

    $('.locations-slider').on('init', function(event, slick){


    });

    $('.locations-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.locations-slider-nav',
    });

    $('.locations-slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 0,
        asNavFor: '.locations-slider',
        arrows: false,
        centerMode: false,
        focusOnSelect: true
    });

    $('.locations-slider-nav').on('mouseenter', '.slick-slide', function (e) {
        var $currTarget = $(e.currentTarget),
            index = $currTarget.data('slick-index'),
            slickObj = $('.locations-slider').slick('getSlick');

        slickObj.slickGoTo(index);
    });

    $('.locations-slider').on("beforeChange", function (event, slick) {
        var currentSlide, slideType, player, command;

        //find the current slide element and decide which player API we need to use.
        currentSlide = $(slick.$slider).find(".slick-current");

        //get the iframe inside this slide.
        player = currentSlide.find("iframe").get(0);

        command = {
            "event": "command",
            "func": "pauseVideo"
        };

        //check if the player exists.
        if (player != undefined) {
            //post our command to the iframe.
            player.contentWindow.postMessage(JSON.stringify(command), "*");
        }
    });

    $('.locations-slider').on("afterChange", function (event, slick) {
        var currentSlide, slideType, player, command;

        //find the current slide element and decide which player API we need to use.
        currentSlide = $(slick.$slider).find(".slick-current");

        //get the iframe inside this slide.
        player = currentSlide.find("iframe").get(0);

        command = {
            "event": "command",
            "func": "playVideo"
        };

        //check if the player exists.
        if (player != undefined) {
            //post our command to the iframe.
            player.contentWindow.postMessage(JSON.stringify(command), "*");
        }
    });

    /* Nav Menu */

    $('.c-hamburger').click(function(evn){
        evn.preventDefault();
        $(this).toggleClass('is-active');
        $('body').toggleClass('is-active');
        $('.mobile-nav-holder').toggleClass('is-active');
    });

    /**
     * MOBILE DETECTION
     *
     */
    var isMobile = false; //initiate as false
    var isIOS = false;

    // device detection
    if ($(window).width() <= 768 ||
        /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {

        isMobile = true;
        $('body').addClass('mobile');

        if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
            isIOS = true;
            $('body').addClass('ios');
        }
    }

    /**
     Skrollr
     */

    if ($('.skrollable').length) {
        var skrllr;
        var skrollrInit = function () {
            setTimeout(function () {
                skrllr = skrollr.init({
                    smoothScrolling: true,
                    forceHeight: false,
                    mobileDeceleration: 0.004
                });
            }, 100);
        };

        if ($(window).width() > 980 && !isMobile) {
            skrollrInit({forceHeight: false});;
        }
        $(window).on('resize', function () {
            if ($(this).width() <= 980 || isMobile) {
                skrllr = false;
                skrollr.init().destroy();
            }
            else {
                skrollrInit({forceHeight: false});;
            }
        });
    }

    /* Form */

    $('.select .selected').on('click', function () {
        if( $(this).parent().hasClass('open') ){
            $(this).parent().removeClass('open');
            $(this).closest('.field-holder').removeClass('open');
            $('.date').removeClass('open');
        }else{
            $(this).closest('.field-holder').addClass('open');
            $('.select').removeClass('open');
            $(this).parent().addClass('open');
            $('.date').removeClass('open');
        }
    });

    $('.select .values li').on('click', function () {

        var new_value = $(this).text();
        console.log(new_value);

        $(this).parent().parent().removeClass('open');
        $(this).parent().parent().find('.selected').text(new_value);
    });

    $('.date .selected').on('click', function () {
        if( $(this).parent().hasClass('open') ){
            $(this).parent().removeClass('open');
            $('.date .selected').removeClass('open');
            $(this).closest('.field-holder').removeClass('open');
        }else{
            $('.select').removeClass('open');
            $(this).parent().addClass('open');
            $(this).closest('.field-holder').addClass('open');
        }
    });

    // $('.date .select-month').on('change', function () {
    //
    //     var the_month = $(this).parent().find('.select-month').val();
    //
    //     months = ['ינואר','מרץ','מאי','יולי','ספטמבר','נובמבר',]
    //
    //     if( $.inArray(the_month, months) !== -1){
    //         $(this).parent().parent().find('option[value="31"]').show();
    //     }else{
    //         $(this).parent().parent().find('option[value="31"]').hide();
    //     }
    // });

    $('.date .btn').on('click', function () {

        //var the_day = $(this).parent().find('.select-day').val();
        var the_month = $(this).parent().find('.select-month').val();
        var the_year = $(this).parent().find('.select-year').val();

        //$(this).parent().parent().find('.selected .day').text(the_day);
        $(this).parent().parent().find('.selected .month').text(the_month);
        $(this).parent().parent().find('.selected .year').text(the_year);

        $(this).parent().parent().removeClass('open');
    });

    $(document).mouseup(function(e){
        var container = $('.values');

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.parent().removeClass('open');
        }
    });

    if( $('.section-numbers').length ){

        $.fn.isOnScreen = function(){

            var win = $(window);

            var viewport = {
                top : win.scrollTop(),
                left : win.scrollLeft()
            };
            viewport.right = viewport.left + win.width();
            viewport.bottom = viewport.top + win.height();

            var bounds = this.offset();
            bounds.right = bounds.left + this.outerWidth();
            bounds.bottom = bounds.top + this.outerHeight();

            return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

        };
    }
});

$(window).load(function() {

    if( $('.section-intro').length ){
        $('.section-intro').removeClass('on');
    }

    setTimeout(function() {
        scrollAnimate.update_viewport();
        GravyStudioTheme.init();
    }, 500);

    $('.animate').each( function () {

        if( $(this).is(":visible") ){

            $(this).addClass('on');
        }
    });
});

$(window).scroll(function() {

    if( $('.section-numbers').length ){


        if( $('.section-numbers').isOnScreen() == true  ){
            countUp();
        }
    }
});