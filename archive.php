<?php get_header(); ?>

<?php get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

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

						<?php else :

							the_posts_navigation( array(
                                'prev_text' => '<span>&larr;</span> ' . esc_html__( 'Older Posts', 'deck' ) .'',
                                'next_text' => esc_html__( 'Newer Posts', 'deck' ).' <span>&rarr;</span>'
                            ) );

						endif; ?>

					</div>

				<?php endif; ?>

			<?php endif; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>
	
	</div>
			
<?php get_footer();
