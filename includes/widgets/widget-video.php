<?php
/* ----------------------------------------------------------------

   Name: Deck Featured Video Widget
   URI: http://styledthemes.com/
   Description: Displays a video you would like to dispaly in the sidebar
   Author: StyledThemes
   Author URI: http://styledthemes.com
 
-----------------------------------------------------------------
*/


add_action( 'widgets_init', 'deck_video_widgets' );

function deck_video_widgets() {
	register_widget( 'Deck_video_widget' );
}


/* ----------------------------------------------------------------
   WIDGET CLASS
-----------------------------------------------------------------*/

class Deck_video_widget extends WP_Widget {


/* ----------------------------------------------------------------
   WIDGET SETUP
-----------------------------------------------------------------*/

public function __construct(){
	parent::__construct(
		'deck_video_widget', 
		esc_html__( 'Deck: Featured Video', 'deck' ),
		array(
			'classname' => 'deck_video_widget',
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
	$title = apply_filters( 'widget_title', $instance['title'], $this->id_base  );
	$embed = $instance['embed'];
	$desc = $instance['desc'];

	/* Display widget */
	echo $before_widget;

	if ( $title ) { 
		echo $before_title . esc_html( $title ) . $after_title;
	}

	echo '<div class="vid">';
		$allowed_html = array(
		    'iframe' => array(
		        'src' => array(),
		        'width' => array(),
		        'height' => array(),
		    )
		);
    	echo wp_kses( $embed, $allowed_html );
	echo '</div>';
		
	if ( $desc != '' ) {
		echo '<p class="desc">' . esc_html( $desc ) . '</p>';
    }
	
	echo $after_widget;
}


/* ----------------------------------------------------------------
   WIDGET UPDATE
-----------------------------------------------------------------*/

public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	/* Strip tags to remove HTML (important for text inputs) */
	$instance['title'] = wp_strip_all_tags( $new_instance['title'] );
	
	/* wp_kses_stripslashes for html inputs */
	$instance['desc'] = wp_kses_stripslashes( $new_instance['desc'] );
	$instance['embed'] = wp_kses_stripslashes( $new_instance['embed'] );

	return $instance;
}


/* ----------------------------------------------------------------
   WIDGET SETTINGS
-----------------------------------------------------------------*/

public function form( $instance ) {

	/* Add default settings */
	$defaults = array(
		'title' => esc_html__( 'Featured Video', 'deck' ),
		'embed' => esc_html__( 'Place embedded code', 'deck' ),
		'desc' => esc_html__( '850 Meter Animated Film', 'deck' )
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); 
	
	/* Output the form */
	?>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'deck' ) ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'embed' ) ); ?>"><?php esc_html_e( 'Embed Code:', 'deck' ) ?></label>
		<textarea style="height: 220px;" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'embed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'embed' ) ); ?>"><?php echo esc_html( $instance['embed'] ); ?></textarea>
	</p>
	
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Description:', 'deck' ) ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
	</p>
		
	<?php
	}
}
