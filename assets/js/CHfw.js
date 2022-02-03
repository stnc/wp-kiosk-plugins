'use strict';
/*! *wow theme main js
 * http://chromthemes.com
 * Copyright (c) 2017 Chrom Themes;
 *
 * */


jQuery(function () {


    timeline_efects();
    masonry_init();
    jQuery(".woocommerce-product-gallery__trigger").html('<i class="fa fa-arrows-alt" aria-hidden="true"></i>');
    /* ---------------------------------------------------------------------------
     * Header Mobil Search Button (open)
     * --------------------------------------------------------------------------- */
    jQuery(".header-right .navbar-search-button").on("click", function (e) {
        e.preventDefault();
        jQuery("#header-desktop-menu .sticky").addClass("sho-border-none");
        jQuery("#header-desktop-menu .sticky").removeClass("sho-border");
        jQuery(".header-container .search-header-overlay").fadeIn("slow");
        jQuery('#search-header-overlay-form .input-search').focus();
    });

    /* ---------------------------------------------------------------------------
     * Header Mobil Search Button (close)
     * --------------------------------------------------------------------------- */
    jQuery(".search-header-overlay .close").on("click", function (e) {
        e.preventDefault();
        jQuery("#header-desktop-menu .sticky").removeClass("sho-border-none");
        jQuery("#header-desktop-menu .sticky").addClass("sho-border");
        jQuery(".header-container  .search-header-overlay").fadeOut("slow");
    });

    /* ---------------------------------------------------------------------------
     *Ajax search
     * --------------------------------------------------------------------------- */
    if (wow_wp_shop_vars.AjaxSearch == 1) {
        jQuery("#search-form,#search-header-overlay-form,#search-form_mb,#search-mobile-form,#searchForm-desktop-this").submit(function (e) {
            /* //prevent Default functionality*/
            e.preventDefault();
            var s = jQuery(this).find('.input-search').val();
            var post_type = jQuery(this).find('.post_type_cls').val();
            var ch_zone = jQuery(this).find('.post_zone_cls').val();
            shop_search_input(e, s, post_type, ch_zone);
        });
    }

    /* ---------------------------------------------------------------------------
     *BLINK EFFECTS
     * --------------------------------------------------------------------------- */
    function blink(elem, times, speed) {
        if (times > 0 || times < 0) {
            if (jQuery(elem).hasClass("blink"))
                jQuery(elem).removeClass("blink");
            else
                jQuery(elem).addClass("blink");
        }

        clearTimeout(function () {
            blink(elem, times, speed);
        });

        if (times > 0 || times < 0) {
            setTimeout(function () {
                blink(elem, times, speed);
            }, speed);
            times -= .5;
        }
    }

    /* ---------------------------------------------------------------------------
     *VC composer lightbox popup
     * --------------------------------------------------------------------------- */
    jQuery('.ch-lightbox').bind('click', function (e) {

        e.preventDefault();
        e.stopPropagation();
        var type = jQuery(this).data('mfp-type');
        jQuery(this).magnificPopup({
            mainClass: 'wow-media-popup mfp-no-margins nm-mfp-zoom-in',
            closeMarkup: '<a class="mfp-close li36"></a>',
            removalDelay: 180,
            type: type,
            closeOnContentClick: true,
            closeBtnInside: true
        }).magnificPopup('open');
    });


    /* ---------------------------------------------------------------------------
     *Mobil menu
     * --------------------------------------------------------------------------- */
    jQuery("#mobil-menu-container .menu-item-has-children,#mobil-menu-sidebar .menu-item-has-children").append("<div class='open-menu-link open'>+</div>");
    jQuery('#mobil-menu-container .menu-item-has-children,#mobil-menu-sidebar .menu-item-has-children').append("<div class='open-menu-link close'>-</div>");
    jQuery('#mobil-menu-container .open ,#mobil-menu-sidebar .open').addClass('visible');
    jQuery('#mobil-menu-container .open-menu-link ,#mobil-menu-sidebar .open-menu-link').click(function (e) {
        var childMenu = e.currentTarget.parentNode.children[1];
        if (jQuery(childMenu).hasClass('visible')) {
            jQuery(childMenu).removeClass("visible");
            jQuery(e.currentTarget.parentNode.children[3]).removeClass("visible");
            jQuery(e.currentTarget.parentNode.children[2]).addClass("visible");
        } else {
            jQuery(childMenu).addClass("visible");
            jQuery(e.currentTarget.parentNode.children[2]).removeClass("visible");
            jQuery(e.currentTarget.parentNode.children[3]).addClass("visible");
        }
    });


    /* ---------------------------------------------------------------------------
     *Departmas
     * --------------------------------------------------------------------------- */
    jQuery("#accordion-menu-container .menu-item-has-children").append("<div class='open-menu-link open'>+</div>");
    jQuery('#accordion-menu-container .menu-item-has-children').append("<div class='open-menu-link close'>-</div>");
    jQuery('#accordion-menu-container .open ').addClass('visible');
    jQuery('#accordion-menu-container .open-menu-link ').click(function (e) {
        var childMenu = e.currentTarget.parentNode.children[1];
        if (jQuery(childMenu).hasClass('visible')) {
            jQuery(childMenu).removeClass("visible");
            jQuery(e.currentTarget.parentNode.children[3]).removeClass("visible");
            jQuery(e.currentTarget.parentNode.children[2]).addClass("visible");
        } else {
            jQuery(childMenu).addClass("visible");
            jQuery(e.currentTarget.parentNode.children[2]).removeClass("visible");
            jQuery(e.currentTarget.parentNode.children[3]).addClass("visible");
        }
    });


    /* ---------------------------------------------------------------------------
     *Mobil menu sidebar open
     * --------------------------------------------------------------------------- */
    jQuery(document).on("click touchstart", "#mobil_menu_sidebar_open", function () {


        if (jQuery("#wp-toolbar").hasClass("quicklinks")) {
            jQuery('#mobil-menu-sidebar .menu').css("margin-top", "46px");
        }
        jQuery("#header-desktop-menu .yamm").hide();
        jQuery("#mobil-menu-sidebar").show();

        setTimeout(function () {
            jQuery("#mobil-menu-sidebar .menu-wrap").addClass("on");
        }, 200);

        setTimeout(function () {

            jQuery("._menu-toggleN").show();
            jQuery(".header-logo").show();

        }, 800);

    });

    /* ---------------------------------------------------------------------------
     *locaiton page nice scroll
    * --------------------------------------------------------------------------- */
    jQuery("#location-page .locationsALL").niceScroll();
    jQuery("#location-page .hospitals-item-UL .hospitals-item").niceScroll();

    /* ---------------------------arc STAFF nice sroll------------------------------------------------*/
    jQuery(".doc-container").niceScroll();  // let's do the magic! 😀


    /* ---------------------------------------------------------------------------
    *Mobil menu sidebar close
     * --------------------------------------------------------------------------- */
    jQuery(document).on("click touchstart", "#mobil-menu-sidebar .menu-close", function () {


        jQuery("#header-desktop-menu .yamm").show();
        jQuery("._menu-toggleN").hide();

        setTimeout(function () {
            jQuery("#mobil-menu-sidebar .menu-wrap").removeClass("on");
        }, 200);


        setTimeout(function () {
            jQuery("#mobil-menu-sidebar .menu-wrap").removeClass("on");
            // jQuery(".header-logo").hide();
            jQuery("._menu-toggleN").show();
            jQuery("#mobil-menu-sidebar").hide();
        }, 800);


    });
    // --if  #wpadminbar open
    setTimeout(function () {
        var Header_wpadminbar = jQuery("#wp-toolbar").hasClass("quicklinks") ? 'wpadminOK' : '';
        jQuery('#wrapper .header-container').addClass(Header_wpadminbar);
    }, 500);


    /* ---------------------------------------------------------------------------
     *Sticky for header
     * --------------------------------------------------------------------------- */
    if (wow_wp_shop_vars.sticky_menu === '1') {
        /*//sticky*/
        var stickyClass = jQuery("#wp-toolbar").hasClass("quicklinks") ? 'sticky35' : 'sticky';
        // jQuery('.yamm.navbar').addClass(stickyClass);
        jQuery(window).scroll(function () {
            /*  // grab the initial top offset of the navigation*/
            var stickyNavTop = jQuery('.yamm.navbar').offset().top;
            var scrollTop = jQuery(window).scrollTop(); // our current vertical position from the top
            /* if we've scrolled more than the navigation, change its position to fixed to stick to top,
             otherwise change it back to relative*/
            if (scrollTop > 100) { //  if (scrollTop > stickyNavTop) {
                jQuery('.yamm.navbar').addClass(stickyClass);
                jQuery('#mobil-menu-container').addClass(stickyClass);
                jQuery('.search-header-overlay').addClass(stickyClass);


            } else {
                jQuery('.yamm.navbar').removeClass(stickyClass);
                jQuery('#mobil-menu-container').removeClass(stickyClass);
                jQuery('.search-header-overlay').removeClass(stickyClass);
                jQuery('.header-container.header-standart .search-header-overlay').hide();
                /* jQuery('#mega_menu_logoid').hide();*/
            }
        });
    }

    /*****category page yith add_to_wishlist init*********/
    jQuery(".add_to_wishlist").attr("original-title", wow_wp_shop_vars.add_to_wishlist_translate);
    image_overlay();
    var wrapper = jQuery('#bodyheader .ajax-page-content .blog');
    //mediaplayerAudioinitRUN(wrapper);
    setTimeout(function () {
        mediaplayerRUNAudioRuN(wrapper);
        mediaplayerRUNVideoRuN(wrapper);
    }, 500);


    /* ---------------------------------------------------------------------------
     * VC staff hover (top)  //SERVICE BOX
     * --------------------------------------------------------------------------- */
    jQuery(".staff-basic .staff-item").hover(function () {
        var bgHover = jQuery(".staff-basic .staff-item").attr("data-bgHoverColor");
        jQuery(".staff-basic .staff-item:hover .staff-item-descr").css("background-color", bgHover);
    }, function () {
        var bgColor = jQuery(".staff-basic .staff-item").attr("data-bgColor");
        jQuery(".staff-basic .staff-item .staff-item-descr").css("background-color", bgColor);
    });


    jQuery(".menu-builder-list").hover(function () {
        var bgHover = jQuery(this).attr("data-bgHoverColor");
        var textHoverColor = jQuery(this).attr("data-textHoverColor");
        jQuery(this).find('.menu-builder-a').css("background-color", bgHover);
        jQuery(this).find('.menu-builder-a').css("color", textHoverColor);

    }, function () {
        var bgColor = jQuery(this).attr("data-bgColor");
        var textColor = jQuery(this).attr("data-textColor");
        jQuery(this).find('.menu-builder-a').css("background-color", bgColor);
        jQuery(this).find('.menu-builder-a').css("color", textColor);
    });


    /* ---------------------------------------------------------------------------
     * VC staff hover (bottom) //SERVICE BOX
     * --------------------------------------------------------------------------- */
    jQuery(".services-boxes-basic .service .service-desc").hover(function () {
        var bgHover = jQuery(this).attr("data-bgHoverColor");
        jQuery(this).css("background-color", bgHover);
    }, function () {
        var bgColor = jQuery(this).attr("data-bgColor");
        jQuery(this).css("background-color", bgColor);
    });

    /* ---------------------------------------------------------------------------
     * VC staff hover (slideinbottom)
     * --------------------------------------------------------------------------- */
    jQuery(".services-box-SlideInBottom-wrap .services-box-content-block").hover(function () {
            var bgHover = jQuery('.services-box-SlideInBottom-wrap .services-box-content-block').attr("data-bgHoverColor");
            jQuery('.services-box-SlideInBottom-wrap .services-box-content-block:hover figcaption').css("background-color", bgHover);
        }, function () {
            jQuery('.services-box-SlideInBottom-wrap .services-box-content-block figcaption').css("background-color", 'rgba(0, 0, 0, 0.60)');
        }
    );

    /* ---------------------------------------------------------------------------
     * Departmans page /tabs events
     * --------------------------------------------------------------------------- */
    jQuery('#myTabs a').click(function (e) {
        e.preventDefault();
        jQuery('#myTabs li').removeClass('active');
        jQuery('.tab-content .tab-pane').removeClass('active in');
        var $ne = jQuery(this).attr('href');
        jQuery('.tab-content ' + $ne).addClass('active in');
    });


});

