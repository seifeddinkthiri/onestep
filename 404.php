<?php get_header() ?>
<div class="container mt-4">
	<div class="row">

		<div class=" col-lg-8 ">
			<div class="author-post p-4">
				<h3 class="text-muted display-4 mt-5"><?php _e('404 Error : Page Not Found', 'OneStep') ?></h3>
				<p class="text-muted mt-3"><?php _e('The page you are looking for does not exist','OneStep') ?></p>
			  <div class="my-5">
			    <?php get_search_form( true ) ?>
			  </div>
			</div>
		</div>

		<div class="col-lg-4">
			 <?php
				 if (is_active_sidebar('main-sidebar')) {
					 dynamic_sidebar('main-sidebar');
				 }

			 ?>

		 </div>

  </div> <!-- .row -->
</div> <!-- .container -->

<?php get_footer() ?>
