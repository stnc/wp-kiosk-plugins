<?php
header('Content-Type: text/css');
/**
 * This will fetch custom theme style from the backend
 */
define('WP_USE_THEMES', false);
require_once ('../../../../../wp-load.php');

global $CHfw_rdx_options,$CHfw_select_skin;

$pid='';
if (isset ($_GET['pid'])){
     $pid=$_GET['pid'];
}

$header_type=CHfw_get_meta( $pid, 'wow_pageSetting_header_type_selected' );


if (!empty($CHfw_rdx_options['main_font'] ['font-family'])){
		if ( $CHfw_rdx_options['main_font_source'] === '2' && isset( $CHfw_rdx_options['main_font_typekit_kit_id'] ) ) {
			// Typekit font
			$main_font_css = 'font-family:"' . $CHfw_rdx_options['main_typekit_font'] . '";';
		} elseif ($CHfw_rdx_options['main_font_source'] === '1')  {
			// Standard + Google Webfonts font
			$main_font_css = 'font-family:"' . $CHfw_rdx_options['main_font']['font-family'] . '"';
		}

		// Secondary font
		$secondary_font_enabled = ( $CHfw_rdx_options['secondary_font_source'] !== '0' ) ? true : false;
		if ( $secondary_font_enabled ) {
			if ( $CHfw_rdx_options['secondary_font_source'] == '2' && isset( $CHfw_rdx_options['secondary_font_typekit_kit_id'] ) ) {
				// Typekit font
				$secondary_font = $CHfw_rdx_options['secondary_typekit_font'];
			} elseif ($CHfw_rdx_options['main_font_source'] === '1')  {
				// Standard + Google Webfonts font
				$secondary_font = $CHfw_rdx_options['secondary_font']['font-family'];
			}
		}
}
?>
body {
<?php echo $main_font_css; ?>;
    color: <?php echo $CHfw_rdx_options['EntriePage_typography_'.$CHfw_select_skin]['color'] ?>;
font-size: <?php echo $CHfw_rdx_options['EntriePage_typography_'.$CHfw_select_skin]['font-size'] ?>;
background-color: <?php echo $CHfw_rdx_options['siteBodyBackgroundOptions_'.$CHfw_select_skin]['background-color'] ?>;
<?php if (!empty($CHfw_rdx_options['siteBodyBackgroundOptions_'.$CHfw_select_skin]['background-image'])){ ?> background-image: url("<?php echo $CHfw_rdx_options['siteBodyBackgroundOptions_'.$CHfw_select_skin]['background-image'] ?>");
<?php } ?> background-repeat: <?php echo $CHfw_rdx_options['siteBodyBackgroundOptions_'.$CHfw_select_skin]['background-repeat'] ?>;
background-position: <?php echo $CHfw_rdx_options['siteBodyBackgroundOptions_'.$CHfw_select_skin]['background-position'] ?>;
background-size: <?php echo $CHfw_rdx_options['siteBodyBackgroundOptions_'.$CHfw_select_skin]['background-size'] ?>;
background-attachment: <?php echo $CHfw_rdx_options['siteBodyBackgroundOptions_'.$CHfw_select_skin]['background-attachment'] ?>;
}
<?php
//my account page options--border //user login page
if (isset($CHfw_rdx_options['account_border_select'] ) && $CHfw_rdx_options['account_border_select'] == 2) {
?>

#myaccountpage .panel-default > .panel-heading {
	background: none !important;
	border: none !important;
	font-size: 16px;
	font-weight: bold;
	padding-bottom: 0px;
}

#myaccountpage .panel {
	border: none !important;
}

<?php }; ?>



header .top-nav {
	background-color: <?php echo $CHfw_rdx_options['top-navbarBG_color_'.$CHfw_select_skin] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['top-navbar_border_'.$CHfw_select_skin]['border-bottom'].' '.
     $CHfw_rdx_options['top-navbar_border_'.$CHfw_select_skin]['border-style'].' '.
    $CHfw_rdx_options['top-navbar_border_'.$CHfw_select_skin]['border-color'];?> !important;
<?php if ($CHfw_rdx_options['top-navbar_dropdownBoxShadowEnableDisable_'.$CHfw_select_skin]==1){
    echo 'box-shadow:0 -8px 8px -8px '.$CHfw_rdx_options['top-megaMenu_BoxShadow_color_'.$CHfw_select_skin] .' inset;'; }

?>
}

#header-desktop-menu  .yamm {
	background-color: <?php echo $CHfw_rdx_options['megaMenu_backgroundcolor_'.$CHfw_select_skin]; ?>;
	border-top: 0;
	border-right: 0;
	border-left: 0;
	border-bottom: <?php echo $CHfw_rdx_options['megaMenu_topMenuBorderOption_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['megaMenu_topMenuBorderOption_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['megaMenu_topMenuBorderOption_'.$CHfw_select_skin]['border-color']?>;
}

@media only screen and (max-width: 768px) {
	#header-desktop-menu  .yamm {
		border-top: 0;
		border-right: 0;
		border-left: 0;
		border-bottom: <?php echo $CHfw_rdx_options['megaMenu_topMenuBorderOption_'.$CHfw_select_skin]['border-bottom'] ?>;
		border-style: <?php echo  $CHfw_rdx_options['megaMenu_topMenuBorderOption_'.$CHfw_select_skin]['border-style'] ?>;
		border-color: <?php echo $CHfw_rdx_options['megaMenu_topMenuBorderOption_'.$CHfw_select_skin]['border-color']?>;
	}
}

#header-desktop-menu  .yamm .dropdown-menu {
	border-top: <?php echo ($CHfw_rdx_options['megaMenu_insideMenu_borderOption_'.$CHfw_select_skin]['border-bottom']) ?>;
	border-right: <?php echo ($CHfw_rdx_options['megaMenu_insideMenu_borderOption_'.$CHfw_select_skin]['border-bottom']) ?>;
	border-left: <?php echo ($CHfw_rdx_options['megaMenu_insideMenu_borderOption_'.$CHfw_select_skin]['border-bottom']) ?>;
	border-bottom: <?php echo ($CHfw_rdx_options['megaMenu_insideMenu_borderOption_'.$CHfw_select_skin]['border-bottom']) ?>;
	border-style: <?php echo  ($CHfw_rdx_options['megaMenu_insideMenu_borderOption_'.$CHfw_select_skin]['border-style']) ?>;
	border-color: <?php echo ($CHfw_rdx_options['megaMenu_insideMenu_borderOption_'.$CHfw_select_skin]['border-color'])?>;

}

#header-desktop-menu  .dropdown-menu {
	background-color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_backgroundcolor_'.$CHfw_select_skin] ?>;
}

#header-desktop-menu .sticky {
	background-color: <?php echo $CHfw_rdx_options['megaMenu_backgroundcolor_'.$CHfw_select_skin] ?>;
}

<?php
if ($CHfw_select_skin == 'MinimalSkin') {
?>
#header-desktop-menu .sticky {
	background-color: #fff;
}

<?php }  ?>

header.header-container .top-nav .assemblerfl-container .currency a {
	color: <?php echo $CHfw_rdx_options['top-navbar_typography_'.$CHfw_select_skin]['color'] ?>;
}

header.header-container .top-nav #header_links li a i {
	color: <?php echo $CHfw_rdx_options['top-navbar_icon_color_'.$CHfw_select_skin] ?>;
}
.custom-block-header span,
.custom-block-header  i,
header.header-container .top-nav #header_links li a {
	color: <?php echo $CHfw_rdx_options['top-navbar_typography_'.$CHfw_select_skin]['color'] ?>;
	font-size: <?php echo $CHfw_rdx_options['top-navbar_typography_'.$CHfw_select_skin]['font-size'] ?>;
	font-family: <?php echo $CHfw_rdx_options['top-navbar_typography_'.$CHfw_select_skin]['font-family'] ?>;
	line-height: <?php echo $CHfw_rdx_options['top-navbar_typography_'.$CHfw_select_skin]['line-height'] ?>;
	text-transform: <?php echo $CHfw_rdx_options['top-navbar_typography_'.$CHfw_select_skin]['text-transform'] ?>;
<?php //text-shadow: 1px 1px echo $CHfw_rdx_options['top-navbar_text_shadow_color_'.$CHfw_select_skin]?>;
	text-decoration: none;
}
.custom-block-header span,
.custom-block-header a,
.custom-block-header i,
.custom-block-header {
	line-height: <?php echo $CHfw_rdx_options['HeaderCenter_Typography_'.$CHfw_select_skin]['line-height'] ?>;
	color: <?php echo $CHfw_rdx_options['HeaderCenter_Typography_'.$CHfw_select_skin]['color'] ?>;
	font-size: <?php echo $CHfw_rdx_options['HeaderCenter_Typography_'.$CHfw_select_skin]['font-size'] ?>;
	font-family: <?php echo $CHfw_rdx_options['HeaderCenter_Typography_'.$CHfw_select_skin]['font-family'] ?>;

}

