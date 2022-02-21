<?php


//metabox yan kısımları ıcın ekleme kısımları

$stnc_wp_kiosk_staff_ch_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit

$stnc_wp_kiosk_staff_post_type_ch = get_post_type($stnc_wp_kiosk_staff_ch_postID);//get type

$stnc_wp_kiosk_staff_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new

if ($stnc_wp_kiosk_staff_post_type_post == 'stnc_kiosk' or $stnc_wp_kiosk_staff_post_type_ch == 'stnc_kiosk') {
	
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
		__('Ayarlar', 'doctor_selected'),
		'stnc_wp_kiosk_doctor_selected_html',
		'stnc_kiosk',
		'side',
		'default'
	);
}


function stnc_wp_kiosk_doctor_selected_html($post)
{
	wp_nonce_field('_doctor_selected_nonce', 'doctor_selected_nonce'); ?>

<label for="stnc_wp_kiosk_slide_time_metaBox">
    <?php _e('Resimin yada videonun ekranda bekleme süresi:', 'stnc_wp_kiosk-staff'); ?>
</label>
<br>

<select name="stnc_wp_kiosk_slide_time_metaBox[]" id="stnc_wp_kiosk_slide_time_metaBox">
    <?php
		$list_location_db = stnc_wp_kiosk_doctor_selected_get_meta_simple('stnc_wp_kiosk_slide_time_metaBox');
		$list_location_db = explode(',', $list_location_db);

		//print_r($list_location_db);
		/*
		//burası custom post verisi okur --burada location ın verisi okunmuş 
		$args = array("posts_per_page" => 10, "orderby" => "comment_count", 'post_type' => 'locations',);
		$posts_array = get_posts($args);
		if ($posts_array) {
			foreach ($posts_array as $key => $location) {
				$locations[$key]["id"] = $location->ID;
				$locations[$key]["title"] = $location->post_title;
			}
		} */

$locations = [
    ['id' => 20000, 'title' => '20 saniye'],
    ['id' => 30000, 'title' => '30 saniye'],
    ['id' => 35000, 'title' => '35 saniye'],
    ['id' => 40000, 'title' => '40 saniye'],
    ['id' => 50000, 'title' => '50 saniye'],
    ['id' => 60000, 'title' => '60 saniye'],
];

		foreach ($locations as $location) {
			if (in_array($location['id'], $list_location_db)) {
				$ch_yes = "selected";
				echo      '<option '.$ch_yes.' value="'.$location['id'].' ">'.$location['title'].'</option>';
				
			} else {
				$ch_yes = "";
				echo      '<option '.$ch_yes.' value="'.$location['id'].' ">'.$location['title'].'</option>';

			}
			}
			?>
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
	//bunlar metabox okuma ornekleri 
	// //departman   save
	// if (isset($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_department'])) {
	// 	update_post_meta($post_id, 'stnc_wp_kiosk_DrAndDep_display_doctor_department', sanitize_text_field($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_department']));
	// }

	// //services save
	// if (isset($_POST['stnc_wp_kiosk_DrAndDep_program_and_services'])) {
	// 	foreach ($_POST['stnc_wp_kiosk_DrAndDep_program_and_services'] as $selectedOption) {
	// 		$selectedOptionlist[] = $selectedOption;
	// 	}
	// 	$selectedOptionlist = implode(",", $selectedOptionlist);
	// 	update_post_meta($post_id, 'stnc_wp_kiosk_DrAndDep_program_and_services', sanitize_text_field($selectedOptionlist));
	// }


	// //calendar  save
	// if (isset($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_calendar'])) {
	// 	update_post_meta($post_id, 'stnc_wp_kiosk_DrAndDep_display_doctor_calendar', sanitize_text_field($_POST['stnc_wp_kiosk_DrAndDep_display_doctor_calendar']));
	// }

	//locations  save -- bu çoklu seçim yapar
	if (isset($_POST['stnc_wp_kiosk_slide_time_metaBox'])) {
		
		foreach ($_POST['stnc_wp_kiosk_slide_time_metaBox'] as $selectedOption_locations) {
			$selectedOptionlist_locations[] = $selectedOption_locations;
		}
		$selectedOptionlist_locations = implode(",", $selectedOptionlist_locations);
		update_post_meta($post_id, 'stnc_wp_kiosk_slide_time_metaBox', sanitize_text_field($selectedOptionlist_locations));
	}
}