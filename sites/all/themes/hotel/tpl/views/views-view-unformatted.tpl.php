<?php

/**
 * @description: this view is to display all rented properties row by row with few informations
 */
?>
<?php 
$results=$view->result;
$output = "";
$output .= "<div class='rent-prop-contents clearfix'>";

//drupal_set_message('<pre>'.print_r($results, 1).'</pre>');
foreach($results as $res){
	$output .= "<div class='rows'>";
	$img = "";
	//drupal_set_message('<pre>'.print_r($results[0], 1).'</pre>');
	if (isset($res->field_field_property_images[0]['raw']['uri'])){
		//drupal_set_message('<pre>'.print_r($res->field_field_property_images[0]['raw']['uri'], 1).'</pre>');
		$uri = $res->field_field_property_images[0]['raw']['uri'];
		$img .= l(theme('image_style', array('style_name' => '220x190', 'path' => $uri)), 'node/'.$res->nid, array('html' => TRUE)); 
	}
	$output .= $img;
	$rest_info = "<div class='other-info'>";
	$title = "<h2>" . l($res->node_title, 'node/'.$res->nid) . "</h2><div class=''clearfix></div>";
	$rest_info .= $title;
	$more_info = "<div class='info-dls clearfix'>";
	$more_info .= "<div class='inforow clearfix'>";
	$more_info .= "<div class='infodata'><small>Price</small><span>".$res->field_field_price[0]['rendered']['#markup']."</span></div>";
	$more_info .= "<div class='infodata'><small>Location</small><span>".$res->field_field_location[0]['rendered']['#markup']."</span></div>";
	$more_info .= "<div class='infodata'><small>Property On</small><span>".$res->field_field_property_on[0]['rendered']['#markup']."</span></div></div>";
	$sub_info = "<div class='infosubrow clearfix'>";
	$sub_info .= '<div class="infoowner"><div class="infownertext"><p><span>Individual</span></p>';
    $sub_info .= "<small>".$res->field_field_listed_person_name[0]['rendered']['#markup']."</small>";
	$buttons = "<div class='tilebtn'><a href=''><span class='icon-eye'>Quick view</span></a><button class='tilecontactbtn'>Contact</button></div>";
	$sub_info .= "</div><div></div></div>".$buttons."</div>";
	
	$more_info .=$sub_info;
	$more_info .= "</div>";
	$rest_info .= $more_info;
	/*$sub_info = "<div class='infosubrow clearfix'>";
	$rest_info .= $sub_info;*/
	$rest_info .= "</div>";
	$output .= $rest_info;
	$output .= "</div>";
}
$output .= "</div>";
print $output;
?>