/* ---------------------------------------------------------------------------
 *REsponsive size
 * --------------------------------------------------------------------------- */
function mobile_resize(target, topParam) {
    if (target == '') {
        var target = '#bodyheader';
    }
    if (topParam != '') {
        var topParam = topParam;
    } else {
        var topParam = 2;
    }
    if (jQuery(window).width() <= 425) {
        scroll_target(target, topParam);
    }
}

/* ---------------------------------------------------------------------------
 *SCROLL target
 * --------------------------------------------------------------------------- */
function scroll_target(target, topParam) {

    if (target != '') {
        var target = target;
    } else {
        var target = '#bodyheader';
    }

    if (topParam != '') {
        var topParam = topParam;
    } else {
        var topParam = 2;
    }

    setTimeout(function () {
        var $target = jQuery(target);
        jQuery('html, body').stop().animate({
            'scrollTop': $target.offset().top + topParam
        }, 300, 'swing');

    }, 500);
}

/* ---------------------------------------------------------------------------
 *scroll To Top
 * --------------------------------------------------------------------------- */
function scroolEvents() {

    jQuery('.scrollToTop').click(function () {

        jQuery('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
}

//init
scroolEvents();

/* ---------------------------------------------------------------------------
 *Ajax Search func
 * --------------------------------------------------------------------------- */
function shop_search_input(e, s, post_type, ch_zone) {
    //  jQuery(document).ajaxStop(jQuery.unblockUI);
    e.preventDefault();
    e.stopPropagation();
    jQuery('.pagination-centered').remove();
    var block_ui_tag = "#woo-archiveproduct-page";
    ajax_shop_loading_block_ui(block_ui_tag);


    jQuery.ajax({
        type: 'GET',
        url: wow_wp_shop_vars.ajaxSiteUrl, // Note: Encoding the search string with "encodeURIComponent" to avoid breaking the AJAX url
        data: {
            s: encodeURIComponent(s),
            shop_loading: 'ajax_search',
            post_type: post_type,
            ch_zone: ch_zone,
            page_info: wow_pageinfo.page_name
        },
        datatype: 'html',
        success: function (data) {
            /* response = jQuery('<div>' + data + '</div>');
             newElements = response.find('.ajax-page-content  .tamp-container');
             jQuery('#bodyheader .ajax-page-content').append(newElements);*/
            jQuery('#bodyheader .ajax-page-content').empty();
            jQuery('#bodyheader .ajax-page-content').html(data);
            jQuery('#bodyheader .entry-summary_padding').css({'padding': '0'});
            //   jQuery('.masonry-post').css({'padding': '0'});
            //  wishlistChanges();
            // lazzyLoadImages();
            jQuery(block_ui_tag).unblock();
            scroll_target('', 2);
            image_overlay();
            //blog
            mediaplayerAudioinitRUN();
            var wrapper = jQuery('#bodyheader .ajax-page-content .blog');
            mediaplayerRUNVideoRuN(wrapper);


        },
        error: function (e) {
            console.log(e);
        }
    });

    return false;
}

/* ---------------------------------------------------------------------------
 *Media player init
 * --------------------------------------------------------------------------- */
function mediaplayerRUNVideoRuN(wrapper) {

    wrapper.find('> .post video').mediaelementplayer({
        loop: false,
        alwaysShowControls: false,
        enableKeyboard: true,
        enableAutosize: true,
        // force iPad's native controls
        iPadUseNativeControls: true,
        AndroidUseNativeControls: true,
        // force iPhone's native controls
        iPhoneUseNativeControls: true,
        features: ['playpause', 'progress', 'current', 'volume', 'fullscreen', 'backlight'],
        audioHeight: 40,
        alwaysShowHours: false
    });
}

/* ---------------------------------------------------------------------------
 *Audio player init v1
 * --------------------------------------------------------------------------- */
function mediaplayerRUNAudioRuN(wrapper) {
    wrapper.find('> .post audio').mediaelementplayer({
        loop: false,
        enableAutosize: true,
        enableKeyboard: true,
        alwaysShowControls: false,
        // force iPad's native controls
        iPadUseNativeControls: true,
        // force iPhone's native controls
        iPhoneUseNativeControls: true,
        AndroidUseNativeControls: true,
        features: ['playpause', 'progress', 'current', 'volume', 'backlight'],
        audioHeight: 45,
        alwaysShowHours: false
    });
}


/* ---------------------------------------------------------------------------
 *Audio player init v2
 * --------------------------------------------------------------------------- */
function mediaplayerAudioinitRUN() {
    var settings = {};
    if (typeof _wpmejsSettings !== 'undefined') {
        settings = _wpmejsSettings;
    }
    settings.success = settings.success || function (mejs) {
        var autoplay, loop;
        if ('flash' === mejs.pluginType) {
            autoplay = mejs.attributes.autoplay && 'false' !== mejs.attributes.autoplay;
            loop = mejs.attributes.loop && 'false' !== mejs.attributes.loop;
            autoplay && mejs.addEventListener('canplay', function () {
                mejs.play();
            }, false);
            loop && mejs.addEventListener('ended', function () {
                mejs.play();
            }, false);
        }
    };
    /*  //this tag not web site*/
    jQuery('.site-audio').mediaelementplayer(settings);
}

/* ---------------------------------------------------------------------------
 *Blog post image overlay effect
 * --------------------------------------------------------------------------- */
function image_overlay() {
    if (Modernizr.touch) {
        /* show the close overlay button*/
        jQuery(".blog .body-post .close-overlay").removeClass("hidden");
        /* handle the adding of hover class when clicked*/
        jQuery(".blog .body-post .image").click(function (e) {
            if (!jQuery(this).hasClass("hover")) {
                jQuery(this).addClass("hover");
            }
        });
        /* handle the closing of the overlay*/
        jQuery(".blog .body-post .close-overlay").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (jQuery(this).closest(".blog .body-post .image").hasClass("hover")) {
                jQuery(this).closest(".blog .body-post .image").removeClass("hover");
            }
        });
    } else {
        /* handle the mouseenter functionality*/
        jQuery(".blog .body-post .image").mouseenter(function () {
            jQuery(this).addClass("hover");
        })
        /* handle the mouseleave functionality*/
            .mouseleave(function () {
                jQuery(this).removeClass("hover");
            });
    }
}


/* ---------------------------------------------------------------------------
 *TABS
 * --------------------------------------------------------------------------- */
jQuery('ul.nav-tabs li').on("click", function (e) {
    var tab_id = jQuery(this).attr('data-tab');
    var tab_container = jQuery(this).attr('data-container');
    jQuery(tab_container + ' ul.nav li').removeClass('active');
    jQuery(tab_container + ' .tab-content div').removeClass('active');
    jQuery(this).addClass('active');
    jQuery(tab_container + " #" + tab_id).addClass('active');
    jQuery('.' + tab_id).addClass('active');
    jQuery('.' + tab_id).show();
});


/* ---------------------------------------------------------------------------
 *IF Ajax link disable ?
 * --------------------------------------------------------------------------- */
function setLocation(goto_link) {
    window.location.href = goto_link;
}

/* ---------------------------------------------------------------------------
 *Mobil Menu Open
 * --------------------------------------------------------------------------- */
jQuery('#mobil-menu-open').click(function () {
    /*jQuery('#mobil-menu-container .responsive-menu').toggleClass('expand');*/
    jQuery('#mobil-menu-container .responsive-menu').slideToggle('fast');
    jQuery('#accordion-menu-container .responsive-menu').slideToggle('fast');
});

/* ---------------------------------------------------------------------------
 *Timeline Post Page Effects
 * --------------------------------------------------------------------------- */
function timeline_efects() {
    if (wow_pageinfo.page_name == "timeline" || wow_pageinfo.page_name == "zigzag-page-two" || wow_pageinfo.page_name == "zigzag-page") {
        var offset;
        var timelineBlocks = jQuery('.sc_fw-timeline-block'),
            offset = 0.8;

        //hide timeline blocks which are outside the viewport
        hideBlocks(timelineBlocks, offset);

        //on scolling, show/animate timeline blocks when enter the viewport
        jQuery(window).on('scroll', function () {
            (!window.requestAnimationFrame)
                ? setTimeout(function () {
                    showBlocks(timelineBlocks, offset);
                }, 100)
                : window.requestAnimationFrame(function () {
                    showBlocks(timelineBlocks, offset);
                });
        });
    }
}

/* ---------------------------------------------------------------------------
 *Timeline Post Page Effects  (uses timeline_efects())
 * --------------------------------------------------------------------------- */
function hideBlocks(blocks, offset) {
    blocks.each(function () {
        (jQuery(this).offset().top > jQuery(window).scrollTop() + jQuery(window).height() * offset) &&
        jQuery(this).find('.sc_fw-timeline-img, .sc_fw-timeline-content').addClass('is-hidden');
    });
}

/* ---------------------------------------------------------------------------
 *Timeline Post Page Effects  (uses timeline_efects())
 * --------------------------------------------------------------------------- */
function showBlocks(blocks, offset) {
    blocks.each(function () {
        (jQuery(this).offset().top <= jQuery(window).scrollTop() + jQuery(window).height() * offset &&
            jQuery(this).find('.sc_fw-timeline-img').hasClass('is-hidden'))
        && jQuery(this).find('.sc_fw-timeline-img, .sc_fw-timeline-content').removeClass('is-hidden').addClass('bounce-in');
    });
}

/* ---------------------------------------------------------------------------
 *Ajax Load More
 * --------------------------------------------------------------------------- */
jQuery(document).on("click touchstart", "#blog_loadmore-container .loadmore-btn", function () {
    var url = jQuery('#blog_loadmore-container .loadmore-link a').attr("href");
    url = url.replace(/\/?(\?|#|$)/, '/$1');//for 301 redirect
    if (url) {
        var wrapper = jQuery('#bodyheader .ajax-page-content .blog');
        var pageNum = 1;
        var offset = wrapper.find('> .post').length;
        jQuery('#blog_loadmore-container .loadmore-controls .loadinger').show();
        jQuery('#blog_loadmore-container .loadmore-btn').hide();

        jQuery.ajax({
            type: 'POST',
            data: {
                ch_action: 'ch_ajax_blog_posts',
            },
            datatype: 'html',
            url: url,
            beforeSend: function () {
                //loadMore.text('').addClass('active');
            },
            success: function (data) {
                var response = jQuery('<div>' + data + '</div>');
                var nextPageUrl = response.find('.loadmore-link-outer').children('a').attr('href');

                if (nextPageUrl) {
                    jQuery('#blog_loadmore-container .loadmore-link a').attr("href", nextPageUrl);
                } else {
                    //   alert("not found");
                    jQuery('#blog_loadmore-container .loadmore-link a').removeAttr("href");
                    jQuery('#blog_loadmore-container .loadmore-controls .loadmore-btn').addClass('importantRule');
                    jQuery('#blog_loadmore-container .loadmore-controls').css('background-color', '#999');
                    jQuery('#blog_loadmore-container .loadmore-all-loaded').show();
                    jQuery('#blog_loadmore-container .loadmore-controls').hide();
                    /*//timeline*/
                    jQuery('#blog_loadmore-container').hide();
                    /*timeline*/

                }

                if (data != 'empty') {
                    // check posts length
                    if (jQuery(data).length) {

                        // add posts
                        wrapper.find('> .post').last().after(jQuery(data));
                        wrapper.find('> .loadmore-link-outer').remove();//timeline
                        mediaplayerRUNAudioRuN(wrapper);
                        image_overlay();
                        mediaplayerRUNVideoRuN(wrapper);
                        masonry_refresh();
                        timeline_efects();

                    } else {
                        //console.log(data);
                    }
                }
                else {
                    jQuery('#blog_loadmore-container .loadmore-btn').addClass('importantRule');
                    jQuery('#blog_loadmore-container .loadmore-all-loaded').show();
                }
            },
            error: function (e) {
                console.log(e);
            },
            complete: function () {
                jQuery('#blog_loadmore-container .loadmore-controls .loadinger').hide();
                jQuery('#blog_loadmore-container .loadmore-btn').show();

            },
        });
        return false;
    }
});

/* ---------------------------------------------------------------------------
 *Masonry refresh
 * --------------------------------------------------------------------------- */
function masonry_refresh() {
    if ((typeof masonry_control !== 'undefined')) {
        if (masonry_control) {
            setTimeout(function () {
                jQuery('.page-masonry-blog').masonry('reloadItems');
                jQuery('.page-masonry-blog').masonry('layout');
            }, 500);
        }
    }
}

/* ---------------------------------------------------------------------------
 *Masonry init
 * --------------------------------------------------------------------------- */
function masonry_init() {
    if (wow_pageinfo.page_name == "masonry-page" || wow_pageinfo.page_name == "archive-page_masonry") {
        jQuery(window).on('load', function () {
            jQuery('.page').masonry({
                itemSelector: '.masonry-post'
            });

            jQuery('.blog').masonry({
                itemSelector: '.masonry-post'
            });
        });
    }
}


jQuery(window).on('load', function () {
    /*---------- LOADER ----------/
     //https://ihatetomatoes.net/create-custom-preloading-screen
     http://joaopereirawd.github.io/fakeLoader.js/
     */
    setTimeout(function () {
        jQuery('body').addClass('loaded');
        jQuery('h1', '.loaded-class-color').css('color', '#222222');
    }, 200);


    /*---------- Product Detail page and  gallery page  and media page (vc media) ----------*/
    setTimeout(function () {
        jQuery('.vc_pageable-slide-wrapper .vc_gitem-zone, ' +
            '.imageContainer .images .item  ').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                /*  titleSrc: function(item) {
                 return item.el.attr('title') + '<small>by magnificPopup&themeforest :)</small>';
                 }*/
            }
        });
        jQuery('#redux_rAds').remove();

    }, 200);


});

