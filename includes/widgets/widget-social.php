<?php

/* ----------------------------------------------------------------

   Name: Deck Social Links
   URI: http://styledthemes.com/
   Description: Displays links to your social profiles in the sidebar
   Author: StyledThemes
   Author URI: http://styledthemes.com
 
-----------------------------------------------------------------
*/


add_action( 'widgets_init', 'deck_social_widgets' );

function deck_social_widgets() {

	register_widget( 'Deck_social_widget' );
}


/* ----------------------------------------------------------------
   WIDGET CLASS
-----------------------------------------------------------------*/

class Deck_social_widget extends WP_Widget {


/* ----------------------------------------------------------------
   WIDGET SETUP
-----------------------------------------------------------------*/

public function __construct(){
	parent::__construct(
		'deck_social_widget', 
		__( 'Deck: Social Links', 'deck' ),
		array(
			'classname' => 'deck_social_widget',
			'description' => esc_html__( 'Display a featured YouTube or Vimeo video.', 'deck' )
		)
	);
}

/* ----------------------------------------------------------------
   WIDGET OUTPUT
-----------------------------------------------------------------*/

public function widget( $args, $instance ) {
	extract( $args );

	/* Our variables from the widget settings */
	$title = apply_filters( 'widget_title', $instance['title'], $this->id_base );
	$facebook = $instance['facebook'];
	$twitter = $instance['twitter'];
	$google = $instance['google'];
	$pinterest = $instance['pinterest'];
	$tumblr = $instance['tumblr'];
	$instagram = $instance['instagram'];
	$vimeo = $instance['vimeo'];
	$dribbble = $instance['dribbble'];
	$youtube = $instance['youtube'];
	$flickr = $instance['flickr'];
	$linkedin = $instance['linkedin'];
	$github = $instance['github'];
	$skype = $instance['skype'];
	$email = $instance['email'];
	$feed = $instance['feed'];

	/* Display widget */
	echo $before_widget;

	if ( $title ) { 
		echo $before_title . esc_html( $title ) . $after_title;
	}

	?>

	<ul class="social-links">
				
			<?php if ( $facebook ) { ?>
				<li><a href="<?php echo esc_url( $instance['facebook']); ?>" class="link-facebook" title="<?php esc_attr_e( 'Facebook', 'deck' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<?php } ?>
			
			<?php if ( $twitter ) { ?>
				<li><a href="<?php echo esc_url( $instance['twitter']); ?>" class="link-twitter" title="<?php esc_attr_e( 'Twitter', 'deck' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<?php } ?>
			
			<?php if ( $google ) { ?>
				<li><a href="<?php echo esc_url( $instance['google']); ?>" class="link-google" title="<?php esc_attr_e( 'Google+', 'deck' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<?php } ?>
			
			<?php if ( $pinterest ) { ?>
				<li><a href="<?php echo esc_url( $instance['pinterest']); ?>" class="link-pinterest" title="<?php esc_attr_e( 'Pinterest', 'deck' ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
			<?php } ?>
			
			<?php if ( $tumblr ) { ?>
				<li><a href="<?php echo esc_url( $instance['tumblr']); ?>" class="link-tumblr" title="<?php esc_attr_e( 'Tumblr', 'deck' ); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
			<?php } ?>
			
			<?php if ( $instagram ) { ?>
				<li><a href="<?php echo esc_url( $instance['instagram']); ?>" class="link-instagram" title="<?php esc_attr_e( 'Instagram', 'deck' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<?php } ?>
			
			<?php if ( $vimeo ) { ?>
				<li><a href="<?php echo esc_url( $instance['vimeo']); ?>" class="link-vimeo" title="<?php esc_attr_e( 'Vimeo', 'deck' ); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
			<?php } ?>
			
			<?php if ( $dribbble ) { ?>
				<li><a href="<?php echo esc_url( $instance['dribbble']); ?>" class="link-dribbble" title="<?php esc_attr_e( 'Dribbble', 'deck' ); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
			<?php } ?>
			
			<?php if ( $youtube ) { ?>
				<li><a href="<?php echo esc_url( $instance['youtube']); ?>" class="link-youtube" title="<?php esc_attr_e( 'Youtube', 'deck' ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
			<?php } ?>
			
			<?php if ( $flickr ) { ?>
				<li><a href="<?php echo esc_url( $instance['flickr']); ?>" class="link-flickr" title="<?php esc_attr_e( 'flickr', 'deck' ); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
			<?php } ?>
			
			<?php if ( $linkedin ) { ?>
				<li><a href="<?php echo esc_url( $instance['linkedin']); ?>" class="link-linkedin" title="<?php esc_attr_e( 'LinkedIn', 'deck' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			<?php } ?>

			<?php if ( $github ) { ?>
				<li><a href="<?php echo esc_url( $instance['github']); ?>" class="link-github" title="<?php esc_attr_e( 'Github', 'deck' ); ?>" target="_blank"><i class="fa fa-github-alt"></i></a></li>
			<?php } ?>

			<?php if ( $skype ) { ?>
				<li><a href="skype:<?php echo esc_url( $instance['skype']); ?>?userinfo" class="link-skype" title="<?php esc_attr_e( 'Skype Profile Name', 'deck' ); ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
			<?php } ?>

			<?php if ( $email ) { ?>
				<li><a href="<?php echo esc_url( $instance['email']); ?>" class="link-email" title="<?php esc_attr_e( 'Email', 'deck' ); ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
			<?php } ?>

			<?php if ( $feed ) { ?>
				<li><a href="<?php echo esc_url( $instance['feed']); ?>" class="link-feed" title="<?php esc_attr_e( 'Feed', 'deck' ); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
			<?php } ?>

	</ul>
	
	<?php echo $after_widget;
}


/* ----------------------------------------------------------------
   WIDGET UPDATE
-----------------------------------------------------------------*/

public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	/* Strip tags */
	$instance['title'] = sanitize_text_field( $new_instance['title'] );
	$instance['facebook'] = esc_url_raw( $new_instance['facebook'] );
	$instance['twitter'] = esc_url_raw( $new_instance['twitter'] );
	$instance['google'] = esc_url_raw( $new_instance['google'] );
	$instance['pinterest'] = esc_url_raw( $new_instance['pinterest'] );
	$instance['tumblr'] = esc_url_raw( $new_instance['tumblr'] );
	$instance['instagram'] = esc_url_raw( $new_instance['instagram'] );
	$instance['vimeo'] = esc_url_raw( $new_instance['vimeo'] );
	$instance['dribbble'] = esc_url_raw( $new_instance['dribbble'] );
	$instance['youtube'] = esc_url_raw( $new_instance['youtube'] );
	$instance['flickr'] = esc_url_raw( $new_instance['flickr'] );
	$instance['linkedin'] = esc_url_raw( $new_instance['linkedin'] );
	$instance['github'] = esc_url_raw( $new_instance['github'] );
	$instance['skype'] = esc_url_raw( $new_instance['skype'] );
	$instance['email'] = esc_url_raw( $new_instance['email'] );
	$instance['feed'] = esc_url_raw( $new_instance['feed'] );

	return $instance;
}


/* ----------------------------------------------------------------
   WIDGET SETTINGS
-----------------------------------------------------------------*/

function form( $instance ) {

	/* Add default settings */
	$defaults = array(
		'title' => esc_html__( 'Social Links', 'deck' ),
		'facebook' => esc_html__( 'Facebook Links', 'deck' ),
		'twitter' => esc_html__( 'twitter Links','deck' ),
		'google' => esc_html__( 'google Links','deck' ),
		'pinterest' => esc_html__( 'pinterest Links','deck' ),
		'tumblr' => esc_html__( 'tumblr Links','deck' ),
		'instagram' => esc_html__( 'instagram Links','deck' ),
		'vimeo' => esc_html__( 'vimeo Links','deck' ),
		'dribbble' => esc_html__( 'dribbble Links','deck' ),
		'youtube' => esc_html__( 'youtube Links','deck' ),
		'flickr' => esc_html__( 'flickr Links','deck' ),
		'linkedin' => esc_html__( 'linkedin Links','deck' ),
		'github' => esc_html__( 'github Links','deck' ),
		'skype' => esc_html__( 'skype Links','deck' ),
		'email' => esc_html__( 'email Links','deck' ),
		'feed' => esc_html__( 'feed Links','deck' )
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); 
	
	/* Output the form */
	?>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'deck' ) ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"><?php esc_html_e( 'Google+ Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>" value="<?php echo esc_attr( $instance['google'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php esc_html_e( 'Tumblr Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" value="<?php echo esc_attr( $instance['tumblr'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php _e( 'Vimeo Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php _e( 'Dribbble Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" value="<?php echo esc_attr( $instance['dribbble'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'YouTube Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php _e( 'Flickr Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>"><?php _e( 'Github Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" value="<?php echo esc_attr( $instance['github'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>"><?php esc_html_e( 'Skype User ID: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skype' ) ); ?>" value="<?php echo esc_attr( $instance['skype'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'feed' ) ); ?>"><?php esc_html_e( 'RSS Feed Link: ', 'deck' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'feed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'feed' ) ); ?>" value="<?php echo esc_attr( $instance['feed'] ); ?>" />
	</p>
		
	<?php
	}
}