.header-right .btn-secondary.booking{
    color: <?php echo $CHfw_rdx_options['headerCenter_makeAnAppoinment_Button_'.$CHfw_select_skin]['color'] ?>;
    font-size: <?php echo $CHfw_rdx_options['headerCenter_makeAnAppoinment_Button_'.$CHfw_select_skin]['font-size'] ?>;
    font-family: <?php echo $CHfw_rdx_options['headerCenter_makeAnAppoinment_Button_'.$CHfw_select_skin]['font-family'] ?>;
    text-transform: <?php echo $CHfw_rdx_options['headerCenter_makeAnAppoinment_Button_'.$CHfw_select_skin]['text-transform'] ?>;
    background-color: <?php echo $CHfw_rdx_options['headerCenter_makeAnAppoinmentBgColor_'.$CHfw_select_skin]; ?>;
}



#header-center-ch {
	background-color: <?php echo $CHfw_rdx_options['headerCenter_bgcolor_'.$CHfw_select_skin]; ?>;
	border-top: 0;
	border-right: 0;
	border-left: 0;
	border-bottom: <?php echo $CHfw_rdx_options['HeaderCenter_border_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['HeaderCenter_border_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['HeaderCenter_border_'.$CHfw_select_skin]['border-color']?>;
}

header.header-container  .mobil-menu-sidebar-search #search-form_mb input,
header.header-container #header-center-ch #search-form input, #search-mobile input{
	color: <?php echo $CHfw_rdx_options['HeaderCenter_SearchButtonTypography_'.$CHfw_select_skin]['color'] ?>;
}

#header-desktop-menu .search-header-overlay .searchform .searchinput:-webkit-input-placeholder,
#search-form input:-webkit-input-placeholder:-webkit-input-placeholder
.search-header-overlay .searchform .searchinput:-webkit-input-placeholder {
	color: red;
}

#header-desktop-menu .search-header-overlay .searchform .searchinput:-moz-placeholder,
#search-form input:-moz-placeholder,
#header-desktop-menu .search-header-overlay .searchform .searchinput:-moz-placeholder { /* Firefox 18- */
	color: red;
}

#header-desktop-menu .search-header-overlay .searchform .searchinput:-moz-placeholder,
#search-form input:-moz-placeholder,
#header-desktop-menu .search-header-overlay .searchform .searchinput:-moz-placeholder { /* Firefox 19+ */
	color: red;
}

#header-desktop-menu .search-header-overlay .searchform .searchinput:-ms-input-placeholder,
 #search-form input:-webkit-input-placeholder:-ms-input-placeholder,
.search-header-overlay .searchform .searchinput:-ms-input-placeholder {
	color: red;
}

#header-desktop-menu .search-header-overlay .searchform .searchinput,
header.header-container #header-center-ch #search-form input,
#search-mobile input {
	background-color: <?php echo $CHfw_rdx_options['headerCenter_siearchButtonBgColor_'.$CHfw_select_skin]; ?>;
	border: <?php echo $CHfw_rdx_options['headerCenter_searchButtonBorder_'.$CHfw_select_skin]['border-bottom'].' '.
     $CHfw_rdx_options['headerCenter_searchButtonBorder_'.$CHfw_select_skin]['border-style'].' '.
    $CHfw_rdx_options['headerCenter_searchButtonBorder_'.$CHfw_select_skin]['border-color'];?>;

	line-height: <?php echo $CHfw_rdx_options['HeaderCenter_SearchButtonTypography_'.$CHfw_select_skin]['line-height'] ?>;
	color: <?php echo $CHfw_rdx_options['HeaderCenter_SearchButtonTypography_'.$CHfw_select_skin]['color'] ?>;
	font-size: <?php echo $CHfw_rdx_options['HeaderCenter_SearchButtonTypography_'.$CHfw_select_skin]['font-size'] ?>;
	font-family: <?php echo $CHfw_rdx_options['HeaderCenter_SearchButtonTypography_'.$CHfw_select_skin]['font-family'] ?>;
}

#header-desktop-menu .search-header-overlay .searchform .searchinput {
	font-size: 20px;
}

/* --------------------------------------------------------------
  0 - HEADER NAV MENU
 -------------------------------------------------------------- */
#header-desktop-menu .navbar-default .navbar-nav > .active > a {
	color: <?php echo $CHfw_rdx_options['megaMenu_textcolor_'.$CHfw_select_skin] ?>;
	background-color: <?php echo $CHfw_rdx_options['megaMenu_backgroundcolor_'.$CHfw_select_skin] ?>;
}

#header-desktop-menu .navbar-default .navbar-nav > .active > a:focus,
#header-desktop-menu .navbar-default .navbar-nav > .active > a:hover {
	color: <?php echo $CHfw_rdx_options['megaMenu_textHoverColor_'.$CHfw_select_skin] ?>;
	background-color: <?php echo $CHfw_rdx_options['megaMenu_backgroundHoverColor_'.$CHfw_select_skin] ?>;
}

#header-desktop-menu .nav-menu-links .active a {
	background-color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_ActiveBgColor_'.$CHfw_select_skin] ?>;
<?php if ($CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin]=='transparent'){
echo 'color: '.$CHfw_rdx_options['megaMenu_textcolor_'.$CHfw_select_skin].';';
} else {
  echo 'color: '.$CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin].';';
}?>;
}

#header-desktop-menu .nav-menu-links .active a:hover {
	background-color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_ActiveBgColor_'.$CHfw_select_skin] ?>;
<?php if ($CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin]=='transparent'){
 echo 'color: '.$CHfw_rdx_options['megaMenu_textcolor_'.$CHfw_select_skin].';';
} else {
	 echo 'color: '.$CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin].';';
}?>;
}

#header-desktop-menu  .dropdown-menu > .active > a {
	background-color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_ActiveBgColor_'.$CHfw_select_skin] ?>;
<?php if ($CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin]=='transparent'){
echo 'color: '.$CHfw_rdx_options['megaMenu_textcolor_'.$CHfw_select_skin].';';
} else {
  echo 'color: '.$CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin].';';
}?>;
}

#header-desktop-menu  .dropdown-menu > .active > a:focus,
#header-desktop-menu .dropdown-menu > .active > a:hover {
	background-color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_ActiveBgColor_'.$CHfw_select_skin] ?>;
<?php if ($CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin]=='transparent'){
 echo 'color: '.$CHfw_rdx_options['megaMenu_textcolor_'.$CHfw_select_skin].';';
} else {
	 echo 'color: '.$CHfw_rdx_options['megaMenu_insideMenu_ActiveTextColor_'.$CHfw_select_skin].';';
}?>;
}


#header-desktop-menu .dropdown-menu > li > a:focus,
#header-desktop-menu .dropdown-menu > li > a:hover {
	background: none;
}
/*
.header-minimalfixedbody .navbar-default .navbar-nav > li > a,
*/