/* ---------------------------------------------------------------------------
 *Gallery page picture and VC Image Carousel
 * --------------------------------------------------------------------------- */
jQuery('#gallery-1,.vc_carousel-slideline').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function (item) {
            return item.el.attr('title') + '<small>wow</small>';
        }
    }
});


/* ---------------------------------------------------------------------------
 *Post and Page.php image lightbox
 * --------------------------------------------------------------------------- */
jQuery('.entry-summary .magnify').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
        verticalFit: true
    },
    zoom: {
        enabled: true,
        duration: 300 // don't foget to change the duration also in CSS
    }
});


/*---------- redux ----------*/
setTimeout(function () {
    jQuery('#redux_rAds').remove();
}, 800);


/* ---------------------------------------------------------------------------
 *Post and Page.php image lightbox
 * --------------------------------------------------------------------------- */
jQuery('#fullwith').click(function () {
    var control = jQuery(this).is(':checked');
    if (control) {
        jQuery('#wrapper').addClass("boxed-attack");
        jQuery('#page-customize').removeClass("container");
        jQuery('#page-customize').addClass("row");
        /*  jQuery('#header-main').addClass("fullwidth-element");*/
    } else {
        jQuery('#wrapper').removeClass("boxed-attack");
        jQuery('#page-customize').addClass("container");
        jQuery('#page-customize').removeClass("row");
    }
});

