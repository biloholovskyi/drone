<?php
/**
 * Functions which enhance the theme by hooking into WordPress
*/


/*************************************************
## ADMIN NOTICES
*************************************************/

function quadron_theme_activation_notice()
{
    global $current_user;

    $user_id = $current_user->ID;

    if (!get_user_meta($user_id, 'quadron_theme_activation_notice')) {
        ?>
        <div class="updated notice">
            <p>
                <?php
                    echo sprintf(
                    esc_html__('If you need help about demodata installation, please read docs and %s', 'quadron'),
                    '<a target="_blank" href="' . esc_url('https://ninetheme.com/contact/') . '">' . esc_html__('Open a ticket', 'quadron') . '</a>
                    ' . esc_html__('or', 'quadron') . ' <a href="' . esc_url( wp_nonce_url( add_query_arg( 'quadron-ignore-notice', 'dismiss_admin_notices' ), 'quadron-dismiss-' . get_current_user_id() ) ) . '">' . esc_html__('Dismiss this notice', 'quadron') . '</a>');
                ?>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'quadron_theme_activation_notice');

function quadron_theme_activation_notice_ignore()
{
    global $current_user;

    $user_id = $current_user->ID;

    if (isset($_GET['quadron-ignore-notice'])) {
        add_user_meta($user_id, 'quadron_theme_activation_notice', 'true', true);
    }
}
add_action('admin_init', 'quadron_theme_activation_notice_ignore');


/*************************************************
## DATA CONTROL FROM THEME-OPTIONS PANEL
*************************************************/
if (! function_exists('quadron_settings')) {
    function quadron_settings($opt_id, $def_value='')
    {
        global $quadron;

        $defval = '' != $def_value ? $def_value : false;
        $opt_id = trim($opt_id);
        $opt    = isset($quadron[$opt_id]) ? $quadron[$opt_id] : $defval;

        if ( class_exists('Redux')) {
            return $opt;
        } else {
            return $defval;
        }
    }
}


/*************************************************
## SIDEBAR CONTROL
*************************************************/

if (! function_exists('quadron_sidebar_control')) {
    function quadron_sidebar_control($layout='', $default='', $sidebar='')
    {
        global $quadron;
        $layout  = trim($layout);
        $sidebar = $sidebar != '' ? is_active_sidebar($sidebar) : is_active_sidebar('sidebar-1');
        $default = $default ? $default : 'right-sidebar';
        $layout  = isset($quadron[$layout]) ? $quadron[$layout] : $default;
        $layout  = $sidebar && $layout != 'full-width' ? 'col-md-7 col-lg-8 nt-has-sidebar' : 'col-10 col-lg-10 nt-no-sidebar';
        return $layout;
    }
}


/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/

if (!function_exists('quadron_sanitize_data')) {
    function quadron_sanitize_data($html_data)
    {
        return $html_data;
    }
}

if (! function_exists('quadron_body_theme_classes')) {
    function quadron_body_theme_classes($classes)
    {
        $theme_name =  wp_get_theme();
        $theme_version =  'nt-version-' . wp_get_theme()->get('Version');
        $theme_page =  (! is_page_template('custom-page.php')) ? 'nt-body' : '';

        $classes[] =  $theme_name;
        $classes[] =  $theme_version;
        $classes[] =  $theme_page;

        return $classes;

    }
    add_filter('body_class', 'quadron_body_theme_classes');
}


/*************************************************
## CUSTOM POST CLASS
*************************************************/
if (! function_exists('quadron_post_theme_class')) {
    function quadron_post_theme_class($classes)
    {
        if ( ! is_single() AND ! is_page() ) {

            $type = quadron_settings( 'index_type', 'default' );
            $column = quadron_settings( 'grid_column', 'col-lg-6' );

            $classes[] = 'nt-post-class';
            $classes[] = 'masonry' == $type ? 'masonry-item' : '';
            $classes[] = 'default' != $type ? $column : '';
            $classes[] = quadron_settings( 'format_box_type', '' );
            $classes[] = 'post-box-type-'.$type;
            $classes[] = wp_link_pages('echo=0') ? 'nt-is-wp-link-pages' : '';
        }

        return $classes;

    }
    add_filter('post_class', 'quadron_post_theme_class');
}



/*************************************************
## THEME PASSWORD FORM
*************************************************/
if (! function_exists('quadron_custom_password_form')) {
    function quadron_custom_password_form()
    {
        global $post;
        $form = '<div class="nt-sidebar-inner-search">
            <form class="nt-sidebar-inner-search-form searchform form--horizontal form-default protected-post-form"
            role="password"
            method="post"
            id="widget-searchform"
            action="' . get_option('siteurl') . '/wp-login.php?action=postpass" >
                <div class="row no-gutters">
                    <div class="col-10">
                        <div class="form-group">
                            <input class="nt-sidebar-inner-search-field form-control" type="password"  placeholder="'. esc_attr__('Enter Password', 'quadron') .'" name="post_password" id="ws">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <button class="nt-sidebar-inner-search-button btn" id="submit" type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>';

        return $form;
    }
    add_filter('the_password_form', 'quadron_custom_password_form');
}


/*************************************************
## THEME SEARCH FORM
*************************************************/
if (! function_exists('quadron_content_custom_search_form')) {
    function quadron_content_custom_search_form()
    {
        $form = '<div class="nt-sidebar-inner-search">
            <form class="nt-sidebar-inner-search-form searchform form--horizontal form-default" role="search" method="get" id="widget-searchform" action="' . esc_url(home_url('/')) . '" >
                <div class="row no-gutters">
                    <div class="col-10">
                        <div class="form-group">
                            <input class="nt-sidebar-inner-search-field form-control" type="text" value="' . get_search_query() . '" placeholder="'. esc_attr__('Search for...', 'quadron') .'" name="s" id="sws">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <button class="nt-sidebar-inner-search-button btn" id="searchsubmit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>';

        return $form;
    }
    add_filter('get_search_form', 'quadron_content_custom_search_form');
}

/*************************************************
## THEME WOOCOMMERCE SEARCH FORM
*************************************************/

function quadron_woo_content_custom_search_form()
{
    $form = '<div class="nt-sidebar-inner-search">
            <form class="nt-sidebar-inner-search-form searchform form--horizontal form-default" role="search" method="get" id="widget-searchform" action="' . esc_url(home_url('/')) . '" >
                <div class="row no-gutters">
                    <div class="col-10">
                        <div class="form-group">
                            <input class="nt-sidebar-inner-search-field form-control" type="text" value="' . get_search_query() . '" placeholder="'. esc_attr__('Search for...', 'quadron') .'" name="s" id="wws">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <button class="nt-sidebar-inner-search-button btn" id="woo-searchsubmit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>';

        return $form;
}
add_filter('get_product_search_form', 'quadron_woo_content_custom_search_form');


/*************************************************
## EXCERPT FILTER
*************************************************/
if (! function_exists('quadron_custom_excerpt_more')) {
    function quadron_custom_excerpt_more($more)
    {
        return '...';
    }
    add_filter('excerpt_more', 'quadron_custom_excerpt_more');
}

/*************************************************
## EXCERPT LIMIT
*************************************************/
if (! function_exists('quadron_excerpt_limit')) {
    function quadron_excerpt_limit($limit)
    {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt) >= $limit) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt) . '...';
        } else {
            $excerpt = implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
        return $excerpt;
    }
}

