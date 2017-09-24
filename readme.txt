=== Woo Product Table ===
Contributors: codersaiful
Donate link: https://www.upwork.com/freelancers/~0174ee1fa404be0957
Tags: woocommerce product,woocommerce product table, product table
Requires at least: 4.6
Tested up to: 4.8
Stable tag: 4.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

WooCommerce all products display as a table in one page by shortcode. Fully responsive and mobile friendly. Easily customizable - color,background,title,text color etc.

== Description ==

WooCommerce all products display as a table in one page by shortcode. Fully responsive and mobile friendly. Easily customizable - color,background,title,text color etc.

**Woo Product Table** plugin offers to display your shop product in one page by shortcode as table. 

* Shop page as Table
* Available add to cart in Table

Add the shortcode to any existing post or page:

`[wpt-shop title='All Products' class='' table_class='' product_cat_ids='' product_cat_slugs='' short='asc' min_price='' max_price='']`

**Available Features**

* title: Display Table's Title
* class: Define Table wrapper class. You can set custom class for your Table Wrapper.
* table_class: Define Table class. You can set custom class for your Table.
* short: Only available two shorting. Such: 'asc','desc'
* product_cat_ids: Products Category IDs with comma. Such: '1,2,3,4'
* product_cat_slugs: Products Category SLUGs with comma. Such: 'mobile,computer,shirt,video'
* min_price: To set Minimum price for your Product Query.
* max_price: To set Maximum price for your Product Query.

**[See Demo](http://gist.cf/bootstrap-blank/woo-product-table/)**
Here I have used: `[wpt-shop title='Products List : Price between 1 to 88' class='' table_class='' product_cat_ids='' product_cat_slugs='' short='asc' min_price='1' max_price='88']` Shortcode.
This plugin will help any body to show All product in 1 page as Table. Also able to change/customize. Go to: Dashboard->Product Table . If anybody found any issue, Please inform me to codersaiful@gmail.com.

== Installation ==


1. Upload the plugin files to the `/wp-content/plugins/woo-product-table` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Woo Table->Setting screen to configure the plugin's default setting.


== Frequently Asked Questions ==

= Why Woo Product Table? =

To see your all product as a table in a page by shortcode.

= What is default Shortcode? =

Default Shortcode is [wpt-shop title='All Products' class='' table_class='' product_cat_ids='' product_cat_slugs='' short='asc' min_price='' max_price=''] as well as also able to change. Go to Product Table page.

= How to use? =

Easilly able to add shortcode by button. Go to your Page Editor or Add new page. Click on "Add Product Table" Button. Also able to customize.

= How to show specific Category product =

Use `product_cat_slugs=''` or `product_cat_ids=''`. Support you want to see only 3 category, which slug are 'mobile,table,laptop'.
Just Use Like that: `[wpt-shop product_cat_slugs='mobile,table,laptop']`


== Screenshots ==

`/assets/screenshot-1.jpg`
`/assets/screenshot-2.jpg`
`/assets/screenshot-3.jpg`
`/assets/screenshot-4.jpg`

== Changelog ==

= 1.0 =
* Just Start First version.

= 1.0 =
* Fix issue for no_woocommerce_fact.

