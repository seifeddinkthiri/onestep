<?php

    if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/includes/jetpack.php';
    }

    require_once('wp-bootstrap-navwalker.php'); // require wp-bootstrap-newwalker.php
    include(get_template_directory(). '/includes/widgets.php');

    // add feature image support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support( 'custom-logo', array(
        'height' => 480,
        'width'  => 720,
    ) );

    add_theme_support('title-tag');
    add_theme_support(' customize-selective-refresh-widgets ');
    add_theme_support( 'customize-selective-refresh-widgets' );

	load_theme_textdomain( 'OneStep', get_template_directory() . '/languages' );

	/*
	  ** Add custom style functions
	  ** created by @seif
	  ** wp_enqueue_style()
	*/


    function onestep_styles(){
    	// add bootstrap css file
    	wp_enqueue_style("bootstrap-css", get_template_directory_uri()."/css/bootstrap.min.css");
    	// add fontawesome css file
    	wp_enqueue_style("fontawesome-css", get_template_directory_uri()."/css/fontawesome.min.css" );
    	wp_enqueue_style("fontawesome-all-css", get_template_directory_uri()."/css/all.min.css");
      // add Google Font css file
      wp_enqueue_style("font-css", "https://fonts.googleapis.com/css?family=Pacifico&display=swap");
    	// add the main style
    	wp_enqueue_style("main-css", get_template_directory_uri()."/style.css", ['bootstrap-css', 'font-css']);


    }

    /*
	  ** Add custom script functions
	  ** created by @seif
	  ** wp_enqueue_script()
	*/


    function onestep_scripts(){

        // remove registration for jQuery
    	wp_deregister_script("jquery");
    	// register jquery in footer
    	wp_register_script("jquery", includes_url("/js/jquery/jquery.js"),array(), false, true);
    	 // add bootstrap js file
    	wp_enqueue_script("bootstrap-js", get_template_directory_uri()."/js/bootstrap.min.js",array('jquery') , false, true);
    	// add main js file
    	wp_enqueue_script("main-js", get_template_directory_uri()."/js/main.js", array() , false, true);
    	// add html5shiv script for old browser --like Internet explorer less then 9
    	wp_enqueue_script("html5shiv", get_template_directory_uri()."/js/html5shiv.min.js");
    	// add conditional comment for html5shiv
    	wp_script_add_data("html5shiv","conditional", "lt IE 9");
    	// add respond script for old browser --like Internet explorer less then 9
    	wp_enqueue_script("respond", get_template_directory_uri()."/js/respond.min.js");
    	// add conditional comment for respond
    	wp_script_add_data("respond","conditional", "lt IE 9");
    }


    /*
	*** Add custom menu support
	*** created by @seif
	*** register_nav_menu()
	*/

	function onestep_menu(){
		register_nav_menus(array(
	                "Main menu" => esc_html__( 'Primary', 'OneStep' ),
	                //"Footer menu" => "Nvaigation bar in footer"
                )); // registration navigation menu
	}

	function onestep_nav_menu(){
		wp_nav_menu(array(
			'theme_location' => 'Main menu',
			'menu_class' => 'nav navbar-nav ',
			'container' => false ,
			'depth' => 2,
			'walker' => new WP_Bootstrap_Navwalker()

		)); // output nav menu
	}


  /**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function OneStep_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform form-inline ml-auto" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text " for="s">' . __( '' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control mr-sm-2 search-input" placeholder="'. __("Search" , "OneStep") .' "/>
    <input type="submit" class="btn btn-outline-success search-btn my-2 my-sm-0" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'OneStep_my_search_form' );

    /*
    ** add filter
    ** custom excerpt length, custom excerpt more
    */

    // method 1

    function custom_excerpt_length($length){
        return 20;
    }

    function custom_excerpt_more($length){
        return '...';
    }

    add_filter('excerpt_length','custom_excerpt_length');
    add_filter( 'excerpt_more', 'custom_excerpt_more' );

    // method 2

    function get_excerpt($display){
        $excerpt = get_the_content();
        $excerpt = preg_replace(" ([.*?])",'',$excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, 115);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
        $excerpt = $excerpt.'... <a href="'.get_the_permalink().'">' . esc_html__('more', 'OneStep') .'</a>';
        if ($display){
          echo $excerpt;
        }else{
          return $excerpt;}
    }


    /*
    ** add filter
    ** the_title
    */

  /*  function onestep_title_filter($title, $id){
      if (is_front_page() {
        $title = '<a href='. get_the_permalink( $id ) .'>'. $title . '</a>' ;
      }
      return $title ;
    }

    add_filter( 'the_title', 'onestep_title_filter',10, 2 );*/


	/*
	*** Add action
	*** created by @seif
	*** add_action()
	*/

      add_action("wp_enqueue_scripts", "onestep_styles"); // add action for styles
      add_action("wp_enqueue_scripts", "onestep_scripts"); // add action for scripts
      add_action("init","onestep_menu"); // add action for menu


      /*
      *** Add nambering pagination
      ***
      */

     function numbering_pagination(){
        global $wp_query;

        $all_pages = $wp_query->$max_num_pages;

        $current_page = max(1,get_query_var('paged'));

        if ($all_pages > 1){
           return paginate_links(array(

                'base'   => get_pagenum_link() . '%_%',
                'format' => 'page/%#%',
                'current'=>$current_page

            ));
        }
      }

      function main_sidebar(){
        register_sidebar(array(
            'name'             => 'Main sidebar',
            'id'               => 'main-sidebar',
            'description'      => 'The main sidebar',
            'class'            => 'main-sidebar',
            'before_widget'    => '<div class="widget-content">',
            'after_widget'     => '</div>',
            'before_title'     => '<h3 class="widget-title">',
            'after_title'      => '</h3>'
        ));
      }

      add_action('widgets_init','main_sidebar');



      /*
      ** Customize apperance option
      */

      function OneStep_customize_color_register($wp_customize){
        $wp_customize->add_setting('sb_prime_color', [
          'default'    => '#9b870c',
          'transport'  => 'refresh',
        ]);

        $wp_customize->add_setting('sb_header_color', [
          'default'    => '#1b1b1b',
          'transport'  => 'refresh',
        ]);

        $wp_customize->add_section('sb_standard_colors', [
          'title' => __('Standard colors', 'OneStep'),
          'priority' => '30',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sb_prime_color', [
          'label' => 'Prime Color',
          'settings' => 'sb_prime_color',
          'section' => 'sb_standard_colors',
          ] ));

          $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sb_header_color', [
            'label' => 'Header Color',
            'settings' => 'sb_header_color',
            'section' => 'sb_standard_colors',
            ] ));




      }

      add_action( 'customize_register', 'OneStep_customize_color_register' );


            /*
            ** Customize advertisement option
            */

            function OneStep_customize_advertisement_register($wp_customize){


              $wp_customize->add_section('os_advertisement', [
                  'title' => __(' Advertisement', 'OneStep'),
                  'priority' => '90',
              ]);



            }

            add_action( 'customize_register', 'OneStep_customize_advertisement_register' );

      /*
       ** output customize CSS
      */

      function OneStep_customize_css()
      {
        ?>
         <style type="text/css">
           .navbar{
             border-top: 2px solid <?php echo get_theme_mod( 'sb_prime_color' ) ?>!important
           }

           a, footer, .navbar-dark .navbar-nav .menu-item .nav-link, .navbar-dark .navbar-brand, .navbar .toggler-icon{
             color: <?php echo get_theme_mod( 'sb_prime_color' ) ?> ;
           }

           a:hover{
             color: <?php echo get_theme_mod( 'sb_prime_color' ) ?> ;
           }

           .categorie, .submit ,
           .home-page .home-pagination .pagination .nav-links a:hover,
           .home-page .home-pagination .pagination .nav-links .current,
           .calendar_wrap table th
            {
             background-color: <?php echo get_theme_mod( 'sb_prime_color' ) ?>!important
            }

           .navbar .form-inline .search-btn {
                color: <?php echo get_theme_mod( 'sb_prime_color' ) ?>!important ;
                border: 1px solid <?php echo get_theme_mod( 'sb_prime_color' ) ?>!important ;
            }

            .comments-list .reply a , .navbar .form-inline .search-btn:hover{
            	border: 1px solid <?php echo get_theme_mod( 'sb_prime_color' ) ?>!important;

            }

            .navbar .form-inline .search-btn:hover{background-color: <?php echo get_theme_mod( 'sb_prime_color' ) ?>!important;}

            .header-ads{
              background-color: <?php echo get_theme_mod( 'sb_header_color' ) ?>!important;
            }

            .block-head, blockquote{
              border-right-color: <?php echo get_theme_mod('sb_prime_color' ) ?>;
            }


         </style>
        <?php
      }

      add_action( 'wp_head','OneStep_customize_css' );

      // ---------------

  /*    function onestep_admin_styles(){
        global $post ;

        if ( ! $post ){
          return ;
        }

        if ($post->post_status === 'draft'){
        wp_enqueue_style( 'onestep_admin-css', get_template_directory_uri(). '/css/admin.css', [], false, 'all' );}

      }

      add_action( 'admin_enqueue_scripts', 'onestep_admin_styles'); */

  /*  function onestep_add_text_in_footer(){
        echo "This is a Text in th footer";
      }

      add_action( 'OneStep_down_page', 'onestep_add_text_in_footer' ); */
