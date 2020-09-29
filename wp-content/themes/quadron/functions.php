<?php

/**
 *
 * @package WordPress
 * @subpackage quadron
 * @since quadron 1.0
 *
**/


/*************************************************
## GOOGLE FONTS
*************************************************/

if (! function_exists('quadron_fonts_url')) {
    function quadron_fonts_url()
    {
        $fonts_url = '';

        $roboto = _x('on', 'Roboto font: on or off', 'quadron');
        $montserrat = _x('on', 'Montserrat font: on or off', 'quadron');

        if ('off' !== $roboto or 'off' !== $montserrat) {
            $font_families = array();

            if ('off' !== $roboto) {
                $font_families[] = 'Roboto:300,400,400i,500,700';
            }

            if ('off' !== $montserrat) {
                $font_families[] = 'Montserrat:700';
            }

            $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
            );

            $fonts_url = add_query_arg($query_args, "//fonts.googleapis.com/css");
        }

        return $fonts_url;
    }
}

/*************************************************
## STYLES AND SCRIPTS
*************************************************/

function quadron_theme_scripts()
{

    // font families
    wp_register_style('ionicon', get_template_directory_uri() . '/css/ionicon-stylesheet.css', false, '1.0');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/fontawesome.min.css', false, '1.0');
    wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', false, '1.0');

    // theme inner pages files
    wp_enqueue_style('quadron-framework-style', get_template_directory_uri() . '/css/framework-style.css', false, '1.0');

    // plugins
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/libs/bootstrap/bootstrap.min.css', false, '1.0');
    wp_enqueue_style('aos', get_template_directory_uri() . '/libs/aos/aos.css', false, '1.0');
    wp_enqueue_style('slick', get_template_directory_uri() . '/libs/slick/slick.css', false, '1.0');
    wp_enqueue_style('perfect-scrollbar', get_template_directory_uri() . '/libs/perfect-scrollbar/perfect-scrollbar.css', false, '1.0');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css', false, '1.0');
    wp_enqueue_style('jarallax', get_template_directory_uri() . '/libs/jarallax/jarallax.css', false, '1.0');
    wp_enqueue_style('nice-select', get_template_directory_uri() . '/libs/jquery-nice-select/css/nice-select.css', false, '1.0');

    // quadron-main-style
    wp_enqueue_style('quadron-style', get_template_directory_uri() . '/css/style.css', false, '1.0');
    // quadron-update-style
    wp_enqueue_style('quadron-update', get_template_directory_uri() . '/css/update.css', false, '1.0');

    // upload Google Webfonts
    wp_enqueue_style('quadron-fonts', quadron_fonts_url(), array(), '1.0');


    // ## JS
    // theme inner page files
    wp_enqueue_script('aos', get_template_directory_uri() . '/libs/aos/aos.js', array('jquery'), '1.0', false);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/libs/bootstrap/bootstrap.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('slick', get_template_directory_uri() . '/libs/slick/slick.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('perfect-scrollbar', get_template_directory_uri() . '/libs/perfect-scrollbar/perfect-scrollbar.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/libs/imagesloaded/imagesloaded.pkgd.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('isotope-pkgd', get_template_directory_uri() . '/libs/isotope/isotope.pkgd.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('instafeed', get_template_directory_uri() . '/libs/instafeed/instafeed.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('jquery-nice-select', get_template_directory_uri() . '/libs/jquery-nice-select/js/jquery.nice-select.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('jquery-nstslider', get_template_directory_uri() . '/libs/nstslider/jquery.nstSlider.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('jarallax', get_template_directory_uri() . '/libs/jarallax/jarallax.min.js', array('jquery'), '1.0', true);

    wp_enqueue_script('framework-settings', get_template_directory_uri() . '/js/framework-settings.js', array('jquery'), '1.0', true);
    wp_enqueue_script('quadron-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);

    if( 'masonry' == quadron_settings( 'index_type', 'default' ) ) {
        wp_enqueue_script('masonry');
    }

    // browser hacks
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '1,0', false);
    wp_script_add_data('modernizr', 'conditional', 'lt IE 9');
    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', array('jquery'), '1.0', false);
    wp_script_add_data('respond', 'conditional', 'lt IE 9');
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array('jquery'), '1.0', false);
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');

    // comment form reply
    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'quadron_theme_scripts');


/*************************************************
## ADMIN STYLE AND SCRIPTS
*************************************************/


function quadron_admin_scripts()
{

    // Update CSS within in Admin
    wp_enqueue_script('quadron-custom-admin', get_template_directory_uri() . '/js/framework-admin.js');
}
add_action('admin_enqueue_scripts', 'quadron_admin_scripts');


// Theme post and page meta plugin for customization and more features
include get_template_directory() . '/inc/metaboxes.php';


// Template-functions
include get_template_directory() . '/inc/template-functions.php';

// Theme parts
include get_template_directory() . '/inc/template-parts/menu.php';
include get_template_directory() . '/inc/template-parts/post-formats.php';
include get_template_directory() . '/inc/template-parts/paginations.php';
include get_template_directory() . '/inc/template-parts/comment-parts.php';
include get_template_directory() . '/inc/template-parts/small-parts.php';
include get_template_directory() . '/inc/template-parts/header-parts.php';
include get_template_directory() . '/inc/template-parts/footer-parts.php';
include get_template_directory() . '/inc/template-parts/page-hero.php';
include get_template_directory() . '/inc/template-parts/breadcrumbs.php';

// Theme dynamic css setting file
include get_template_directory() . '/inc/custom-style.php';

// TGM plugin activation
include get_template_directory() . '/inc/class-tgm-plugin-activation.php';

// Redux theme options panel
include get_template_directory() . '/inc/theme-options/options.php';

// WooCommerce init
if (class_exists('woocommerce')) {
    include get_template_directory() . '/woocommerce/init.php';
}

/*************************************************
## THEME SETUP
*************************************************/


if (! isset($content_width)) {
    $content_width = 960;
}

function quadron_theme_setup()
{

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
    */
    add_theme_support('post-thumbnails');

    // theme supports
    add_theme_support('title-tag');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('html5', array( 'search-form' ));
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain('quadron', get_template_directory() . '/languages');

    register_nav_menus(array(
        'header_menu_1' => esc_html__('Header Menu 1', 'quadron'),
        'footer_menu_1' => esc_html__('Footer Menu', 'quadron'),
        'sidebar_menu_1' => esc_html__('Sidebar Left Menu', 'quadron'),
		'header_button' => esc_html__('Header Button ( for multi language)', 'quadron'),
    ));

}
add_action('after_setup_theme', 'quadron_theme_setup');


/*************************************************
## WIDGET COLUMNS
*************************************************/


function quadron_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Blog Sidebar', 'quadron'),
        'id' => 'sidebar-1',
        'description' => esc_html__('These widgets for the Blog page.', 'quadron'),
        'before_widget' => '<div class="nt-sidebar-inner-widget postaside-box__content %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title postaside-box__title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Blog Single Sidebar', 'quadron'),
        'id' => 'quadron-single-sidebar',
        'description' => esc_html__('These widgets for the Blog single page.', 'quadron'),
        'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Sidebar Menu Widget Area', 'quadron'),
        'id' => 'side-menu',
        'description' => esc_html__('These widgets for the side menu.', 'quadron'),
        'before_widget' => '<div class="side-menu__menu %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-side-menu-widget-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area Collapsed', 'quadron'),
        'id' => 'footer-widget-area',
        'description' => esc_html__('These widgets area is for Quadron Footer Collapsed Widget only.', 'quadron'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4 class="nt-footer-widget-title footer-title collapse-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 2 Column', 'quadron'),
        'id' => 'footer-widget-area-two',
        'description' => esc_html__('These widgets for the footer top section.', 'quadron'),
        'before_widget' => '<div class="col-md-6">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-footer-widget-title footer-title collapse-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 3 Column', 'quadron'),
        'id' => 'footer-widget-area-three',
        'description' => esc_html__('These widgets for the footer top section.', 'quadron'),
        'before_widget' => '<div class="col-md-4">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-footer-widget-title footer-title">',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 4 Column', 'quadron'),
        'id' => 'footer-widget-area-four',
        'description' => esc_html__('These widgets for the footer top section.', 'quadron'),
        'before_widget' => '<div class="col-sm-6 col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-footer-widget-title footer-title">',
        'after_title' => '</h4>'
    ));

}
add_action('widgets_init', 'quadron_widgets_init');


