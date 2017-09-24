<?php
add_shortcode('wpt-shop','wpt_if_no_woocommerce');

/**
 * This Function will call, If Plugin not found WooCommerce Activated.
 * 
 * @param type $atts
 * 
 * @since 1.1
 */
function wpt_if_no_woocommerce($atts){
    echo '<a title="Tell us: if need Help" href="mailto:codersaiful@gmail.com" style="color: #d00;padding: 10px;">[WOO Product Table] WooCommerce not Active/Installed</a>';
}