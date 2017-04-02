<?php
/**
 * The sidebar containing the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Deck
 */

if ( !is_singular( 'portfolio' ) && ! is_page_template( 'template-portfolio.php' ) ) : ?>

	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
	
		<aside id="sidebar-footer" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

			<div class="wrap clearfix">
				
				<?php dynamic_sidebar( 'sidebar-footer' ); ?>

			</div>

		</aside>

	<?php endif; ?>

<?php endif; ?>