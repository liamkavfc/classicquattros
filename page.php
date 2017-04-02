<?php
/**
* @description This template display singe page
* @package Deck Pro
* @version 1.0
*/
 get_header();

get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<?php if ( has_post_thumbnail() ) : ?>

			<?php $content_width = 980; ?>

		<?php endif; ?>

		<main id="content" role="main" itemprop="mainContentOfPage">

			<?php while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>

					<?php wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>

				</article>
				<!-- If comments are open or we have at least one comment, load up the comment template. -->
				<?php if( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>

	</div>
			
<?php get_footer(); ?>
