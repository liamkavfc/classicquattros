<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Deck
 * @version 1.0
 */
get_header(); ?>

	<div class="wrap clearfix">
		<?php $blog_layout = get_theme_mod( 'dp_blog_layout', 'blogright' );

		switch( $blog_layout ) {
			case 'blogright' :
				do_action( 'deck_show_blog_content', 'blog-with-right-sidebar' );
				//sidebar
				get_sidebar();
			break;
			case 'blogleft' :
				do_action( 'deck_show_blog_content', 'blog-with-left-sidebar' );
				//sidebar
				get_sidebar( 'blog-left' );
			break;
			case 'blogwide' :
				do_action( 'deck_show_blog_content', 'blog-with-no-sidebar' );
			break;
			default:
				do_action( 'deck_show_blog_content', 'blog-with-right-sidebar' );
				//sidebar
				get_sidebar();
			break;

		} ?>
	</div>
			
<?php get_footer();
