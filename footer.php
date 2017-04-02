<?php
/**
* @description This template display content on footer section
* @package Deck
* @version 1.0
*/
 get_sidebar( 'footer' ); ?>

<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<div class="wrap clearfix">

		<?php if ( is_page_template( 'template-portfolio.php' ) ) : ?>
			<hr>
		<?php endif;?>

	    <!-- Links -->
	    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		    <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>

			    <?php
				    wp_nav_menu(
					    array(
						    'theme_location' => 'footer-menu',
						    'container'      => false,
						    'menu_id'        => 'links',
						    'menu_class'     => 'footer-menu',
						    'depth'          => '1'
					    )
				    );
	    	endif; ?>
		</nav>

	    <!-- Copyright -->
		<p class="copyright">

			<?php if  ( get_theme_mod( 'deck_hide_footer_text' ) != '1' ) { ?>
					<div class="copyright">
	                    <?php esc_html_e( 'Deck WordPress Theme by', 'deck' ); ?>
						<a href="<?php echo esc_url( 'http://styledthemes.com/' ); ?>" target="_blank"><?php esc_html_e( 'StyledThemes', 'deck' ); ?></a>
					</div>
			<?php } ?>

		</p>


	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>