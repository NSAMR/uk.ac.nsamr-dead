/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {

    // Update the site title in real time...
    wp.customize('blogname', function (value) {
        value.bind(function (newval) {
            $('a.navbar-brand').html(newval);
        });
    });

    //Update the site description in real time...
    wp.customize('blogdescription', function (value) {
        value.bind(function (newval) {
            $('.site-description').html(newval);
        });
    });


    //Update site background color...
    wp.customize('background_color', function (value) {
        value.bind(function (newval) {
            $('body').css('background-color', newval);
        });
    });

    //Update site link color in real time...
    wp.customize('link_textcolor', function (value) {
        value.bind(function (newval) {
            $('a').css('color', newval);
        });
    });

    /******Theme Layout***/
    wp.customize('assan_theme_layout', function (value) {
        value.bind(function (newval) {
            if (newval === 'BOXED') {
                $('body').addClass('narrow-box');
            } else {
                $('body').removeClass('narrow-box');
            }

        });
    });

    wp.customize('assan_theme_portfolio_filter', function (value) {
        value.bind(function (newval) {
            if (newval === 'NO') {
                $('.portfolio-filter').hide();
            } else {
                $('.portfolio-filter').show();
            }

        });
    });

    /******FOOTER***/

    wp.customize('assan_theme_footer_skin', function (value) {
        value.bind(function (newval) {
            if (newval === 'light') {
                $('footer').removeAttr('id').addClass('footer-light-1');
                $('footer .footer-btm').addClass('footer-copyright').removeClass('footer-btm');
            } else {
                $('footer').removeAttr('class').attr('id', 'footer');
                $('footer .footer-copyright').addClass('footer-btm').removeClass('footer-copyright');
            }

        });
    });

    wp.customize('assan_theme_footer_layout', function (value) {
        value.bind(function (newval) {
            var column_class = 'col-md-' + (12 / newval);
            if (column_class === 'col-md-12') {
                column_class = 'col-md-6 col-md-offset-3 text-center';
            }
            $('footer .row > .col-sm-6').removeClass('col-md-3 col-md-4 col-md-6 col-md-12 col-md-offset-3').addClass(column_class);
        });
    });

    wp.customize('assan_theme_copyright_text', function (value) {
        value.bind(function (newval) {
            if (newval === 'light') {
                $('.footer-copyright').html(newval);
            } else {
                $('.footer-btm span').html(newval);
            }
        });
    });

})(jQuery);