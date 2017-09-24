<?php
add_shortcode('wpt-shop', 'wpt_shortcode_generator');

/**
 * Shortcode Generator for WPT Plugin
 * 
 * @param array $atts
 * @return string
 * 
 * @since 1.0
 */
function wpt_shortcode_generator($atts) {
    /**
     * Set Variable $html to return
     * 
     * @since 1.1
     */
    $html = '';
    $pairs = array('exclude'=>false);
    extract(shortcode_atts($pairs, $atts));
    
    $wpt_table_wrapper_class = ( isset( $atts['class'] ) && !empty( $atts['class'] ) ? $atts['class'] : 'wpt_product_table_wrapper' );
    $wpt_table_title = ( isset( $atts['title'] ) && !empty( $atts['title'] ) ? $atts['title'] : false );
    $wpt_table_class = ( isset( $atts['table_class'] ) && !empty( $atts['table_class'] ) ? $atts['table_class'] : 'wpt_product_table' );
    $wpt_product_short = ( isset( $atts['short'] ) && !empty( $atts['short'] ) && in_array( $pairs, array('asc','desc') ) ? $atts['short'] : 'asc' );
    $product_cat_ids = ( isset( $atts['product_cat_ids'] ) && !empty( $atts['product_cat_ids'] ) ? $atts['product_cat_ids'] : false );
    $product_cat_slugs = ( isset( $atts['product_cat_slugs'] ) && !empty( $atts['product_cat_slugs'] ) ? $atts['product_cat_slugs'] : false );
    $product_min_price = ( isset( $atts['min_price'] ) && !empty( $atts['min_price'] ) ? $atts['min_price'] : false );
    $product_max_price = ( isset( $atts['max_price'] ) && !empty( $atts['max_price'] ) ? $atts['max_price'] : false );
    
    /**
     * Explode $product_cat_ids as Array
     */
    if( $product_cat_ids ){
        $product_cat_ids = explode(',', $product_cat_ids);
    }else{
        $product_cat_ids = false;
    }
    
    /**
     * Array Define for Table Head
     * Define Table First Head Imean Column Row
     * Table Head 
     * 
     * @since 1.0
     */
    $wpt_table_head = array(
        'serial_number'     =>  __( 'Serial Number','woo-product-table' ),
        'product_title'     =>  __( 'Product Name','woo-product-table' ),
        'price'             =>  __( 'Price','woo-product-table' ),
        'quantity'          =>  __( 'Qty','woo-product-table' ),
        'action'            =>  __( 'Action','woo-product-table' ),
    );
    
    /**
     * Args
     */
    $args = array(
        'posts_per_page' => -1,
        'post_type' => array('product', 'product_variation'),
        'orderby'   => 'name',
        'order' => $wpt_product_short,
        'meta_query' => array(
            array(  //For Available product online
                'key' => '_stock_status',
                'value' => 'instock'
            )
        ),
    );
    
    /**
     * Set Minimum Price for
     */
    if( $product_min_price ){
        $args['meta_query'][] = array(
                'key' => '_price',
                'value' => $product_min_price,
                'compare' => '>',
                'type' => 'NUMERIC'
            );
    }
    
    /**
     * Set Maximum Price for
     */
    if( $product_max_price ){
        $args['meta_query'][] = array(
                'key' => '_price',
                'value' => $product_max_price,
                'compare' => '<',
                'type' => 'NUMERIC'
            );
    }
    
    /**
     * Args Set for tax_query if available $product_cat_ids
     * 
     * @since 1.0
     */
    if( $product_cat_ids ){
    $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $product_cat_ids,
            )
        );
    }
    
    
    /**
     * Args Set for tax_query if available $product_cat_ids
     * 
     * @since 1.0
     */
    if( $product_cat_slugs ){
    $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $product_cat_slugs,
            )
        );
    }
    
    $html .= "<div class='$wpt_table_wrapper_class'>"; //Table Wrapper Div start here with class.
    
    /**
     * Table Title, If only included title attribute in our Shortcode
     * 
     * @since 1.0
     */
    if( $wpt_table_title ){
        $html .= '<h1 class="wpt_table_title">' . $wpt_table_title . '</h1>';
    }
    $html .= "<table class='$wpt_table_class'>"; //Table Tag start here.
    
    $html .= '<tr class="wpt_table_header_row wpt_table_head">'; //Table head Start.
    
    /**
     * Table collumn permitted column Array
     * 
     * @since 1.0
     */
    $wpt_table_permitted_collumn = false;
    
    /**
     * Execute Table Head from Array $wpt_table_head
     * Execution by Foreach statement
     * 
     * @since 1.0
     */
    foreach( $wpt_table_head as $key=>$value ){
        /**
         * Define Permission for Table collumn
         */
        $wpt_table_permitted_collumn[$key] = true;
        
        $html .= "<th class='$key'>"; //Table heads Each data start here.
        $html .= $value;
        $html .= "</th>"; //Table heads Each data End here.
    }
    $html .= '</tr>'; //Table head end here.
    
    $product_loop = new WP_Query( $args ); 
    
    $wpt_table_row_serial = 1; //For giving class id for each Row as well
    if( $product_loop->have_posts() ) : while( $product_loop->have_posts() ): $product_loop->the_post();
        /**
         * Product Opject Define for get Important infomation for Each Product
         * 
         * @since 1.1
         */
         $wpt_product = wc_get_product( get_the_ID() );
    
        /**
         * Table Row and
         * And Table Data filed here will display
         * Based on Query
         */
    
         $html .= "<tr id='product_id_" . get_the_ID() . "' class='wpt_row wpt_row_serial_$wpt_table_row_serial wpt_row_product_id_" . get_the_ID() . "'>"; //Starting Table row here.
         
            /**
             * Define Serial Number for Each Row
             * 
             * @since 1.0
             */
            if( $wpt_table_permitted_collumn['serial_number'] ){
                $html .= "<td class='wpt_serial_number'> $wpt_table_row_serial </td>";
            }
            
            /**
             * Product Title Display with Condition
             */
            if( $wpt_table_permitted_collumn['product_title'] ){
                $html .= "<td class='wpt_product_title'>";
                $html .= "<a href='" . esc_url( get_the_permalink() ) . "'>" . get_the_title() . "</a>";
                $html .= "</td>";
            }
            
            /**
             * Display Price
             */
            if( $wpt_table_permitted_collumn['price'] ){
                $html .= "<td class='wpt_price'  id='price_value_id_" . get_the_ID() . "'> " ;
                    $html .= '<span class="wpt_product_price">';
                    $html .= $wpt_product->get_price_html(); //Here was woocommerce_template_loop_price() at version 1.0
                    $html .= '</span>';
                $html .= " </td>";
            }
            
            /**
             * Display Quantity for WooCommerce Product Loop
             */
            if( $wpt_table_permitted_collumn['quantity'] ){
                $html .= "<td class='wpt_quantity' target_id='" . get_the_ID() . "'> " ;  
                    $html .= woocommerce_quantity_input(false,false,false); //Here was only woocommerce_quantity_input() at version 1.0
                $html .= " </td>";
            }
            
            /**
             * Display Add-To-Cart Button
             */
            if( $wpt_table_permitted_collumn['action'] ){
                $html .= "<td class='wpt_action' parent_id='" . get_the_ID() . "'> " ;  
                    $html .= '<span class="wpt_product_price">';
                    $html .= sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
                            esc_url( $wpt_product->add_to_cart_url() ),
                            esc_attr( 1 ),
                            esc_attr( $wpt_product->get_id() ),
                            esc_attr( $wpt_product->get_sku() ),
                            esc_attr( 'button product_type_simple add_to_cart_button ajax_add_to_cart' ),
                            esc_html( $wpt_product->add_to_cart_text() )
                    );
                    //woocommerce_template_loop_add_to_cart();
                    $html .= '</span>';
                $html .= " </td>";
            }
            
        $html .= "</tr>"; //End of Table row
        
        $wpt_table_row_serial++; //Increasing Serial Number.
        
    endwhile; wp_reset_query();
    else: 
        $html .= 'Product Not found';
    endif;
    $html .= "</table>"; //Table tag end here.
    $html .= "</div>"; //End of Table wrapper.
    
$html .= <<<EOF
<script>
    (function($) {
        $(document).ready(function() {
            $('.wpt_quantity input.input-text.qty.text').change(function() {
                var target_Val = $(this).val();
                var target_product_id = $(this).parent().parent().attr('target_id');
                var target_row_id = '#product_id_' + target_product_id;
                $(target_row_id + ' a.add_to_cart_button').attr('data-quantity', target_Val);
            });
        });
    })(jQuery);
</script>
EOF;

return $html;

}
