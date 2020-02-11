<?php get_header() ?>




<div class="container home-page pt-3">



	<div class="row">

		<?php
		$query_args= array(
			'posts_per_page' => -1
		);

		$wpquery = new wp_query($query_args);
		  if ($wpquery->have_posts()){ // check if there's posts
		  	while($wpquery->have_posts()){ // while throught posts
		    	$wpquery->the_post();

                get_template_part( 'partials/content');

		  	} // end while
		  } // end if

		?>
	</div>



<?php // numbering_pagination(); ?>








	<?php
	/*
	if (get_previous_posts_link()){
		  	previous_posts_link();
		  }else
		    echo "<span>no perevious posts</span>";

		  if (get_next_posts_link()){
		  	  next_posts_link(' Next »');
		  }else
		    echo "<span>no perevious posts</span>";
	*/
	?>
	<div class="home-pagination mb-5 mt-3">
		<?php
		the_posts_pagination(array(
			'screen_reader_text' =>' ',
			'next_text'          =>'<i class="fas fa-angle-right"></i>' ,
			'prev_text'          =>'<i class="fas fa-angle-left"></i>'
		));
		?>
	</div>
</div>



<?php get_footer() ?>
