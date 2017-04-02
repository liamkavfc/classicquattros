<?php
/**
*@package deck pro 
* @description render page with left siebar content on single page
Template Name: Page With Left Sidebar
*@version 1.0
*/

get_header(); ?>

<?php get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<?php if ( has_post_thumbnail() ) : ?>

			<?php $content_width = 980; ?>

			<div class="entry-image">
				<?php the_post_thumbnail( 'deck-l' ); ?>
			</div>

		<?php endif; ?>

		<main id="content" class="page-with-right-sidebar" role="main" itemprop="mainContentOfPage">

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

		<!--Sidebar-->
		<?php get_sidebar( 'page-left' ); ?>

	</div>
			
<?php get_footer();
