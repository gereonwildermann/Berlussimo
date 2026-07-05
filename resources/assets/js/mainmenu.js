$('document').ready(function () {
    function isTouchEvent(e) {
        return !!(e && e.originalEvent && e.originalEvent.sourceCapabilities && e.originalEvent.sourceCapabilities.firesTouchEvents);
    }

    $(".mainmenu .collapsible li").on('mouseenter', function (e) {
        e.stopImmediatePropagation();
        var $target = $(e.target);
        var $header;
        var $body = $target.parents('li').first().find('.collapsible-body').first();
        var $partner_account_select = $($body.find('.row').children()[0]);
        var $submenu = $($body.children()[1]);
        if ($target.hasClass('collapsible-header')) {
            $header = $target;
        } else {
            $header = $target.parents('li').first().find('.collapsible-header').first();
        }
        var $collapsible = $target.parents('.collapsible');
        var $partner_account_selectEmpty = !$partner_account_select.length || $partner_account_select.css('display') === 'none';
        var $submenuEmpty = !$submenu.length || $.trim($submenu.text()) === '';
        if (!isTouchEvent(e)) {
            if ($.trim($header.text()).startsWith("Tools")) {
                if (!$partner_account_selectEmpty || !$submenuEmpty) {
                    $collapsible.collapsible('open', 1);
                }
            } else {
                $collapsible.collapsible('open', 0);
            }
        }
    }).on('mouseleave', function (e) {
        var $target = $(e.target);
        var $header;
        if ($target.hasClass('collapsible-header')) {
            $header = $target;
        } else {
            $header = $target.parents('li').first().find('.collapsible-header').first();
        }
        var $collapsible = $target.parents('.collapsible');
        if (!isTouchEvent(e)) {
            if ($.trim($header.text()).startsWith("Tools")) {
                $collapsible.collapsible('close', 1);
            } else {
                $collapsible.collapsible('close', 0);
            }
        }
    });
});