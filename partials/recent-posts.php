<div class="recent-post ">
  <div class="row">
      <div class="col-lg-4 col-md-2 col-4 text-center">

      <?php  if (has_post_thumbnail()){
        the_post_thumbnail('thumbnail',array('class' => 'img-fluid  recent-post-img')) ;
      } else {
        ?>
        <img class="cimg-fluid  recent-post-img" style="width: 70px; height: 70px" src="<?php echo get_template_directory_uri() ?>/img/no-thumbnail.png">


        <?php
      }

      ?>
      </div>
    <div class="recent-post-info col-lg-8 col-md-10 col-8 ">
      <a href="<?php the_permalink() ?>" class="recent-post-title"><?php the_title() ?></a>
      <p class="recent-post-time"><?php the_time('F j, Y') ?></p>
    </div>
  </div>
</div>