/* ---------------------------------------------------------------------------
 *Commnet Button
 * --------------------------------------------------------------------------- */
jQuery('#comment-list-id .btn-info').click(function () {
    var $target = jQuery(this).attr('href');
    jQuery('.comments-tab-container .nav li').removeClass("active");
    jQuery('#respond_commentsTab').addClass("active");
    jQuery('#respond_commentsTab').click();
});

/* ---------------------------------------------------------------------------
 *Slider | visual composer elements
 * --------------------------------------------------------------------------- */
function slick_slider_init(target, arrays_values) {
    var obj;
    var speed;
    var autoplay;
    var vertical;
    var slide_to_standard_piece;

    var slide_to_1024_piece;
    var slide_to_768_piece;
    var slide_to_600_piece;
    var slide_to_480_piece;
    var slide_to_375_piece;
    var slide_to_320_piece;
    if (typeof arrays_values !== 'undefined') {
        obj = JSON.parse(arrays_values);
        if (obj != '') {
            speed = obj.speed;
            autoplay = obj.autoplay;
            vertical = obj.vertical;
            slide_to_standard_piece = obj.slide_to_standard_piece;
            slide_to_1024_piece = obj.slide_to_1024_piece;
            slide_to_768_piece = obj.slide_to_768_piece;
            slide_to_600_piece = obj.slide_to_600_piece;
            slide_to_480_piece = obj.slide_to_480_piece;
            slide_to_375_piece = obj.slide_to_375_piece;
            slide_to_320_piece = obj.slide_to_320_piece;
        } else {
            speed = 2000;
            autoplay = false;
            vertical = false;
            slide_to_standard_piece = 4;
            slide_to_1024_piece = 3;
            slide_to_768_piece = 3;
            slide_to_600_piece = 3;
            slide_to_480_piece = 2;
            slide_to_375_piece = 2;
            slide_to_320_piece = 1;
        }
    } else {
        speed = 2000;
        autoplay = false;
        vertical = false;
        slide_to_standard_piece = 4;
        slide_to_1024_piece = 3;
        slide_to_768_piece = 3;
        slide_to_600_piece = 3;
        slide_to_480_piece = 2;
        slide_to_375_piece = 2;
        slide_to_320_piece = 1;
    }


    if (vertical) {
        var verticalSwipingkey = true;
    } else {
        var verticalSwipingkey = false;
    }

    jQuery(target).slick({
        slidesToShow: slide_to_standard_piece,
        slidesToScroll: 2,
        autoplay: autoplay,
        autoplaySpeed: speed,
        vertical: vertical,
        verticalSwiping: verticalSwipingkey,
        draggable: true,
        variableWidth: false,
        swipeToSlide: true,
        touchMove: true,
        dots: false,
        arrows: obj.arrows,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: slide_to_1024_piece,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: slide_to_768_piece,
                    slidesToScroll: 2,
                    dots: false
                }
            },
            {
                breakpoint: 766,
                settings: {
                    slidesToShow: slide_to_768_piece,
                    slidesToScroll: 2,
                    dots: false
                }
            },

            {
                breakpoint: 600,
                settings: {
                    slidesToShow: slide_to_600_piece,
                    slidesToScroll: 2,
                    dots: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: slide_to_480_piece,
                    slidesToScroll: 1,
                    dots: false
                }
            },
            {
                breakpoint: 375,
                settings: {
                    slidesToShow: slide_to_375_piece,
                    slidesToScroll: 1,
                    dots: false
                }
            },
            {
                breakpoint: 320,
                settings: {
                    slidesToShow: slide_to_320_piece,
                    slidesToScroll: 1,
                    dots: false
                }
            }

            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
}

