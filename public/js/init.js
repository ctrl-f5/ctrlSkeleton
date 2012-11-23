$(function () {
    $('.devctrl-item-widget-row .btn-group a.btn.dropdown-toggle').on('mouseleave', function () {
        $(this).removeClass('btn btn-mini dropdown-toggle');
        $(this).find('span').hide();
        $('.devctrl-item-widget').removeClass('item-widget-highlight-same');
    }).on('mouseover', function () {
            var id = $(this).attr('id');
            $(this).addClass('btn btn-mini dropdown-toggle');
            $(this).find('span').show();
            if (id) {
                $('.devctrl-item-widget').each(function() {
                    if ($(this).attr('data-widget-item-id') == id) {
                        $(this).addClass('item-widget-highlight-same');
                    };
                });
            }
    }).trigger('mouseleave');

    $('.devctrl-item-widget').on('mouseleave', function () {
        $('.devctrl-item-widget').removeClass('item-widget-highlight-same');
    }).on('mouseover', function () {
            var id = $(this).attr('data-widget-item-id');
            if (id) {
                $('.devctrl-item-widget').each(function() {
                    if ($(this).attr('data-widget-item-id') == id) {
                        $(this).addClass('item-widget-highlight-same');
                    };
                });
            }
        }).trigger('mouseleave');
});