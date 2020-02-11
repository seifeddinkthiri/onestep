<?php get_header() ?>




<div class="container home-page my-5">
    <div class="row">
    	<div class="col-lg-8">


				<?php
				  if (have_posts()){ // check if there's posts
				  	while(have_posts()){ // while throught posts
				    	the_post();

              if (!has_post_thumbnail()){
                get_template_part( 'partials/content', 'nothumb' );
              }else{
				    	get_template_part( 'partials/content', 'home' );
              }
				  	} // end while
				  } // end if

				?>

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

		<div class="col-lg-4">
	    	<?php
		    	if (is_active_sidebar('main-sidebar')) {
		    		dynamic_sidebar('main-sidebar');
		    	}

	    	?>

	    </div>
	</div>
</div>






<?php get_footer() ?>
