<?php

function enqueue_child_theme_styles() {
	$parent_style = 'tasman-style';
  wp_enqueue_style( $parent_style, get_template_directory_uri().'/style.css' );
	wp_enqueue_style ( 'child-style', get_stylesheet_directory_uri().'/style.css', array($parent_style));
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);


/**
 * Override pluggable function 
 * tasman_do_footer_copyright()
 */
function tasman_do_footer_copyright(){
	echo '<div class="site-info">'. wp_kses_post( get_footer_copyright() ) . '</div>';
}

if ( ! function_exists( 'tasman_footer_copyright' ) ) :
/**
 * Rewrite of
 * tasman_get_footer_copyright()
 * as
 * get_footer_copyright()
 */
function get_footer_copyright() {
	// Translators: %1$s: Current year, %2$s: Site link
	$default_footer_copyright =	sprintf( __( 'Copyright &copy; %1$s %2$s.', 'tasman' ),
		date_i18n( __( 'Y', 'tasman' ) ),
		'<a href="'. esc_url( home_url() ) .'">'. esc_html( get_bloginfo( 'name' ) ) .'</a>' );
	
	apply_filters( 'tasman_footer_copyright', $default_footer_copyright );

	return $default_footer_copyright;
}
endif;

?>