.header-TopMinimal .navbar-default .navbar-nav > li > a,
.header-minimalbody .navbar-default .navbar-nav > li > a,
.header-minimalfixedbody .sticky.navbar-default .navbar-nav > li > a,
.header-container.header-standart .sticky.navbar-default .navbar-nav > li > a,
.header-container.header-full .navbar-default .navbar-nav > li > a,
.header-container.header-standart .navbar-default .navbar-nav > li > a {
	color: <?php echo $CHfw_rdx_options['megaMenu_textcolor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['megaMenu_textcolor_'.$CHfw_select_skin] ?>;
}

.header-minimalfixedbody .navbar-default .navbar-nav > li > a:hover,
.header-TopMinimal .navbar-default .navbar-nav > li > a:hover,
.header-minimalbody .navbar-default .navbar-nav > li > a:hover,
.header-minimalfixedbody .sticky.navbar-default .navbar-nav > li > a:hover,
.header-container.header-standart .sticky.navbar-default .navbar-nav > li > a:hover,
.header-container.header-full .navbar-default .navbar-nav > li > a:hover,
.header-container.header-standart .navbar-default .navbar-nav > li > a:hover {
	color: <?php echo $CHfw_rdx_options['megaMenu_textHoverColor_'.$CHfw_select_skin] ?>;
}

.woocommerce #myaccountpage,
.woocommerce #thanskpage-page,
.woocommerce .cart.cart-page .cart-table-wrap,
.woocommerce .cart.cart-page .panel-default,
#yith-wcwl-form,
.contentbar.boxed-content {
	background-color: <?php echo $CHfw_rdx_options['SiteCenter_BgColor_'.$CHfw_select_skin] ?>;
}

.woocommerce #myaccountpage,
.woocommerce #thanskpage-page,
.woocommerce .cart.cart-page .cart-table-wrap,
.woocommerce .cart.cart-page .panel-default,
#yith-wcwl-form,
.contentbar.boxed-content {
	border-top: <?php echo $CHfw_rdx_options['SiteCenterBorder_'.$CHfw_select_skin]['border-top'] ?>;
	border-right: <?php echo $CHfw_rdx_options['SiteCenterBorder_'.$CHfw_select_skin]['border-right'] ?>;
	border-left: <?php echo $CHfw_rdx_options['SiteCenterBorder_'.$CHfw_select_skin]['border-left'] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['SiteCenterBorder_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['SiteCenterBorder_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['SiteCenterBorder_'.$CHfw_select_skin]['border-color']?>;
<?php
if ($CHfw_rdx_options['SiteCenterBoxShadow_BgColor_'.$CHfw_select_skin]!='transparent'){
    if ($CHfw_rdx_options['SiteCenterBoxShadowEnableDisable_'.$CHfw_select_skin]=='1'){
        echo 'box-shadow: 0px 0px 30px 0px '.$CHfw_rdx_options['SiteCenterBoxShadow_BgColor_'.$CHfw_select_skin]['rgba'].';';
     }
} else {
echo 'margin-top: 0;padding-top: 0;';
}?>
}

#minicart-container .mini-cart .content {
	background-color: <?php echo $CHfw_rdx_options['header_minicart_BgColor_'.$CHfw_select_skin] ?>;
	border-top: <?php echo $CHfw_rdx_options['header_minicart_Border_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-right: <?php echo $CHfw_rdx_options['header_minicart_Border_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-left: <?php echo $CHfw_rdx_options['header_minicart_Border_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['header_minicart_Border_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['header_minicart_Border_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['header_minicart_Border_'.$CHfw_select_skin]['border-color']?>;
}
/*all mini cart */
#cart-container a.product-title,
#cart-container .product-list span.amount,
#small-dialog #mini-cart-list.product-list span.amount,
#cart-container .product-list .quantity,
#small-dialog #mini-cart-list.product-list a.remove,
.product-list .quantity,
#small-dialog #mini-cart-list.product-list .product-list .quantity,
.mini-cart .product-list a:not(.remove),
#minicart-container .cart-top a:hover,
#minicart-container .cart-top a,
.mini-cart .product-list span.amount,
#mini-cart .empty,
.cart-container .mini-carts-no-products,
.mini-cart .mini-carts-no-products,
#small-dialog .mini-carts-no-products,
.product-list .quantity,
#mini-cart .mini-cart-total-container p,
#mini-cart .mini-cart-total-container strong,
#mini-cart .product-list a:not(.remove),
#mini-cart .product-list span.amount,
#mini-cart .product-list .quantity,
.mini-cart-total-container p.total {
	color: <?php echo $CHfw_rdx_options['header_minicart_Text_and_Link_Color_'.$CHfw_select_skin]?> ;
}

.mini-cart-total-container-id .viewcart-button {
	background-color: <?php echo $CHfw_rdx_options['header_minicart_editCartButton_BgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['header_minicart_editCartButton_textColor_'.$CHfw_select_skin] ?> !important;
}

.mini-cart-total-container-id .checkout-cart-button {
	background-color: <?php echo $CHfw_rdx_options['header_minicart_checkoutButton_BgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['header_minicart_checkoutButton_textColor_'.$CHfw_select_skin] ?> !important;
}

.navbar-default .navbar-toggle .icon-bar,
.header-container.header-minimal .sticky.navbar-default .navbar-toggle .icon-bar,
.header-container.header-standart .sticky.navbar-default .navbar-toggle .icon-bar {
	background-color: <?php echo $CHfw_rdx_options['header_minicart_cartBgColor_'.$CHfw_select_skin] ?>;
}
.header-container.header-minimal .header-right .mobil-cart-container-header-right a,
.header-minimalfixedbody .header-right .mobil-cart-container-header-right a,
.header-container.header-standart .header-right .mobil-cart-container-header-right a,
.header-right .navbar-search-button,
#minicart-container_header-right a.cart_link,
#minicart-container_header-right a.cart_link:hover,
#minicart-container a.cart_link:hover,
#minicart-container a.cart_link i ,
#minicart-container a.cart_link {
	color: <?php echo $CHfw_rdx_options['header_minicart_cartBgColor_'.$CHfw_select_skin] ?>;
}

.header-container.header-minimal .header-right .mobil-cart-container-header-right a span.mobil-cart-counter,
.header-container.header-standart .header-right .mobil-cart-container-header-right a span.mobil-cart-counter,
.mylabel.lable,
#minicart-container_header-right .cart-top .cart_link .label,
.cart-top .cart_link .lable{
	background-color: <?php echo $CHfw_rdx_options['header_minicart_cartCounterBgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['header_minicart_cartCountertextColor_'.$CHfw_select_skin] ?>;
}

.products .product .item-area a.product-image img.defaultImage,
.products .product .item-area a.product-image img.hoverImage,
.product-info .images .item img,
.product-info .thumbs-preview .item img {
	background-color: <?php echo $CHfw_rdx_options['Shop_product_image_bgcolor_'.$CHfw_select_skin]?>;
}

/*left bar */

.sidebar.unboxed {
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_BgColor_'.$CHfw_select_skin]?>;
	border-top: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-top'] ?>;
	border-right: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-right'] ?>;
	border-left: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-left'] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-color']?>;
<?php

   if ($CHfw_rdx_options['sidebar_widgetBoxShadowEnableDisable_'.$CHfw_select_skin]=='1'){
        echo 'box-shadow: 0px 0px 40px 0px '.$CHfw_rdx_options['sidebar_BoxShadow_BgColor_'.$CHfw_select_skin]['rgba'].';';
     }
?>
}

.sidebar.boxed-content .widget {
	margin-bottom: 10px;
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_BgColor_'.$CHfw_select_skin]?>;
	border-top: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-top'] ?>;
	border-right: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-right'] ?>;
	border-left: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-left'] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['sidebar_widget_Border_'.$CHfw_select_skin]['border-color']?>;
<?php

   if ($CHfw_rdx_options['sidebar_widgetBoxShadowEnableDisable_'.$CHfw_select_skin]=='1'){
     /*   echo 'box-shadow: 0px 0px 40px 0px '.$CHfw_rdx_options['sidebar_BoxShadow_BgColor_'.$CHfw_select_skin]['rgba'].';';*/
        echo 'box-shadow: 0 3px 12px 1px '.$CHfw_rdx_options['sidebar_BoxShadow_BgColor_'.$CHfw_select_skin]['rgba'].';';
     }
?>
}

.top-heading-title.ajax-search .archive-header .archive-title,
#sc_fw-timeline .sc_fw-timeline-content .entry-header .entry-title a,
.blog .post .entry-header .entry-title a {
	color: <?php echo ($CHfw_rdx_options['BlogPostTitleStyleTypography_'.$CHfw_select_skin]['color']) ?> !important;
	font-family: <?php echo ($CHfw_rdx_options['BlogPostTitleStyleTypography_'.$CHfw_select_skin]['font-family'])?>;
	font-size: <?php echo ($CHfw_rdx_options['BlogPostTitleStyleTypography_'.$CHfw_select_skin]['font-size'] )?>;
	text-transform: <?php echo ($CHfw_rdx_options['BlogPostTitleStyleTypography_'.$CHfw_select_skin]['text-transform']) ?>;
}

.blog .post .entry-byline span a,
#sc_fw-timeline .sc_fw-timeline-content .entry-byline span,
.blog .post .entry-byline span,
#sc_fw-timeline .sc_fw-timeline-content .entry-byline span a,
.blog .post .entry-header .entry-byline span a,
#sc_fw-timeline .sc_fw-timeline-content .entry-header .entry-byline,
.blog .post .entry-header .entry-byline {
	color: <?php echo ($CHfw_rdx_options['BlogPostStyleInfoTypography_'.$CHfw_select_skin]['color']) ?> !important;
	font-family: <?php echo "'".($CHfw_rdx_options['BlogPostStyleInfoTypography_'.$CHfw_select_skin]['font-family'])."'" ?>;
	font-size: <?php echo ($CHfw_rdx_options['BlogPostStyleInfoTypography_'.$CHfw_select_skin]['font-size']) ?>;

	text-transform: <?php echo ($CHfw_rdx_options['BlogPostStyleInfoTypography_'.$CHfw_select_skin]['text-transform']) ?>;
}

.sc_fw-timeline-content .cd-read-more {
	background: <?php echo ($CHfw_rdx_options['PostStyleList_ReadMoreButtonBgColor_'.$CHfw_select_skin]) ?>;
	color: <?php echo ($CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['color']) ?> !important;
	font-family: <?php echo "'".($CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['font-family'])."'" ?>;
	font-size: <?php echo ($CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['font-size']) ?>;

	text-transform: <?php echo ($CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['text-transform']) ?>;
}

/*.top-heading-title.ajax-search,
.no-results.not-found,*/
.page-single .post .body-post,
.page-masonry .blog .post .body-post,
.page-bloglist .blog .post .body-post,
.page-bloglist-small .blog .post .body-post,
#timeline-page .sc_fw-timeline-block .sc_fw-timeline-content,
.page-zigzag #zigzag-page .sc_fw-timeline-content,
#timeline-page .page-timeline .blog .post .body-post {
<?php
if ($CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-bottom']==''){
$CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-bottom']='0px';
}
if ($CHfw_rdx_options['PostStyleListBoxShadow_'.$CHfw_select_skin]==1) {  ?> box-shadow: 0 3px 12px 1px rgba(0, 0, 0, 0.1);
<?php } else { echo 'box-shadow: none;'; }?> background-color: <?php echo $CHfw_rdx_options['PostStyleListBgColor_'.$CHfw_select_skin] ?>;
	border-radius: <?php echo $CHfw_rdx_options['PostStyleListBorderRadius_'.$CHfw_select_skin] ?>px;
	border: <?php echo $CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-bottom'].' '.
     $CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-style'].' '.
    $CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-color'];?> !important;

}

/*change end*/
#single-page .post-info-container .post-info-container-collabs {
<?php
if ($CHfw_rdx_options['PostStyleListBoxShadow_'.$CHfw_select_skin]==1) {  ?> box-shadow: 0 3px 12px 1px rgba(0, 0, 0, 0.1);
<?php } else { echo 'box-shadow: none;'; }?> background-color: <?php echo $CHfw_rdx_options['PostStyleListBgColor_'.$CHfw_select_skin] ?>;
	border-radius: <?php echo $CHfw_rdx_options['PostStyleListBorderRadius_'.$CHfw_select_skin] ?>px;
	border: <?php echo $CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-bottom'].' '.
     $CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-style'].' '.
    $CHfw_rdx_options['PostStyleListBorder_'.$CHfw_select_skin]['border-color'];?> !important;
	box-shadow: <?php echo $CHfw_rdx_options['PostStyleListBoxShadow_'.$CHfw_select_skin]   ?> rgba(0, 0, 0, 0.1);
	background-color:<?php echo $CHfw_rdx_options['PostStyleListBgColor_'.$CHfw_select_skin] ?>;
	border-radius: <?php echo $CHfw_rdx_options['PostStyleListBorderRadius_'.$CHfw_select_skin] ?>px;
}

.post .post-meta .meta-like, .post .post-meta .os_social-foot-w {
	background: <?php echo $CHfw_rdx_options['PostStyleListSocialBarBgColor_'.$CHfw_select_skin] ?>;
}


#post-tags .tagcloud a {
	background-color: <?php echo $CHfw_rdx_options['PostStyleList_TagsBgColor_'.$CHfw_select_skin] ?> !important;
	color: <?php echo $CHfw_rdx_options['PostStyleList_TagTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['PostStyleList_TagTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['PostStyleList_TagTypography_'.$CHfw_select_skin]['font-size'] ?> !important;

	text-transform: <?php echo $CHfw_rdx_options['PostStyleList_TagTypography_'.$CHfw_select_skin]['text-transform']  ?>;
	border-top: <?php echo $CHfw_rdx_options['PostStyleList_SocialBarBorder_'.$CHfw_select_skin]['border-top'] ?>;
	border-right: <?php echo $CHfw_rdx_options['PostStyleList_SocialBarBorder_'.$CHfw_select_skin]['border-right'] ?>;
	border-left: <?php echo $CHfw_rdx_options['PostStyleList_SocialBarBorder_'.$CHfw_select_skin]['border-left'] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['PostStyleList_SocialBarBorder_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['PostStyleList_SocialBarBorder_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['PostStyleList_SocialBarBorder_'.$CHfw_select_skin]['border-color']?>;
}

#post-tags .tagcloud a:hover {
	background-color: <?php echo $CHfw_rdx_options['PostStyleList_TagsHoverBgColor_'.$CHfw_select_skin] ?> !important;
	color: <?php echo $CHfw_rdx_options['PostStyleList_TagHoverTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['PostStyleList_TagHoverTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['PostStyleList_TagHoverTypography_'.$CHfw_select_skin]['font-size'] ?> !important;

	text-transform: <?php echo $CHfw_rdx_options['PostStyleList_TagHoverTypography_'.$CHfw_select_skin]['text-transform'] ?>;
}

.footer-widget.widget_tag_cloud .tagcloud a, .footer-widget.widget_product_tag_cloud .tagcloud a {
	background-color: <?php echo $CHfw_rdx_options['footer_widget_title_TagbgColor_'.$CHfw_select_skin] ?> !important;
	color: <?php echo $CHfw_rdx_options['footer_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['footer_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['footer_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['font-size'] ?> !important;

	text-transform: <?php echo $CHfw_rdx_options['footer_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['text-transform'];   ?>;
	border-top: <?php echo $CHfw_rdx_options['footer_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-top'] ?>;
	border-right: <?php echo $CHfw_rdx_options['footer_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-right'] ?>;
	border-left: <?php echo $CHfw_rdx_options['footer_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-left'] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['footer_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['footer_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['footer_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-color']?>;
}

.footer-widget.widget_tag_cloud .tagcloud a:hover, .footer-widget.widget_product_tag_cloud .tagcloud a:hover {

	background-color: <?php echo $CHfw_rdx_options['footer_widget_title_Tag_HoverbgColor_'.$CHfw_select_skin] ?> !important;
	color: <?php echo $CHfw_rdx_options['footer_widget_title_TagWidgetHoverTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['footer_widget_title_TagWidgetHoverTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['footer_widget_title_TagWidgetHoverTypography_'.$CHfw_select_skin]['font-size'] ?> !important;

	text-transform: <?php echo $CHfw_rdx_options['footer_widget_title_TagWidgetHoverTypography_'.$CHfw_select_skin]['text-transform'] ?>;
}

.sidebar-widget.widget_tag_cloud .tagcloud a, .sidebar-widget.widget_product_tag_cloud .tagcloud a {
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_title_TagbgColor_'.$CHfw_select_skin] ?> !important;
	color: <?php echo $CHfw_rdx_options['sidebar_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['sidebar_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['sidebar_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['font-size'] ?> !important;
	font-weight: <?php echo $CHfw_rdx_options['sidebar_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['font-weight'] ?>;
	text-transform: <?php echo $CHfw_rdx_options['sidebar_widget_title_TagWidgetTypography_'.$CHfw_select_skin]['text-transform'];   ?>;
	border-top: <?php echo $CHfw_rdx_options['sidebar_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-top'] ?>;
	border-right: <?php echo $CHfw_rdx_options['sidebar_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-right'] ?>;
	border-left: <?php echo $CHfw_rdx_options['sidebar_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-left'] ?>;
	border-bottom: <?php echo $CHfw_rdx_options['sidebar_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-bottom'] ?>;
	border-style: <?php echo  $CHfw_rdx_options['sidebar_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-style'] ?>;
	border-color: <?php echo $CHfw_rdx_options['sidebar_widget_TagsWidgetBorder_'.$CHfw_select_skin]['border-color']?>;
}

.sidebar-widget.widget_tag_cloud .tagcloud a:hover, .sidebar-widget.widget_product_tag_cloud .tagcloud a:hover {
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_title_Tag_HoverbgColor_'.$CHfw_select_skin] ?> !important;
	color: <?php echo $CHfw_rdx_options['sidebar_widget_title_WidgetHoverTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['sidebar_widget_title_WidgetHoverTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['sidebar_widget_title_WidgetHoverTypography_'.$CHfw_select_skin]['font-size'] ?> !important;
	font-weight: <?php echo $CHfw_rdx_options['sidebar_widget_title_WidgetHoverTypography_'.$CHfw_select_skin]['font-weight'] ?>;
	text-transform: <?php echo $CHfw_rdx_options['sidebar_widget_title_WidgetHoverTypography_'.$CHfw_select_skin]['text-transform'] ?>;
}

.cd-read-more {
	background-color: <?php   echo $CHfw_rdx_options['PostStyleList_ReadMoreButtonBgColor_'.$CHfw_select_skin]?>;
	color: <?php  echo $CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['font-size'] ?>;

	text-transform: <?php echo $CHfw_rdx_options['BlogPostStyleReadMoreButtonTypography_'.$CHfw_select_skin]['text-transform'] ?>;
}

.cd-read-more:hover {
	background-color: <?php  echo $CHfw_rdx_options['PostStyleList_ReadMoreButtonBgHoverColor_'.$CHfw_select_skin]?>;
	color: <?php  echo $CHfw_rdx_options['BlogPostStyleReadMoreButtonHoverTypography_'.$CHfw_select_skin] ?> !important;
}


#bodyheader .the-content .ch-post-content,
#bodyheader .the-content .ch-post-content p {
	color: <?php echo $CHfw_rdx_options['BlogPostStyleTextTypography_'.$CHfw_select_skin]['color'] ?> !important;
	font-family: <?php echo "'".$CHfw_rdx_options['BlogPostStyleTextTypography_'.$CHfw_select_skin]['font-family']."'" ?>;
	font-size: <?php echo $CHfw_rdx_options['BlogPostStyleTextTypography_'.$CHfw_select_skin]['font-size'] ?>;

	text-transform: <?php echo $CHfw_rdx_options['BlogPostStyleTextTypography_'.$CHfw_select_skin]['text-transform'] ?>;
}

@media (min-width: 768px) {
	.header-container.header-top-minimal .navbar-nav > li > a,
	.header-container.header-full .navbar-nav > li > a,
	.header-container.header-minimalbody .navbar-nav > li > a,
	.header-container.header-fixed.header-minimal .navbar-nav > li > a,
	.header-container.header-standart .navbar-nav > li > a {
        line-height: <?php echo $CHfw_rdx_options['megaMenu_Typography_'.$CHfw_select_skin]['line-height'] ?>;
		font-family: <?php echo $CHfw_rdx_options['megaMenu_Typography_'.$CHfw_select_skin]['font-family'] ?>;
		font-size: <?php echo $CHfw_rdx_options['megaMenu_Typography_'.$CHfw_select_skin]['font-size'] ?>;
		font-weight: <?php echo $CHfw_rdx_options['megaMenu_Typography_'.$CHfw_select_skin]['font-weight'] ?>;
		text-transform: <?php echo $CHfw_rdx_options['megaMenu_Typography_'.$CHfw_select_skin]['text-transform'] ?>;
	}
}

.meganav_dropdown li a,
.nav-menu-links > ul > li > a,
.meganav_dropdown > ul > li.menu-item-has-children > a {
	font-family: <?php echo $CHfw_rdx_options['megaMenu_insideMenuTypography_'.$CHfw_select_skin]['font-family'] ?>;
	text-transform: <?php echo $CHfw_rdx_options['megaMenu_insideMenuTypography_'.$CHfw_select_skin]['text-transform'] ?>;
}

.navbar-default .navbar-nav > li > a:focus,
.navbar-default .navbar-nav > li > a:hover {
	color: <?php echo $CHfw_rdx_options['megaMenu_textHoverColor_'.$CHfw_select_skin] ?>;
	background-color: <?php echo $CHfw_rdx_options['megaMenu_backgroundHoverColor_'.$CHfw_select_skin] ?>;
}

.meganav_dropdown > ul > li.menu-item-has-children > a:hover {
	color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_Color'.$CHfw_select_skin] ?>;
}

.meganav_dropdown > ul > li.menu-item-has-children > a {
	color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_TextHoverColor_'.$CHfw_select_skin] ?>;
}

.meganav_dropdown li a, .nav-menu-links > ul > li > a, .meganav_dropdown > ul > li.menu-item-has-children > a {
	color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_Color'.$CHfw_select_skin] ?>;
}

.nav-menu-links > ul > li > a:hover {
	color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_TextHoverColor_'.$CHfw_select_skin] ?>;
}

.meganav_dropdown li a:hover,
.nav-menu-links > ul > li > a:hover,
.meganav_dropdown > ul > li.menu-item-has-children > a:hover {
	color: <?php echo $CHfw_rdx_options['megaMenu_insideMenu_TextHoverColor_'.$CHfw_select_skin] ?>;
}

.meganav_dropdown > ul > li.menu-item-has-children > a,
.nav-menu-links > ul > li > a,
.meganav_dropdown li a {
	border-bottom: <?php echo $CHfw_rdx_options['dropdown_menu-border-bottom_text_option_'.$CHfw_select_skin]['border-bottom'].' '.
     $CHfw_rdx_options['dropdown_menu-border-bottom_text_option_'.$CHfw_select_skin]['border-style'].' '.
    $CHfw_rdx_options['dropdown_menu-border-bottom_text_option_'.$CHfw_select_skin]['border-color'];?> !important;
}

#mobil-menu-sidebar .menu {
	background-color: <?php echo $CHfw_rdx_options['OutSideSidebar_BgColor_'.$CHfw_select_skin]?>;
}

#mobil-menu-container {
	background-color: <?php echo $CHfw_rdx_options['MobileMenu_BgColor_'.$CHfw_select_skin]?>;
}

#mobil-menu-sidebar span.title,
#mobil-menu-sidebar .responsive-menu .menu-header ul li.menu-item-has-children a,
#mobil-menu-sidebar .responsive-menu .menu-header .sub-menu li a,
#mobil-menu-sidebar .open-menu-link,
#mobil-menu-sidebar .menu-toggle.on .menu-toggle-hamburger span {
	color: <?php echo $CHfw_rdx_options['OutSideSidebar_linkColor_'.$CHfw_select_skin]?>;
}

#mobil-menu-sidebar .open-menu-link {
	color: <?php echo $CHfw_rdx_options['OutSideSidebar_arrowColor_'.$CHfw_select_skin]?>;
}

#mobil-menu-sidebar .mobil-menu-sidebar-search #search-form_mb:before,
#mobil-menu-sidebar #search-form_mb input {
	background-color: <?php echo $CHfw_rdx_options['OutSideSidebar_searchButtonBgColor_'.$CHfw_select_skin]; ?>;
	border-color: <?php echo $CHfw_rdx_options['OutSideSidebar_searchButtonBorderColor_'.$CHfw_select_skin]; ?>;
	color: <?php echo $CHfw_rdx_options['OutSideSidebar_searchButtonTextColor_'.$CHfw_select_skin] ?>;
}

#mobil-menu-container.sticky {
	background-color: <?php echo $CHfw_rdx_options['MobileMenu_BgColor_'.$CHfw_select_skin]; ?>;
}

#mobil-menu-container .responsive-menu .menu-header .sub-menu li {
	background: <?php echo $CHfw_rdx_options['MobileMenu_Submenu_BgColor_'.$CHfw_select_skin]; ?>;
}

#mobil-menu-container .open-menu-link {
	color: <?php echo $CHfw_rdx_options['MobileMenu_arrowColor_'.$CHfw_select_skin]?>;
}

#mobil-menu-container .responsive-menu .menu-header li a {
	color: <?php echo $CHfw_rdx_options['MobileMenu_linkColor_'.$CHfw_select_skin]; ?>;
}

#mobil-menu-container #search-mobile input {
	background-color: <?php echo $CHfw_rdx_options['MobileMenu_searchButtonBgColor_'.$CHfw_select_skin]; ?>;
	border-color: <?php echo $CHfw_rdx_options['MobileMenu_searchButtonBorderColor_'.$CHfw_select_skin]; ?>;
	color: <?php echo $CHfw_rdx_options['MobileMenu_searchButtonTextColor_'.$CHfw_select_skin] ?>;
}

.sidebar .widget_categories ul > li a,
.widget.sidebar-widget ul li ul.children li a,
.widget.sidebar-widget ul li ,
.widget.sidebar-widget ul li a {
	color: <?php echo $CHfw_rdx_options['sidebar_widget_Linkcolor_'.$CHfw_select_skin]?>;
}

.widget_wc_collabsing_categories .mtree .current-cat > a,
.widget_wc_collabsing_categories .mtree ul.children li.current-cat a,
.ch_widget_price_filter ul li.active,
.ch_widget_price_filter ul li.current,
.ch_product_sorting_widget ul li.active {
	color: <?php echo $CHfw_rdx_options['sidebar_widget_Textcolor_'.$CHfw_select_skin]?> !important;
}

.widget.sidebar-widget .comment-author-link,
.widget.sidebar-widget .sc_fw-theme-last_post_list .last_post_enrty,
.widget.sidebar-widget ul li.recentcomments {
	color: <?php echo $CHfw_rdx_options['sidebar_widget_Textcolor_'.$CHfw_select_skin]?>;
}

/*widget title standart*/

<?php
$select_widget_title_skin="custom_skin";
if (isset($CHfw_rdx_options['sidebar_widget_title_selected'.$CHfw_select_skin])){
 $sidebar_widget_title_selected='_'.$CHfw_rdx_options['sidebar_widget_title_selected'.$CHfw_select_skin];
} else{
  $sidebar_widget_title_selected='_'."border_bottom_bg_widget".$CHfw_select_skin;
}
 $widget_title_skinOptions='sidebar_widget_title_typography_'.$select_widget_title_skin.$sidebar_widget_title_selected.$CHfw_select_skin;
?>

.widget.sidebar-widget .widget-heading.<?php echo $select_widget_title_skin;  ?> h4 {
	text-align: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['text-align']; ?>;
}

.widget.sidebar-widget .widget-heading.<?php echo $select_widget_title_skin ?> h4 span a.rsswidget,
.widget.sidebar-widget .widget-heading.<?php echo $select_widget_title_skin ?> h4 span {
	display: inline-block;
	text-transform: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['text-transform'] ?>;
	line-height: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['line-height'] ?>;
	color: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['color'] ?>;
	font-size: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['font-size'] ?>;
	font-family: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['font-family'] ?>;

}

.widget.sidebar-widget .widget-heading.<?php echo $select_widget_title_skin ?> h4 {
	margin-bottom: 0;
}

/*border_bottom_widget and border_bottom_bg_widget*/

.widget.sidebar-widget .widget-heading.border_bottom_widget h4 span,
.widget.sidebar-widget .widget-heading.border_bottom_bg_widget h4 span {
	position: relative;
	padding: 0 19px 0 0;
	display: inline-block;
}

.widget.sidebar-widget .widget-heading.border_bottom_bg_widget h4 span {
	background: <?php echo $CHfw_rdx_options['sidebar_widget_title_BgColor_first_custom_skin_border_bottom_bg_widget'.$CHfw_select_skin] ?>;
	padding-left: 10px
}

.widget.sidebar-widget .widget-heading.border_bottom_widget h4,
.widget.sidebar-widget .widget-heading.border_bottom_bg_widget h4 {
	padding: 0;
	background: none;
	border-bottom: 2px solid <?php echo $CHfw_rdx_options['sidebar_widget_title_borderColor'.$CHfw_select_skin] ?>;
}

.widget.sidebar-widget .widget-heading.border_bottom_bg_widget h4 span:after {
	content: '';
	background: <?php echo $CHfw_rdx_options['sidebar_widget_title_BgColor_second_border_bottom_bg_widget'.$CHfw_select_skin] ?>;
	height: 4px;
	width: 100%;
	position: absolute;
	left: 0;
	bottom: -2px;
}

.widget.sidebar-widget .widget-heading.border_bottom_widget h4 span:after {
	content: '';
	background: <?php echo $CHfw_rdx_options['sidebar_widget_title_BgColor_second_border_bottom_widget'.$CHfw_select_skin] ?>;
	height: 4px;
	width: 100%;
	position: absolute;
	left: 0;
	bottom: -2px;
}

/*line_transparant_widget*/

.widget.sidebar-widget .widget-heading.line_transparant_widget {
	text-align: <?php  $CHfw_rdx_options[$widget_title_skinOptions]['text-align']; ?>;
}

.widget.sidebar-widget .widget-heading.line_transparant_widget h4 {
	display: inline-block;
}

.widget.sidebar-widget .widget-heading.line_transparant_widget h4 span {
	margin: 0;
	display: inline-block;

}

/*line_left_widget*/
.widget.sidebar-widget .widget-heading.line_left_widget h4 {
	text-align: left !important;
}

.widget.sidebar-widget .widget-heading.line_left_widget h4 span {
	display: inline-block;
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_title_BgColor_first_custom_skin_line_left_widget'.$CHfw_select_skin] ?>;
}

.widget.sidebar-widget .widget-heading.line_left_widget h4:before {
	position: absolute;
	width: 100%;
	height: 2px;
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_title_LineColor'.$CHfw_select_skin] ?>;
	content: "";
	display: block;
	top: 53%;
	z-index: -1;
}

/*line_widget*/
.widget.sidebar-widget .widget-heading.line_widget h4 span {
	background: <?php echo $CHfw_rdx_options['sidebar_widget_title_BgColor_first_custom_skin_line_widget'.$CHfw_select_skin] ?>;
}

.widget.sidebar-widget .widget-heading.line_widget h4 span {
	padding: 0 10px;
	position: relative;
	display: inline-block;
	z-index: 1;
}

.widget.sidebar-widget .widget-heading.line_widget h4 {
	font-weight: normal;
	margin-top: 0;
	border-bottom: 2px solid transparent;
	position: relative;
	margin-bottom: 0 !important;
	text-align: center;
}

.widget.sidebar-widget .widget-heading.line_widget h4 {
	color: #252525;
}

.widget.sidebar-widget .widget-heading.line_widget h4:before {
	content: "";
	display: block;
	border-top: 2px solid <?php echo $CHfw_rdx_options['sidebar_widget_title_LineColor'.$CHfw_select_skin] ?>;
	width: 100%;
	height: 2px;
	position: absolute;
	top: 50%;
	z-index: 1;
}

/*colored_widget*/
.widget.sidebar-widget .widget-heading.colored_two_widget {
	background: <?php echo $CHfw_rdx_options['sidebar_widget_title_BgColor_first_custom_skin_colored_two_widget'.$CHfw_select_skin] ?>;
}

/*colored_two_widget*/
.widget.sidebar-widget .widget-heading.colored_widget {
	background: <?php echo $CHfw_rdx_options['sidebar_widget_title_BgColor_first_custom_skin_colored_widget'.$CHfw_select_skin] ?>;
}

.widget.sidebar-widget .widget-heading.colored_widget h4,
.widget.sidebar-widget .widget-heading.colored_two_widget h4 {
	margin: 5px;
}

.widget.sidebar-widget .widget-heading.colored_two_widget h4:before {
	transition: all .3s ease-out;
	content: '';
	border: 4px solid transparent;
	border-top-color: <?php echo $CHfw_rdx_options['sidebar_widget_title_colored_widgetTopBorderColor'.$CHfw_select_skin] ?> !important;
	border-right-color: <?php echo $CHfw_rdx_options['sidebar_widget_title_colored_widgetTopBorderColor'.$CHfw_select_skin] ?> !important;
	right: 0;
	top: 0;
	position: absolute;
	z-index: 3;
	width: auto;
}

.widget.widget_search.sidebar-widget #searchsubmit, .widget.sidebar-widget .woocommerce-product-search #searchsubmit, .widget.sidebar-widget .woocommerce-product-search input[type="submit"] {
	text-transform: <?php echo $CHfw_rdx_options['sidebar_widget_searchButton_'.$CHfw_select_skin]['text-transform'] ?>;
	line-height: <?php echo $CHfw_rdx_options['sidebar_widget_searchButton_'.$CHfw_select_skin]['line-height'] ?>;
	color: <?php echo $CHfw_rdx_options['sidebar_widget_searchButton_'.$CHfw_select_skin]['color'] ?>;
	font-size: <?php echo $CHfw_rdx_options['sidebar_widget_searchButton_'.$CHfw_select_skin]['font-size'] ?>;
	font-family: <?php echo $CHfw_rdx_options['sidebar_widget_searchButton_'.$CHfw_select_skin]['font-family'] ?>;
	font-weight: <?php echo $CHfw_rdx_options['sidebar_widget_searchButton_'.$CHfw_select_skin]['font-weight'] ?>;
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_searchButtonBgColor_'.$CHfw_select_skin] ?>;
}

.widget.widget_search.sidebar-widget #searchsubmit:hover, .widget.woocommerce-product-search #searchsubmit:hover {
	background-color: <?php echo $CHfw_rdx_options['sidebar_widget_searchButtonBgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['sidebar_widget_searchButton_'.$CHfw_select_skin]['color'] ?>;
}

/*footer widget */
#footer .footer-center {
	background-color: <?php echo $CHfw_rdx_options['footer_widget_BgColor_'.$CHfw_select_skin]?> !important;
	border-top-color: <?php echo $CHfw_rdx_options['footer_widget_Border_'.$CHfw_select_skin]['border-color'] ?> !important;
	border-top-style: <?php echo $CHfw_rdx_options['footer_widget_Border_'.$CHfw_select_skin]['border-style'] ?> !important;
	border-top-width: <?php echo $CHfw_rdx_options['footer_widget_Border_'.$CHfw_select_skin]['border-top'] ?> !important;
    color: <?php echo $CHfw_rdx_options['footer_widget_Textcolor_'.$CHfw_select_skin]?> ;
}

