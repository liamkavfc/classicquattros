<?php
/**
 * File Name: deck-homepage-functions.php
 * @package Deck
 * @author StyledThemes
 * @since version since 1.0.1
 * @uses contain functions require to build homepage
*/


/**
	 * display homepage elements in order starting from priority 20
	 *
	 * In order:
	 *      Display Billboard section. ie section just below header.
	 *      Display Featured section, this will display selected category related post from customizer and display related contents
	 *		Display Portfolio section, this will display selected category related post from customizer and display related contents
	 *      Display Client show case section, this will display image and heading provided on customizer field
	 *      Display Blog post  section, this will show recent post
	 *      
*/
add_action( 'deck_homepage_section_elements', 'deck_homepage_billboard_section', 20 );
add_action( 'deck_homepage_section_elements', 'deck_homepage_featured_section', 21 );
add_action( 'deck_homepage_section_elements', 'deck_homepage_portfolio_section', 22 );
add_action( 'deck_homepage_section_elements', 'deck_homepage_client_showcase_section', 23 );
add_action( 'deck_homepage_section_elements', 'deck_homepage_blog_post_section', 24 );


/**
 * @author StyledThemes 
 * @action_hook deck_homepage_section_elements
 * @return elements for billboard section
 * @uses display billboard section just below header image 
 * @version @since 1.0.1
*/
function deck_homepage_billboard_section() {

	if ( get_theme_mod( 'dp_billboard_select_page' )  ) : ?>
			<!--Homepage Banner Section-->
		<div id="hero">
			<div class="wrap">
				<div class="poster">
					<?php $deck_billboard_page_id = get_theme_mod( 'dp_billboard_select_page' );
					if ( has_post_thumbnail( $deck_billboard_page_id ) ) :

						echo get_the_post_thumbnail( absint( $deck_billboard_page_id ), 'deck-billboard-section' );
					endif; ?>
				</div>
				<h1><?php echo get_the_title( absint( $deck_billboard_page_id ) ); ?></h1>
				<h2><?php echo get_the_excerpt( absint( $deck_billboard_page_id ) ); ?></h2>
				<a href="<?php echo esc_url( get_permalink( $deck_billboard_page_id ) ); ?>" class="btn">
					<?php esc_html_e( 'View our work', 'deck' ); ?>
				</a>
			</div>
		</div>
	<?php endif;
}	 

/**
 * @author StyledThemes 
 * @action_hook deck_homepage_section_elements
 * @return elements for featured section
 * @uses display featured section just below header image 
 * @version @since 1.0.1
*/
function deck_homepage_featured_section() {

	if ( get_theme_mod( 'homepage_featured_post' ) ) : ?>
		<!--Text Columns-->
		<section id="columns">
			<div class="wrap clearfix">

				<?php $deck_featured_post = get_theme_mod( 'homepage_featured_post' );
				$featured_post_loop = new WP_Query( array( 
					'cat' => absint( $deck_featured_post ), 
					'posts_per_page' => 3 
				) );

				$count = 0;
				while ( $featured_post_loop->have_posts() ) : $featured_post_loop->the_post();
					global $post; 
					$count++;
					$column_last = '';
					if( $count % 3 == 0 ) { 
						$column_last = 'last'; 
					} ?>

					<div  <?php post_class( 'column'. ' '. esc_attr( $column_last ) ); ?> >
						<h2><?php echo get_the_title(); ?></h2>
						<p><?php the_excerpt(); ?></p>
						<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php esc_html_e('Learn More', 'deck' ); ?></a></p>
					</div>
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
			</div>
		</section>

	<?php endif;
}




