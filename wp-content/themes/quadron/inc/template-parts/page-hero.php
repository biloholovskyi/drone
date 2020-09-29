<?php

/*************************************************
## HERO FUNCTION
*************************************************/

if (! function_exists('quadron_hero_section')) {
    function quadron_hero_section()
    {
        $h_s = get_bloginfo('name');
        if (is_404()) { // error page
            $name = 'error';
            $h_t = esc_html__('404 - Not Found', 'quadron');
        } elseif (is_archive()) { // blog and cpt archive page
            $name = 'archive';
            $h_t = get_the_archive_title();
        } elseif (is_search()) { // search page
            $name = 'search';
            $h_t = esc_html__('Search results for :', 'quadron');
        } elseif (is_home() || is_front_page()) { // blog post loop page index.php or your choise on settings
            $name = 'blog';
            $h_t = quadron_settings('blog_title', esc_html__('Blog', 'quadron'));
        } elseif (is_single() && ! is_singular('portfolio')) { // blog post single/singular page
            $name = 'single';
            $h_t = quadron_settings('blog_title', esc_html__('Blog', 'quadron'));
        } elseif (is_singular('portfolio')) { // it is cpt and if you want use another clone this condition and add your cpt name as portfolio
            $name = 'single_portfolio';
            $h_t = get_the_title();
        } elseif (is_page()) {	// default or custom page
            $name = 'page';
            $h_t = get_the_title();
        }

        $def_bg = ' default-bg';
        $h_bg = '';
        if(is_page() && class_exists('ACF') ){
            $h_v = true === get_field('quadron_hide_page_hero') ? '0' : '1';
            $h_all = get_field('quadron_page_hero_customize');
            if( !empty( $h_all ) ) {
                // site title
                $h_s = $h_all["quadron_page_hero_text_customize"]["quadron_page_subtitle"];
                // page title
                $h_pt = $h_all["quadron_page_hero_text_customize"]["quadron_page_title"];
                $h_t = $h_pt ? $h_pt : $h_t;
                // page breadcrumbs
                $h_b = $h_all["quadron_page_hero_text_customize"]["quadron_page_bread_visibility"];
                // hero background image
                $h_bg = $h_all["quadron_page_hero_background_customize"]["quadron_hero_bg_img"];
                $h_bg = $h_bg ? ' data-bg="'.esc_url($h_bg).'"' : '';
            }
        } else {
            $h_v = quadron_settings($name.'_hero_visibility', '1');
            // site title
            $h_s = quadron_settings($name.'_site_title', $h_s);
            // page title
            $h_t = quadron_settings($name.'_title', $h_t);
            // page breadcrumbs
            $h_b = quadron_settings('breadcrumbs_visibility', '0');

        }

        do_action( 'quadron_before_hero_action' );

        if ( $h_v != '0' ) {

            echo '<div class="section--no-padding section page-'. get_the_ID() .'">
                <div class="subpage-header">
                    <div class="subpage-header__bg'.esc_attr( $def_bg ).'"'.$h_bg.'>
                        <div class="container">
                            <div class="subpage-header__block">';
                                // page hero slogan
                                if ($h_s) {
                                    echo '<div class="nt-hero-subtitle subpage-header__caption">'. wp_kses($h_s, quadron_allowed_html()) .'</div>';
                                }

                                do_action( 'quadron_after_subtitle_action' );

                                // page hero title
                                if ($h_t) { ?>
                                    <h1 class="nt-hero-title subpage-header__title"><?php echo wp_kses($h_t, quadron_allowed_html()), strlen(get_search_query()) > 16 ? substr(get_search_query(), 0, 16).'...' : get_search_query(); ?></h1>
                                    <div class="subpage-header__line"></div>
                                <?php }

                                do_action( 'quadron_after_title_action' );

                                // page breadcrumbs
                                if ($h_b == '1') {
                                    quadron_breadcrumbs();
                                }

                            echo '</div>
                        </div>
                    </div>
                </div>
            </div>';
        } // hide hero area
        do_action( 'quadron_after_hero_action' );
    }
}