#footer .footer-bottom, .footer-container .copyright-footer {
	background-color: <?php echo $CHfw_rdx_options['footer_minimal_widget_BgColor_'.$CHfw_select_skin]?> !important;
	border-top-color: <?php echo $CHfw_rdx_options['footer_minimal_widget_Border_'.$CHfw_select_skin]['border-color'] ?> !important;
	border-top-style: <?php echo $CHfw_rdx_options['footer_minimal_widget_Border_'.$CHfw_select_skin]['border-style'] ?> !important;
	border-top-width: <?php echo $CHfw_rdx_options['footer_minimal_widget_Border_'.$CHfw_select_skin]['border-top'] ?> !important;
    color: <?php echo $CHfw_rdx_options['footer_widget_Textcolor_'.$CHfw_select_skin]?> ;
}
#footer a, #footer p, #footer li, #footer h4,
.widget.footer-widget ul li a {
	color: <?php echo $CHfw_rdx_options['footer_widget_Textcolor_'.$CHfw_select_skin]?> ;
}

#footer .footer-bottom ul li a {
	color: <?php echo $CHfw_rdx_options['footer_minimal_widget_Textcolor_'.$CHfw_select_skin]?> ;
}

.footer-static.row-fluid {
	color: <?php echo $CHfw_rdx_options['footer_minimal_widget_Textcolor_'.$CHfw_select_skin]?> ;
}

