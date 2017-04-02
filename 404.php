<?php
/**
 * The template for displaying 404 pages (not found)
 * @since Deck 1.0
 */
?>

<?php  get_header(); ?>

<?php get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage">

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<header class="entry-header">
						<h1 class="entry-title" itemprop="headline"><?php _e( '<span class="big">404</span>', 'deck' ); ?></h1>
					</header>

					<div class="entry-content" itemprop="text">
						<p><?php _e( 'Well, this is embarrassing. We can\'t seem to locate the page you\'re looking for. <br>Bad link? Mistyped address? We\'re not exactly sure. <br><br>You can always search for the page below.', 'deck'); ?></p>
						<?php get_search_form(); ?>
					</div>

				</article>

		</main>

	</div>
			
<?php get_footer();
