<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Deck
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<!-- A Mighty WordPress Theme (http://styledthemes.com/) -->

	<head>

		<!-- Meta -->
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Title -->
					
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<!-- Hooks -->
		<?php wp_head(); ?>
		    
	</head>


	<body <?php body_class( 'fadeDown' ); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

	    <header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		    <div class="wrap clearfix">
			        
			    <!-- Logo -->
				<div class="logo" itemprop="headline">
					<?php if ( has_custom_logo() ) {
					  
							deck_the_custom_logo(); ?>
					<?php } else { ?>

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" class="plain"><?php bloginfo( 'name' ); ?></a>
					<?php } ?>
				</div>

			    <!-- Navigation -->
			    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php if( has_nav_menu( 'header-menu' ) ) : ?>
					
					    <?php
						    wp_nav_menu(
							    array(
								    'theme_location' => 'header-menu',
								    'container'      => false,
								    'menu_id'        => 'nav',
								    'menu_class'     => 'header-menu',
								    'depth'          => '4'
							    )
						    );
					    ?>
					
					<?php else : ?>
					
					<ul id="nav">
						<?php wp_list_pages( 'title_li=&depth=1' ); ?>
					</ul>
					
					<?php endif; ?>
				</nav>

			</div>
							
		</header>