/* ---------------------------------------------------------------------------
 *Slider | visual composer elements and gallery page
 * --------------------------------------------------------------------------- */
function slick_slider_gallery_init(target, autoplay) {
    //post gallery
    jQuery(target).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        autoplay: autoplay,
        fade: true,
        dots: false,
        lazyLoad: 'ondemand',
        autoplaySpeed: 6000,
        variableWidth: false,
        asNavFor: '.thumbs-product-slider-nav',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    dots: false,
                    arrows: true,
                }
            },

        ]
    });
}

/* ---------------------------------------------------------------------------
 *magnificPopup | QUICKVIEW // Last cart notification  | Lightbox
 * uses (*Quickview  live ajax click trigger / addTocartAjaxOpen funciton )
 * --------------------------------------------------------------------------- */
function magnifiy_inline_popup() {
    jQuery.magnificPopup.open({
        type: 'inline',
        items: {
            src: '#small-dialog',
        },
        /* callbacks: {
         open: function () {
         var small_dialog_height = jQuery('.mfp-content').outerHeight(true)-80;
         jQuery('.mfp-content #small-dialog').css('height', small_dialog_height + 'px');
         }
         },*/
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        midClick: true,
        adaptiveHeight: true,
        enableEscapeKey: true,
        preloader: true
        //closeOnBgClick: true
    });
}

