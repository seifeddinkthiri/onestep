	<?php


		if (comments_open()){ // check if comments are open

			echo "<h3 class=' display-5 comments-number block-head mt-5'>" ;
			comments_number(); // output comments number
			echo "</h3>" ;
			echo "<ul class='list-unstyled my-4 comments-list'>";

			$comment_array = array( // comments arguments

				'max_depth'         => 3,           // comments level
				'type'              => 'comment',   // comments type
				'per_page'          => 20,          // number of comments per page
				'avatar_size'       => 64,          // size of avatar in pexels
				'reverse_top_level' => true         // display comments in ascending oreder

			);

			wp_list_comments($comment_array); // listed of the all comments
			echo("</ul>");
		}
		else
		    esc_html_e( 'comments are disabled', 'OneStep' ) ;    // message if the comments are disabled 
