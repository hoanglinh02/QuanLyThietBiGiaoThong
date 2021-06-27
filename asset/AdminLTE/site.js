(function($) {
    $(document).ready(function() {
        $(window).load(function() {
            if ($('.single-product div#tab-description').length > 0) {
                var wrap = $('.single-product div#tab-description');
                var current_height = wrap.height();
                var your_height = 1700;
                if (current_height > your_height) {
                    wrap.css('height', your_height + 'px');
                    wrap.append(function() {
                        return '<div class="devvn_readmore_flatsome devvn_readmore_flatsome_more"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                    });
                    wrap.append(function() {
                        return '<div class="devvn_readmore_flatsome devvn_readmore_flatsome_less" style="display: none;"><a title="Xem thêm" href="javascript:void(0);">Thu gọn</a></div>';
                    });
                    $('body').on('click', '.devvn_readmore_flatsome_more', function() {
                        wrap.removeAttr('style');
                        $('body .devvn_readmore_flatsome_more').hide();
                        $('body .devvn_readmore_flatsome_less').show();
                    });
                    $('body').on('click', '.devvn_readmore_flatsome_less', function() {
                        wrap.css('height', your_height + 'px');
                        $('body .devvn_readmore_flatsome_less').hide();
                        $('body .devvn_readmore_flatsome_more').show();
                    });
                }
            }
        });
    })
})(jQuery)
$.mac = function() {}
$.extend(true, mac = {
    showDialog: function(options) {
        var defaultOptions = {
            id: 'popup',
            url: '',
            content: '',
            width: 500
        };
        options = $.extend(defaultOptions, options);

        var popup = $('#' + options.id);
        if (!popup.length) {
            $('body').append('<div class="modal fade" id="' + options.id + '"><div class="modal-dialog " style="max-width:' + options.width + 'px"></div></div>');
            popup = $('#' + options.id);
        }
        if (options.url != '') {
            popup.find(".modal-dialog").load(options.url);
        }
        if (options.content != '') {
            popup.find(".modal-dialog").html(options.content);
        }
        popup.modal({ backdrop: 'static', keyboard: false });
        return popup;
    },
    showConfirmDialog: function(content) {
        return mac.showDialogCustom({
            id: 'confirmPopup',
            title: 'Xác nhận',
            type: 'danger',
            content: content,
            textYes: 'Tiếp tục'
        });
    },
    showDialogCustom: function(options) {
        var defaultOptions = {
            id: 'popup',
            title: 'Thông tin',
            type: 'default', // default | primary | secondary | info | warning | success | danger
            overlay: false,
            url: '',
            content: '',
            width: 500,
            height: null,
            textYes: 'Ghi lại',
            textNo: 'Đóng'
        };
        options = $.extend(defaultOptions, options);

        // remove old dialog if exists
        var popup = $('#' + options.id);
        if (popup.length) {
            popup.remove();
        }

        // create new dialog
        $('body').append('<div class="modal fade" id="' + options.id + '"><div class="modal-dialog modal-dialog-centered" style="max-width:' + options.width + 'px"></div></div>');
        popup = $('#' + options.id);
        popup.find('.modal-dialog').append('<div class="modal-content"></div>');
        var content = popup.find('.modal-content');

        // overlay
        if (options.overlay) {
            content.append(`<div class="overlay d-flex justify-content-center align-items-center">
                <i class= "fas fa-2x fa-sync fa-spin" ></i></div>`);
        }

        // init header
        content.append(`<div class="modal-header bg-` + options.type + `">
                            <h4 class="modal-title">` + options.title + `</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);

        //init body
        content.append(`<div class="modal-body" ` + (options.height != null ? (`style="max-height:` + options.height + `px;overflow-y:auto"`) : ``) + `></div>`);
        if (options.url != '') {
            content.find(".modal-body").load(options.url);
        }
        if (options.content != '') {
            content.find(".modal-body").html(options.content);
        }

        var htmlYesButton = options.textYes == null ? "" : (`<button type="button" class="btn btn-primary cmd-save btn-sm">` + options.textYes + `</button>`);
        var htmlNoButton = options.textNo == null ? "" : (`<button type="button" class="btn btn-default cmd-close btn-sm" data-dismiss="modal">` + options.textNo + `</button>`);

        //init footer
        content.append(`<div class="modal-footer">
                            ${htmlNoButton}
                            ${htmlYesButton}
                        </div>`);
        popup.modal({ backdrop: 'static', keyboard: false });
        return popup;
    }
})
