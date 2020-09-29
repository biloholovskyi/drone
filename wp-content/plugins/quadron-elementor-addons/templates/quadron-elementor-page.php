<?php

    /*
    Template name: Quadron Elementor
    */
    get_header();

    // Get the page settings manager
    $quadron_page_settings_model = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' )->get_model( get_the_ID() );

    $quadron_hide_page_header  = $quadron_page_settings_model->get_settings( 'quadron_hide_page_header' );
    $quadron_page_template     = $quadron_page_settings_model->get_settings( 'template' );
    $quadron_page_header_type  = $quadron_page_settings_model->get_settings( 'quadron_page_header_type' );
    $quadron_hide_page_fw      = $quadron_page_settings_model->get_settings( 'quadron_hide_page_footer_widgetize' );
    $quadron_hide_page_footer  = $quadron_page_settings_model->get_settings( 'quadron_hide_page_footer' );
    $quadron_add_page_footer_m = $quadron_page_settings_model->get_settings( 'quadron_add_page_footer_margin' );
    $quadron_show_scroll_down  = $quadron_page_settings_model->get_settings( 'quadron_show_scroll_down' );
    $quadron_scroll_down_text  = $quadron_page_settings_model->get_settings( 'quadron_scroll_down_text' );
    $quadron_scroll_down_link  = $quadron_page_settings_model->get_settings( 'quadron_scroll_down_link' );

    // page header
    if ( 'quadron-elementor-page.php' == $quadron_page_template && 'transparent' == $quadron_page_header_type ) {
        function addTrans(){
            return 'no-indent-mainContent color-scheme01';
        }
        add_filter( 'quadron_header_filter', 'addTrans' );
    }
    if ( 'quadron-elementor-page.php' == $quadron_page_template && 'yes' != $quadron_add_page_footer_m ) {
        function addClassToFooter(){
            return 'no-indent';
        }
        add_filter( 'add_string_to_footer', 'addClassToFooter' );
    }
    if (function_exists('quadron_preloader') ) {
        quadron_preloader();
    }
    if ( 'yes' != $quadron_hide_page_header ) {
        do_action('quadron_before_header');
        // include logo, menu and more contents
        do_action('quadron_header_action');
    }
        // start page main wrapper
        echo'<main id="mainContent">';
            // start page content
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
        echo '</main>';

        if ( '1' == quadron_settings('use_elementor_template_for_footer', '0') ) {

            if ( class_exists( '\Elementor\Frontend' ) && !empty( quadron_settings( 'footer_elementor_templates' ) ) ) {

                $template_id = quadron_settings( 'footer_elementor_templates' );
                $frontend = new \Elementor\Frontend;

                printf( '%1$s', $frontend->get_builder_content( (int)$template_id, true ) );

            } else {

                echo sprintf('<p class="copyright text-center">'.esc_html__('No template exist for footer.', 'betakit').' <a class="main-color" href="%s">'.esc_html__('Add new section template.', 'betakit').'</a></p>', admin_url( 'edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ));
            }

        } else {
            if ( 'yes' != $quadron_hide_page_fw || 'yes' != $quadron_hide_page_footer ) {
                $footer_margin = 'yes' != $quadron_add_page_footer_m ? ' no-indent' : '';
                echo '<footer id="footer" class="footer-bg01'.$footer_margin.'">';
                    // footer widgetize part
                    if ( 'yes' != $quadron_hide_page_fw ) {
                        do_action('quadron_footer_widgetize_action');
                    }
                    // footer main part
                    if ( 'yes' != $quadron_hide_page_footer ){
                        do_action('quadron_copyright_action');
                    }
                echo '</footer>';
            }
        }
        if ( 'yes' != $quadron_hide_page_header ) {
            do_action('quadron_side_menu_action');
        }
        if (function_exists('quadron_backtop') ) {
            quadron_backtop();
        }
        if ( 'yes' == $quadron_show_scroll_down ) {
            echo'<a href="'.esc_html($quadron_scroll_down_link ).'" id="js-scroll-down" class="btn-scroll-down">'.esc_html($quadron_scroll_down_text ).'<i></i></a>';
        }
        wp_footer();

	echo'</body>';
echo'</html>';
