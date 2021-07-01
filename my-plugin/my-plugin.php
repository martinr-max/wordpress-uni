<?php
/*
Plugin Name: My Plugin
Description: Amazing plugin
Version: 1.0
Author: Martin
*/ 


class WordCountPlugin {
    function __construct() {
        add_filter('admin_menu', array($this, 'adminPage'));
        add_filter('the_content, ifWrap');
        add_action('admin_init', array($this, 'settings'));

    }

    function ifWrap($content) {
        if(is_main_query() && is_single() && 
        (get_option('wcp_wordcount', '1' OR 
        get_option( 'wcp_character_count', '1') OR 
        get_option('wcp_read_time', '1') ))) {
            return $this->createHTML($content);
        }

    }
    function settings() {
        add_settings_section(
            'wcp_first_section',
            NULL,
            NULL,
            'word-count-setting-page'
        );
        add_settings_field(
            'wcp_location',
            'Display Location',
            array($this, 'locationHTML'),
            'word-count-setting-page',
            'wcp_first_section'
        );
        register_setting(
            'wordCountPlugin',
            'wcp_location',
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '0'
            )
        );
        //HEADLINE
        add_settings_field(
            'wcp_headline',
            'Headline',
            array($this, 'headlineHTML'),
            'word-count-setting-page',
            'wcp_first_section'
        );
        register_setting(
            'wordCountPlugin',
            'wcp_headline',
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Post Statistics'
            )
        );

        add_settings_field(
            'wcp_wordcount',
            'Word Count',
            array($this, 'wordcountHTML'),
            'word-count-setting-page',
            'wcp_first_section'
        );
        register_setting(
            'wordCountPlugin',
            'wcp_wordcount',
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '1'
            )
        );
        add_settings_field(
            'wcp_character_count',
            'Character Count',
            array($this, 'characterHTML'),
            'word-count-setting-page',
            'wcp_first_section'
        );
        register_setting(
            'wordCountPlugin',
            'wcp_character_count',
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '1'
            )
        );
        add_settings_field(
            'wcp_read_time',
            'Read Time',
            array($this, 'readHTML'),
            'word-count-setting-page',
            'wcp_first_section'
        );
        register_setting(
            'wordCountPlugin',
            'wcp_read_time',
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '1'
            )
        );
    }

    function readHTML() { ?>
        <input type="checkbox" name="wcp_read_time" value="1" <?php  checked(get_option('wcp_read_time'), '1') ?>/>
    <?php }

    function characterHTML() { ?>
        <input type="checkbox" name="wcp_character_count" value="1" <?php  checked(get_option('wcp_character_count'), '1') ?>/>
    <?php }

    function wordcountHTML() { ?>
        <input type="checkbox" name="wcp_wordcount" value="1" <?php echo checked(get_option('wcp_wordcount'), '1') ?>/>
    <?php }

    function headlineHTML() { ?>
        <input type="text" name="wcp_headline" value="<?php echo get_option('wcp_headline'); ?>" />
    <?php }

    function locationHTML(){?>
    <select name="wcp_location">
        <option value="0" <?php selected(get_option('wcp_loaction', '0')) ?>>Post Start</option>
        <option value="1"  <?php selected(get_option('wcp_loaction', '1')) ?>>Post End</option>
    </select>
    <?php } 

   
    function adminPage() {
        add_options_page(
            'Word Count Settings',
            'Word Count',
            'manage_options',
            'word-count-setting-page',
            array($this, 'ourHTML')
        );
    }
    
    function ourHTML() { ?>
    <div class="wrap">
        <h1>Word count Settings</h1>
        <form action="options.php" method="POST">
            <?php
            settings_fields('wordCountPlugin');
            do_settings_sections('word-count-setting-page');
            submit_button();
             ?>
        </form>
    </div>
    
    <?php  }
}

$wordCountPlugin = new WordCountPlugin();


