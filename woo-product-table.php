<?php
/**
Plugin Name: WOO Product Table
Plugin URI: https://wordpress.org/plugins/woo-product-table
Description: WooCommerce all products display as a table in one page by shortcode. Fully responsive and mobile friendly. Easily customizable - color,background,title,text color etc.
Author: Saiful Islam
Author URI: https://profiles.wordpress.org/codersaiful
Tags: woocommerce product,woocommerce product table, product table
Text Domain: woo-product-table
Version: 1.1

 */




include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
define( 'WPT_PLUGIN_BASE_FOLDER', plugin_basename( dirname( __FILE__ ) ) );
define( 'WPT_PLUGIN_BASE_FILE', plugin_basename( __FILE__ ) );
define( "WPT_BASE_URL", WP_PLUGIN_URL. '/'. plugin_basename( dirname( __FILE__ ) ) . '/' );
define( "wpt_dir_base", dirname( __FILE__ ) . '/' );
define( "WPT_BASE_DIR", str_replace( '\\', '/', wpt_dir_base ) );



//Only For Admin Section.
if( is_admin() ){
    include ( WPT_BASE_DIR . 'admin/starting.php' ); //Function for install/uninstall time and update_option's default array set here
    include ( WPT_BASE_DIR . 'admin/plugin_setting_link.php' ); //To show Setting link at plugin page
    //include ( WPT_BASE_DIR . 'admin/reset_options.php' ); //reset for update_options to default value
    include ( WPT_BASE_DIR . 'admin/menu.php' ); //Adding menu to Dashboard
    include ( WPT_BASE_DIR . 'admin/add_button_to_editor.php' ); //Adding menu to Dashboard
    include ( WPT_BASE_DIR . 'admin/forms_admin.php' ); //Menu Setting's form available here
    //include ( WPT_BASE_DIR . 'admin/media_uploader.php' ); //Media uploader for image upload by this plugin
}

//Development Purpose end

//Checking WooCommerce availability  and Enable shortocode for Front User
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
  include ( WPT_BASE_DIR . 'includes/syle_js_adding.php' ); //Style file and js file including
  include ( WPT_BASE_DIR . 'includes/shortcode.php' ); //Adding and creating shortcode
  //wp_enqueue_style($handle)
} else {
  include ( WPT_BASE_DIR . 'includes/no_woocommerce.php' );  //Message if WooCommerce not available for shortcode/ Only for default shortcode only
}



register_activation_hook( __FILE__, 'wpt_install' );
register_deactivation_hook( __FILE__, 'wpt_uninstall' );