.widget.footer-widget .widget_categories ul > li a {
	color: <?php echo $CHfw_rdx_options['footer_widget_Textcolor_'.$CHfw_select_skin]?> ;

}

.footer-container #footer p,
.footer-container #footer li,
.footer-container #footer h4,
.footer-container #footer h2,
.footer-container #footer h3,
.footer-container #footer h4,
.footer-container #footer,
.footer-container #footer p,
.widget.footer-widget .comment-author-link,
.widget.footer-widget .sc_fw-theme-last_post_list .last_post_enrty,
.widget.footer-widget ul li.recentcomments {
	color: <?php echo $CHfw_rdx_options['footer_widget_Textcolor_'.$CHfw_select_skin]?>;
}

/*widget title standart*/

.widget.footer-widget .widget-heading {
	margin-bottom: 10px;
	position: relative;
	z-index: 0;
	display: inline-block;
	width: 100%;
}

.widget.footer-widget .widget-heading.red_skin {
	border: 1px solid #ddd !Important;
}

.widget.sidebar-widget .widget-heading.line_widget {
	margin-bottom: 5px;
}

.widget.sidebar-widget .product_list_widget span.amount {
	color: <?php echo $CHfw_rdx_options['sidebar_widget_Textcolor_'.$CHfw_select_skin]?>;
}

