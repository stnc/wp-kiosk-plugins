<?php

/***SIDEBAR Doctor select METABOX (ONLY STAFF )****/
function CHfw_doctor_selected_get_metaOLD($value)
{
	global $post;

	$field = get_post_meta($post->ID, 'CHfw_DoctorAndDepartmant_ForSingleStaffPage', true);
	if (!empty($field)) {
		if (array_key_exists($value, $field)) {
			$field = $field[$value];
		} else {
			return '';
		}
	}

	if (!empty($field)) {
		return is_array($field) ? stripslashes_deep($field) : stripslashes(wp_kses_decode_entities($field));
	} else {
		return false;
	}
}

function CHfw_doctor_selected_get_meta_simple($value)
{
	global $post;


	return get_post_meta($post->ID, $value, true);
}


function CHfw_doctor_selected_add_meta_box()
{
	add_meta_box(
		'CHfw_DoctorAndDepartmant_ForSingleStaffPage_metabox',
		__('Doctor Selected & Department', 'doctor_selected'),
		'CHfw_doctor_selected_html',
		'staff',
		'side',
		'default'
	);
}


function CHfw_doctor_selected_html($post)
{
	wp_nonce_field('_doctor_selected_nonce', 'doctor_selected_nonce'); ?>
    <label for="CHfw_DrAndDep_display_doctor_department">
		<?php _e('Department:', 'CHfw-staff'); ?>
		<?php
		//only root categories
		$myposts_display_doctor_department = get_categories(
			array(
				'child_of' => 0,//root
				'taxonomy' => 'mp-event_category',
				'post_type' => 'mp-event',
				'parent' => 0,
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => 1,
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'number' => 0,
				'pad_counts' => true,
			)
		);

		?>
    </label>
    <br>
	<?php ?>
    <select name="CHfw_DrAndDep_display_doctor_department" id="CHfw_DrAndDep_display_doctor_department">
		<?php
		$data_s = "";

		if (!empty($myposts_display_doctor_department)):
			foreach ($myposts_display_doctor_department as $mypost):
				if (CHfw_doctor_selected_get_meta_simple('CHfw_DrAndDep_display_doctor_department') == $mypost->term_id) {
					$data_s = $mypost->term_id;
				}

				$selectInfo = (CHfw_doctor_selected_get_meta_simple('CHfw_DrAndDep_display_doctor_department') == $mypost->term_id) ? 'selected' : ''
                ?>

                <option value="<?php echo $mypost->term_id ?>" <?php echo $selectInfo ?>><?php echo $mypost->name ?></option>
			<?php endforeach;
		endif ?>
    </select>


    <br>
    <label for="CHfw_DrAndDep_program_and_services">
		<?php _e('Programs and Services:', 'CHfw-staff'); ?>
    </label>
    <br>
	<?php

	if ($data_s != '') {
		$list_child_terms_args = array(
			'taxonomy' => 'mp-event_category',
			'use_desc_for_title' => 0, // best practice: don't use title attributes ever
			'child_of' => $data_s // show only child terms of the current page's
		);
		$root_categories = get_categories($list_child_terms_args);
		if (!empty($root_categories)) {
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
			$list_departmen_db = CHfw_doctor_selected_get_meta_simple('CHfw_DrAndDep_program_and_services');
			$list_departmen_db = explode(',', $list_departmen_db);

		}
	}
	?>
    <select name="CHfw_DrAndDep_program_and_services[]" multiple id="CHfw_DrAndDep_program_and_services">
		<?php foreach ($myposts_display_doctor_department as $cal) :
			if (in_array($cal->ID, $list_departmen_db)) {
				$ch_yes = "selected";
			} else {
				$ch_yes = "";
			}
			?>
            <option value="<?php echo $cal->ID ?>" <?php echo $ch_yes ?>><?php echo $cal->post_title ?></option>
		<?php endforeach ?>
    </select>
    <br>
    <label for="CHfw_DrAndDep_display_doctor_calendar">
		<?php
		_e('Calendar to Display Doctor:', 'CHfw-staff');
		$calendars = get_terms('booked_custom_calendars', 'orderby=slug&hide_empty=0');
		$list_departmen_db = CHfw_doctor_selected_get_meta_simple('CHfw_DrAndDep_display_doctor_calendar');
		?>
    </label>
    <br>
    <select name="CHfw_DrAndDep_display_doctor_calendar" id="CHfw_DrAndDep_display_doctor_calendar">
		<?php
		foreach ($calendars as $cal) {
			if ($cal->term_id == $list_departmen_db) {
				$ch_yes = "selected";
			} else {
				$ch_yes = "";
			}
			?>
            <option value="<?php echo $cal->term_id ?>" <?php echo $ch_yes ?>><?php echo $cal->name ?></option>
		<?php } ?>
    </select>

    <br>
    <label for="CHfw_DrAndDep_display_locations">
		<?php _e('Locations:', 'CHfw-staff'); ?>
    </label>
    <br>

    <select name="CHfw_DrAndDep_display_locations[]" multiple id="CHfw_DrAndDep_display_locations">
		<?php
		$list_location_db = CHfw_doctor_selected_get_meta_simple('CHfw_DrAndDep_display_locations');
		$list_location_db = explode(',', $list_location_db);

		$args = array("posts_per_page" => 10, "orderby" => "comment_count", 'post_type' => 'locations',);
		$posts_array = get_posts($args);


		if ($posts_array) {
			foreach ($posts_array as $key => $location) {
				$locations[$key]["id"] = $location->ID;
				$locations[$key]["title"] = $location->post_title;
			}
		}

		?>
		<?php
		foreach ($locations as $location) :
			if (in_array($location['id'], $list_location_db)) {
				$ch_yes = "selected";
			} else {
				$ch_yes = "";
			}
			?>
            <option value="<?php echo $location['id'] ?>" <?php echo $ch_yes ?>><?php echo $location['title'] ?></option>
		<?php endforeach ?>
    </select>
	<?php
}

