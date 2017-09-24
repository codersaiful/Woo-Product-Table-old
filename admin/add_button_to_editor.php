<?php
/**
 * Manage adding shortcode button. This Page - to create function for add Shortcode button to WP Editor.
 * 
 * @author Saiful Islam
 * 
 * @package Woo Product Table
 * 
 * @since 1.0
 */
function wpt_add_button_to_editor(){
    //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "wpt_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'wpt_add_button_tinymce');
}
add_action( 'init', 'wpt_add_button_to_editor' );

/**
 * Register Array for TinyMCE.
 * Callback for mce_external_plugins
 * 
 * @since 1.0
 */
function wpt_register_tinymce_plugin($plugin){
    $plugin_array['wpt_button'] = WPT_BASE_URL . 'js/wpt_custom_tinymce.js';
    return $plugin_array;
}

/**
 * Add button to TinyMCE
 * callback for mce_button
 * 
 * @since 1.0
 */
function wpt_add_button_tinymce($buttons) {
    $buttons[] = "wpt_button"; //Add the button ID to the $button array
    return $buttons;
}