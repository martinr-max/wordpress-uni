<?php

get_header();

 ?>
 <section class="banner-container-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),
        url(<?php echo get_theme_file_uri('/images/michael-longmire-L9EV3OogLh0-unsplash.jpg') ?>);">
        <div class="banner-text">
          <h1 class="heading-1 " id="banner-title">All Programs</h1>
        </div>
  </section>

<div class="container">

<ul class="link-list min-list">

<?php
  while(have_posts()) {
    the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php }
  echo paginate_links();
?>
</ul>



</div>

<?php get_footer();

?>