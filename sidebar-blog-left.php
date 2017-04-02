<?php
/**
 * The sidebar contains the blog left sidebar
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Deck Pro
 */ 

if( ! is_active_sidebar( 'sidebar-blog-left' ) ) {
	return;
} ?>

<aside id="sidebar" class="sidebar-blog-left" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php dynamic_sidebar( 'sidebar-blog-left' ); ?>

</aside>