/**
 * @author StyledThemes 
 * @action_hook deck_homepage_section_elements
 * @return elements for portfolio section
 * @uses display portfolio section just below header image hp
 * @version @since 1.0.1
*/
function deck_homepage_portfolio_section() { 

	if ( get_theme_mod( 'dp_show_portfolio_section' ) == 1 ) : ?>
		<!--Portfolio Posts-->
		<section id="portfolio">
			<div class="wrap">

				<?php if ( get_theme_mod( 'dp_portfolio_main_heading' ) ) : ?>
					<h1><?php echo wp_kses_post( get_theme_mod( 'dp_portfolio_main_heading' ) ); ?></h1>
				<?php endif;

				$deck_portfolio_featured_post = get_theme_mod( 'homepage_featured_portfolio' );
				if( $deck_portfolio_featured_post ) :

					$loop = new WP_Query( array( 
						'cat' => absint( $deck_portfolio_featured_post ), 
						'posts_per_page' => 3 ) );
					$count = 1; ?>
					<div class="clearfix">

						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

							<!-- Article -->
							<article class="post<?php if( $count %3 == 0 ) { echo  esc_attr( ' last' ); }; $count ++; ?>" itemscope="itemscope" itemtype="http://schema.org/CreativeWork" itemprop="associatedArticle">

								<?php if ( has_post_thumbnail() ) : ?>

									<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'View more of', 'deck'); ?> - <?php the_title(); ?>" rel="bookmark">
										<?php the_post_thumbnail( 'deck-s' ); ?>
										<div class="overlay"></div>
										<span><?php the_title(); ?></span>
									</a>

								<?php endif; ?>

							</article>

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					</div>
				<?php endif;	
				if ( get_theme_mod( 'dp_portfolio_sub_heading' ) ) : ?>

					<h2><?php echo wp_kses_post( get_theme_mod( 'dp_portfolio_sub_heading' ) ); ?></h2>
				<?php endif; ?>
			</div>
		</section>

	<?php endif;
}



/**
 * @author StyledThemes 
 * @action_hook deck_homepage_section_elements
 * @return elements for client_showcase section
 * @uses display client_showcase section just below header image 
 * @version @since 1.0.1
*/
function deck_homepage_client_showcase_section() { 

	if ( get_theme_mod( 'dp_show_client_showcase_section' ) == 1 ) : ?>
	<!--Clients Logos-->
		<section id="clients">
			<div class="wrap">

			<?php if ( get_theme_mod( 'dp_client_showcase_main_heading' ) ) : ?>
				<h1><?php echo wp_kses_post( get_theme_mod( 'dp_client_showcase_main_heading' ) ); ?></h1>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'dp_client_showcase_banner_image' ) ) : ?>
				<img src="<?php echo esc_url( get_theme_mod( 'dp_client_showcase_banner_image' ) ); ?>" alt="<?php esc_attr_e( 'Clients', 'deck' ); ?>" />
			<?php endif; ?>

			</div>
		</section>

	<?php endif;
}



/**
 * @author StyledThemes 
 * @action_hook deck_homepage_section_elements
 * @return elements for blog_post_section section
 * @uses display blog_post_section section just below header image 
 * @version @since 1.0.1
*/
function deck_homepage_blog_post_section() { 

	if ( get_theme_mod( 'dp_show_blog_post_section' ) == 1 ) : ?>

		<!--Blog Posts-->
		<section id="blog">
			<div class="wrap">

			<?php if ( get_theme_mod( 'dp_blog_post_main_heading' ) ) : ?>
				<h1><?php echo wp_kses_post( get_theme_mod( 'dp_blog_post_main_heading' ) ); ?></h1>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'dp_blog_post_sub_heading' ) ) : ?>
				<h2><?php echo wp_kses_post( get_theme_mod( 'dp_blog_post_sub_heading' ) ); ?></h2>
			<?php endif; ?>
				
				<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 'post-format-gallery', 'post-format-link', 'post-format-quote', 'post-format-video', 'post-format-audio' ),
								'operator' => 'NOT IN'
							)
						)
					);

					$loop = new WP_Query( $args );
					$count = 1;
				?>

				<div class="clearfix">

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

						<!-- Article -->
						<article class="post<?php if( $count %3 == 0 ) { echo ' last'; }; $count ++; ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<i class="fa fa-file-text-o"></i>
							<h2 class="entry-title" itemprop="headline">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
							<?php the_excerpt(); ?>
							<p><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'Read more about', 'deck'); ?> - <?php the_title(); ?>" rel="bookmark"><?php esc_html_e( 'Read more', 'deck'); ?></a></p>
						</article>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				</div>

			</div>
		</section>
<?php endif; 
}