/*************************************************
## DEFAULT CATEGORIES WIDGET
*************************************************/
if (! function_exists('quadron_add_span_cat_count')) {
    function quadron_add_span_cat_count($links)
    {

        $links = str_replace('</a> (', '</a> <span class="widget-list-span">', $links);
		$links = str_replace('</a> <span class="count">(', '</a> <span class="widget-list-span">', $links);
        $links = str_replace(')', '</span>', $links);

        return $links;

    }
    add_filter('wp_list_categories', 'quadron_add_span_cat_count');
}


/*************************************************
## DEFAULT ARCHIVES WIDGET
*************************************************/
if (! function_exists('quadron_add_span_arc_count')) {
    function quadron_add_span_arc_count($links)
    {
        $links = str_replace('</a>&nbsp;(', '</a> <span class="widget-list-span">', $links);

        $links = str_replace(')', '</span>', $links);

        // dropdown selectbox
        $links = str_replace('&nbsp;(', ' - ', $links);

        return $links;

    }
    add_filter('get_archives_link', 'quadron_add_span_arc_count');
}

/*************************************************
## PAGINATION CUSTOMIZATION
*************************************************/
if (! function_exists('quadron_sanitize_pagination')) {
    function quadron_sanitize_pagination($content)
    {
        // remove role attribute
        $content = str_replace('role="navigation"', '', $content);

        // remove h2 tag
        $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);

        return $content;

    }
    add_action('navigation_markup_template', 'quadron_sanitize_pagination');
}

