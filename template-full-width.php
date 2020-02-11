<?php

// Template Name: Full Width
// Template Post Type: post, page

get_header();
include(get_template_directory() . '/includes/breadcrumb.php')
 ?>



<div class="container  post-page my-4">
	<div class="row">
		<div class="col-lg-8 m-auto">

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
								    <?php comments_popup_link( __('0 Comments', 'OneStep'),'1 '. __('Comment', 'OneStep'), "% ". __('Comments', 'OneStep'), 'Comments-count', __('Comments off', 'OneStep') ); ?>
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

	                    	    <p class="post-tags font-weight-light">
	                    	    	<?php
	                    	    	if (has_tag())
	                    	    		the_tags();
	                    	    	else
	                    	    		esc_html_e("There's no tags", "OneStep") ;
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

			<div class="random-posts">
				 <?php
				  $posts_per_page = 3;
				  $query_args= array(
				  	'author'         => get_the_author_meta('id'),
				  	'posts_per_page' => $posts_per_page,
				  	'post__not_in'   => [$post_id],
				  	//'orderby'        => 'rand',
				  	'category__in'   => wp_get_post_categories($post_id)
				  );

				  $wpquery = new WP_Query($query_args);



				  if ($wpquery->have_posts()){ // check if there's posts
		          ?>
		          <h3 class="block-head"><?php esc_html_e('Related posts', 'OneStep') ?> </h3>

		          <div class="author-post">
			            <div class="row ">
			          <?php
					  	while($wpquery->have_posts()){ // while throught posts
					    	$wpquery->the_post();
					    	?>

							    	<div class="col-md-4">
							    		<div class="img-post">
                        <?php  if (has_post_thumbnail()){
                          the_post_thumbnail('',array('class' => 'card-img img-fluid img-thumbnail', 'title' => get_the_title()));
                        } else {
                          ?>
                          <img class="card-img img-fluid img-thumbnail" src="<?php echo get_template_directory_uri() ?>/img/no-thumbnail.png">


                          <?php
                        }

                        ?>
							    		</div>

				                    	<div class="post-info">
				                    		<h3 class="card-title ">
				                    			<a href="<?php the_permalink() ?>"><?php the_title();?></a>
				                    	    </h3>



											<ul class="nav">

											  <li class="nav-item icons text-muted mr-3">
											  	<i class="fas fa-clock"></i>
											    <?php the_time('F j, Y') ?>
											  </li>

											</ul>
							    		</div>
							    	</div>

					    	<?php

					  	} // end while
					  	?>
					  	</div>
				    </div>

					  	<?php
					  } // end if
					wp_reset_postdata(); // reset loop query

					?>


			</div>

			<div class=" bio-author my-3">
				<div class="row">
					<div class="col-md-2 text-center">
						<?php echo get_avatar(get_the_author_meta('id'), 128, '', '', array('class' =>'img-fluid m-auto rounded-circle img-thumbnail')) // display avatar  ?>
			        </div>

			        <div class="col-md-10">
					    <h4>
							<?php the_author_meta('first_name');
                     echo ' ';
						          the_author_meta('last_name'); ?>
						    ( <?php the_author_posts_link()	?> )

						</h4>

						<?php if (get_the_author_meta('description')){ // check if there is description ?>

						    	<p><?php the_author_meta('description') ?></p>

						<?php } else esc_html_e( "there's no bio", "OneStep" )// display message there is not discription?>
					</div>

				</div>

			</div>

			<div class="my-separator mt-2"></div>

			<div class="next-prev">

				<?php
        if (get_previous_post_link()){
              echo "<button class='btn btn-secondary prev'>";
              previous_post_link(__('<i class="fas fa-chevron-left"></i> %link ', 'OneStep') , '%title');
              echo "</button>";
            }


            if (get_next_post_link()){
              echo "<button class='btn btn-secondary next'>";
                next_post_link(__('%link <i class="fas fa-chevron-right"></i>', 'OneStep'), '%title');
                  echo "</button>";
            }/*else
              echo "<span>" . esc_html__('no next post','OneStep') . "</span>";*/
				?>
        <div class="clearfix"></div>
			</div>

			<div class="my-separator my-2"></div>

		    <?php comments_template() ?>

		    <div class="my-separator my-2"></div>

		    <?php
		        $commentform_args = array(
              'fields'   		 => array(
 										'author' => '<div class="row"><div class="form-group col-md-4">
									    <label for="author">'. __( 'Name') . '*</label>
									    <input type="text" name="author" class="form-control" id="author" required="required">
									    </div>',

 										'email'  => '<div class="form-group col-md-4">
									    <label for="email">' . __( 'Email' ) . ' *</label>
									    <input type="email" name="email" class="form-control" id="email" >
									    <small id="emailHelp" class="form-text text-muted">'. __('Your email address will not be published') .'</small>
  										</div>',

 										'url'	 => '<div class="form-group col-md-4">
									    <label for="url">' . __( 'Website' ) . ' </label>
									    <input type="text" name="url" class="form-control" id="url">
									    </div></div>'
		        					),
		        	'comment_field' => '<div class="form-group">
									    <label for="comment">' . __( 'Comment', 'OneStep' ) . '</label>
									    <textarea class="form-control" id="comment" name="comment" rows="8" maxlength="65525" required="required"></textarea>
									  </div>',

					'class_submit'  => 'btn submit'
		        );
		     	comment_form($commentform_args);
		     ?>


	    </div>

    </div>

</div>



<?php get_footer() ?>
