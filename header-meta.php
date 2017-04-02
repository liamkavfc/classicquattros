<?php
/**
 * This template provide meta description on head section
 *
 * @package Deck
 */

?>

<section id="header-meta" class="clearfix">

	<div class="wrap clearfix">

		<?php if ( is_archive() ) : 
		
			the_archive_title( '<h2 class="archive-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );

        endif;

		if ( is_author( $author ) ) : ?>

			<h2><?php the_author_meta( 'description' ); ?></h2>

		<?php endif;
		
		if ( is_search() ) : ?>
						
			<h1><?php esc_html_e( 'Search results for', 'deck' ) ?>: '<?php echo esc_html( get_search_query() ) ?>'</h1>

		<?php elseif ( is_404() ) : ?>

			<h1><?php esc_html_e( 'Page Not Found', 'deck' ) ?></h1>
				 
		<?php else : ?>
							
			<h1><?php single_post_title(); ?></h1>
		
			<?php if ( ! is_archive() && ! is_search() && ! is_404() ) : ?>
			
				<?php $page_id = get_queried_object_id(); ?>
				<h2><?php echo get_post_field( 'post_excerpt', $page_id, 'display' ); ?></h2>
			
			<?php endif;?>
	
		<?php endif; ?>
	</div>

</section>