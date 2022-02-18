<?php


//metabox yan kısımları ıcın ekleme kısımları

$stnc_wp_kiosk_staff_ch_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit

$stnc_wp_kiosk_staff_post_type_ch = get_post_type($stnc_wp_kiosk_staff_ch_postID);//get type

$stnc_wp_kiosk_staff_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new

if ($stnc_wp_kiosk_staff_post_type_post == 'staff' or $stnc_wp_kiosk_staff_post_type_ch == 'staff') {
    if (is_admin()) {
        add_action('load-post.php', 'stnc_wp_kiosk_staff_init_metabox');
        add_action('load-post-new.php', 'stnc_wp_kiosk_staff_init_metabox');
    }
}

/*register metabox */
function stnc_wp_kiosk_staff_init_metabox()
{
	// add meta box
	add_action('add_meta_boxes', 'stnc_wp_kiosk_doctor_selected_add_meta_box');
	// metabox save
	add_action('save_post', 'stnc_wp_kiosk_doctor_selected_save');
}

function stnc_wp_kiosk_doctor_selected_add_meta_box()
{
	add_meta_box(
		'stnc_wp_kiosk_DoctorAndDepartmant_ForSingleStaffPage_metabox',
		__('Doctor Selected & Department', 'doctor_selected'),
		'stnc_wp_kiosk_doctor_selected_html',
		'staff',
		'side',
		'default'
	);
}


function stnc_wp_kiosk_doctor_selected_html($post)
{
	wp_nonce_field('_doctor_selected_nonce', 'doctor_selected_nonce'); ?>
    <label for="stnc_wp_kiosk_DrAndDep_display_doctor_department">
		<?php _e('Department:', 'stnc_wp_kiosk-staff'); ?>
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
    <select name="stnc_wp_kiosk_DrAndDep_display_doctor_department" id="stnc_wp_kiosk_DrAndDep_display_doctor_department">
		<?php
		$data_s = "";

		if (!empty($myposts_display_doctor_department)):
			foreach ($myposts_display_doctor_department as $mypost):
				if (stnc_wp_kiosk_doctor_selected_get_meta_simple('stnc_wp_kiosk_DrAndDep_display_doctor_department') == $mypost->term_id) {
					$data_s = $mypost->term_id;
				}

				$selectInfo = (stnc_wp_kiosk_doctor_selected_get_meta_simple('stnc_wp_kiosk_DrAndDep_display_doctor_department') == $mypost->term_id) ? 'selected' : ''
                ?>

                <option value="<?php echo $mypost->term_id ?>" <?php echo $selectInfo ?>><?php echo $mypost->name ?></option>
			<?php endforeach;
		endif ?>
    </select>


    <br>
    <label for="stnc_wp_kiosk_DrAndDep_program_and_services">
		<?php _e('Programs and Services:', 'stnc_wp_kiosk-staff'); ?>
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
			$list_departmen_db = stnc_wp_kiosk_doctor_selected_get_meta_simple('stnc_wp_kiosk_DrAndDep_program_and_services');
			$list_departmen_db = explode(',', $list_departmen_db);

		}
	}
	?>
    <select name="stnc_wp_kiosk_DrAndDep_program_and_services[]" multiple id="stnc_wp_kiosk_DrAndDep_program_and_services">
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
    <label for="stnc_wp_kiosk_DrAndDep_display_doctor_calendar">
		<?php
		_e('Calendar to Display Doctor:', 'stnc_wp_kiosk-staff');
		$calendars = get_terms('booked_custom_calendars', 'orderby=slug&hide_empty=0');
		$list_departmen_db = stnc_wp_kiosk_doctor_selected_get_meta_simple('stnc_wp_kiosk_DrAndDep_display_doctor_calendar');
		?>
    </label>
    <br>
    <select name="stnc_wp_kiosk_DrAndDep_display_doctor_calendar" id="stnc_wp_kiosk_DrAndDep_display_doctor_calendar">
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
    <label for="stnc_wp_kiosk_DrAndDep_display_locations">
		<?php _e('Locations:', 'stnc_wp_kiosk-staff'); ?>
    </label>
    <br>

    <select name="stnc_wp_kiosk_DrAndDep_display_locations[]" multiple id="stnc_wp_kiosk_DrAndDep_display_locations">
		<?php
		$list_location_db = stnc_wp_kiosk_doctor_selected_get_meta_simple('stnc_wp_kiosk_DrAndDep_display_locations');
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






/***SIDEBAR Doctor select METABOX (ONLY STAFF ) -- kayıt yapıyor sanırım ****/

function stnc_wp_kiosk_doctor_selected_get_meta_simple($value)
{
	global $post;


	return get_post_meta($post->ID, $value, true);
}




function stnc_wp_kiosk_doctor_selected_save($post_id)
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
	if (isset($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_department'])) {
		update_post_meta($post_id, 'stnc_wp_kiosk_DrAndDep_display_doctor_department', sanitize_text_field($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_department']));
	}

	//services save
	if (isset($_POST['stnc_wp_kiosk_DrAndDep_program_and_services'])) {
		foreach ($_POST['stnc_wp_kiosk_DrAndDep_program_and_services'] as $selectedOption) {
			$selectedOptionlist[] = $selectedOption;
		}
		$selectedOptionlist = implode(",", $selectedOptionlist);
		update_post_meta($post_id, 'stnc_wp_kiosk_DrAndDep_program_and_services', sanitize_text_field($selectedOptionlist));
	}


	//calendar  save
	if (isset($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_calendar'])) {
		update_post_meta($post_id, 'stnc_wp_kiosk_DrAndDep_display_doctor_calendar', sanitize_text_field($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_calendar']));
	}

	//locations  save
	if (isset($_POST['stnc_wp_kiosk_DrAndDep_display_locations'])) {
		foreach ($_POST['stnc_wp_kiosk_DrAndDep_display_locations'] as $selectedOption_locations) {
			$selectedOptionlist_locations[] = $selectedOption_locations;
		}
		$selectedOptionlist_locations = implode(",", $selectedOptionlist_locations);
		update_post_meta($post_id, 'stnc_wp_kiosk_DrAndDep_display_locations', sanitize_text_field($selectedOptionlist_locations));
	}


}
