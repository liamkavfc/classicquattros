<?php /* Template Name: Homepage */ ?>

<?php get_header();

	/**
	 * deck_homepage_section_elements hook.
	 *
	 * @hooked deck_homepage_billboard_section - 20
	 * @hooked deck_homepage_featured_section - 21
	 * @hooked deck_homepage_portfolio_section - 22
	 * @hooked deck_homepage_client_showcase_section - 23
	 */
	do_action( 'deck_homepage_section_elements' );
	
get_footer();