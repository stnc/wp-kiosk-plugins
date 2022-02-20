<?php



// ******************************  ajax request ****** ///////

// Deparmant ajax request
function stnc_wp_kiosk_mp_event_post_ajax_request()
{

	// The $_REQUEST contains all the data sent via ajax
	if (isset($_REQUEST)) {

		$_REQUEST = array_map( 'stripslashes_deep', $_REQUEST );
		 $value = $_REQUEST['value'];

		$list_child_terms_args = array(
			'taxonomy' => 'mp-event_category',
			'use_desc_for_title' => 0, // best practice: don't use title attributes ever
			'child_of' => $value // show only child terms of the current page's
		);
		$root_categories = get_categories($list_child_terms_args);
	//	print_r ($root_categories);
		$mp_events = array(
			'offset' => 1,
			'post_type' => 'mp-event',
			'posts_per_page' => -1,
			'numberposts' => -1,
			"orderby" => "post_date",
			"order" => "DESC",
			"post_status" => "publish",
			'parent' => 0,
			'tax_query' => array(
				'relation' => 'OR',
				array(
					'taxonomy' => 'mp-event_category',
					'field' => 'term_id',
					'terms' => $root_categories[0]->term_id,
					'include_children' => true,
				),
			)
		);
		$myposts_display_doctor_department = get_posts($mp_events);
		?>
		<?php foreach ($myposts_display_doctor_department as $mypost) { ?>
<option value="<?php echo $mypost->ID ?>"><?php echo $mypost->post_title ?></option>
		<?php } ?>
		<?php
	}
	// Always die in functions echoing ajax content
	die();
}

add_action('wp_ajax_stnc_wp_kiosk_mp_event_post_ajax_request', 'stnc_wp_kiosk_mp_event_post_ajax_request');
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action('wp_ajax_nopriv_stnc_wp_kiosk_mp_event_post_ajax_request', 'stnc_wp_kiosk_mp_event_post_ajax_request');


