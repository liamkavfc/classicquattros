<?php get_header(); ?>
<div class="content-wrapper">
	<main role="main">
		<!-- section -->
		<section class="inner-container">

			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

	<?php get_sidebar(); ?>

	<?php get_footer(); ?>
</div>