.widget.footer-widget .product_list_widget span.amount {
	color: <?php echo $CHfw_rdx_options['footer_widget_Textcolor_'.$CHfw_select_skin]?>;
}

.sidebar-widget.widget_recent_entries span.post-date {
	color: <?php echo $CHfw_rdx_options['sidebar_widget_Textcolor_'.$CHfw_select_skin]?>;
}

.footer-widget.widget_recent_entries span.post-date {
	color: <?php echo $CHfw_rdx_options['footer_widget_Textcolor_'.$CHfw_select_skin]?>;
}

<?php
$select_widget_title_skin="custom_skin";
if (isset($CHfw_rdx_options['footer_widget_title_selected'.$CHfw_select_skin])){
 $sidebar_widget_title_selected='_'.$CHfw_rdx_options['footer_widget_title_selected'.$CHfw_select_skin];
} else{
  $sidebar_widget_title_selected='_'."border_bottom_bg_widget".$CHfw_select_skin;
}

 $widget_title_skinOptions='footer_widget_title_typography_'.$select_widget_title_skin.$sidebar_widget_title_selected.$CHfw_select_skin;

?>

.widget.footer-widget .widget-heading.<?php echo $select_widget_title_skin;  ?> h4 {
	text-align: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['text-align']; ?>;
}

