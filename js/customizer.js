/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


		//Nav Hamburger bg color
		wp.customize( 'cv[nav_color]', function( value ) {
			value.bind( function( to ) {
				$( '.menu-toggle' ).css( 'background', to );
			} );
		});
	
		// site title color
		wp.customize( 'cv[site_title_color]', function( value ) {
			value.bind( function( to ) {
				$( '.site-title a' ).css( 'color', to );
			} );
		});
	
	
		//Nav text icon color
		wp.customize( 'cv[nav_txt_color]', function( value ) {
			value.bind( function( to ) {
				$( '.site-header .main-navigation a' ).css( 'color', to );
			} );
		});
	
		//header bg color
		wp.customize( 'cv[nav_background]', function( value ) {
			value.bind( function( to ) {
				$( '#masthead' ).css( 'background-color', to );
			} );
		});

		//Nav border color
		wp.customize( 'cv[nav_border_color]', function( value ) {
			value.bind( function( to ) {
				$( '.site-header .main-navigation a:hover' ).css( 'background-color', to );
			} );
		});

		//Nav dropdown bg color
		wp.customize( 'cv[nav_dropdown_bg_color]', function( value ) {
			value.bind( function( to ) {
				$( '.main-navigation ul ul' ).css( 'background-color', to );
			} );
		});

		//Mobile menu bg color
		wp.customize( 'cv[mobile_nav_bg]', function( value ) {
			value.bind( function( to ) {
				$( '.menu-toggle' ).css( 'background-color', to );
			} );
		});
	
		//Mobile menu bg color
		wp.customize( 'cv[mobile_nav_txt]', function( value ) {
			value.bind( function( to ) {
				$( '.menu-toggle' ).css( 'color', to );
			} );
		});


		//widget_bg_color
		wp.customize( 'cv[widget_bg_color]', function( value ) {
			value.bind( function( to ) {
				$( '.cvparent' ).css( 'background-color', to );
			} );
		});
	
	
	


	
		//Site Main  color
		wp.customize( 'cv[site_main_color]', function( value ) {
			value.bind( function( to ) {
				$( '.blog_page .bloglist', 
				'.cv-single-post .post_top .cat-links a',  
				'.post_mid .entry-meta',
				'.post-navigation .nav-previous',
				'.post-navigation .nav-next',
				'.comments-area button', '.comments-area input[type="button"]', '.comments-area input[type="reset"]', '.comments-area input[type="submit"]',
				'.archive-page article',
				'.site-footer',
				'.home-page article' ).css( 'background-color', to );
			} );
		});


	
	
		//colophon text color
		wp.customize( 'cv[colophon_txt_color]', function( value ) {
			value.bind( function( to ) {
				$( '.footer-widget h2', '.footer-widget table',  '.footer-widget h3', '.footer-widget ul'  ,  '.footer-widget .wp-calendar' ,'.rssSummary', '.footer-widget p', '.footer-widget a' ).css( 'color', to );
			} );
		});
	
	
		//colophon bg color
		wp.customize( 'cv[footer_bg_color]', function( value ) {
			value.bind( function( to ) {
				$( '.footer-widget' ).css( 'background-color', to );
			} );
		});


		 // hide credit
		 wp.customize( 'cv[hide_credit]', function( value ) {
			value.bind( function( to ) {
				if ( true === to) {
					$( '.site-info' ).show();
				  } else {
					$( '.site-info' ).hide();
				  }
				} );
			} );
		
	
	
	



} )( jQuery );