function CHfw_doctor_selected_save($post_id)
{
	if (wp_is_post_autosave($post_id)) {
		return;
	}
	// Check if not a revision.
	if (wp_is_post_revision($post_id)) {
		return;
	}
	// Stop the script when doing autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	//departman   save
	if (isset($_POST['CHfw_DrAndDep_display_doctor_department'])) {
		update_post_meta($post_id, 'CHfw_DrAndDep_display_doctor_department', sanitize_text_field($_POST['CHfw_DrAndDep_display_doctor_department']));
	}

	//services save
	if (isset($_POST['CHfw_DrAndDep_program_and_services'])) {
		foreach ($_POST['CHfw_DrAndDep_program_and_services'] as $selectedOption) {
			$selectedOptionlist[] = $selectedOption;
		}
		$selectedOptionlist = implode(",", $selectedOptionlist);
		update_post_meta($post_id, 'CHfw_DrAndDep_program_and_services', sanitize_text_field($selectedOptionlist));
	}


	//calendar  save
	if (isset($_POST['CHfw_DrAndDep_display_doctor_calendar'])) {
		update_post_meta($post_id, 'CHfw_DrAndDep_display_doctor_calendar', sanitize_text_field($_POST['CHfw_DrAndDep_display_doctor_calendar']));
	}

	//locations  save
	if (isset($_POST['CHfw_DrAndDep_display_locations'])) {
		foreach ($_POST['CHfw_DrAndDep_display_locations'] as $selectedOption_locations) {
			$selectedOptionlist_locations[] = $selectedOption_locations;
		}
		$selectedOptionlist_locations = implode(",", $selectedOptionlist_locations);
		update_post_meta($post_id, 'CHfw_DrAndDep_display_locations', sanitize_text_field($selectedOptionlist_locations));
	}


}


/*register metabox */
function CHfw_staff_init_metabox()
{
	// add meta box
	add_action('add_meta_boxes', 'CHfw_doctor_selected_add_meta_box');
	// metabox save
	add_action('save_post', 'CHfw_doctor_selected_save');
}

/*Deparmant ajax request */
function CHfw_mp_event_post_ajax_request()
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

add_action('wp_ajax_CHfw_mp_event_post_ajax_request', 'CHfw_mp_event_post_ajax_request');
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action('wp_ajax_nopriv_CHfw_mp_event_post_ajax_request', 'CHfw_mp_event_post_ajax_request');


