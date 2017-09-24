<?php
/**
 * Set Menu for Dashboard - WPT (Woo Product Table) Plugin
 * 
 * @since 1.0
 * 
 * @package Woo Product Table
 */
function wpt_admin_menu() {
    add_menu_page('WOO Product Table', 'Product Table', 'edit_theme_options', 'woo-product-table', 'wpt_faq_page', 'dashicons-list-view');
    //add_submenu_page('woo-product-table', 'WOO Product Table FAQ', 'FAQ', 'edit_theme_options', 'woo-product-table-faq', 'wpt_faq_page');
}
add_action('admin_menu', 'wpt_admin_menu');