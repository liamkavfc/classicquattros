<?php
/**
* @description This template display search result
* @package Deck Pro
* @version 1.0
*/

 get_header();

get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<?php 
						$format = get_post_format(); 
						get_template_part( 'content', $format );
					?>

				</article>

			<?php endwhile; ?>

				<?php if ( $wp_query->max_num_pages > 1 ) : ?>

					<!--Pagination-->
					<div class="pagination">

						<?php if( function_exists( 'wp_pagenavi' ) ) : ?>

							<?php wp_pagenavi(); ?>

						<?php else : ?>

							<?php next_posts_link( '<span>&larr;</span> '. esc_html__('Older Posts', 'deck').'' ); ?>
							<?php previous_posts_link( esc_html__('Newer Posts', 'deck').' <span>&rarr;</span>'); ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			<?php else : ?>

				<?php esc_html_e( 'Your search did not match any entries', 'deck' ) ?>

			<?php endif; ?>
		
		</main>

		<!--Sidebar-->
		<aside id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php dynamic_sidebar( 'sidebar-blog' ); ?>
		</aside>
	
	</div>
			
<?php get_footer(); ?>
