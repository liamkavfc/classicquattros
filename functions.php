<?php

/* ----------------------------------------------------------------

 TABLE OF CONTENTS
 
	 1. LOCALIZATION
	 2. CONTENT WIDTH
	 3. THEME SETUP
	 4. REGISTER SIDEBAR
	 5. ENQUEUE SCRIPTS
	 6. EXCLUDE FROM SEARCH
	 7. COMMENTS
	 8. MORE LINK
	 9. IS BLOG
	10. POST FORMAT: GALLERY
	11. HAS POST THUMB CLASS
	12. CONTACT FORM
	13. INIT
   
-----------------------------------------------------------------*/


/* ----------------------------------------------------------------
   1. LOCALIZATION
-----------------------------------------------------------------*/

function deck_localization() {
	load_theme_textdomain( 'deck', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'deck_localization' );


/* ----------------------------------------------------------------
   2. CONTENT WIDTH
-----------------------------------------------------------------*/

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Deck 1.0.4
 */
function deck_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'deck_content_width', 840 );
}
add_action( 'after_setup_theme', 'deck_content_width', 0 );

if ( ! function_exists( 'deck_content_width' ) ) {
	
    function deck_content_width() {
        if( is_page_template( 'template-full-width.php' ) || is_attachment()  ) {
            global $content_width;
            $content_width = 980;
        }
    }
}

add_action( 'template_redirect', 'deck_content_width' );


/* ----------------------------------------------------------------
   3. THEME SETUP
-----------------------------------------------------------------*/

if ( !function_exists( 'deck_theme_setup' ) ) {
    function deck_theme_setup() {
        
    	/* Register WP3+ menus */
    	// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'deck' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'deck' )
		) );
    	/* Configure WP 2.9+ thumbnails */
    	add_theme_support( 'post-thumbnails' );
    	
        add_image_size( 'deck-s', 300, 300, true );
        add_image_size( 'deck-m', 640, 359, true );
        add_image_size( 'deck-l', 980, 550, true );
        add_image_size( 'deck-billboard-section', 800, 450 );

        
        add_theme_support( 'post-formats', array(
            'gallery',
        ) );     

        add_theme_support( 'automatic-feed-links');
		add_post_type_support( 'page', 'excerpt' );
		add_theme_support( "title-tag");
		add_theme_support( 'custom-background' );
		//make compatible with custom logo
		add_theme_support( 'custom-logo' );
		//declare theme as woocommerce compatible
		add_theme_support( 'woocommerce' );
     
    }
}

add_action( 'after_setup_theme', 'deck_theme_setup' );


/* ----------------------------------------------------------------
   4. REGISTER SIDEBAR
-----------------------------------------------------------------*/

