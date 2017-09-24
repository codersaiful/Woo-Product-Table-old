<?php

add_filter('plugin_action_links_' . WPT_PLUGIN_BASE_FILE, 'wpt_add_action_links');

function wpt_add_action_links($links) {
    //$wpt_links[] = '<a href="' . admin_url('admin.php?page=woo-product-table') . '" title="Go to Setting Page FOOD or Product Menu for WooCommerce Plugin">Settings</a>';
    $wpt_links[] = '<a title="See FAQ - How to use." href="' . admin_url('admin.php?page=woo-product-table') . '">FAQ - Shortcode</a>';
    //$links[] = '<a href="' . admin_url( 'options-general.php?page=myplugin' ) . '">Settings</a>';
    return array_merge($wpt_links, $links);
}
