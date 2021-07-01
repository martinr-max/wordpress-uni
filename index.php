<?php

get_header();

 ?>
 <section class="banner-container-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),
        url(<?php echo get_theme_file_uri('/images/michael-longmire-L9EV3OogLh0-unsplash.jpg') ?>);">
        <div class="banner-text">
          <h1 class="heading-1 " id="banner-title">Blog</h1>
          <h1 class="heading-2">All blog posts</h1>
        </div>
  </section>
<section class="container">
  <div class="post-list">
    <?php
  while(have_posts()) {
    the_post(); ?>
    <div class="post-item">
      <h2 class="heading-2 post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      
      <div class="post-metabox">
        <p>Posted by <strong> <?php the_author_posts_link(); ?> </strong> on <?php the_time('F j, Y'); ?> in <?php echo get_the_category_list(', '); ?></p>
      </div>

      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn post-btn" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
      </div>

    </div>
  <?php }
  echo paginate_links();
?>
</div>
</section>

<?php get_footer();

?>