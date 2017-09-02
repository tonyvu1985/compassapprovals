<?php 
/**
 * Adds Foo_Widget widget.
 */
class wplook_Text_Widget extends WP_Widget {
  /**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'wplook_text_widget', // Base ID
			__( 'WPlook text Block Widget', 'thearchitect-wpl' ), // Name
			array( 'description' => __( 'A customizable text block widget.', 'thearchitect-wpl' ), ) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$text = wpautop( apply_filters( 'widget_text', $instance['text'] ) );
		$text_color = apply_filters( 'widget_text_color', $instance['text_color'] );
		$background_color = apply_filters( 'widget_background_color', $instance['background_color'] );
		$margin = apply_filters( 'widget_margin', $instance['margin'] );
		echo $before_widget; ?>

		<div class="block-title" style="background-color:<?php echo $background_color; ?>; margin:<?php echo $margin ?>">
			<h2 style="color:<?php echo $text_color; ?>;"><?php echo $title; ?></h2>
			<span class="line small white"></span>
			<div class="widget-text" style="color:<?php echo $text_color; ?>;"><?php echo $text; ?></div>
		</div>
		
		<?php echo $after_widget;
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['text'] = wp_kses_post( $new_instance['text'] );
		$instance['text_color'] = strip_tags( $new_instance['text_color'] );
		$instance['background_color'] = strip_tags( $new_instance['background_color'] );
		$instance['margin'] = strip_tags( $new_instance['margin'] );
		return $instance;
	}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		if ( isset( $instance[ 'text' ] ) ) {
			$text = $instance[ 'text' ];
		}
		if ( isset( $instance[ 'text_color' ] ) ) {
			$text_color = $instance[ 'text_color' ];
		}
		if ( isset( $instance[ 'background_color' ] ) ) {
			$background_color = $instance[ 'background_color' ];
		}
		if ( isset( $instance[ 'margin' ] ) ) {
			$margin = $instance[ 'margin' ];
		}
		else {
			$title = __( 'New title', 'thearchitect-wpl' );
			$text = __( 'Text', 'thearchitect-wpl' );
			$text_color = __( '#fff', 'thearchitect-wpl' );
			$background_color = __( '#bb3e3e', 'thearchitect-wpl' );
			$margin = __( '-100px 0 0 0;', 'thearchitect-wpl' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'thearchitect-wpl' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:', 'thearchitect-wpl' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="16" cols="20"><?php echo esc_attr( $text ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'text_color' ); ?>"><?php _e( 'Text color:', 'thearchitect-wpl' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" type="text" value="<?php echo esc_attr( $text_color ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Background color:', 'thearchitect-wpl' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" type="text" value="<?php echo esc_attr( $background_color ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'margin' ); ?>"><?php _e( 'Margins:', 'thearchitect-wpl' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'margin' ); ?>" name="<?php echo $this->get_field_name( 'margin' ); ?>" type="text" value="<?php echo esc_attr( $margin ); ?>" />
		</p>
		<?php
	}
} // class Foo_Widget

add_action( 'widgets_init', create_function( '', 'register_widget( "wplook_text_widget" );' ) );

?>
