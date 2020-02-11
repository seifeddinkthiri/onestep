
      <div  <?php post_class('author-post' ) ?>>
    <div class="row ">

  <div class="col-sm-4">
    <?php // the_post_thumbnail('',array('class' => 'card-img img-fluid  img-thumbnail'));?>

    <?php  if (has_post_thumbnail()){
      the_post_thumbnail('',array('class' => 'card-img img-fluid  img-thumbnail', 'title' => get_the_title()));
    } else {
      ?>
      <img class="card-img img-fluid img-thumbnail" src="<?php echo get_template_directory_uri() ?>/img/no-thumbnail.png">
      <?php
    }

    ?>
  </div>

          <div class="col-sm-8 post-info">
            <h3 class="card-title ">
              <a href="<?php the_permalink() ?>"><?php the_title();?></a>
              </h3>
              <p class="card-text " ><?php echo the_excerpt() ?></p>


  <ul class="nav">

    <li class="nav-item icons text-muted mr-3">
      <i class="fas fa-clock"></i>
      <?php the_time('F j, Y') ?>
    </li>
    <li class="nav-item icons text-muted mr-3">
      <i class="fas fa-comments"></i>
      <?php comments_popup_link( __('0 Comments', 'OneStep'),'1 '. __('Comment', 'OneStep'), "% ". __('Comments', 'OneStep'), 'Comments-count', __('Comments off', 'OneStep') );?>
    </li>
  </ul>
  </div>
    </div>
</div>
