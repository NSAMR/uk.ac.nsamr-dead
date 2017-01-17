jQuery(document).ready(function () {

    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function (html) {
        new Switchery(html, {color: 'green'});
    });

    jQuery('#hmw_settings').find('select[name=hmw_mode]').on('change', function () {
        jQuery('#hmw_settings').find('.tab-panel').hide();
        jQuery('#hmw_settings').find('.hmw_' + jQuery(this).val()).show();
    });

});

