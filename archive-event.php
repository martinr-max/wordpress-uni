<?php

get_header();
 ?>
 <section class="banner-container-page" id="event-img" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),
        url(<?php echo get_theme_file_uri('/images/teemu-paananen-bzdhc5b3Bxs-unsplash.jpg') ?>);">
        <div class="banner-text">
          <h1 class="heading-1 " id="banner-title">All Events</h1>
        </div>
  </section>
 
<section class="container">

<div class="post-list">

<?php
  
  while(have_posts()) {
    the_post(); ?>
    <div class="post-item">
    <?php
    get_template_part('template-parts/content-event'); ?>
    </div>
  <?php }
  echo paginate_links();
?>

</div>
  </section>

<?php get_footer();

?>