.widget.footer-widget .widget-heading.<?php echo $select_widget_title_skin ?> h4 span {
	display: inline-block;
	text-transform: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['text-transform'] ?>;
	line-height: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['line-height'] ?>;
	color: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['color'] ?>;
	font-size: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['font-size'] ?>;
	font-family: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['font-family'] ?>;

}

.widget.footer-widget .widget-heading.<?php echo $select_widget_title_skin ?> h4 {
	margin-bottom: 0;
}

/*border_bottom_widget and border_bottom_bg_widget*/

.widget.footer-widget .widget-heading.border_bottom_widget h4 span,
.widget.footer-widget .widget-heading.border_bottom_bg_widget h4 span {
	position: relative;
	padding: 0 19px 0 0;
	display: inline-block;
}

.widget.footer-widget .widget-heading.border_bottom_bg_widget h4 span {
	background: #000;
	padding-left: 10px
}

.widget.footer-widget .widget-heading.border_bottom_widget h4,
.widget.footer-widget .widget-heading.border_bottom_bg_widget h4 {
	padding: 0;
	background: none;
	border-bottom: 2px solid <?php echo $CHfw_rdx_options['footer_widget_title_borderColor'.$CHfw_select_skin] ?>;
}

.widget.footer-widget .widget-heading.border_bottom_bg_widget h4 span:after {
	content: '';
	background: <?php echo $CHfw_rdx_options['footer_widget_title_BgColor_second_border_bottom_bg_widget'.$CHfw_select_skin] ?>;
	height: 4px;
	width: 100%;
	position: absolute;
	left: 0;
	bottom: -2px;
}

.widget.footer-widget .widget-heading.border_bottom_widget h4 span:after {
	content: '';
	background: <?php echo $CHfw_rdx_options['footer_widget_title_BgColor_second_border_bottom_widget'.$CHfw_select_skin] ?>;
	height: 4px;
	width: 100%;
	position: absolute;
	left: 0;
	bottom: -2px;
}

/*line_transparant_widget*/

.widget.footer-widget .widget-heading.line_transparant_widget {
	text-align: <?php echo $CHfw_rdx_options[$widget_title_skinOptions]['text-align'] ?>;
}

.widget.footer-widget .widget-heading.line_transparant_widget h4 {
	display: inline-block;
}

.widget.footer-widget .widget-heading.line_transparant_widget h4 span {
	margin: 0;
	display: inline-block;

}

/*line_left_widget*/
.widget.footer-widget .widget-heading.line_left_widget h4 {
	text-align: left !important;
}

.widget.footer-widget .widget-heading.line_left_widget h4 span {
	display: inline-block;
	background-color: <?php echo $CHfw_rdx_options['footer_widget_title_BgColor_first_custom_skin_line_left_widget'.$CHfw_select_skin] ?>;
}

.widget.footer-widget .widget-heading.line_left_widget h4:before {
	position: absolute;
	width: 100%;
	height: 2px;
	background-color: <?php echo $CHfw_rdx_options['footer_widget_title_LineColor'.$CHfw_select_skin] ?>;
	content: "";
	display: block;
	top: 60%;
	z-index: -1;
}

/*line_widget*/
.widget.footer-widget .widget-heading.line_widget h4 span {
	background: <?php echo $CHfw_rdx_options['footer_widget_title_BgColor_first_custom_skin_line_widget'.$CHfw_select_skin] ?>;
}

.widget.footer-widget .widget-heading.line_widget h4 span {
	padding: 0 10px;
	position: relative;
	display: inline-block;
	z-index: 1;
}

.widget.footer-widget .widget-heading.line_widget h4 {
	font-weight: normal;
	margin-top: 0;
	border-bottom: 2px solid transparent;
	position: relative;
	margin-bottom: 15px;
	text-align: center;
}

.widget.footer-widget .widget-heading.line_widget h4 {
	color: #252525;
}

.widget.footer-widget .widget-heading.line_widget h4:before {
	content: "";
	display: block;
	border-top: 2px solid <?php echo $CHfw_rdx_options['footer_widget_title_LineColor'.$CHfw_select_skin] ?>;
	width: 100%;
	height: 2px;
	position: absolute;
	top: 50%;
	z-index: 1;
}