function deck_widgets_initialize() {

	register_sidebar(array(
		'name' => esc_html__( 'Blog Right Sidebar', 'deck' ),
		'id' => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => esc_html__( 'Blog Left Sidebar', 'deck' ),
		'id' => 'sidebar-blog-left',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => esc_html__( 'Page Right Sidebar', 'deck' ),
		'id' => 'sidebar-page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => esc_html__( 'Page Left Sidebar', 'deck' ),
		'id' => 'sidebar-page-left',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => esc_html__( 'Footer Sidebar', 'deck' ),
		'id' => 'sidebar-footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

}
add_action( 'widgets_init', 'deck_widgets_initialize' );


/* ----------------------------------------------------------------
   5. ENQUEUE SCRIPTS
-----------------------------------------------------------------*/

if ( ! function_exists( 'deck_enqueue_scripts' ) ) {

	function deck_enqueue_scripts() {
	    
		/* Register */
	    wp_register_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.2.0' );
		wp_register_script( 'jquery-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), '1.0.10' );
		wp_register_script( 'deck-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.1', TRUE );

		wp_enqueue_script( 'jquery-flexslider' );
		wp_enqueue_script( 'jquery-slicknav' );
		wp_enqueue_script( 'deck-custom' );
		
		if ( is_singular( 'post' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_style( 'deck-google-font-merriweather', '//fonts.googleapis.com/css?family=Merriweather:400,700,900,400italic,300' );

		wp_enqueue_style( 'style', get_stylesheet_uri(), FALSE, '1.0.1' );

		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', FALSE, '4.4.0' );
		wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.css', FALSE, '1.1' );
		wp_enqueue_style( 'deck-responsive', get_template_directory_uri() . '/css/responsive.css', FALSE, '1.1' );
		/*Enqueue dynamic css on 'deck-responsive'*/
		$deck_accent = get_theme_mod( 'dp_link_accent_color' );

		if( $deck_accent ) {
			
			include get_template_directory().'/css/style.css.php';
			
		}

    }
}

add_action( 'wp_enqueue_scripts', 'deck_enqueue_scripts' );

/* ----------------------------------------------------------------
   7. COMMENTS
-----------------------------------------------------------------*/

if ( ! function_exists( 'deck_comment' ) ) {

	function deck_comment( $comment, $args, $depth ) {
	
        $GLOBALS['comment'] = $comment; ?>
        
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	        <article class="clearfix" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
				<?php echo get_avatar($comment,$size='90'); ?>
		        <div class="comment-author">
					<p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
						<cite class="fn" itemprop="name"><?php comment_author_link(); ?></cite>
						<time itemprop="commentTime" datetime="<?php comment_time( 'c' ); ?>">
							<?php comment_date('F dS, Y'); ?>
						</time>
					</p>
		        </div>
				<div class="comment-content" itemprop="commentText">
		            <?php comment_text() ?>
		            <?php if ($comment->comment_approved == '0') : ?>
		                <p><em class="awaiting"><?php esc_html_e( 'Your comment is awaiting moderation.', 'deck') ?></em></p>
		            <?php endif; ?>
				</div>
				<div class="comment-reply">
		            <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		            <?php edit_comment_link( esc_html__( 'Edit', 'deck' ), ' &middot; ', '') ?>
	            </div>
	        </article>
		</li>

<?php }
}


/* ----------------------------------------------------------------
   8. MORE LINK
-----------------------------------------------------------------*/

function deck_more_link( $more_link, $more_link_text ) {

	return str_replace( $more_link_text, esc_html__( 'Continue Reading', 'deck' ), $more_link );
}

add_filter( 'the_content_more_link', 'deck_more_link', 10, 2 );


/* ----------------------------------------------------------------
   9. IS BLOG
-----------------------------------------------------------------*/

function deck_is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() )) && ( $posttype == 'post')  ) ? true : false;
}


/* ----------------------------------------------------------------
   11. ADD .POST-THUMB CLASS TO POST IF HAS POST THUMB
-----------------------------------------------------------------*/

function deck_has_post_thumb( $classes ) {    
	global $post;
	if ( isset ( $post->ID ) && get_the_post_thumbnail( $post->ID ) ) {
		$classes[] = 'post-thumb';
	}
	return $classes;
}

add_filter( 'post_class', 'deck_has_post_thumb' );


if ( ! function_exists( 'deck_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since deck 1.0
 */
function deck_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {

		the_custom_logo();
	}
}
endif;

/**
*show blog content
* @since version 1.0
* @return show blog post 
*/
add_action( 'deck_show_blog_content', 'deck_show_blog_post', 10 );

function deck_show_blog_post( $blog_class ) {
	global $wp_query; ?>

	<main id="content" class="<?php echo esc_attr( $blog_class ); ?>" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

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

						<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>

							<?php wp_pagenavi(); ?>

						<?php else : ?>

							<?php next_posts_link( '<span>&larr;</span> '.esc_html__( 'Older Posts', 'deck' ).'' ); ?>
							<?php previous_posts_link( esc_html__( 'Newer Posts', 'deck' ).' <span>&rarr;</span>' ); ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			<?php endif; ?>
		
		</main>

<?php }


/* ----------------------------------------------------------------
   10. POST FORMAT: GALLERY
-----------------------------------------------------------------*/
	
function deck_gallery_slider( $post_id ) {

	global $post;
	$images = get_children( array( 'post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) );

	if ( $images ) :

		foreach ( $images as $attachment_id => $image ) :

			$img_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
			if ( $img_alt == '' ) : $img_alt = $image->post_title;
			endif;

			if( is_singular() ) :
				$array = image_downsize( $image->ID, 'deck-l' );
			else :
				$array = image_downsize( $image->ID, 'deck-m' );
			endif;

			$img_url = $array[0];
			?>

			<li>
				<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />
			</li>

			<?php

	endforeach;
	endif;
}

/*includes homepage function*/
require_once get_template_directory() . '/includes/deck-homepage-functions.php';

/*include category dropdown*/
require get_template_directory() . '/includes/category-dropdown.php';

/*include customizer*/
require get_template_directory() . '/includes/customizer.php';

/* Init Includes */
require_once get_template_directory() . '/includes/init.php';



