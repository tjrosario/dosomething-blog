<?php

extract( shortcode_atts( array(
			'size' => '40',
		), $atts ) );


$output .= '<div class="mk-shortcode mk-padding-shortcode" style="height:'.$size.'px"></div>';
echo $output;
