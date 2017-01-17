jQuery(document).ready(function ($) {

    //HOVER DROP DOWN MENU
    //$('.dropdown-toggle').dropdownHover();
    //SCROLL MENU
    $(window).load(function () {
        $(".sticky").sticky({topSpacing: 0, zIndex: 999});
    });

    $(window).resize(function () {
        $(".navbar-collapse").css({maxHeight: $(window).height() - $(".navbar-header").height() + "px"});
    });

    var $container = $('.portfolio-wrap');
    var $filter = $('.portfolio-filter');
    var filterItemA = $('.portfolio-filter li a');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.project-post',
            layoutMode: 'fitRows',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    });
    $filter.on('click', 'a', function () {
        var filterValue = $(this).attr('data-filter');
        $container.isotope({
            filter: filterValue,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    });

    filterItemA.on('click', function () {
        var $this = $(this);
        if (!$this.hasClass('active')) {
            filterItemA.removeClass('active');
            $this.addClass('active');
        }
    });
    $('.blog-list').isotope({
        itemSelector: '.masonry-item',
        percentPosition: true
    });


    $(window).stellar({
        horizontalScrolling: false,
        responsive: true/*,
         scrollProperty: 'scroll',
         parallaxElements: false,
         horizontalScrolling: false,
         horizontalOffset: 0,
         verticalOffset: 0*/
    });

//OWL CAROUSEL
    $("#work-carousel").owlCarousel({
        // Most important owl features
        items: 4,
        itemsCustom: false,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        startDragging: true,
        autoPlay: 6000
    });

    $("#news-carousel").owlCarousel({
        // Most important owl features
        items: 2,
        itemsCustom: false,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsTablet: [768, 2],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        startDragging: true,
        autoPlay: 4000
    });

    $("#testi-carousel").owlCarousel({
        // Most important owl features
        items: 1,
        itemsCustom: false,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        startDragging: true,
        autoPlay: 4000
    });

    $("#featured-work").owlCarousel({
        autoPlay: 5000, //Set AutoPlay to 3 seconds
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        pagination: false,
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        stopOnHover: true

    });
    $("#clients-slider").owlCarousel({
        autoPlay: 3000,
        pagination: false,
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [991, 2]
    });

    $('.counter').counterUp({
        delay: 100,
        time: 800
    });

    //MAGNIFIC POPUP
    $('.show-image,.gallery-icon a').magnificPopup({type: 'image'});
    $('.latest-blog-section > .margin30').addClass('col-md-4 col-sm-6');
    $('.gallery-icon > a > img').addClass('img-responsive');

    // flex slider
    $('.main-flex-slider,.testi-slide').flexslider({
        slideshowSpeed: 5000,
        directionNav: false,
        animation: "fade"
    });

    $("[data-toggle=popover]").popover();
    $("[data-toggle=tooltip]").tooltip();

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.transparent-header').css("background", "#252525");
        } else {
            $('.transparent-header').css("background", "transparent");
        }
    });
    var wow = new WOW(
            {
                boxClass: 'wow', // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset: 100, // distance to the element when triggering the animation (default is 0)
                mobile: false        // trigger animations on mobile devices (true is default)
            }
    );
    wow.init();


    //ONEPAGE START
    if ($('.scroll-to a').length > 0) {
        $('.scroll-to a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
        $('.scroll-to a[href=#home]:not([href=#])').click(function () {
            $("html, body").animate({scrollTop: 0}, 1000);
            return false;
        });
    }

    //back to top
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 250) {
            $("#back-to-top").addClass("show");
        } else {
            $("#back-to-top").removeClass("show");
        }
    });
    $("#back-to-top a").click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });

    /*START WOO*/
    //Product List / Grid Toggle
    var activeClass = 'toggle-active';
    var gridClass = 'grid-layout';
    var listClass = 'list-layout';
    var shortwrap = $('.product-listing-wrap ul.products');
    jQuery('.toggleList').click(function () {
        if (!$.cookie('pr_layout') || $.cookie('pr_layout') == 'grid') {
            $('.toggleList').addClass(activeClass);
            $('.toggleGrid').removeClass(activeClass);
            $('.product-listing-wrap .product-image').addClass('col-md-4');
            $('.product-listing-wrap .product-info').addClass('col-md-8');
            shortwrap.fadeOut(300, function () {
                $(this).removeClass(gridClass).addClass(listClass).
                        fadeIn(300);
                $.cookie('pr_layout', 'list', {expires: 3, path: '/'});
            });
        }
        return false;
    });
    $('.toggleGrid').click(function () {
        if (!$.cookie('pr_layout') || $.cookie('pr_layout') == 'list') {
            $('.toggleGrid').addClass(activeClass);
            $('.toggleList').removeClass(activeClass);
            $('.product-listing-wrap .product-image').removeClass('col-md-4');
            $('.product-listing-wrap .product-info').removeClass('col-md-8');
            shortwrap.fadeOut(300, function () {
                $(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
                $.cookie('pr_layout', 'grid', {expires: 3, path: '/'});
            });
            return false;
        }
    });
    // ONLOAD
    if ($.cookie('pr_layout') == 'grid') {
        shortwrap.removeClass('list-layout').addClass('grid-layout');
        $('.toggleGrid').addClass(activeClass);
    } else if ($.cookie('pr_layout') == 'list') {
        shortwrap.removeClass('grid-layout').addClass('list-layout');
        $('.toggleList').addClass(activeClass);
        $('.product-listing-wrap .product-image').addClass('col-md-4');
        $('.product-listing-wrap .product-info').addClass('col-md-8');
    } else {
        $('.toggleGrid').addClass(activeClass);
    }
    //END WOO
    //DEMO STORE NOTICE
    if ($('.woocommerce-page .demo_store').length > 0) {
        notice_height = $('.demo_store').outerHeight();
        $('#top-bar').css('margin-top', notice_height);
    }

});


