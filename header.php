<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <?php wp_head(); ?>
  </head>
  <body> 
  <?php get_template_part('template-parts/mobile-nav') ?>
  <header class="site-header">
    <div class="main-navigation">
    <h1 class="header_university_name heading-1">
          <strong>Fictional</strong> University
        </h1>
        <nav class="main-navigation__nav">
            <ul class="main-navigation__list min-list">
                <li class="main-navigation__item">
                  <a class="main-navigation__link" href="<?php echo get_site_url('/'); ?>">Home</a>
                </li>
                <li class="main-navigation__item">
                  <a class="main-navigation__link" href="<?php echo site_url('/about-us'); ?>">About us</a>
                </li>
                <li class="main-navigation__item">
                  <a class="main-navigation__link" href="<?php echo site_url('/blog'); ?>">Blog</a>
                </li>
                <li class="main-navigation__item">
                  <a class="main-navigation__link" href="<?php echo site_url('/events'); ?>">Events</a>
                </li>
            </ul>
            <div class="buttons">
                <?php if(is_user_logged_in()) { ?>
                    <a class="btn" href="<?php echo site_url('/my-notes'); ?>">My Notes</a>
                    <a class="btn" href="<?php echo wp_logout_url(); ?>">Log out</a>

                 <?php } else { ?>
                    <a class="btn" href="<?php echo wp_login_url(); ?>">Log in</a>
                    <a class="btn" href="<?php echo wp_registration_url(); ?>">sign up</a>
                <?php } ?>
                
                </div>
        </nav>
    </div>  
      
    </header>


