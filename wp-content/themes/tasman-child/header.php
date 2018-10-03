<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tasman
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>

<!-- Load Facebook SDK for JavaScript -->
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=217443565629525&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- End Load Facebook SDK for JavaScript -->

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<div id="page" class="site">

	<?php get_template_part( 'template-parts/skip', 'links' );?>

	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'template-parts/header', 'image' );?>
		<div class="site-branding">
			<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2018/07/club_logo_240.png">
			
			<?php

			tasman_custom_logo();

			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<?php if( has_nav_menu( 'menu-1') ) : ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo tasman_get_svg( array( 'icon' => 'menu' ) ); /* WPCS: xss ok. */
				echo tasman_get_svg( array( 'icon' => 'close' ) ); /* WPCS: xss ok. */
				esc_html_e( 'Navigation', 'tasman' );
				?>
			</button>
			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'menu-1',
					'menu_id'        	=> 'primary-menu',
					'container_class' 	=> 'wrap'
				) );
			?>
		</nav><!-- #site-navigation -->
	<?php endif;?>

	<div id="content" class="site-content">
