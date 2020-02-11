<?php

/*


[1] class extends WP_Widget
[2] __constractor function
[3] public finction form for backend
[4] public function widget for frontend
*/

class My_Recent_Posts_Widget extends WP_Widget{

	public function  __construct(){
		$widget_ops = array(
			"classname" => "my-latest-posts",
			"description" => "Display your recent posts in awesome way",

		);
		parent::__construct("my_recent_posts", "OneStep recent posts", $widget_ops);
	}

	public function form($instance){

		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}
		else {
		$title = __( 'New title', 'wpb_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'nbr' ); ?>">Number of posts to show:</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'nbr' ); ?>" name="<?php echo $this->get_field_name( 'nbr' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $instance['nbr'] ); ?>" size="3">
		</p>
		<?php
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number_of_posts = esc_attr($instance['nbr']);

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		   echo $args['before_title'] . $title . $args['after_title'];
		else
		   echo $args['before_title'] . "Recent Posts" . $args['after_title'];




		// This is where you run the code and display the output
		if (is_single()){
			global $post;
			$query_args= array(
			  	'posts_per_page' => $number_of_posts,
			  	'post__not_in'   => 	$post->id		);

		} else {
			$query_args= array(
			  	'posts_per_page' => $number_of_posts
			);
	    }

		$wpquery = new wp_query($query_args);
		if ($wpquery->have_posts()){ // check if there's posts

		  	while($wpquery->have_posts()){ // while throught posts
		    	$wpquery->the_post();


                locate_template( 'partials/recent-posts.php', true, false );

	    }
	        }
	    wp_reset_postdata(); // reset loop query
		//echo __( 'Hello, World!', 'wpb_widget_domain' );
		echo $args['after_widget'];
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['nbr'] = ( ! empty( $new_instance['nbr'] ) ) ? strip_tags( $new_instance['nbr'] ) : '';
		return $instance;
	}
}

add_action('widgets_init',function(){
	register_widget('My_Recent_Posts_Widget');
});
