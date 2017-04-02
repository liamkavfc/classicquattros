<?php /* Template Name: Full Width */ ?>

<?php get_header(); ?>

<?php get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<?php if ( has_post_thumbnail() ) : ?>

			<?php $content_width = 980; ?>

			<div class="entry-image">
				<?php the_post_thumbnail( 'deck-l' ); ?>
			</div>

		<?php endif; ?>

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage">

			<?php while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>

					<?php wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>

				</article>

			<?php endwhile; ?>
		
		</main>

	</div>
			
<?php get_footer();
