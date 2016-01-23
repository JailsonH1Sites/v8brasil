<?php
if( !defined( 'ABSPATH' ) ){
    exit;
}
$animations =   ywcps_animations_list();

$args   =   array(
    'label'    => __( 'Product Slider', 'ywcps' ),
    'pages'    => 'yith_wcps_type', //or array( 'post-type1', 'post-type2')
    'context'  => 'normal', //('normal', 'advanced', or 'side')
    'priority' => 'default',
    'tabs'     => array(
        'settings' => array(
            'label'  => __( 'Settings', 'ywcps' ),
            'fields' => array(

                    'ywcps_categories' => array(
                        'label' =>  __('Choose Product Category','ywcps'),
                        'desc'  =>  __('Choose product categories. Leave this field empty if you want all categories to be shown in the slider','ywcps'),
                        'type'  =>  'ajax-category',
                        'placeholder'   => __('Choose product categories', 'ywcps'),
                        'multiple' => true,

                    ),

                    'ywcps_product_type'    =>  array(
                        'label' =>  __('Products to show', 'ywcps'),
                        'desc'  =>  __('Select products to show in the slider: "On Sale", "Best Sellers" etc. or select them manually.', 'ywcps'),
                        'type'  =>  'select',
                        'options'   =>  array(
                                'on_sale'       =>  __('On Sale', 'ywcps'),
                                'best_seller'   =>  __('Best Sellers', 'ywcps'),
                                'free'          =>  __('Free', 'ywcps'),
                                'last_ins'      =>  __('Last Added', 'ywcps'),
                                'featured'      =>  __('Featured', 'ywcps'),
                                'custom_select'   =>  __('Select your product', 'ywcps')
                                )
                        ),

                    'ywcps_products'	=>	array(
                        'label' =>  __('Choose Product','ywcps'),
                        'desc'  =>  __('Choose the Products that you want to show in the slider. Leave this field empty if you want all categories to be shown in the slider','ywcps'),
                        'type'  =>  'ajax-products',
                        'multiple' => true,
                        'std'      =>   array(),
                        'options'   => array(),
                        'id' => 'ajax_ywcps_slider_product',
                        'deps'     => array(
                            'ids'    => '_ywcps_product_type',
                            'values' => 'custom_select',
                        ),
                    ),

                    'ywcps_sep_1'   => array( 'type'=> 'sep' ),

                    'ywcps_title_content_setting'   =>  array( 'type'=>'title', 'desc'=> __('Content Settings', 'ywcps') ),

                    'ywcps_layout_type' =>  array(
                        'label' =>  __('Slider Template', 'ywcps'),
                        'desc'  =>  __('Choose a template for your Product Slider', 'ywcps'),
                        'type'  =>  'select',
                        'options'    =>  array(
                            'default'   =>  'WooCommerce Loop',
                            'tmp1'      =>  'Style 1',
                            'tmp2'      =>  'Style 2',
                            'tmp3'      =>  'Style 3'
                            ),
                        'std' =>    'default'
                    ),

                'ywcp_show_title'   =>  array(
                  'label'   =>  __('Show Title', 'ywcps'),
                   'desc'   =>  __('Show or Hide Product Slider title', 'ywcps'),
                    'type'  =>  'checkbox',
                    'std'   =>  1,
                    'default'   =>  1
                ),

                    'ywcps_hide_add_to_cart'    =>  array(
                        'label' =>  __('Hide "Add to cart"', 'ywcps'),
                        'desc'  =>  __('Hide "Add to cart" in slider', 'ywcps'),
                        'type'  =>  'checkbox',
                        'std'   => 0,
                        'default'   =>  0
                    ),

                    'ywcps_hide_price'    =>  array(
                        'label' =>  __('Hide price', 'ywcps'),
                        'desc'  =>  __('Hide product price in slider', 'ywcps'),
                        'type'  =>  'checkbox',
                        'std'   => 0,
                        'default'   =>  0
                    ),

                    'ywcps_image_per_row'   => array(
                        'label' =>  __('Images for row', 'ywcps'),
                        'desc'  =>  '',
                        'type'  =>  'number',
                        'std'   =>  1,
                        'min'   =>  1,
                        'max'   =>  6
                        ),

                    'ywcps_order_by'    =>  array(
                        'label'     =>  __('Order By', 'ywcps'),
                        'type'      =>  'select',
                        'desc'  =>  '',
                        'options'   =>  array(
                            'name'      =>  __('Name', 'ywcps'),
                            'price'     =>  __('Price', 'ywcps'),
                            'date'  =>  __('Date', 'ywcps')
                        ),
                        'deps'     => array(
                            'ids'    => '_ywcps_product_type',
                            'values' => 'on_sale,free,custom_select,featured',
                        ),
                    ),

                    'ywcps_order_type'   => array(
                        'label' =>  __('Order Type', 'ywcps'),
                        'type'  =>  'select',
                        'desc'  =>  '',
                        'options'   =>  array(
                            'asc'   =>  'ASC',
                            'desc'  =>  'DESC'
                        ),
                        'deps'     => array(
                            'ids'    => '_ywcps_product_type',
                            'values' => 'on_sale,free,custom_select,featured',
                        ),
                    ),
                    'ywcps_sep_2'   => array( 'type'=> 'sep' ),

                    'ywcps_title_slider_setting'   =>  array( 'type'=>'title', 'desc'=> __('Slider Settings', 'ywcps') ),


                    'ywcps_check_loop' =>  array(
                        'label' =>  __('Loop slider', 'ywcps'),
                        'desc'  =>  __('Choose if you want your slider to scroll products continuously', 'ywcps'),
                        'type'  =>  'checkbox',
                        'std'   =>  0,
                        'default'   =>  0
                     ),

                    'ywcps_pagination_speed' =>  array(
                        'label' =>  __('Pagination Speed', 'ywcps'),
                        'desc'  =>  __('Pagination speed in milliseconds', 'ywcps'),
                        'type'  =>  'text',
                        'std'   =>  '800',
                        'default'   =>  '800'
                    ),


                    'ywcps_auto_play' =>  array(
                        'label' =>  __('AutoPlay', 'ywcps'),
                        'desc'  =>  __('Insert the autoplay value in milliseconds, enter 0 to disable it', 'ywcps'),
                        'type'  =>  'text',
                        'std'   =>  '5000',
                        'default'   =>  '5000'
                    ),

                    'ywcps_stop_hover'  =>  array(
                        'label' =>  __('Stop on Hover', 'ywcps'),
                        'desc'  =>  __('Stop autoplay on mouse hover', 'ywcps'),
                        'type'  =>  'checkbox',
                        'std'   => 0,
                        'default'   => 0
                    ),

                    'ywcps_show_navigation'  =>  array(
                        'label' =>  __('Show Navigation', 'ywcps'),
                        'desc'  =>  __('Display "prev" and "next" button', 'ywcps'),
                        'type'  =>  'checkbox',
                        'std'   => 0,
                        'default'   => 0
                    ),

                    'ywcps_show_dot_navigation' =>  array(
                        'label' =>  __('Show Dots Navigation' ,'ywcps'),
                        'desc'  =>  __('Show or Hide dots navigation', 'ywcps'),
                        'type'  =>  'checkbox',
                        'std'   =>  0,
                        'default'   => 0
                    ),

                    'ywcps_animate_in'  =>  array(
                        'label' =>  __('Animation IN', 'ywcps'),
                        'desc'  =>  __('Choose entrance animation for a new slide.<br>*Animation functions work only if there is just one item in the slider and only in browsers that support perspective property', 'ywcps'),
                        'type'  =>  'select-group',
                        'options'   =>  $animations
                    ),
                    'ywcps_animate_out'  =>  array(
                        'label' =>  __('Animation OUT', 'ywcps'),
                        'desc'  =>  __('Choose exit animation for a slide.<br>*Animation functions work only if there is just one item in the slider and only in browsers that support perspective property', 'ywcps'),
                        'type'  =>  'select-group',
                        'options'   =>  $animations
                    ),

                    'ywcps_animation_speed' =>  array(
                        'label' =>  __('Animation Speed', 'ywcps'),
                        'desc'  =>  __('Enter animation duration in milliseconds', 'ywcps'),
                        'type'  =>  'text',
                        'std'   =>  450,
                        'default'   => 450
                    )
            ),
        ),
    ),
);

return apply_filters( 'yith_product_slider_metabox', $args );