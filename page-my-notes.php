<?php
if(!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
}
get_header();

 ?>
 <section class="banner-container-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),
        url(<?php echo get_theme_file_uri('/images/michael-longmire-L9EV3OogLh0-unsplash.jpg') ?>);">
        <div class="banner-text">
          <h1 class="heading-1 " id="banner-title"><?php the_title(); ?></h1>
        </div>
  </section>
<section class="container">
<div class="create-note">
    <div class="create-note-header">
        <h2 class="heading-2" >Create Note</h2>
        <input type="text" class="create-note-title" placeholder="Note title">
    </div>
    <textarea rows="10" class="create-note-content" placeholder="Note text"></textarea>
    <span class="btn create-save-note-btn">save Note </span>
    
  </div>
  <ul class="note-list min-list">
    <?php
    $usernotes = new WP_Query(array(
        'post_type' => 'note',
        'post_per_page' => -1,
        'author' => get_current_user_id()
    ));
  while($usernotes->have_posts()) {
    $usernotes->the_post(); ?>
    <li data-id="<?php the_ID(); ?>" class="note-item">
      
      <div class="note-generic-content">
      <div class="note-header">
        <input class="heading-1" class="note-title-field" id="note-title" value="<?php echo esc_attr(get_the_title()); ?>" readonly>
        <div class="note-buttons">
            <span class="btn edit-note"> <i class="fa fa-pencil"></i>Edit </span>
            <span class="btn delete-note-2"> <i class="fa fa-trash-o"></i> Delete </span>
        </div>    
        </div>
        <textarea class="note-content-field" id="note-content" rows="10" readonly>
        <?php echo the_content(); ?>
        </textarea>
      </div>
      <span class="btn update-note"> <i class="fa fa-pencil"></i> save </span>

  </li>
  <?php
  echo paginate_links();
   }
 
?>
</ul>

</section>


<?php get_footer();

?>