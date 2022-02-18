'use strict';
jQuery.noConflict();


// media manager holder  variables
var st_studio_uploader;
var _custom_media;

jQuery(function () {

    /* ==========================================================================
     #Image picker init
     ========================================================================== */
    // jQuery(".image_select_metabox.show-labels").imagepicker({
    //     hide_select: true,
    //     show_label: true,
    // });

    /* ==========================================================================
     #Metabox page select visible hide show
     ========================================================================== */
    jQuery('#wow_pageSetting_header_type_selected').on('change', function () {
        var selectVal = jQuery("#wow_pageSetting_header_type_selected option:selected").val();
        if (selectVal == 'header-fixed-costum') {
            jQuery(".header_type_selected_reguired").removeClass('metabox_visible');
            jQuery(".header_type_selected_reguired").addClass('metabox_show');
        } else {
            jQuery(".header_type_selected_reguired").removeClass('metabox_show');
            jQuery(".header_type_selected_reguired").addClass('metabox_visible');
        }
    });

    /* ==========================================================================
     #Delete image element
     ========================================================================== */
    jQuery(document).on("click touchstart", ".background_attachment_metabox_container .single-imageBG span.delete", function () {
        //   var imageurl = jQuery(this).parent().find('img').attr('src');
        var target_id = jQuery(this).parent().find('img').attr('data-targetID');
        jQuery('#' + target_id).val("");
        jQuery(this).parent().hide(400);
    });

    /* ==========================================================================
     #Delete mp4/mp3 element
     ========================================================================== */
    jQuery(document).on("click touchstart", ".background_attachment_metabox_container .single-imageBG span.delete_media", function () {
        var target_id = jQuery(this).attr('data-targetID');
        jQuery('#' + target_id).val("");
        jQuery(this).parent().hide(400);
    });
    /* ==========================================================================
     #Post-meta class media manager trigger  http://bit.ly/2g83CQ7
     ========================================================================== */
    jQuery('.page_upload_trigger_element').on('click', function (e) {
        var _custom_media = true;
        var _orig_send_attachment = wp.media.editor.send.attachment;
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = jQuery(this);
        var id = button.attr('id').replace('_extra', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function (props, attachment) {
            if (_custom_media) {

                jQuery("#" + id).val(attachment.url);
                var filename = attachment.url;
                var file_extension = filename.split('.').pop();//find extension
                if (file_extension == "jpg" || file_extension == "jpeg" || file_extension == "png" || file_extension == "gif") {
                    jQuery("#" + id + '_li .background_attachment_metabox_container').html('<div class="images-containerBG"><div class="single-imageBG"><span class="delete">X</span>  <img data-targetid="wow_pageSetting_backgroundImage" class="attachment-100x100 wp-post-image" witdh="100" height="100" src="' + attachment.url + '"></div></div>');
                } else {
                    jQuery("#" + id + '_li .background_attachment_metabox_container').html('<div class="images-containerBG">' +
                        '<div style="width: 53px; height: 53px;" class="single-imageBG"><span data-targetid="wow_pageSetting_backgroundImage"  class="delete_media">X</span> ' +
                        '<span style="font-size: 46px" class="info dashicons dashicons-admin-media"></span> </div></div>');
                }
                /* important notes jQuery("#" + id + '_li .background_attachment_metabox_container').html('<div class="images-containerBG">' +
                 '<div class="single-imageBG_"><span class="info">'+attachment.url+'</span></div></div>');*/

            } else {
                return _orig_send_attachment.apply(this, [props, attachment]);
            }
        };
        wp.media.editor.open(button);
        return false;
    });

    /* ==========================================================================
     #Upload  click (meybe deprecated)
     ========================================================================== */
    jQuery('.add_media').on('click', function () {
        _custom_media = false;
    });

    /* ==========================================================================
     #Upload wp manager (Upload Image) metabox  media gallery click  trigger
     ========================================================================== */
    // when click on the upload button
    jQuery('.STNCupload_button').on('click', function (e) {
        // json field
        var field = jQuery(this).parent().find('.media_field_content');
        // gallery container
        // var galleryWrapper = jQuery(this).parent().find('.images-container');
        var galleryWrapper = jQuery(this).parent().prev('.images-container');
        e.preventDefault();
        // open the frame
        if (st_studio_uploader) {
            st_studio_uploader.open();
            return;
        }
        // create the media frame
        st_studio_uploader = wp.media.frames.st_studio_uploader = wp.media({
            className: 'media-frame dsf-media-manager',
            multiple: true,
            title: 'Select Images',
            button: {
                text: 'Select'
            }
        });
        st_studio_uploader.on('select', function () {
            var selection = st_studio_uploader.state().get('selection');
            selection.map(function (attachment) {

                attachment = attachment.toJSON();

                // insert the images to the custom gallery interface
                galleryWrapper.html(galleryWrapper.html() + '<div class="single-image"><span class="delete">X</span><img src="' + attachment.url + '" data-id="' + attachment.id + '" alt="' + attachment.id + '" /></div>');
                // insert images to the hidden feild
                if (field.val() != '') {
                    field.val(field.val() + ',' + attachment.id);
                } else {
                    field.val(attachment.id);
                }
            });
        });
        // Now that everything has been set, let's open up the frame.
        st_studio_uploader.open();
    });

    //jQuery(".updated.redux-messageredux-notice").attr('style','display: none !important');

    /* ==========================================================================
     #Gallery manager (metabox gallery) metabox  media gallery views trigger
     ========================================================================== */
    jQuery('.images-container').each(function () {
        var wrapper = jQuery(this);


        // delete image from gallery
        wrapper.find('.single-image span.delete').on('click', function () {
            var confirmed = confirm('Are you sure?');
            if (confirmed) {
                // image url
                var imageurl = jQuery(this).parent().find('img').attr('data-id');
                wrapper.parent().find('.media_field_content').val(function (index, value) {
                    return value.replace(imageurl + ',', '').replace(imageurl, '');
                });
                jQuery(this).parent().hide(400);
            }
        });
    });

    /* ==========================================================================
     #Upload  manager (advertisement widget)
     ========================================================================== */

    /*upload events
     /*new refactoring https://codex.wordpress.org/Javascript_Reference/wp.media
     /*advertisement uplaod image
     /* media manager holder
     */
    var dsf_widget_upload;
    var bull_widget_id;
// when click on the upload button
    jQuery(document).on("click touchstart", ".advertisement-upload-image", function (e) {
        bull_widget_id = jQuery(this).attr("target");

        e.preventDefault();

        // open the frame
        if (dsf_widget_upload) {

            dsf_widget_upload.open();

            return;
        }

        // create the media frame
        dsf_widget_upload = wp.media.frames.dsf_widget_upload = wp.media({

            className: 'media-frame dsf-media-manager',
            multiple: true,
            title: 'Select Images',
            button: {
                text: 'Select'
            }

        });

        dsf_widget_upload.on('select', function () {
            var selection = dsf_widget_upload.state().get('selection');
            selection.map(function (attachment) {
                attachment = attachment.toJSON();
                // insert images to the feild
                jQuery("#" + bull_widget_id + " .advertisement-image-field").val(attachment.url);
                jQuery("#" + bull_widget_id + " .advertisement-image").attr('src', attachment.url);
            });

        });
        // Now that everything has been set, let's open up the frame.
        dsf_widget_upload.open();

    });


    /* ==========================================================================
     #Upload wp manager (Author Widget)
     ========================================================================== */
    var author_widget_upload;
    var author_upload_image_bull_widget_id;
// when click on the upload button
    jQuery(document).on("click touchstart", ".author_upload-image-btn", function (e) {
        author_upload_image_bull_widget_id = jQuery(this).attr("target");
        e.preventDefault();
        // open the frame
        if (author_widget_upload) {
            author_widget_upload.open();
            return;
        }
        // create the media frame
        author_widget_upload = wp.media.frames.author_widget_upload = wp.media({
            className: 'media-frame dsf-media-manager',
            multiple: true,
            title: 'Select Images',
            button: {
                text: 'Select'
            }
        });
        author_widget_upload.on('select', function () {
            var selection = author_widget_upload.state().get('selection');
            selection.map(function (attachment) {
                attachment = attachment.toJSON();
                // insert images to the feild
                jQuery("#" + author_upload_image_bull_widget_id + " .author-image-field").val(attachment.url);
                jQuery("#" + author_upload_image_bull_widget_id + " .author-image").attr('src', attachment.url);
            });
        });
        // Now that everything has been set, let's open up the frame.
        author_widget_upload.open();
    });


    var author_widget_upload_cover;
    var author_upload_image_cover_bull_widget_id;
// when click on the upload button
    jQuery(document).on("click touchstart", ".author_upload-image-cover-btn", function (e) {
        author_upload_image_cover_bull_widget_id = jQuery(this).attr("target");

        e.preventDefault();

        // open the frame
        if (author_widget_upload_cover) {

            author_widget_upload_cover.open();

            return;
        }

        // create the media frame
        author_widget_upload_cover = wp.media.frames.author_widget_upload = wp.media({

            className: 'media-frame dsf-media-manager',
            multiple: true,
            title: 'Select Images',
            button: {
                text: 'Select'
            }
        });

        author_widget_upload_cover.on('select', function () {
            var selection = author_widget_upload_cover.state().get('selection');
            selection.map(function (attachment) {
                attachment = attachment.toJSON();
                // insert images to the feild
                jQuery("#" + author_upload_image_cover_bull_widget_id + " .author-image-cover-field").val(attachment.url);
                jQuery("#" + author_upload_image_cover_bull_widget_id + " .author_image_cover").attr('src', attachment.url);
            });
        });
        // Now that everything has been set, let's open up the frame.
        author_widget_upload_cover.open();
    });


    /*upload events end */

    /* ==========================================================================
     #POST FORMATS JS EVENTS
     ========================================================================== */

    // hideAllPostType();

    // //page load post_type show
    // jQuery.each(jQuery('#post-formats-select input'), function (index, value) {
    //     if (jQuery(this).is(':checked')) {
    //         var id = jQuery(this).attr("id");
    //         jQuery("#wow_" + id + '_meta-box-page').show();
    //     }
    // });

    /* ---------------------------------------------------------------------------
     * All format types selection hide
     * --------------------------------------------------------------------------- */
    function hideAllPostType() {
        var types = ["post-format-video", "post-format-image", "post-format-audio", "post-format-gallery", "post-format-link", "post-format-quote", "post-format-status"];
        for (var i = 0; i < types.length; i++) {
            jQuery("#wow_" + types[i] + '_meta-box-page').css("display", "none");

        }
    }


    /* ---------------------------------------------------------------------------
     * All format types selection hide
     * --------------------------------------------------------------------------- */
    jQuery('#post-formats-select input').on('click', function (e) {
        hideAllPostType();
        var id = jQuery(this).attr("id");
        if (id == "post-format-image") {
            jQuery('#postimagediv').scrollView();
            blink("#postimagediv", 3, 500);
        }
        jQuery("#wow_" + id + '_meta-box-page').show();
        jQuery("#wow_" + id + '_meta-box-page').scrollView();
        jQuery("#wp-content-wrap").show();
        blink("#wow_" + id + '_meta-box-page', 3, 500);
     ''

    });


    /* ---------------------------------------------------------------------------
     * Staff plugin dep ajax request
     * --------------------------------------------------------------------------- */
    jQuery('#CHfw_DrAndDep_Select_Departman_Condition').on('change', function() {
        // This does the ajax request
        jQuery.ajax({
            url: ajaxurl,
            data: {
                'action':'CHfw_mp_DepartmanCondition_ajax_request',
                'value' : this.value
            },
            success:function(data) {
                jQuery('#CHfw_DrAndDep_proAndServices_SubConditions').html(data);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    });


    jQuery('#CHfw_DrAndDep_Select_Departman_Treatment').on('change', function () {
        // This does the ajax request
        jQuery.ajax({
            url: ajaxurl,
            data: {
                'action': 'CHfw_mp_DepartmanTreatment_ajax_request',
                'value': this.value
            },
            success: function (data) {
                jQuery('#CHfw_DrAndDep_proAndServices_SubTreatments').html(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    jQuery('#CHfw_DrAndDep_Select_Departman_ResourceFamily').on('change', function () {
        // This does the ajax request
        jQuery.ajax({
            url: ajaxurl,
            data: {
                'action': 'CHfw_mp_DepartmanResourceFamily_ajax_request',
                'value': this.value
            },
            success: function (data) {
                jQuery('#CHfw_DrAndDep_proAndServices_SubResourceFamilys').html(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    jQuery('#CHfw_DrAndDep_Select_Departman_Providers').on('change', function () {
        // This does the ajax request
        jQuery.ajax({
            url: ajaxurl,
            data: {
                'action': 'CHfw_mp_DepartmanProviders_ajax_request',
                'value': this.value
            },
            success: function (data) {
                jQuery('#CHfw_DrAndDep_proAndServices_SubProviders').html(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    jQuery('#CHfw_DrAndDep_display_doctor_department').on('change', function () {
        // This does the ajax request
        jQuery.ajax({
            url: ajaxurl,
            data: {
                'action': 'CHfw_mp_event_post_ajax_request',
                'value': this.value
            },
            success: function (data) {
                jQuery('#CHfw_DrAndDep_program_and_services').html(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });



});





