<?php 

    // Include NavWalker Class For Bootstrap Navigation Menu
    require_once('wp-bootstrap-navwalker.php');

    // Add Feature Image Support
    add_theme_support('post-thumbnails');




    /*
    - Function To Add My Custom Styles
    - Added By Ahmed Massoud
    - Date 03/01/2021
    - wp_enqueue_style()
    */

    function dembo_add_styles() {

        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
        wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');

    };

    /*
    - Function To Add My Custom Scripts
    - Added By Ahmed Massoud
    - Date 03/01/2021
    - wp_enqueue_script()
    */

    function dembo_add_scripts() {

        wp_deregister_script('jquery'); // Remove Registration For Old jQuery
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, '', true); // Register A New jQuery In Footer
        wp_enqueue_script('jquery');  // Enqueue The New jQuery
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true); //Add BootStrap Script File
        wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), false, true); // Add Main File Script

    };



    /*
    - Add Custom Menu Support
    - Added By Ahmed Massoud
    - Date 03/01/2021
    */

    function dembo_register_custom_menu() {

        register_nav_menus(array(

            'bootstrap-menu' => 'Navigation Bar',
            'footer-menu' => 'Footer Menu'

        ));

    };


    /*
    - Customize The Excerpt Word Length
    -Add By Ahmed Massoud
    - Date 12/01/2021
    */

    function dembo_extend_excerpt_length($length) {

        if (is_author()) {
            return 30;
        } else if (is_category()) {
            return 20;
        }else {
            return 80;
        };

    };


    function dembo_excerpt_change_dots($more) {
        return '  ....';
    };


    add_filter('excerpt_length', 'dembo_extend_excerpt_length');
    add_filter('excerpt_more', 'dembo_excerpt_change_dots');



    function dembo_bootstrap_menu() {
        wp_nav_menu(array(

            'theme_location'    => 'bootstrap-menu',
            'menu_class'        => 'navbar-nav custom-mr-auto',
            'container'         => 'false',
            'depth'             => '2',
            'walker'            => new wp_bootstrap_navwalker()
            
        ));
    }



        /*
    - Add Actions
    - Added By Ahmed Massoud
    - Date 03/01/2021
    - add_action()
    */

    //  Add Css Styles
    add_action('wp_enqueue_scripts', 'dembo_add_styles');
    //  Add Js Scripts
    add_action('wp_enqueue_scripts', 'dembo_add_scripts');
    //  Register Custom Menus
    add_action('init', 'dembo_register_custom_menu');
    // Add Action Main Sidebar
    add_action('widgets_init', 'dembo_main_sidebar');


    //  Numbering Pagination

    function numbering_pagination() {

        global $wp_query;   // Make WP_Query Global

        $all_pages = $wp_query->max_num_pages;  // Get All Posts In The Page

        $current_page = max(1, get_query_var('paged'));    // Get Current Page

        if ($all_pages > 1) {    // Check If Total Pages > 1

            return paginate_links(array(

                'base'      =>  get_pagenum_link() . '%_%',
                'format'    =>  '?paged=%#%',
                'current'   =>  $current_page,
                'mid_size'  =>  1,
                'end_size'  =>  1,
                'prev_text' =>  '«',
                'next_text' =>  '»',
            ));

        }

    };


        //  Register Sidebar

        function dembo_main_sidebar() {

            //  Register Main Sidebar
            
            register_sidebar(array(
                'name'          => 'Main Sidebar',
                'id'            => 'main-sidebar',
                'description'   => 'Any Talking And Description About Sidebar',
                'class'         => 'main-sidebar',
                'before_widget' => '<div class="widget-content">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after-title'   => '</h3>'
            ));

        }


                