/*---------------------------------------------------------------------
 *magnificPopup | Lightbox //deprecated
 * --------------------------------------------------------------------- */
function magnifiy_inline_popup_inline_deprecated() {
    jQuery.magnificPopup.open({
        type: 'inline',
        items: {
            src: '#small-dialog',
        },
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: true,
        midClick: true,
        removalDelay: 300,
        closeOnContentClick: false,
        enableEscapeKey: true,
        closeOnBgClick: true
    });
}


/* ---------------------------------------------------------------------------
 * SHOP page /checkout page | Ajax pagination loading effects
 * --------------------------------------------------------------------------- */
function ajax_shop_loading_block_ui(target) {

    if (target == "default") {
        target = "#bodyheader";
    }

    jQuery(target).block({
        message: '<div class="loadinger">' +
        '<div id="Pagination-fountainG">' +
        ' <div id="Pagination-fountainG_1" class="Pagination-fountainG"></div>' +
        ' <div id="Pagination-fountainG_2" class="Pagination-fountainG"></div>' +
        ' <div id="Pagination-fountainG_3" class="Pagination-fountainG"></div>' +
        '  <div id="Pagination-fountainG_4" class="Pagination-fountainG"></div>' +
        ' <div id="Pagination-fountainG_5" class="Pagination-fountainG"></div>' +
        ' <div id="Pagination-fountainG_6" class="Pagination-fountainG"></div>' +
        ' <div id="Pagination-fountainG_7" class="Pagination-fountainG"></div>' +
        '  <div id="Pagination-fountainG_8" class="Pagination-fountainG"></div>' +
        ' </div></div>',
        css: {
            border: 'none',
            background: 'none',
            left: '50%!important',
            top: '50%!important',
            textAlign: 'center',
            padding: 0,
            margin: 0,
        },
        overlayCSS: {
            backgroundColor: '#000',
            opacity: 0.3,
            cursor: 'wait'
        }
    });
}

