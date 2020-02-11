	<!DOCTYPE  html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset') ?>">
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title> <?php
		    wp_title('-','true','right');
			bloginfo('name') ?>
	    </title>

		<link rel="pingback" href="<?php bloginfo('pinback_url'); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	  <header class="header-ads">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h1><a class="brand" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a></h1>
						<p class="font-weight-bold"><?php bloginfo( 'description' ) ?></p>
					</div>
					<div class="col-md-8">
					  <img src="<?php echo get_template_directory_uri()?>/img/728x90.png" alt="" class="mt-3 img-fluid">
					</div>
				</div>

			</div>
	  </header>

		<nav class="navbar navbar-expand-lg  bg-dark navbar-dark">
		  <div class="container">

			  <a class="navbar-brand" href="<?php bloginfo('url') ?>"><i class="fas fa-home "></i></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="toggler-icon"><i class="fas fa-bars"></i></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			   <?php  onestep_nav_menu(); ?>

				 <!--<form class="form-inline ml-auto">
					<input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success search-btn my-2 my-sm-0" type="submit">Search</button>
				</form>-->

				<?php get_search_form() ?>
			  </div>


		  </div>
		</nav>
