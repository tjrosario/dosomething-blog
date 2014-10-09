<?php 

/*
		GOOGLE MAP WIDGET
*/

class Artbees_Widget_Google_Map extends WP_Widget {

	function Artbees_Widget_Google_Map() {
		$widget_ops = array( 'classname' => 'widget_gmap', 'description' => __( 'Displays google map.', 'mk_framework' ) );
		$this->WP_Widget( 'gmap', THEME_SLUG. '- Google Maps', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$latitude = !empty( $instance['latitude'] )?$instance['latitude']:0;
		$longitude = !empty( $instance['longitude'] )?$instance['longitude']:0;
		$panControl = !empty( $instance['panControl'] )?$instance['panControl']:false;
		$scrollwheel = !empty( $instance['scrollwheel'] )?$instance['scrollwheel']:false;
		$zoomControl = !empty( $instance['zoomControl'] )?$instance['zoomControl']:false;
		$mapTypeControl = !empty( $instance['mapTypeControl'] )?$instance['mapTypeControl']:false;
		$scaleControl = !empty( $instance['scaleControl'] )?$instance['scaleControl']:false;
		$draggable = !empty( $instance['draggable'] )?$instance['draggable']:false;
		$zoom = (int)$instance['zoom'];
		$height = (int)$instance['height'];

		if ( $zoom < 1 ) {
			$zoom = 1;
		}

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		$id = mt_rand( 100, 3000 );
?>

		<div id="gmap_widget_<?php echo $id;?>" class="google_map" style="height:<?php echo $height;?>px; width:100%;"></div>
			<script type="text/javascript" src="http<?php echo (is_ssl())? 's' : ''; ?>://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
			jQuery(document).ready(function($) {
  var map;
var gmap_marker = true;


  var myLatlng = new google.maps.LatLng(<?php echo $latitude;?>, <?php echo $longitude;?>)
      function initialize() {
        var mapOptions = {
          zoom: <?php echo $zoom;?>,
          center: myLatlng,
	      panControl: <?php echo $panControl ? 'true' : 'false';?>,
	      scrollwheel: <?php echo $scrollwheel ? 'true' : 'false';?>,
		  zoomControl: <?php echo $zoomControl ? 'true' : 'false';?>,
		  mapTypeControl: <?php echo $mapTypeControl ? 'true' : 'false';?>,
		  scaleControl: <?php echo $scaleControl ? 'true' : 'false';?>,
		  draggable: <?php echo $draggable ? 'true' : 'false';?>,
	      mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        map = new google.maps.Map(document.getElementById('gmap_widget_<?php echo $id;?>'), mapOptions);


if(gmap_marker == true) {
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
}

      }
 		google.maps.event.addDomListener(window, 'load', initialize);
			});
			</script>

			
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['latitude'] = strip_tags( $new_instance['latitude'] );
		$instance['longitude'] = strip_tags( $new_instance['longitude'] );
		$instance['zoom'] = (int) $new_instance['zoom'];
		$instance['height'] = (int) $new_instance['height'];

		$instance['draggable'] = !empty( $new_instance['draggable']) ? true : false;
		$instance['scaleControl'] = !empty( $new_instance['scaleControl']) ? true : false;
		$instance['mapTypeControl'] = !empty( $new_instance['mapTypeControl']) ? true : false;
		$instance['zoomControl'] = !empty( $new_instance['zoomControl']) ? true : false;
		$instance['scrollwheel'] = !empty( $new_instance['scrollwheel']) ? true : false;
		$instance['panControl'] = !empty( $new_instance['panControl']) ? true : false;



		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$latitude = isset( $instance['latitude'] ) ? esc_attr( $instance['latitude'] ) : '';
		$longitude = isset( $instance['longitude'] ) ? esc_attr( $instance['longitude'] ) : '';
		$zoom = isset( $instance['zoom'] ) ? absint( $instance['zoom'] ) : 14;
		$height = isset( $instance['height'] ) ? absint( $instance['height'] ) : 250;


		$panControl = isset( $instance['panControl'] ) ? (bool)$instance['panControl'] : false;
		$scrollwheel = isset( $instance['scrollwheel'] ) ? (bool)$instance['scrollwheel'] : false;
		$zoomControl = isset( $instance['zoomControl'] ) ? (bool)$instance['zoomControl'] : false;
		$mapTypeControl = isset( $instance['mapTypeControl'] ) ?  (bool)$instance['mapTypeControl'] : false;
		$scaleControl = isset( $instance['scaleControl'] ) ? (bool)$instance['scaleControl'] : false;
		$draggable = isset( $instance['draggable'] ) ? (bool)$instance['draggable']  : false;

?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'mk_framework' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'latitude' ); ?>"><?php _e( 'Latitude:', 'mk_framework' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'latitude' ); ?>" name="<?php echo $this->get_field_name( 'latitude' ); ?>" type="text" value="<?php echo $latitude; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'longitude' ); ?>"><?php _e( 'Longitude:', 'mk_framework' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'longitude' ); ?>" name="<?php echo $this->get_field_name( 'longitude' ); ?>" type="text" value="<?php echo $longitude; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'zoom' ); ?>"><?php _e( 'Zoom', 'mk_framework' ); ?></label>
		<input class="widefat"  id="<?php echo $this->get_field_id( 'zoom' ); ?>" name="<?php echo $this->get_field_name( 'zoom' ); ?>" type="text" value="<?php echo $zoom; ?>" size="3" />
		<em>From 1 to 19, default : 14</em>
		</p>

		<p><label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height:', 'mk_framework' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo $height; ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'scrollwheel' ); ?>" name="<?php echo $this->get_field_name( 'scrollwheel' ); ?>"<?php checked( $scrollwheel ); ?> />
		<label for="<?php echo $this->get_field_id( 'scrollwheel' ); ?>"><?php _e( 'Enable Scroll Wheel', 'mk_framework' ); ?></label></p>


		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'panControl' ); ?>" name="<?php echo $this->get_field_name( 'panControl' ); ?>"<?php checked( $panControl ); ?> />
		<label for="<?php echo $this->get_field_id( 'panControl' ); ?>"><?php _e( 'Enable Pan Control', 'mk_framework' ); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'zoomControl' ); ?>" name="<?php echo $this->get_field_name( 'zoomControl' ); ?>"<?php checked( $zoomControl ); ?> />
		<label for="<?php echo $this->get_field_id( 'zoomControl' ); ?>"><?php _e( 'Enable Zoom Control', 'mk_framework' ); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'mapTypeControl' ); ?>" name="<?php echo $this->get_field_name( 'mapTypeControl' ); ?>"<?php checked( $mapTypeControl ); ?> />
		<label for="<?php echo $this->get_field_id( 'mapTypeControl' ); ?>"><?php _e( 'Enable Map Type Control', 'mk_framework' ); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'scaleControl' ); ?>" name="<?php echo $this->get_field_name( 'scaleControl' ); ?>"<?php checked( $scaleControl ); ?> />
		<label for="<?php echo $this->get_field_id( 'scaleControl' ); ?>"><?php _e( 'Enable Scale Control', 'mk_framework' ); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'draggable' ); ?>" name="<?php echo $this->get_field_name( 'draggable' ); ?>"<?php checked( $draggable ); ?> />
		<label for="<?php echo $this->get_field_id( 'draggable' ); ?>"><?php _e( 'Enable Draggable', 'mk_framework' ); ?></label></p>

<?php
	}
}
/***************************************************/