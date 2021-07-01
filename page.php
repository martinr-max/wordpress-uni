<?php

get_header();

 ?>
 <section class="banner-container-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),
        url(<?php echo get_theme_file_uri('/images/michael-longmire-L9EV3OogLh0-unsplash.jpg') ?>);">
        <div class="banner-text">
          <h1 class="heading-1 " id="banner-title"><?php the_title(); ?></h1>
        </div>
  </section>
<section class="container">
  <div class="post-list">
    <?php
  while(have_posts()) {
    the_post(); ?>
    <div class="post-item">
      <div class="generic-content">
        <?php the_content(); ?>
      </div>

    </div>
  <?php }
 
?>
</div>
</section>

<?php get_footer();

?>