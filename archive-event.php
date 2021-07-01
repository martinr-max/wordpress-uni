<?php

get_header();
 ?>
 <section class="banner-container-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),
        url(<?php echo get_theme_file_uri('/images/michael-longmire-L9EV3OogLh0-unsplash.jpg') ?>);">
        <div class="banner-text">
          <h1 class="heading-1 " id="banner-title">Events calender</h1>
          <h1 class="heading-2">All  university Events</h1>
        </div>
  </section>
<div class="container">
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
</div>

<?php get_footer();

?>