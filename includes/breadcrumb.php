<?php
$all_categories = get_the_category();

?>

<div class="breadcrumb-holder">
	<nav aria-label="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo get_home_url() ?>"><?php echo  get_bloginfo('name') ?></a>
				</li>

				<?php if (!is_page()){ ?>
					<li class="breadcrumb-item">
							<a href="<?php echo esc_url(get_category_link($all_categories[0]->term_id)) ?>"><?php echo esc_html($all_categories[0]->name) ?></a>
					</li>
				<?php } ?>
				<li class="breadcrumb-item active" aria-current="page">
					<?php echo get_the_title() ?>
				</li>
			</ol>
		</div>
	</nav>

</div>
