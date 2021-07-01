<?php
  
  get_header(); ?>
  <section class="banner-container-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),
        url(<?php echo get_theme_file_uri('/images/michael-longmire-L9EV3OogLh0-unsplash.jpg') ?>);">
        <div class="banner-text">
          <h1 class="heading-1"><?php the_title(); ?></h1>
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
        <p><?php
         $eventDate = new DateTime(get_field('event_date'));
         echo $eventDate->format('d. M. Y');
          ?></p>
      </div>
      <div class="generic-content">
        <?php the_content(); ?>
      </div>
    </div>
  <?php }
?>
</div>
</section>
<?php
  get_footer();

?>