/*************************************************
## CUSTOM ARCHIVE TITLES
*************************************************/
if (! function_exists('quadron_archive_title')) {
    function quadron_archive_title()
    {
        $title = '';
        if (is_category()) {
            $title = single_cat_title('', false);
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
        } elseif (is_author()) {
            $title = get_the_author();
        } elseif (is_year()) {
            $title = get_the_date(_x('Y', 'yearly archives date format', 'quadron'));
        } elseif (is_month()) {
            $title = get_the_date(_x('F Y', 'monthly archives date format', 'quadron'));
        } elseif (is_day()) {
            $title = get_the_date(_x('F j, Y', 'daily archives date format', 'quadron'));
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        } elseif (is_tax()) {
            $title = single_term_title('', false);
        } else {
            $title = get_the_archive_title();
        }

        return $title;
    }
    add_filter('get_the_archive_title', 'quadron_archive_title');
}



/*************************************************
## CHECKS TO SEE IF CPT EXISTS.
*************************************************/
/*
* By setting '_builtin' to false,
* we exclude the WordPress built-in public post types
* (post, page, attachment, revision, and nav_menu_item)
* and retrieve only registered custom public post types.
* return boolean
*/
if (! function_exists('quadron_cpt_exists')) {
    function quadron_cpt_exists()
    {

        $args = array(
           'public'   => true,
           '_builtin' => false
        );

        $output = 'names'; // 'names' or 'objects' (default: 'names')
        $operator = 'and'; // 'and' or 'or' (default: 'and')

        $post_types = get_post_types( $args, $output, $operator ); // get simple cpt if exists
        $classes = get_body_class();
        $cpt_exsits = array();

        if ( $post_types ) {
            foreach ($post_types as $cpt ) {
                if ( is_single() ) {
                    array_push($cpt_exsits, 'single-'.$cpt);
                }
                if ( is_archive() ) {
                    array_push($cpt_exsits, 'post-type-archive-'.$cpt);
                }
            }
        }

        $sameclass = array_intersect( $cpt_exsits, $classes );

        if ( $sameclass ) {
            return true;
        }
        return false;
    }
}


/*************************************************
## PARALLAX BG .
*************************************************/
/**
 * attributes
 * @var $parallax
 * @var $img
 * @var $type
 * @var $speed
 * @var $bgpos
 * @var $bgsize
 * @var $bgrepeat
 * @var $localvideo
 * @var $localtype
 * @var $localurl
 * @var $video
*/
if (! function_exists('quadron_parallax')) {
    function quadron_parallax($parallax='',$img='',$type='',$speed='',$bgpos='',$bgsize='',$bgrepeat='',$localvideo='',$localtype='',$localurl='',$video='')
    {
        if ($parallax == true || $parallax == '1') {
            wp_enqueue_script('jarallax');

            $attr[] = 'data-img-src="'.esc_attr($img).'"';
            $attr[] = 'data-type="'.esc_attr($type).'"';
            $attr[] = 'data-speed="'.esc_attr($speed).'"';
            $attr[] = 'data-img-position="'.esc_attr($bgpos).'"';
            $attr[] = 'data-img-size="'.esc_attr($bgsize).'"';
            $attr[] = 'data-img-repeat="'.esc_attr($bgrepeat).'"';

            if ($localvideo == true || $localvideo == '1') {
                if ($localtype == 'mp4') {
                    $attr[] = $localurl ? 'data-jarallax-video="mp4:'.esc_url($localurl).'"' : '';
                }
                if ($localtype == 'webm') {
                    $attr[] = $localurl ? 'data-jarallax-video="webm:'.esc_url($localurl).'"' : '';
                }
                if ($localtype == 'ogv') {
                    $attr[] = $localurl ? 'data-jarallax-video="ogv:'.esc_url($localurl).'"' : '';
                }
            } else {
                $attr[] = $video ? 'data-jarallax-video="'.esc_url($video).'"' : '';
            }
            return implode(' ', $attr);
        }
        return false;
    }
}

