'use strict';
/*wordspress color picker init
 http://code.tutsplus.com/articles/how-to-use-wordpress-color-picker-api--wp-33067
 thx--- https://core.trac.wordpress.org/attachment/ticket/25809/color-picker-widget.php
 */
/** ==========================================================================
 #JQUERY+WP color Picker init
 **========================================================================== **/
(function ($) {

    // Add Color Picker to all inputs that have 'color-field' class
    function ColorPicker_construct(widget) {
        widget.find('.ch-color-picker').wpColorPicker(/*{
         change: _.throttle(function() { // For Customizer
         $(this).trigger('change');
         }, 3000)
         }*/);
    };

    /*last post tabs and author tabs and contact tabs  */
    function chfwTABS_construct(event,widget) {

        var widget_id_full = $(widget).attr('id');
        var widget_id = widget_id_full.split("_");
        var widget_id = widget_id[1];

        jQuery('.tabbing_'+widget_id+' ul.tabs_st_studio-engine li').bind("click", function () {
            var tab_id = jQuery(this).attr('data-tab');
            jQuery('.tabbing_'+widget_id+' ul.tabs_st_studio-engine li').removeClass('current');
            jQuery('.tabbing_'+widget_id+' .tabcontainer .tab-content').removeClass('current');
            jQuery(this).addClass('current');
            jQuery(".tabbing_"+widget_id+" ." + tab_id).addClass('current');
        });

        jQuery('.lastPopPecentTabbing_'+widget_id+' ul.tabs_st_studio-engine li').bind("click", function () {
            var tab_id = jQuery(this).attr('data-tab');
            jQuery('.lastPopPecentTabbing_'+widget_id+' ul.tabs_st_studio-engine li').removeClass('current');
            jQuery('.lastPopPecentTabbing_'+widget_id+' .tabcontainer .tab-content').removeClass('current');
            jQuery(this).addClass('current');
            jQuery('.lastPopPecentTabbing_'+widget_id+' .' + tab_id).addClass('current');
        });

        jQuery('.tabbingContact_'+widget_id+' ul.tabs_st_studio-engine li').live("click", function () {
            var tab_id = jQuery(this).attr('data-tab');
            jQuery('.tabbingContact_'+widget_id+' ul.tabs_st_studio-engine li').removeClass('current');
            jQuery('.tabbingContact_'+widget_id+' .tabcontainer .tab-content').removeClass('current');
            jQuery(this).addClass('current');
            jQuery('.tabbingContact_'+widget_id+' .' + tab_id).addClass('current');
        });
    };

    function onFormUpdate(event, widget) {
        ColorPicker_construct(widget);
    };



    var $document = $(document);

    $document.on('widget-added widget-updated', onFormUpdate);
    $document.on('widget-added widget-updated', chfwTABS_construct);
    $document.ready(function () {
        $('#widgets-right .widget:has(.ch-color-picker)').each(function () {
            ColorPicker_construct($(this));

        });


        $('.st_studio-Engine-Form:has(.ch-color-picker)').each(function () {
            ColorPicker_construct($(this));

        });
    });
}(jQuery));



