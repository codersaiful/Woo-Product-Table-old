<?php
/**
 * Adding CSS file wpt_style_js_adding.
 * Only for Front-End Section
 * 
 * @since 1.1
 */
function wpt_style_js_adding(){
    wp_enqueue_style('wpt-default-css', FPMW_BASE_URL . 'css/default.css', __FILE__, '1.0');
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','wpt_style_js_adding');