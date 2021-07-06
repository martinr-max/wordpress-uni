<div class="navigation">
      

        <div class="navigation__background">&nbsp;</div>
        <label for="navi-toggle" class="nav-open navigation__btn lines.button">
            <span class="navigation__icon"></span>
        </label>
       
        <nav class="navigation__nav">
            <ul class="navigation__list">
                <li class="navigation__item">
                    <a class="navigation__link" href="<?php echo site_url('/'); ?>">Home</a>
                </li>
                <li class="navigation__item">
                    <a class="navigation__link" href="<?php echo site_url('/about-us'); ?>">About us</a>
                </li>
                <li class="navigation__item">
                    <a class="navigation__link" href="<?php echo site_url('/blog'); ?>">Blog</a>
                </li>
                <li class="navigation__item">
                    <a class="navigation__link" href="<?php echo site_url('/events'); ?>">Events</a>

                </li>
                <div class="mobile-buttons">
                <?php if(is_user_logged_in()) { ?>
                    <a class="btn" href="<?php echo site_url('/my-notes'); ?>">My Notes</a>
                    <a class="btn" href="<?php echo wp_logout_url(); ?>">Log out</a>

                 <?php } else { ?>
                    <a class="btn" href="<?php echo wp_login_url(); ?>">Log in</a>
                    <a class="btn" href="<?php echo wp_registration_url(); ?>">sign up</a>
                <?php } ?>

                </div>
            </ul>
           

        </nav>
      
    </div>
