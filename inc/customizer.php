<?php
/**
 * curriculumvitae Theme Customizer
 *
 * @package curriculumvitae
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function curriculumvitae_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_section('header_image')->panel = 'header';
	$wp_customize->get_section('title_tagline')->panel = 'header';
	$wp_customize->get_section('static_front_page')->panel = 'frontpage';
	$wp_customize->get_section('colors')->panel = 'basic_settings';
	$wp_customize->get_section('background_image')->panel = 'basic_settings';
	$wp_customize->get_control('header_textcolor')->section = 'header_section';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'curriculumvitae_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'curriculumvitae_customize_partial_blogdescription',
		) );
	}


	// Panel
	$wp_customize->add_panel( 'header', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Header', 'curriculumvitae' ),
		'description' => esc_html__( 'This panel allows you to customize Header', 'curriculumvitae' ),
		)
	);

	$wp_customize->add_panel( 'frontpage', array(
			'priority' => 11,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Frontpage', 'curriculumvitae' ),
			'description' => esc_html__( 'This panel allows you to customize Frontpage', 'curriculumvitae' ),
		)
	);

	$wp_customize->add_panel( 'basic_settings', array(
			'priority' => 9,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Basic Site Settings', 'curriculumvitae' ),
			'description' => esc_html__( 'This panel allows you to customize site settings', 'curriculumvitae' ),
		)
	);


	$wp_customize->add_panel( 'footer', array(
			'priority' => 123,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Footer', 'curriculumvitae' ),
			'description' => esc_html__( 'This panel allows you to customize Footer', 'curriculumvitae' ),
		)
	);


	// custom content class
	if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'cv_Custom_Content' ) ) :
		class curriculumvitae_Custom_Content extends WP_Customize_Control {
			// Whitelist content parameter
			public $content = '';
			/**
			 * Render the control's content.
			 *
			 * Allows the content to be overriden without having to rewrite the wrapper.
			 *
			 * @since   1.0.0
			 * @return  void
			 */
			public function render_content() {
			if ( isset( $this->label ) ) {
				echo '<span class="customize-control-title">' . $this->label . '</span>';
			}
			if ( isset( $this->content ) ) {
				echo $this->content;
			}
			if ( isset( $this->description ) ) {
				echo '<span class="description customize-control-description">' . $this->description . '</span>';
			}
		}
		}
	endif;


	// Header Section
	$wp_customize->add_section( 'header_section' , array(
		'title'      => esc_html__('Header Colors','curriculumvitae'), 
		'panel'      => 'header',
		'capability'     => 'edit_theme_options',
		'priority'   => 10   
		)
	);  

	// Header background
	$wp_customize->add_setting('cv[nav_background]',array(
		'default'         => 'rgba(93, 187, 97, .05882)',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
)
);
		// Control
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nav_background', array(
					'label'      => esc_html__( 'Header Background Color', 'curriculumvitae' ),
					'section'    => 'header_section',
					'settings'   => 'cv[nav_background]' 
				)
			)
		);


	// site title color
	$wp_customize->add_setting('cv[site_title_color]',array(
			'default'         => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'       => 'postMessage',
			'type'            => 'option',
		)
	);
			// Control
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_title_color', array(
						'label'      => esc_html__( 'Site Title Color', 'curriculumvitae' ),
						'section'    => 'header_section',
						'settings'   => 'cv[site_title_color]' 
					)
				)
			);


	// Nav icon Color
	$wp_customize->add_setting('cv[nav_txt_color]',array(
				'default'         => '#333',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'       => 'postMessage',
				'type'            => 'option',
		)
	);
				// Control
				$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nav_txt_color', array(
							'label'      => esc_html__( 'Navigation Color', 'curriculumvitae' ),
							'section'    => 'header_section',
							'settings'   => 'cv[nav_txt_color]' 
						)
					)
				);
	
			
	// Nav bottom border Color
	$wp_customize->add_setting('cv[nav_border_color]',array(
		'default'         => '#4CAF50',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
	);
		// Control
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nav_border_color', array(
					'label'      => esc_html__( 'Navigation Border Color', 'curriculumvitae' ),
					'section'    => 'header_section',
					'settings'   => 'cv[nav_border_color]' 
				)
			)
		);


	// Nav bg  Color
	$wp_customize->add_setting('cv[nav_dropdown_bg_color]',array(
		'default'         => '#eee',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
	);
		// Control
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nav_dropdown_bg_color', array(
					'label'      => esc_html__( 'Navigation dropdrown Color', 'curriculumvitae' ),
					'section'    => 'header_section',
					'settings'   => 'cv[nav_dropdown_bg_color]' 
				)
			)
		);

	
	// Nav mobile bg  Color
	$wp_customize->add_setting('cv[mobile_nav_bg]',array(
		'default'         => '#4CAF50',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
	);
		// Control
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mobile_nav_bg', array(
					'label'      => esc_html__( 'Mobile Menu Color', 'curriculumvitae' ),
					'section'    => 'header_section',
					'settings'   => 'cv[mobile_nav_bg]' 
				)
			)
		);


	// Nav mobile text  Color
	$wp_customize->add_setting('cv[mobile_nav_txt]',array(
		'default'         => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
	);
		// Control
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mobile_nav_txt', array(
					'label'      => esc_html__( 'Mobile Menu Text Color', 'curriculumvitae' ),
					'section'    => 'header_section',
					'settings'   => 'cv[mobile_nav_txt]' 
				)
			)
		);
	
	// // basic  Section
	$wp_customize->add_section( 'basic_site_section' , array(
		'title'      => esc_html__('Site Settings','curriculumvitae'), 
		'panel'      => 'basic_settings',
		'capability'     => 'edit_theme_options',
		'priority'   => 10   
		)
	);

	// Frontpage widget bg color  Section
	$wp_customize->add_section( 'widget_bg_section' , array(
		'title'      => esc_html__('Frontpage Widgets','curriculumvitae'), 
		'panel'      => 'basic_settings',
		'capability'     => 'edit_theme_options',
		'priority'   => 10   
		)
	);

	// Frontpage widget bg Color
	$wp_customize->add_setting('cv[widget_bg_color]',array(
		'default'         => '#f9f9f9',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
	);
		// Control
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'widget_bg_color', array(
					'label'      => esc_html__( 'Frontpage Widget Background Color', 'curriculumvitae' ),
					'section'    => 'widget_bg_section',
					'settings'   => 'cv[widget_bg_color]' 
				)
			)
		);

	
	// Footer  Section
	$wp_customize->add_section( 'footer_section' , array(
		'title'      => esc_html__('Footer settings','curriculumvitae'), 
		'panel'      => 'footer',
		'capability'     => 'edit_theme_options',
		'priority'   => 10   
		)
	);

	$wp_customize->add_setting('cv[colophon_txt_color]',array(
		'default'         => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
		);
			// Control
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'colophon_txt_color', array(
							'label'      => esc_html__( 'Footer Text Color', 'curriculumvitae' ),
							'section'    => 'footer_section',
							'settings'   => 'cv[colophon_txt_color]' 
						)
					)
				);


	//footer bg color
	$wp_customize->add_setting('cv[footer_bg_color]',array(
		'default'         => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
		);
			// Control
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bg_color', array(
							'label'      => esc_html__( 'Footer Background Color', 'curriculumvitae' ),
							'section'    => 'footer_section',
							'settings'   => 'cv[footer_bg_color]' 
						)
					)
				);

		// colophon Hide credit
		$wp_customize->add_setting('cv[hide_credit]',array(
			'default'         => 'true',
			'sanitize_callback' => 'sanitize_key',
			'transport'       => 'postMessage',
			'type'            => 'option',
		)
		);
				// Control
				$wp_customize->add_control(new WP_Customize_Control($wp_customize,'hide_credit', array(
								'label'      => esc_html__( 'Show Credit', 'curriculumvitae' ),
								'section'    => 'footer_section',
								'settings'   => 'cv[hide_credit]',
								'type' 		=> 'checkbox' 
							)
						)
					);


				

}
add_action( 'customize_register', 'curriculumvitae_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function curriculumvitae_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function curriculumvitae_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function curriculumvitae_customize_preview_js() {
	wp_enqueue_script( 'curriculumvitae-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'curriculumvitae_customize_preview_js' );


function curriculumvitae_customizer_misc_js() {
	wp_enqueue_script( 'curriculumvitae_option_defaults-customizer-widget-js', get_template_directory_uri() .'/js/customizer-control.js', array( 'customize-controls' , 'jquery'), null, true );

}
add_action( 'customize_controls_enqueue_scripts', 'curriculumvitae_customizer_misc_js' );



// Sanitize text field
function cv_sanitize_text( $text ) {

    return wp_kses_post( force_balance_tags( $text ) );
}

// Sanitize text
function cv_sanitize_css( $input ) {
	return wp_filter_nohtml_kses( $input );
}


// checkbox sanitization
   function cv_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return '';
      }
   }

// icon sanitization
function cv_icon_sanitize( $input ) {
    
    $valid_keys = athena_icons();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}
