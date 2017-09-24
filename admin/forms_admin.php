<?php

/**
 * WPT FAQ Page Function
 * Added Description, Available Attribute List
 */
function wpt_faq_page() {
    ?>
    <div class="wrap">
        <h1>Welcome to <span style="color: #04b0db;">WOO Product Table</span></h1>
        <div class="card">
            <h2 class="title">Shortcode</h2>
            <p><input value="[wpt-shop title='All Products' class='' table_class='' product_cat_ids='' product_cat_slugs='' short='asc' min_price='' max_price='']" class="regular-text code" type="text" readonly="readonly"></p>
            <p><code>[wpt-shop title='All Products' class='' table_class='' product_cat_ids='' product_cat_slugs='' short='asc' min_price='' max_price='']</code></p>
        </div>
        <div class="card">
            <h2 class="title">Description</h2>
            <p>WooCommerce all products display as a table in one page by shortcode. Fully responsive and mobile friendly. Easily customizable - color,background,title,text color etc.</p>
        </div>
        <div class="card">
            <h2 class="title">Available Attribute</h2>
            <p>
                There are few attribute available to this plugin.Such:
            <ul>
                <li><code>title</code>: Display Table's Title</li>
                <li><code>class</code>: Define Table wrapper class. You can set custom class for your Table Wrapper.</li>
                <li><code>table_class</code>: Define Table class. You can set custom class for your Table.</li>
                <li><code>short</code>: Only available two shorting. Such: 'asc','desc'</li>
                <li><code>product_cat_ids</code>: Products Category IDs with comma. Such: '1,2,3,4'</li>
                <li><code>product_cat_slugs</code>: Products Category SLUGs with comma. Such: 'mobile,computer,shirt,video'</li>
                <li><code>min_price</code>: To set Minimum price for your Product Query.</li>
                <li><code>max_price</code>: To set Maximum price for your Product Query.</li>
            </ul>
            </p>
        </div>
        
        <div class="card">
            <h2 class="title">How to use?</h2>
            <p>Easilly able to add shortcode by button. Go to your Page Editor or Add new page. Click on "Add Product Table" Button. See Screenshot bellow:</p>
            <p>
                <img src="<?php echo WPT_BASE_URL; ?>images/tutorial.jpg">
            </p>
        </div>
    </div>


    <?php
}