/*************************************************
## INCLUDE THE TGM_PLUGIN_ACTIVATION CLASS.
*************************************************/


function quadron_register_required_plugins()
{

    $plugins = array(
        array(
            'name' => esc_html__('Contact Form 7', "quadron"),
            'slug' => 'contact-form-7'
        ),
        array(
            'name' => esc_html__('Custom Post Type UI', "quadron"),
            'slug' => 'custom-post-type-ui'
        ),
        array(
            'name' => esc_html__('Woo Product Filter', "quadron"),
            'slug' => 'woo-product-filter'
        ),
        array(
            'name' => esc_html__('WooCommerce', "quadron"),
            'slug' => 'woocommerce'
        ),
        array(
            'name' => esc_html__('Safe SVG', "quadron"),
            'slug' => 'safe-svg'
        ),
        array(
            'name' => esc_html__('Theme Options Panel', "quadron"),
            'slug' => 'redux-framework',
            'required' => true
        ),
        array(
            'name' => esc_html__('Elementor', "quadron"),
            'slug' => 'elementor',
            'source' => 'https://downloads.wordpress.org/plugin/elementor.2.9.9.zip',
            'required' => true
        ),
        array(
            'name' => esc_html__('Advanced Custom Fields - ACF', "quadron"),
            'slug' => 'advanced-custom-fields',
            'required' => true
        ),
        array(
            'name' => esc_html__('Envato Auto Update Theme', "quadron"),
            'slug' => 'envato-market',
            'source' => 'https://docs.google.com/uc?export=download&id=14IDiuB8SzVf149WoVHT6iDW8eCScHL6a',
            'required' => false
        ),
        array(
            'name' => esc_html__('Revolution Slider', "quadron"),
            'slug' => 'revslider',
            'source' => 'https://docs.google.com/uc?export=download&id=1DUga_CBuRccxtPfwSpxmhmpoWoSy801m',
            'required' => false
        ),
        array(
            'name' => esc_html__('Quadron Elementor Addons', "quadron"),
            'slug' => 'quadron-elementor-addons',
            'source' => get_template_directory() . '/plugins/quadron-elementor-addons.zip',
            'required' => true,
            'version' => '1.0.5',
        )
    );

    $config = array(
        'id' => 'tgmpa',
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message' => '',
    );

    tgmpa($plugins, $config);

}
add_action('tgmpa_register', 'quadron_register_required_plugins');


