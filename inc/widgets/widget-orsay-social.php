<?php
/**
 * Custom author widget
 *
 * @package Orsay
 *
 */

class orsay_social_widget extends WP_Widget
{

	function __construct(){

	$widget_ops = array('classname' => 'mz-social-widget','description' => esc_html__( "Orsay Social Widget" ,'orsay') );
	parent::__construct('orsay-social', esc_html__('Orsay Social Widget','orsay'), $widget_ops);

	}

	/**
	* Helper function that holds widget fields
	* Array is used in update and form functions
	*/

	private function widget_fields() {
	$fields = array(
		// Title
		'widget_title' => array(
			'orsay_widgets_name'      => 'widget_title',
			'orsay_widgets_title'     => __( 'Title', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),

		// Other fields
		'twitter' => array (
			'orsay_widgets_name'      => 'twitter',
			'orsay_widgets_title'     => __( 'Twitter', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'facebook' => array (
			'orsay_widgets_name'      => 'facebook',
			'orsay_widgets_title'     => __( 'Facebook', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'linkedin' => array (
			'orsay_widgets_name'      => 'linkedin',
			'orsay_widgets_title'     => __( 'LinkedIn', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'google' => array (
			'orsay_widgets_name'      => 'google',
			'orsay_widgets_title'     => __( 'Google+', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'pinterest' => array (
			'orsay_widgets_name'      => 'pinterest',
			'orsay_widgets_title'     => __( 'Pinterest', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'youtube' => array (
			'orsay_widgets_name'      => 'youtube',
			'orsay_widgets_title'     => __( 'YouTube', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'vimeo' => array (
			'orsay_widgets_name'      => 'vimeo',
			'orsay_widgets_title'     => __( 'Vimeo', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'flickr' => array (
			'orsay_widgets_name'      => 'flickr',
			'orsay_widgets_title'     => __( 'Flickr', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'dribbble' => array (
			'orsay_widgets_name'      => 'dribbble',
			'orsay_widgets_title'     => __( 'Dribbble', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'tumblr' => array (
			'orsay_widgets_name'      => 'tumblr',
			'orsay_widgets_title'     => __( 'Tumblr', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'instagram' => array (
			'orsay_widgets_name'      => 'instagram',
			'orsay_widgets_title'     => __( 'Instagram', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'lastfm' => array (
			'orsay_widgets_name'      => 'lastfm',
			'orsay_widgets_title'     => __( 'Last.fm', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
		'soundcloud' => array (
			'orsay_widgets_name'      => 'soundcloud',
			'orsay_widgets_title'     => __( 'SoundCloud', 'orsay' ),
			'orsay_widgets_field_type'    => 'text'
		),
	);

	return $fields;

	}

	function widget($args , $instance) {

		extract($args);

		if(!isset($instance['title']) ) $instance['title']='';
		$widget_title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		// Show title
		if( isset( $widget_title ) ) {
			echo $before_title . $widget_title . $after_title;
		}

		/**
		* Widget Content
		*/
		?>

		<div class="widget-container">

			<?php
			echo '<div class="widget-socials">';

			// Loop through fields
			$widget_fields = $this->widget_fields();
			foreach( $widget_fields as $widget_field ) {

				// Make array elements available as variables
				extract( $widget_field );

				// Check if field has value and skip title field
				unset( $orsay_widgets_field_value );

				if( isset( $instance[$orsay_widgets_name] ) && 'widget_title' != $orsay_widgets_name ) { 

					$orsay_widgets_field_value = esc_url( $instance[$orsay_widgets_name] ); 

					if( '' != $orsay_widgets_field_value ) {  ?>

					<a href="<?php echo $orsay_widgets_field_value; ?>" title="<?php echo esc_attr($orsay_widgets_title); ?>"><i class="fa fa-<?php echo esc_attr($orsay_widgets_name); ?>"></i></a>

				<?php }
				}
			}
			echo '</div>';
			?>

		</div>

		<?php

		echo $after_widget;

	}

	/**
	* Update values and sanitize widget form values as they are saved.
	*/
	function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
		$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? esc_html( $new_instance['rss'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? esc_html( $new_instance['facebook'] ) : '';
		$instance['google'] = ( ! empty( $new_instance['google'] ) ) ? esc_html( $new_instance['google'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? esc_html( $new_instance['twitter'] ) : '';
		$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? esc_html( $new_instance['pinterest'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? esc_html( $new_instance['instagram'] ) : '';
		$instance['tumblr'] = ( ! empty( $new_instance['tumblr'] ) ) ? esc_html( $new_instance['tumblr'] ) : '';
		$instance['lastfm'] = ( ! empty( $new_instance['lastfm'] ) ) ? esc_html( $new_instance['lastfm'] ) : '';
		$instance['soundcloud'] = ( ! empty( $new_instance['soundcloud'] ) ) ? esc_html( $new_instance['soundcloud'] ) : '';
		$instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? esc_html( $new_instance['dribbble'] ) : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? esc_html( $new_instance['youtube'] ) : '';
		$instance['flickr'] = ( ! empty( $new_instance['flickr'] ) ) ? esc_html( $new_instance['flickr'] ) : '';

		return $instance;

	}


	function form( $instance ) {

	/* Set up some default widget settings. */
	$defaults = array( 'title' => __('Follow me','orsay'), 'rss' => '', 'facebook' => '', 'twitter' => '', 
						'google' => '', 'pinterest' => '', 'instagram' => '', 'tumblr' => '', 'lastfm' => '',
						'soundcloud' => '', 'dribbble' => '', 'youtube' => '', 'flickr' => '');
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>

	<p><?php _e('Enter full URL. If you don\'t want to display element, leave it\'s URL field empty.','orsay') ?></p>

	<!-- Facebook URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php _e('URL address of your Facebook profile or page','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" type="text" value="<?php echo esc_attr($instance['facebook']); ?>" />
	</p>

	<!-- Twitter URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php _e('URL address of your Twitter profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" type="text" value="<?php echo esc_attr($instance['twitter']); ?>" />
	</p>

	<!-- Google Plus URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'google' )); ?>"><?php _e('URL address of your Google+ profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'google' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google' )); ?>" type="text" value="<?php echo esc_attr($instance['google']); ?>" />
	</p>    

	<!-- Pinterest URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>"><?php _e('URL address of your Pinterest profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' )); ?>" type="text" value="<?php echo esc_attr($instance['pinterest']); ?>" />
	</p>

	<!-- Instagram URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php _e('URL address of your Instagram profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" type="text" value="<?php echo esc_attr($instance['instagram']); ?>" />
	</p>

	<!-- Tumblr URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>"><?php _e('URL address of your Tumblr profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr' )); ?>" type="text" value="<?php echo esc_attr($instance['tumblr']); ?>" />
	</p>

	<!-- Dribbble URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>"><?php _e('URL address of your Dribbble profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble' )); ?>" type="text" value="<?php echo esc_attr($instance['dribbble']); ?>" />
	</p>

	<!-- Last FM URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'lastfm' )); ?>"><?php _e('URL address of your Last FM profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'lastfm' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'lastfm' )); ?>" type="text" value="<?php echo esc_attr($instance['lastfm']); ?>" />
	</p>

	<!-- Soundcloud URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>"><?php _e('URL address of your Soundcloud profile','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud' )); ?>" type="text" value="<?php echo esc_attr($instance['soundcloud']); ?>" />
	</p>

	<!-- YouTube URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php _e('URL address of your YouTube channel','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" type="text" value="<?php echo esc_attr($instance['youtube']); ?>" />
	</p>

	<!-- Flickr URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'flickr' )); ?>"><?php _e('URL address of your Flickr profile page','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'flickr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'flickr' )); ?>" type="text" value="<?php echo esc_attr($instance['flickr']); ?>" />
	</p>

	<!-- RSS URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php _e('URL address of your RSS feed','orsay') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'rss' )); ?>" type="text" value="<?php echo esc_attr($instance['rss']); ?>" style="width:90%;" />
	</p>

	<?php
	}

}