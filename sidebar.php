<?php
/**
* @description This template display blog right sidebar and page right sidebar
* @package Deck Pro
* @version 1.0
*/
?>

<aside id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if ( deck_is_blog() ) : ?>

		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
		
	<?php else : ?>

		<?php dynamic_sidebar( 'sidebar-page' ); ?>

	<?php endif; ?>

</aside>