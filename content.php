<?php /* Post Format: Standard */ ?>

	<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<?php if ( has_post_thumbnail() ) : ?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="entry-image">
				<?php if( get_theme_mod( 'dp_blog_layout' ) == 'blogwide' ) :
					the_post_thumbnail( 'full' ); 
				else :
					the_post_thumbnail( 'deck-m' );
				endif; ?>
			</a>

		<?php endif; ?>

		<?php if ( ! is_single() ) : ?>

			<h2 class="entry-title" itemprop="headline">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>

		<?php endif; ?>

		<p class="entry-meta">
			<time class="entry-time" itemprop="datePublished" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<?php esc_html_e( ' by ', 'deck' ); ?>
			<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url" rel="author"><?php echo esc_html( get_the_author() ); ?></a></span>
			<?php esc_html_e( ' with ', 'deck' ); ?>
			<span class="entry-comments"><?php comments_popup_link( __( '0 Comments', 'deck' ), __( '1 Comment', 'deck' ), __( '% Comments', 'deck' ) ); ?></span>
		</p>
		
	</header>

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
	</div>

	<?php if ( is_single() ) : ?>

	<?php wp_link_pages( 'before=<div class="entry-links">&after=</div>' ); ?>
	
	<footer class="entry-footer">
		<p class="entry-meta">
			<span><?php esc_html_e( 'Posted in', 'deck' ); ?>: <?php the_category( ', ' ); ?></span>
			<?php if( has_tag() ) : ?>
				<br>
				<span><?php esc_html_e( 'Tagged with', 'deck' ); ?>: <?php the_tags( '', ', ', '' ); ?></span>
			<?php endif; ?>
		</p>
	</footer>

	<?php endif; ?>