/*************************************************
## ONE CLICK DEMO IMPORT
*************************************************/


/*************************************************
## THEME SETUP WIZARD
    https://github.com/richtabor/MerlinWP
*************************************************/

require_once get_parent_theme_file_path( '/inc/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/inc/demo-wizard-config.php' );

function architect_merlin_local_import_files() {
    return array(
        array(

            'import_file_name'              => esc_html__( 'Demo Import','quadron' ),
            // xml data
            'local_import_file'             => get_parent_theme_file_path( 'inc/merlin/demodata/data.xml' ),
            // widget data
            'local_import_widget_file'      => get_parent_theme_file_path( 'inc/merlin/demodata/widgets.wie' ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/merlin/demodata/cpttax.json'
                )
            ),
            // option tree -> theme options
            'local_import_redux'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/merlin/demodata/redux.json',
                    'option_name' => 'quadron'
                )
            )
        )
    );
}
add_filter( 'merlin_import_files', 'architect_merlin_local_import_files' );


/**
 * Execute custom code after the whole import has finished.
 */
function quadron_merlin_after_import_setup() {
    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'Menu 1', 'nav_menu' );

    set_theme_mod(
        'nav_menu_locations', array(
            'header_menu_1' => $primary->term_id,
            'footer_menu_1' => $primary->term_id,
            'sidebar_menu_1' => $primary->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home 1' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

    if ( did_action( 'elementor/loaded' ) ) {
        // disable some default elementor global settings after setup theme
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'elementor_global_image_lightbox', 'yes' );
    }

}
add_action( 'merlin_after_all_import', 'quadron_merlin_after_import_setup' );

add_action( 'admin_init', function() {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
}, 1 );

add_action('init', 'do_output_buffer'); function do_output_buffer() { ob_start(); }

//woo stop
add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );


function quadron_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_location( 'single' );
    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
}
add_action( 'elementor/theme/register_locations', 'quadron_register_elementor_locations' );
