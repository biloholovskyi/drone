<?php


/**
 * Custom template parts for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package quadron
*/

if ( ! function_exists( 'quadron_footer' ) ) {
	function quadron_footer() {

        $type = quadron_settings( 'footer_type', 'default' );
		$sidebar = is_active_sidebar('footer-widget-area') ? '' : 'footer-is-null';
		$footer_string = '';
		$footer_string = apply_filters( 'add_string_to_footer', $footer_string );
		$footer_class  = [
			'footer-bg01',
			$footer_string
		];

        if ( '1' == quadron_settings('use_elementor_template_for_footer', '0') ) {

            if ( class_exists( '\Elementor\Frontend' ) && !empty( quadron_settings( 'footer_elementor_templates' ) ) ) {

                $template_id = quadron_settings( 'footer_elementor_templates' );
                $frontend = new \Elementor\Frontend;

                printf( '%1$s', $frontend->get_builder_content( (int)$template_id, false ) );

            } else {

                echo sprintf('<p class="copyright text-center">'.esc_html__('No template exist for footer.', 'quadron').' <a class="main-color" href="%s">'.esc_html__('Add new section template.', 'quadron').'</a></p>', admin_url( 'edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ));
            }

        } else {

            echo '<footer id="footer" class="'.esc_attr(implode(' ',$footer_class)). $sidebar .'">';
                do_action( 'quadron_footer_widgetize_action' );
                do_action( 'quadron_copyright_action' );
            echo '</footer>';
        }
    }
}


/*************************************************
##  WIDGETIZE FOOTER
*************************************************/

if ( ! function_exists( 'quadron_footer_widgetize' ) ) {
	function quadron_footer_widgetize() {

		if ('0' != quadron_settings('footer_widgetize_visibility', '0')) {

			echo '<div id="nt-footer" class="footer-col nt-footer-sidebar">
				<div class="container">
					<div class="list-col">
						<div class="row justify-content-md-center">';

							if (is_active_sidebar('footer-widget-area')) {
								dynamic_sidebar('footer-widget-area');
							}
							if (is_active_sidebar('footer-widget-area-two')) {
								dynamic_sidebar('footer-widget-area-two');
							}
							if (is_active_sidebar('footer-widget-area-three')) {
								dynamic_sidebar('footer-widget-area-three');
							}
							if (is_active_sidebar('footer-widget-area-four')) {
								dynamic_sidebar('footer-widget-area-four');
							}

					echo '</div>
					</div>
				</div>
			</div>';
		}
	}
}
add_action( 'quadron_footer_widgetize_action',  'quadron_footer_widgetize', 10 );



/*************************************************
##  FOOTER COPYRIGHT
*************************************************/

if ( ! function_exists( 'quadron_copyright' ) ) {
    function quadron_copyright() {

	    if ( '0' != quadron_settings('footer_copyright_visibility','1') ) {

    		if ( 'custom' == quadron_settings('footer_type') ) {

    		// custom footer allowed html
    		echo quadron_settings('custom_footer');

    		} else {

    			echo'<div class="footer-custom">
    					<div class="container">
    						<div class="row align-items-center">
    							<div class="col-md-4">
    								<div class="copyright">';
    								if ( '' != quadron_settings( 'footer_copyright' ) ) {
    									echo wp_kses( quadron_settings( 'footer_copyright' ), quadron_allowed_html() );
    								 } else {
    									echo sprintf('<i class="fa fa-copyright"></i> %s Quadron.'.esc_html__(' All rights reserved by ', 'quadron').'<a class="__dev" href="https://ninetheme.com/contact/" target="_blank">'.esc_html__(' Ninetheme.', 'quadron').'</a>', date('Y'));
    								}
    								echo'</div>
    							</div>';
    							if ( has_nav_menu('footer_menu_1') ) {
    								echo'<div class="col-sm-12 col-md-auto ml-md-auto">
    									<div class="footer-menu">
    										<nav>
    											<ul>';
    												// default wp menu
    												wp_nav_menu(
    													array(
    														'theme_location' => 'footer_menu_1',
    														'container' => '', // menu wrapper element
    														'container_class' => '',
    														'container_id' => '', // default: none
    														'menu_class' => '', // ul class
    														'menu_id' => '', // ul id
    														'items_wrap' => '%3$s',
    														'before' => '', // before <a>
    														'after' => '', // after <a>
    														'link_before' => '', // inside <a>, before text
    														'link_after' => '', // inside <a>, after text
    														'depth' => 1, // '0' to display all depths
    														'echo' => true,
    														'fallback_cb' => 'Quadron_Wp_Bootstrap_Navwalker::fallback',
    														'walker' => new Quadron_Wp_Bootstrap_Navwalker()
    													)
    												);
    											echo'</ul>
    										</nav>
    									</div>
    								</div>';
    							}

    						echo'</div>
    					</div>
    				</div>';
                }
        }
    }
}
add_action( 'quadron_copyright_action',  'quadron_copyright', 10 );
