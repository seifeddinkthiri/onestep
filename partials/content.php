<div class="col-sm-12 col-md-6 col-lg-4 my-4 content">
					    	<div class="card">
					    		<button class="btn btn-primary categorie"><i class="fas fa-tag"></i> <?php the_category(' | ') ?></button>
									<div class="">
										<?php  if (has_post_thumbnail()){
						    			the_post_thumbnail('',array('class' => 'card-img img-fluid', 'title' => get_the_title()));
										} else {
											?>
	                    <img class="card-img img-fluid" src="<?php echo get_template_directory_uri() ?>/img/no-thumbnail.png" >


											<?php
										}

										?>
								</div>
		                    	<div class="card-body">
		                    		<h3 class="card-title ">
		                    			<a href="<?php the_permalink() ?>"><?php the_title();?></a>
		                    	    </h3>
		                    	    <p class="card-text " ><?php get_excerpt(true) ?></p>
		                    	    <hr>
		                    	    <p class="post-tags font-weight-light">
		                    	    	<?php
		                    	    	if (has_tag())
		                    	    		the_tags();
		                    	    	else
		                    	    		echo __("There's no tags", 'OneStep') ;
		                    	        ?>
		                    	    </p>
								</div>
								<div class="card-footer">
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
								</div>
					    	</div>
</div>