/*colored_two_widget*/
.widget.footer-widget .widget-heading.colored_two_widget,
.widget.footer-widget .widget-heading.colored_widget {
	background: <?php echo $CHfw_rdx_options['footer_widget_title_BgColor_first_custom_skin_colored_two_widget'.$CHfw_select_skin] ?>;
}

.widget.footer-widget .widget-heading.colored_widget h4,
.widget.footer-widget .widget-heading.colored_two_widget h4 {
	margin: 5px;
}

.widget.footer-widget .widget-heading.colored_two_widget h4:before {
	transition: all .3s ease-out;
	content: '';
	border: 4px solid transparent;
	right: 0;
	top: 0;
	position: absolute;
	z-index: 3;
	width: auto;
}

.widget.widget_search.footer-widget #searchsubmit,
.widget.footer-widget .woocommerce-product-search #searchsubmit,
.widget.footer-widget .woocommerce-product-search input[type="submit"] {
	text-transform: <?php echo $CHfw_rdx_options['footer_widget_searchButton_'.$CHfw_select_skin]['text-transform'] ?>;
	line-height: <?php echo $CHfw_rdx_options['footer_widget_searchButton_'.$CHfw_select_skin]['line-height'] ?>;
	color: <?php echo $CHfw_rdx_options['footer_widget_searchButton_'.$CHfw_select_skin]['color'] ?>;
	font-size: <?php echo $CHfw_rdx_options['footer_widget_searchButton_'.$CHfw_select_skin]['font-size'] ?>;
	font-family: <?php echo $CHfw_rdx_options['footer_widget_searchButton_'.$CHfw_select_skin]['font-family'] ?>;

	background-color: <?php echo $CHfw_rdx_options['footer_widget_searchButtonBgColor_'.$CHfw_select_skin] ?>;
}

.widget.widget_search.footer-widget #searchsubmit:hover, .widget.woocommerce-product-search #searchsubmit:hover {
	background-color: <?php echo $CHfw_rdx_options['footer_widget_searchButtonBgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['footer_widget_searchButton_'.$CHfw_select_skin]['color'] ?>;
}

.pagination-centered .loadmore-controls {
	background-color: <?php echo $CHfw_rdx_options['loadmore_BgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['loadmore_TextColor_'.$CHfw_select_skin] ?>;
}

.pagination-centered .loadmore-btn, .pagination-centered .loadmore-all-loaded {
	color: <?php echo $CHfw_rdx_options['loadmore_TextColor_'.$CHfw_select_skin] ?>;
}

.woocommerce-pagination .pagination ul li a:hover,
.woocommerce-pagination .pagination ul li a.active,
.posts-pagination .pagination ul li a:hover,
.posts-pagination .pagination ul li a.active {
	background-color: <?php echo $CHfw_rdx_options['pagination_ActiveButtonBgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['pagination_ActiveButtonTextColor_'.$CHfw_select_skin] ?>;
}

.woocommerce-pagination .pagination ul li a,
.woocommerce-pagination .pagination ul li span,
.posts-pagination .pagination ul li a,
.posts-pagination .pagination ul li span {
	background-color: <?php echo $CHfw_rdx_options['pagination_ButtonBgColor_'.$CHfw_select_skin] ?>;
	color: <?php echo $CHfw_rdx_options['pagination_ButtonTextColor_'.$CHfw_select_skin] ?>;
}

.notification_content .button,
.woocommerce .woocommerce-MyAccount-navigation .button,
.woocommerce .woocommerce-MyAccount-content .button,
#woo-checkout-page .button,
.woocommerce .cart.cart-page .button,
.wpcf7-form .wpcf7-submit,
#single_product-product_summary button.single_add_to_cart_button {
	background-color:#058cc6; <?php // echo $CHfw_rdx_options['AddToCart_btn_BgColor_'.$CHfw_select_skin] ?>;
	color:<?php echo $CHfw_rdx_options['AddToCart_btn_TextColor_'.$CHfw_select_skin] ?>;
}

<?php
//BADGE product category list badge colors

 if (isset($CHfw_rdx_options['Shop_sale_badge_textcolor_'.$CHfw_select_skin])) {
echo '.imageContainer span.onsale,
.imageContainer span.out-of-stock,
.imageContainer span.new-product-icon,
.imageContainer span.sale-product-discount-icon,
.products .product .item-area .product-label  {
color: '.$CHfw_rdx_options['Shop_sale_badge_textcolor_'.$CHfw_select_skin].' !important;
}';
}



 if (isset($CHfw_rdx_options['Shop_sale_badge_bgcolor_'.$CHfw_select_skin])) {
echo '.imageContainer span.onsale,.products .product .item-area .product-label span.onsale {
background: '.$CHfw_rdx_options['Shop_sale_badge_bgcolor_'.$CHfw_select_skin].' !important;
}';
}

 if (isset($CHfw_rdx_options['Shop_outofstock_badge_bgcolor_'.$CHfw_select_skin])) {
echo '.imageContainer span.out-of-stock,.products .product .item-area .product-label span.out-of-stock {
background: '.$CHfw_rdx_options['Shop_outofstock_badge_bgcolor_'.$CHfw_select_skin].' !important;
}';
}

 if (isset($CHfw_rdx_options['Shop_new_badge_bgcolor_'.$CHfw_select_skin])) {
echo '.imageContainer span.new-product-icon,.products .product .item-area .product-label span.new-product-icon{
background: '.$CHfw_rdx_options['Shop_new_badge_bgcolor_'.$CHfw_select_skin].' !important;
}';
}
 if (isset($CHfw_rdx_options['Shop_discountPercentage_'.$CHfw_select_skin])) {
echo '.imageContainer span.sale-product-discount-icon,.products .product .item-area .product-label span.sale-product-discount-icon{
background: '.$CHfw_rdx_options['Shop_discountPercentage_'.$CHfw_select_skin].' !important;
}';
}
 if (isset($CHfw_rdx_options['Shop_quickview_bgcolor_'.$CHfw_select_skin])) {
echo '.products .product .item-area a.quickview-icon {
background: '.$CHfw_rdx_options['Shop_quickview_bgcolor_'.$CHfw_select_skin].' !important;
}';
}
$header_menu_arrow = $CHfw_rdx_options['megaMenu_menu_arrow_'.$CHfw_select_skin];

if ($header_menu_arrow == 'hide') {
 ?>
@media ( min-width: 767px) {
	.caret {
		border: none !important;
	}
}

<?php

}
//MEGA Menu
$header_submenu_arrow = $CHfw_rdx_options['megaMenu_submenu_arrow_'.$CHfw_select_skin];

if ($header_submenu_arrow == 'hide') {
    ?>
@media ( min-width: 767px) {
	/*arrow add*/
	#header-desktop-menu 	.navbar .dropdown-menu:before {
		display: inline-block;
		border: none;
		content: '' !important;
	}

	#header-desktop-menu 	.navbar .dropdown-menu:after {
		display: inline-block;
		border: none;
		content: '' !important;
	}
}

<?php

}


if (isset($CHfw_rdx_options['megaMenu_animation_type_'.$CHfw_select_skin])){
$mega_menu_animation_type = $CHfw_rdx_options['megaMenu_animation_type_'.$CHfw_select_skin];
    if ($mega_menu_animation_type == 'fadein') {
        ?>
@media ( min-width: 767px) {
	/*FadeInUp Drop-Down Menu Transitions ok*/
	#header-desktop-menu	.dropdown .dropdown-menu {
		visibility: hidden;
		opacity: 0;
		position: absolute;
		display: block;
		transform: translateZ(0);
		transform: translateY(10%);
		transition: all 0.5s ease 0s, visibility 0s linear 0.5s;
	}

	#header-desktop-menu .dropdown:hover .dropdown-menu {
		visibility: visible;
		opacity: 1;
		transform: translateX(0%);
		transition-delay: 0s;
	}
}

<?php
}
elseif ($mega_menu_animation_type ==  'slider' ) {
    ?>
/*slider  */
@media ( min-width: 767px) {
	#header-desktop-menu	.dropdown .dropdown-menu {
		visibility: hidden;
		opacity: 0;

		display: block;
		position: absolute;
		-webkit-transition: all 0.3s ease;
		transition: all 0.3s ease;
		-webkit-transform: scale(0);
		transform: scale(0);
		-webkit-transform-origin: 0 0;
		transform-origin: 0 0;
		box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 8px 0 rgba(0, 0, 0, 0.12);
	}

	#header-desktop-menu .dropdown:hover .dropdown-menu {
		-webkit-transform: scale(1);
		transform: scale(1);
		visibility: visible;
		opacity: 1;
	}
}

/*slider end  */
<?php  }     }


 ?>
