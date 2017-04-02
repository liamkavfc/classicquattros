<?php
/**
* @package Deck Pro
* @description This sidebar renders page with left sidebar
* @version 1.0
*/

if( ! is_active_sidebar( 'sidebar-page-left' ) ) {
	return;
} ?>

<aside id="sidebar" class="page-left-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php dynamic_sidebar( 'sidebar-page-left' ); ?>

</aside>