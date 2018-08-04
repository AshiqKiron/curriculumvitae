(function( $ ) {
    wp.customize.bind( 'ready', function() {
        var customize = this;
        var api = wp.customize;
	    wp.customize.section( 'sidebar-widgets-frontpage-1' ).panel( 'frontpage');


    } );
})( jQuery );