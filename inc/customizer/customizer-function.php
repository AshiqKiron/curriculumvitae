<?php global $cv;

function curriculumvitae_customizer_styles() {
  wp_enqueue_style(
    'custom-style',
    get_template_directory_uri() . '/style.css'
  );
        $color = get_header_image();  //E.g. #FF0000
        $custom_css = "
                #masthead{
                        background-image: url({$color});
                        background-size:cover;
                        background-repeat:no-repeat;
                }";
        
        wp_add_inline_style( 'custom-style', $custom_css );
       
}
add_action( 'wp_enqueue_scripts', 'curriculumvitae_customizer_styles' );


function curriculumvitae_customizer_css() {
	global $cv;
    ?>
    <style type="text/css">

      #masthead {background-color: <?php echo esc_html($cv['nav_background']); ?>;}
      .site-header .main-navigation a {color: <?php echo esc_html($cv['nav_txt_color']); ?>;}
      .site-header .main-navigation a:hover {border-bottom: 1px solid <?php echo esc_html($cv['nav_border_color']); ?>;}
      .main-navigation ul ul {background-color:<?php echo esc_html($cv['nav_dropdown_bg_color']); ?>;}
      .menu-toggle {background-color:<?php echo esc_html($cv['mobile_nav_bg']); ?>;}
      .menu-toggle {color:<?php echo esc_html($cv['mobile_nav_txt']); ?>;}


     .footer-widget h2, .footer-widget table, .footer-widget h3, .footer-widget ul  ,  .footer-widget .wp-calendar ,.rssSummary, .footer-widget p, .footer-widget a {color:<?php echo esc_html($cv['colophon_txt_color']); ?>;}
     .footer-widget {background-color:<?php echo esc_html($cv['footer_bg_color']); ?>;

     
    </style>
    <?php
}
add_action( 'wp_head', 'curriculumvitae_customizer_css' );
