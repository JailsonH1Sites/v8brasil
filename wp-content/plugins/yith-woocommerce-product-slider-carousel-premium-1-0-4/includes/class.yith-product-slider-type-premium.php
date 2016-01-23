<?php
if( !defined( 'ABSPATH' ) )
    exit;

if( !class_exists( 'YITH_Product_Slider_Type_Premium') ){

    class YITH_Product_Slider_Type_Premium extends  YITH_Product_Slider_Type{


        public function __construct()
        {
            parent::__construct();

            add_action( 'admin_init', array( $this, 'add_tab_metabox'), 1 );
            add_filter( 'manage_edit-' . $this->_post_type_name . '_columns', array( $this, 'edit_columns' ) );
            add_action( 'manage_' . $this->_post_type_name . '_posts_custom_column', array( $this, 'custom_columns' ), 10, 2 );
            //Custom Tab Message
            add_filter( 'post_updated_messages', array($this, 'custom_tab_messages' ) );
            //register metabox to tab manager
            add_filter( 'yit_fw_metaboxes_type_args', array($this, 'add_custom_product_slider_metaboxes' ) );
        }

        public static function get_instance()
        {
            if (is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * add_tab_metabox
         * Register metabox for product sldier
         * @author Yithemes
         * @since 1.0.0
         */
        public function  add_tab_metabox() {
            $args	=	include_once( YWCPS_INC . '/metaboxes/product_slider-metabox.php');

            if (!function_exists( 'YIT_Metabox' ) ) {
                require_once( 'plugin-fw/yit-plugin.php' );
            }
            $metabox    =   YIT_Metabox('yit-product-slider-setting');
            $metabox->init($args);

        }

        /** Edit Columns Table
         * @param $columns
         * @return mixed
         */
        function edit_columns( $columns ) {

            $columns = apply_filters('yith_add_column_prod_slider', array(
                    'cb' => '<input type="checkbox" />',
                    'title' => __('Title', 'ywcps'),
                    'shortcode' => __('Shortcode', 'ywcps'),
                    'date' => __('Date', 'ywcps'),
                )
            ) ;

            return $columns;
        }

        /**
         * Print the content columns
         * @param $column
         * @param $post_id
         */
        public function custom_columns( $column, $post_id ) {

            switch( $column ) {
                case 'shortcode' :
                    echo '[yith_wc_productslider id='.$post_id.']';
                    break;
            }
        }

        public function add_custom_product_slider_metaboxes( $args ){
            if( 'custom_checkbox' == $args['type'] ){
                $args['basename']   = YWCPS_DIR;
                $args['path']       = 'metaboxes/types/';
            }

            if( 'select-group'== $args['type'] ){
                $args['basename']   = YWCPS_DIR;
                $args['path']       = 'metaboxes/types/';
            }

            if( 'ajax-category'== $args['type'] ){
                $args['basename']   = YWCPS_DIR;
                $args['path']       = 'metaboxes/types/';
            }

            return $args;
        }

        /**
         * Customize the messages for Sliders
         * @param $messages
         * @author Yithemes
         *
         * @return array
         * @fire post_updated_messages filter
         */
        public function custom_tab_messages ( $messages ) {

            $singular_name  =   $this->get_tab_taxonomy_label('singular_name');
            $messages[$this->_post_type_name] =   array (

                0    =>  '',
                1    =>  __($singular_name.' updated','ywcps'),
                2    =>  __('Custom field updated', 'ywcps'),
                3    =>  __('Custom field deleted', 'ywcps'),
                4    =>  __($singular_name.' updated', 'ywcps'),
                5    =>  isset( $_GET['revision'] ) ? sprintf( __( 'Slider restored to version %s', 'ywcps' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
                6    =>  __($singular_name.' published', 'ywcps'),
                7    =>  __($singular_name.' saved', 'ywcps'),
                8    =>  __($singular_name.' submitted', 'ywcps'),
                9    =>  __($singular_name.' ', 'ywcps'),
                10   =>  __($singular_name.' draft updated', 'ywcps')
            );


            return $messages;
        }
    }
}