<?php
get_header();
include(get_template_directory() . '/includes/breadcrumb.php')
 ?>



<div class="container  post-page my-4">
	<div class="row">
		<div class="col-lg-8">

			<?php
			  if (have_posts()){ // check if there's posts
			  	while(have_posts()){ // while throught posts
			    	the_post();
	                    edit_post_link('Edit <i class="fas fa-edit"></i>');
	        ?>
	            <div class="post-content p-3">
				    		<h1 class=" card-title">
	                    			<?php the_title();?>
	                    	</h1>

	                    	<div class="card-footer meta-date">
								<ul class="nav">
								  <li class="nav-item icons text-muted mr-3">
								  	<i class="fas fa-user"></i> <?php the_author_posts_link() ?>
								  </li>
								  <li class="nav-item icons text-muted mr-3">
								  	<i class="fas fa-clock"></i>
								    <?php the_time('F j') ?>
								  </li>
								  <li class="nav-item icons text-muted mr-3">
								  	<i class="fas fa-comments"></i>
								    <?php comments_popup_link( __('0 Comments'),'1 '. __('Comment'), "% ". __('Comments', 'OneStep'), 'Comments-count', __('Comments off', 'OneStep') ); ?>
								  </li>
								</ul>

								<!--<ul class="nav">
								  <li class="nav-item icons text-muted mr-3">
								  	<i class="fab fa-twitter-square"></i>
								  </li>
								  <li class="nav-item icons text-muted mr-3">
								  	<i class="fab fa-facebook-square"></i>
								  </li>
								  <li class="nav-item icons text-muted mr-3">
								  	<i class="fab fa-googleplus-square "></i>
								  </li>
								</ul>-->
							</div>
				    		<!--<button class="btn btn-primary categorie"><i class="fas fa-tag"></i> <?php the_category(' ') ?></button>-->
				    		<div class="post-thumb text-center mt-2">
				    			<?php the_post_thumbnail('medium_large',array('class' => 'mx-auto img-fluid'));?>
				    		</div>

	                    	<div class="post-text">

	                    	    <p class="card-text " ><?php echo the_content() ?></p>
	                    	    <hr>
	                    	    <p class="post-tags font-weight-light">
	                    	    	<?php
	                    	    	if (has_tag())
	                    	    		the_tags();
	                    	    	else
	                    	    		echo "There's no tags" ;
	                    	        ?>
	                    	    </p>
							</div>

				</div>


			    	<?php
			    	global $post;
			         $post_id = get_the_ID();
			  	} // end while
			  } // end if

			  // get post ID : get_queried_object_id();
			  // get categories id : wp_get_post_categories($post_id)

			?>












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
