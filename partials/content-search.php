
      <div class="author-post">
    <div class="row ">



          <div class="col-sm-12 post-info">
            <h3 class="card-title text-capitalize">
              <?php //echo get_post_type($post); ?>
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
      <?php comments_popup_link( __('0 Comments', 'OneStep'),'1 '. __('Comment', 'OneStep'), "% ". __('Comments', 'OneStep'), 'Comments-count', __('Comments off', 'OneStep') ); ?>
    </li>
  </ul>
  </div>
    </div>
</div>