/* ---------------------------------------------------------------------------
 *Lazzy images | visual composer elements
 * --------------------------------------------------------------------------- */
jQuery(document).on("click touchstart", ".vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab_ a_", function (e) {
    lazzyLoadImages();
});

/* ---------------------------------------------------------------------------
 * Array Search Func
 * http://stackoverflow.com/questions/784012/javascript-equivalent-of-phps-in-array
 * --------------------------------------------------------------------------- */
function array_search(needle, haystack) {
    for (var i in haystack) {
        if (haystack[i] == needle) return i;
    }
    return false;
}

/*
 * javasciprt quick search
 * first param = input id
 * second param ul id
 * dom sort => input - ul - li -a (important)
 * */
function JSquickSearch($domainElemnt, $SubElement) {
    var input, filter, ul, li, a, i;
    input = document.getElementById($domainElemnt);
    filter = input.value.toUpperCase();
    ul = document.getElementById($SubElement);
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}

/*HOMEPAGE find a program and service ajax*/
jQuery(function () {
    jQuery(".SearchComponent.Find-Doctors-Page #advanced-search-input").autocomplete({
        serviceUrl: "/wp-admin/admin-ajax.php?action=CHfw_StaffFindAjax",
        onSelect: function (suggestion) {
            window.location.href = suggestion.data;
        },
    });

    jQuery("#Departmans").on('change', function (e) {
        var optionSelected = jQuery("option:selected", this);
        var valueSelected = this.value;
        jQuery.ajax({
            type: 'GET',
            url: "/wp-admin/admin-ajax.php?action=CHfw_StaffProgramAndServices_FindAjax", // Note: Encoding the search string with "encodeURIComponent" to avoid breaking the AJAX url
            data: {
                value: encodeURIComponent(valueSelected),
            },
            datatype: 'html',
            success: function (data) {
                jQuery('#subDepartmans').empty();
                jQuery('#subDepartmans').html(data);
            },

            error: function (e) {
                console.log(e);
            }
        });

    });

    if (jQuery("#Find-Doctors-Page-Component").hasClass("Find-Doctors-Page")) {

        jQuery('.Find-Doctors-Page.SearchComponent select').each(function () {
            var $this = jQuery(this), numberOfOptions = jQuery(this).children('option').length;

            $this.addClass('select-hidden');
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled"></div>');

            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = jQuery('<ul />', {
                'class': 'select-options'
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                jQuery('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            var $listItems = $list.children('li');

            $styledSelect.click(function (e) {
                e.stopPropagation();
                jQuery('div.select-styled.active').not(this).each(function () {
                    jQuery(this).removeClass('active').next('ul.select-options').hide();
                });
                jQuery(this).toggleClass('active').next('ul.select-options').toggle();
            });

            $listItems.click(function (e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val(jQuery(this).attr('rel'));
                $list.hide();
                //console.log($this.val());
            });

            $(document).click(function () {
                $styledSelect.removeClass('active');
                $list.hide();
            });
        });
    }
});