/*************************************************
## CONVERT HEX TO RGB
*************************************************/

 if (! function_exists('quadron_hex2rgb')) {
     function quadron_hex2rgb($hex)
     {
         $hex = str_replace("#", "", $hex);

         if (strlen($hex) == 3) {
             $r = hexdec(substr($hex, 0, 1).substr($hex, 0, 1));
             $g = hexdec(substr($hex, 1, 1).substr($hex, 1, 1));
             $b = hexdec(substr($hex, 2, 1).substr($hex, 2, 1));
         } else {
             $r = hexdec(substr($hex, 0, 2));
             $g = hexdec(substr($hex, 2, 2));
             $b = hexdec(substr($hex, 4, 2));
         }
         $rgb = array($r, $g, $b);

         return $rgb; // returns an array with the rgb values
     }
 }


/**********************************
## THEME ALLOWED HTML TAG
/**********************************/

if (! function_exists('quadron_allowed_html')) {
    function quadron_allowed_html()
    {
        $allowed_tags = array(
            'a' => array(
                'class' => array(),
                'href'  => array(),
                'rel'   => array(),
                'title' => array(),
                'target' => array()
            ),
            'abbr' => array(
                'title' => array()
            ),
            'address' => array(),
            'iframe' => array(
                'src' => array()
            ),
            'b' => array(),
            'br' => array(),
            'blockquote' => array(
                'cite'  => array()
            ),
            'cite' => array(
                'title' => array()
            ),
            'code' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array()
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'id'    => array(),
                'title' => array(),
                'style' => array()
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(
                'class' => array()
            ),
            'h2' => array(
                'class' => array()
            ),
            'h3' => array(
                'class' => array()
            ),
            'h4' => array(
                'class' => array()
            ),
            'h5' => array(
                'class' => array()
            ),
            'h6' => array(
                'class' => array()
            ),
            'i' => array(
                'class'  => array()
            ),
            'img' => array(
                'alt'    => array(),
                'class'  => array(),
                'height' => array(),
                'src'    => array(),
                'width'  => array()
            ),
            'li' => array(
                'class' => array()
            ),
            'ol' => array(
                'class' => array()
            ),
            'p' => array(
                'class' => array()
            ),
            'q' => array(
                'cite' => array(),
                'title' => array()
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array()
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array()
            )
        );
        return $allowed_tags;
    }
}
/*************************************************
## GET ALL ELEMENTOR PAGE TEMPLATES
# @return array
*************************************************/
if ( !function_exists( 'quadron_get_elementorTemplates' ) ) {
    function quadron_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Frontend' ) ) {
            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];
            if ( $type ) {
                $args[ 'tax_query' ] = [
                    [
                        'taxonomy' => 'elementor_library_type',
                        'field' => 'slug',
                        'terms' => $type
                    ]
                ];
            }
            $page_templates = get_posts( $args );
            $options = array();
            if ( !empty( $page_templates ) && !is_wp_error( $page_templates ) ) {
                foreach ( $page_templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'quadron' )
                );
            }
            return $options;
        }
    }
}

/*************************************************
## CHECK IS ELEMENTOR
*************************************************/
if ( !function_exists( 'quadron_check_is_elementor' ) ) {
    function quadron_check_is_elementor()
    {
        global $post;
        if ( class_exists( '\Elementor\Plugin' ) ) {
            return \Elementor\Plugin::$instance->db->is_built_with_elementor( $post->ID );
        }
    }
}

/*************************************************
## CHECK IS POST
*************************************************/
if ( !function_exists( 'quadron_check_is_post' ) ) {
    function quadron_check_is_post()
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {
            $selected_post = get_option( 'elementor_cpt_support' );
            if ( is_array( $selected_post ) ) {
                if ( in_array( 'post', $selected_post ) ) {
                    return true;
                }
            }
            return false;
        }
    }
}
