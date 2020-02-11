<?php get_header() ?>

<div class="container  author-page my-4">
	<div class="row">
		<div class="col-sm-3 text-center author-info">
			<?php echo get_avatar(get_the_author_meta('id'), 160, '', '', array('class' =>'img-fluid m-auto rounded-circle img-thumbnail')) // display avatar  ?>
			 <h4 class="name-author my-2">
				<?php the_author_meta('first_name');
								echo ' ';
			          the_author_meta('last_name'); ?>
			    ( <?php the_author_posts_link()	?> )
			</h4>

			<?php if (get_the_author_meta('description')){ // check if there is description ?>
			    	<p class="bio"><?php the_author_meta('description') ?></p>

			<?php } else echo "there's no bio" // display message there is not discription?>
			<div class="author-stats">
				<ul class="list-unstyled">
					<li class="stats p-4 mb-3"><?php esc_html_e('Posts count','OneStep') ?> <span><?php echo count_user_posts(get_the_author_meta('id')) ?></span></li>
					<li class="stats p-4 mb-3"><?php esc_html_e('Comments count', 'OneStep'); ?>
						<span>
							<?php
							  $commentscount_args = array(
							  	'user_id'=> get_the_author_meta('id'),
							  	'count'  => true
							  ) ;
							  echo get_comments( $commentscount_args);
							?>
						</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-9">
		  <?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		  $query_args= array(
		  	'author'         => get_the_author_meta('id'),
				//'posts_per_page'  => 3,
				'paged' => $paged
		  );

		  $wpquery = new wp_query($query_args);


		  if ($wpquery->have_posts()){ // check if there's posts
          ?>
          <h3 class="block-head"><?php esc_html_e('Latest Posts', 'OneStep') ?>  </h3>
          <?php
		  	while($wpquery->have_posts()){ // while throught posts
		    	$wpquery->the_post();

					if (!has_post_thumbnail())
							get_template_part( 'partials/content', 'nothumb' );
					else
							get_template_part( 'partials/content', 'home' );

		  	} // end while
		  } // end if
			?>
			<div class="home-pagination mb-5 mt-3">
				<?php previous_posts_link( '&laquo; ' . __('Newer', 'OneStep') ); ?>
				&nbsp;
        <?php next_posts_link( __('Older', 'OneStep') . ' &raquo;') ?>
			</div>

    <?php
		wp_reset_postdata(); // reset loop query

		$comments_per_page = 8;
		$comments_args = array(
		 'user_id'         => get_the_author_meta('id'),
		 'number'          => $comments_per_page,
		 'status' 		   => 'approve',
		 'post_type'       => 'post',
		 'post_status'     => 'publish'
		);

		$comments = get_comments($comments_args);

        if ($comments){
        ?>
        	<h3 class="block-head mt-5">
        		 <?php esc_html_e( 'Latest Comments ', 'OneStep' ) ?>
        	</h3>

        <?php
			foreach ($comments as $comment) {
				//echo $comment->comment_post_ID.'<br>';
		?>


				<div class="author-comment">

                	<div class="comment-info">
                		<h3 class="card-title ">
                			<a href="<?php the_permalink($comment->comment_post_ID) ?>"><?php echo get_the_title($comment->comment_post_ID);?></a>
                	    </h3>
                	    <p class="card-text ml-2" ><?php echo $comment->comment_content ?></p>

						<ul class="nav">

						  <li class="nav-item icons text-muted mr-3">
						  	<i class="fas fa-clock"></i>
						    <?php echo "Add on: ".mysql2date('l, F j, Y',$comment->comment_date) ?>
						  </li>

						</ul>
		    		</div>

			    </div>
		<?php
			}
        }
		?>
		</div>
	</div>
</div>


<?php get_footer() ?>
