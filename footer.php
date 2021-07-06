</div>
<footer class="footer">
    <div class="footer-content">
        <h1 class="footer-title heading-1"><strong>Fictional</strong>  University</h1>
        <div class="footer-navigation">
            <div class="nav-list min-list">
                <h3 class="heading-3">About us</h3>
            <ul>
                <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                <li><a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>
                <li><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>
              </ul>
            </div>
            <div class="nav-list min-list">
                <h3 class="heading-3">explore</h3>
            <ul>
                <li><a href="#">Legal</a></li>
                <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy</a></li>
                <li><a href="#">Careers</a></li>
              </ul>

            </div>
           
        </div>
        <div class="nav-list min-list">
                <h3 class="heading-3">Connect Us </h3>
            <ul class="min-list social-icons-list group">
              <li><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
            </div>

</footer>
<div class="search-overlay">
    <div class="top">
        <div class="search_container">
            <i class="fa fa-search search-icon" aria-hidden="true"></i>
            <input type="text" id="filter" value="" class="search-term" placeholder="what are you looking for?">
            <i class="fa fa-window-close search-icon-close" aria-hidden="true"></i>
            
    </div>
        </div>
        <div class="search_results_container">
        <div class="search_results"></div>
    </div>
    
</div>

</body>

<?php wp_footer(); ?>

</html>
