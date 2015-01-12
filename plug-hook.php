<?php
/*
Plugin Name:Google Map
Plugin URI:http://wordpress.org/plugins/
Description: This plugin is for wordpress to display google map in your wordpress site. Shortcode  [google_map_view latitude="24.17310" longitudinal="88.91905"]. Find you map latitude and longitudinal from here <a target="_blink" href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm">coordinate</a>
Version: 2.1
Author: Raju Ahmed
Author URI:http://rajuahmed.0fees.us/raju
License: GPLv2 or later
*/

//load js file
function google_map_view_scripts44567866() {
	wp_enqueue_script('googlemap',plugins_url( '/js/googlemap.js' , __FILE__ ),array( 'jquery' ));
}
add_action( 'init', 'google_map_view_scripts44567866' );
//start shortcode
// [google_map_view latitude="24.17310" longitudinal="88.91905"]
function shortcode_googlemap_viewmousumi4444($atts){
    extract(shortcode_atts(
	array(
        "width"=>'100%',
        "height"=>'400px',
		"latitude"=>24.17310    ,
        "longitudinal"=>88.91905,
    ),$atts));
$output ='<div id="coords" >'.$atts['latitude'].','.$atts['longitudinal'].'</div>';
$output.='<div id="map_view"  style="width:600px; height:400px"></div>';
return $output;
}add_shortcode("google_map_view","shortcode_googlemap_viewmousumi4444");
//load javascript
function google_map_mousumi898766233() {?>
<script type="text/javascript">
		function initialize(){
		var coords = document.getElementById('coords').innerHTML.split(",");
		var lat = coords[0];
		var lng = coords[1];
		var mapProp = {
				center: new google.maps.LatLng(lat,lng),
				zoom:12,
				panControl:true,
				zoomControl:true,
				mapTypeControl:true,
				scaleControl:true,
				streetViewControl:true,
				overviewMapControl:true,
				rotateControl:true,    
				mapTypeId: google.maps.MapTypeId.ROADMAP
			  };
		var map = new google.maps.Map(document.getElementById("map_view"),mapProp);
			  
		var myMarkerLatlng = new google.maps.LatLng(lat,lng);
		var marker = new google.maps.Marker({
				position: myMarkerLatlng,
				map: map,
				title: 'Raju Ahmed'
				});
			};
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<?php
	}
add_action('wp_head', 'google_map_mousumi898766233');
?>