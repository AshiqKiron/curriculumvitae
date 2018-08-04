<?php 
function curriculumvitae_option_defaults() {
	$defaults                        = array(
		'nav_background'              => 'rgba(93, 187, 97, .05882)',
		'site_title_color'            => '#fff',
		'nav_txt_color'               => '#333',
		'nav_border_color'            => '#4CAF50',
		'nav_dropdown_bg_color'       => '#eee',
		'mobile_nav_bg'               => '#4CAF50',
		'mobile_nav_txt'              => '#fff',
		'widget_bg_color'             => '#f9f9f9',
		'hide_credit'                 => 'true',
		'footer_bg_color'             => '#fff',
		'colophon_txt_color'          => '#333',
	);
	
	
      $options                 = get_option('cv',$defaults);

      //Parse defaults again - see comments
      $options                 = wp_parse_args( $options, $defaults );

		return $options;
}