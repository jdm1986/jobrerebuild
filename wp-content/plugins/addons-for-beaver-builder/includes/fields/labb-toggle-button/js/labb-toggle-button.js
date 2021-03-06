(function ($) {

    LABBToggleButton = {

        _init: function () {
            $('body').delegate('.labb-toggle-button .labb_toggle_button_label', 'click', LABBToggleButton._settingsSwitchChanged);

        },


        _settingsSwitchChanged: function () {
            var $this = $(this),
                button_wrap = $this.closest(".labb-toggle-button"),
                this_attr = '#' + $this.attr('for'),
                this_value = button_wrap.find(this_attr).val();

            button_wrap.find(".labb_toggle_button_select").val(this_value);
            button_wrap.find(".labb_toggle_button_select").trigger('change');
        },
    };

    LABBToggleButton._init();

})(jQuery);