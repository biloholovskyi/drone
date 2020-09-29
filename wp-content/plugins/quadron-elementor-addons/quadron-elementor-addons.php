<?php
/**
 * Plugin Name: Quadron Elementor Addons
 * Description: Premium & Advanced Essential Elements for Elementor
 * Plugin URI:  http://themeforest.net/user/Ninetheme
 * Version:     1.0.5
 * Author:      Ninetheme
 * Author URI:  http://themeforest.net/user/Ninetheme
 */

 /*
  * Exit if accessed directly.
  */

if ( ! defined( 'ABSPATH' ) ) exit;

define('URIP_PLUGIN_FILE', __FILE__);
define('URIP_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('URIP_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('URIP_PLUGIN_URL', plugins_url('/', __FILE__));

final class Quadron_Elementor_Addons {

    /**
     * Plugin Version
     *
     * @since 1.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.0.5';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '5.6';

    /**
     * Instance
     *
     * @since 1.0
     *
     * @access private
     * @static
     *
     * @var Quadron_Elementor_Addons The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0
     *
     * @access public
     * @static
     *
     * @return Quadron_Elementor_Addons An instance of the class.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.0
     *
     * @access public
     */
    public function __construct() {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0
     *
     * @access public
     */
    public function i18n() {
        load_plugin_textdomain( 'quadron' );
    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0
     *
     * @access public
     */
    public function init() {

        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'quadron_admin_notice_missing_main_plugin' ] );
            return;
        }
        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'quadron_admin_notice_minimum_elementor_version' ] );
            return;
        }
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'quadron_admin_notice_minimum_php_version' ] );
            return;
        }

        /* Custom plugin helper functions */
        require_once( __DIR__ . '/classes/class-helpers-functions.php' );
        /* Elementor section parallax */
        require_once( __DIR__ . '/classes/class-custom-elementor-section.php' );
        /* Add custom controls to page settings */
        require_once( __DIR__ . '/classes/class-customizing-page-settings.php' );
        /* Image resizer */
        require_once( __DIR__ . '/classes/class-image-resizer.php' );
        /* Quadron Elementor template */
        require_once( __DIR__ . '/classes/class-templater.php' );
        /* Quadron Elementor template */
        require_once( __DIR__ . '/classes/class-quadron-footer-widget.php' );
        /* Admin template */
        require_once( __DIR__ . '/templates/admin/admin.php' );
        // Categories registered
        add_action( 'elementor/elements/categories_registered', [ $this, 'quadron_add_widget_category' ] );
        // Widgets registered
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
        // Register Widget Scripts
        add_action( 'wp_print_styles', [ $this, 'quadron_elementor_addons_dequeue_style' ], 100 );
        //add_action( 'widgets_init', [ $this, 'quadron_elementor_addons_register_sidebar' ] );
        add_action( 'after_setup_theme', [ $this, 'quadron_elementor_addons_image_size' ] );
    }

    public function quadron_elementor_addons_image_size() {
        add_image_size( 'quadron-570-hard', 750, 372, array( 'left', 'top' ) ); // (cropped)
        add_image_size( 'quadron-184-hard', 260, 200, array( 'left', 'top' ) ); // (cropped)
    }

    public function quadron_elementor_addons_dequeue_style() {
        if( basename(get_page_template_slug( get_queried_object_id() ) ) === 'quadron-elementor-page.php' ){
            wp_dequeue_style( 'framework-settings' );
        }
    }

    public function quadron_elementor_addons_register_sidebar() {
        register_sidebar( array(
            'name'          => esc_html__( 'Quadron Elementor Addons Header Bottom', 'quadron' ),
            'id'            => 'quadron-elementor-addons-header-extra',
            'description'   => esc_html__( 'These are widgets for the bottom header right type.','quadron' ),
            'before_widget' => '<div class="header-right-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="header-right-widget-title"><span>',
            'after_title'   => '</span></h5>'
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Quadron Elementor Addons Header Top', 'quadron' ),
            'id'            => 'quadron-elementor-addons-header-top-extra',
            'description'   => esc_html__( 'These are widgets for the top header right type.','quadron' ),
            'before_widget' => '<div class="header-top-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => ''
        ) );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0
     *
     * @access public
     */

    public function quadron_admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '%1$s requires %2$s to be installed and activated.', 'quadron' ),
            '<strong>' . esc_html__( 'Quadron Elementor Addons', 'quadron' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'quadron' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0
     *
     * @access public
     */
    public function quadron_admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'quadron' ),
            '<strong>' . esc_html__( 'Quadron Elementor Addons', 'quadron' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'quadron' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0
     *
     * @access public
     */
    public function quadron_admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'quadron' ),
            '<strong>' . esc_html__( 'Quadron Elementor Addons', 'quadron' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'quadron' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Register Widgets Category
     *
     */
    public function quadron_add_widget_category( $elements_manager ) {
        $elements_manager->add_category( 'quadron', ['title' => esc_html__( 'Quadron Addons', 'quadron' ) ] );
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0
     *
     * @access public
     */
    public function init_widgets() {

        /*
        * Register widgets and include widget files
        */
        // Quadron_Button_Widget
        if ( ! get_option( 'disable_quadron_button' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-button.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Button_Widget() );
        }
        // Quadron_Section_Heading_Widget
        if ( ! get_option( 'disable_quadron_section_heading' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-section-heading.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Section_Heading_Widget() );
        }
        // Quadron_Page_Hero_Widget
        if ( ! get_option( 'disable_quadron_page_hero_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-page-hero-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Page_Hero_Widget() );
        }
        // Quadron_Home_Slider_One_Widget
        if ( ! get_option( 'disable_quadron_home_slider_one' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-home-slider-one.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Home_Slider_One_Widget() );
        }
        // Quadron_Home_Slider_Two_Widget
        if ( ! get_option( 'disable_quadron_home_slider_two' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-home-slider-two.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Home_Slider_Two_Widget() );
        }
        // Quadron_Home_Slider_Three_Widget
        if ( ! get_option( 'disable_quadron_home_slider_three' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-home-slider-three.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Home_Slider_Three_Widget() );
        }
        // Quadron_Rev_Slider_Widget
        if ( ! get_option( 'disable_quadron_rev_slider' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-rev-sliders.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Quadron_Rev_Slider_Widget() );
        }
        // Quadron_Accordion_Tabs_Section_Widget
        if ( ! get_option( 'disable_quadron_accordion_tabs_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-accordion-tabs-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Accordion_Tabs_Section_Widget() );
        }
        // Quadron_Promobox_One_Widget
        if ( ! get_option( 'disable_quadron_promobox_one' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-promobox-one.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Promobox_One_Widget() );
        }
        // Quadron_About_Us_Widget
        if ( ! get_option( 'disable_quadron_about_us_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-about-us-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_About_Us_Widget() );
        }
        // Quadron_About_Us_Two_Section_Widget
        if ( ! get_option( 'disable_quadron_about_us_two_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-about-us-two-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_About_Us_Two_Section_Widget() );
        }
        // Quadron_About_Us_Three_Section_Widget
        if ( ! get_option( 'disable_quadron_about_us_three_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-about-us-three-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_About_Us_Three_Section_Widget() );
        }
        // Quadron_Services_Item_Widget
        if ( ! get_option( 'disable_quadron_services_item' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-item.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Item_Widget() );
        }
        // Quadron_Services_Section_Widget
        if ( ! get_option( 'disable_quadron_services_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Section_Widget() );
        }
        // Quadron_Services_Two_Section_Widget
        if ( ! get_option( 'disable_quadron_services_two_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-two-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Two_Section_Widget() );
        }
        // Quadron_Services_Three_Section_Widget
        if ( ! get_option( 'disable_quadron_services_three_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-three-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Three_Section_Widget() );
        }
        // Quadron_Services_Four_Section_Widget
        if ( ! get_option( 'disable_quadron_services_four_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-four-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Four_Section_Widget() );
        }
        // Quadron_Services_Five_Section_Widget
        if ( ! get_option( 'disable_quadron_services_five_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-five-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Five_Section_Widget() );
        }
        // Quadron_Services_Six_Section_Widget
        if ( ! get_option( 'disable_quadron_services_six_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-six-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Six_Section_Widget() );
        }
        // Quadron_Services_Seven_Section_Widget
        if ( ! get_option( 'disable_quadron_services_seven_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-services-seven-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Services_Seven_Section_Widget() );
        }
        // Quadron_Features_One_Section_Widget
        if ( ! get_option( 'disable_quadron_features_one_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-features-one-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Features_One_Section_Widget() );
        }
        // Quadron_Features_Masonry_Section_Widget
        if ( ! get_option( 'disable_quadron_features_masonry_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-features-masonry-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Features_Masonry_Section_Widget() );
        }
        // Quadron_Gallery_Grid_Section_Widget
        if ( ! get_option( 'disable_quadron_gallery_grid_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-gallery-grid-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Gallery_Grid_Section_Widget() );
        }
        // Quadron_Counter_Up_Widget
        if ( ! get_option( 'disable_quadron_counterup' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-counterup.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Counter_Up_Widget() );
        }
        // Quadron_Video_Popup_Item_Widget
        if ( ! get_option( 'disable_quadron_video_popup_item' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-video-popup-item.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Video_Popup_Item_Widget() );
        }
        // Quadron_Video_Slider_Section_Widget
        if ( ! get_option( 'disable_quadron_video_slider_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-video-slider-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Video_Slider_Section_Widget() );
        }
        // Quadron_Video_Slider_Two_Section_Widget
        if ( ! get_option( 'disable_quadron_video_slider_two_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-video-slider-two-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Video_Slider_Two_Section_Widget() );
        }
        // Quadron_Video_Slider_Three_Section_Widget
        if ( ! get_option( 'disable_quadron_video_slider_three_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-video-slider-three-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Video_Slider_Three_Section_Widget() );
        }
        // Quadron_Infobox1_Section_Widget
        if ( ! get_option( 'disable_quadron_infobox1_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-infobox1-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Infobox1_Section_Widget() );
        }
        // Quadron_Infobox2_Section_Widget
        if ( ! get_option( 'disable_quadron_infobox2_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-infobox2-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Infobox2_Section_Widget() );
        }
        // Quadron_Blog_Slider_Section_Widget
        if ( ! get_option( 'disable_quadron_blog_slider_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-blog-slider-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Blog_Slider_Section_Widget() );
        }
        // Quadron_Blog_List_Section_Widget
        if ( ! get_option( 'disable_quadron_blog_list_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-blog-list-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Blog_List_Section_Widget() );
        }
        // Quadron_Partners_Slider_Section_Widget
        if ( ! get_option( 'disable_quadron_partners_slider_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-partners-slider-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Partners_Slider_Section_Widget() );
        }
        // Quadron_Awards_Slider_Section_Widget
        if ( ! get_option( 'disable_quadron_awards_slider_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-awards-slider-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Awards_Slider_Section_Widget() );
        }
        // Quadron_Courses_Slider_Section_Widget
        if ( ! get_option( 'disable_quadron_courses_slider_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-courses-slider-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Courses_Slider_Section_Widget() );
        }
        // Quadron_Contact_Form_7_Widget
        if ( ! get_option( 'disable_quadron_contact_form7' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-contact-form-7.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Contact_Form_7_Widget() );
        }
        // Quadron_Contact_Form_Section_Widget
        if ( ! get_option( 'disable_quadron_contact_form7_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-contact-form-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Contact_Form_Section_Widget() );
        }
        // Quadron_Pricing_Item_Widget
        if ( ! get_option( 'disable_quadron_pricing_item' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-pricing-item.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Pricing_Item_Widget() );
        }
        // Quadron_Mobile_App_Section_Widget
        if ( ! get_option( 'disable_quadron_mobile_app_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-mobile-app-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Mobile_App_Section_Widget() );
        }
        // Quadron_Testimonials_One_Section_Widget
        if ( ! get_option( 'disable_quadron_testimonials_one_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-testimonials-one-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Testimonials_One_Section_Widget() );
        }
        // Quadron_Woo_Product_Slider_Section_Widget
        if ( ! get_option( 'disable_quadron_woo_product_slider_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-woo-product-slider-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Woo_Product_Slider_Section_Widget() );
            require_once( __DIR__ . '/widgets/quadron-woo-my-account-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Woo_My_Account_Section_Widget() );
            require_once( __DIR__ . '/widgets/quadron-woo-checkout-form-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Woo_Checkout_Form_Section_Widget() );
        }
        // Quadron_Promobox_Mobile_Slider_Section_Widget
        if ( ! get_option( 'disable_quadron_promobox_mobile_slider_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-promobox-mobile-slider-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Promobox_Mobile_Slider_Section_Widget() );
        }
        // Quadron_Team_Member_Item_Widget
        if ( ! get_option( 'disable_quadron_team_member_item' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-team-member-item.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Team_Member_Item_Widget() );
        }
        // Quadron_Cases_Cpt_Grid_Section_Widget
        if ( ! get_option( 'disable_quadron_cases_cpt_grid_section' ) == 1 ) {
            require_once( __DIR__ . '/widgets/quadron-cases-cpt-grid-section.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Cases_Cpt_Grid_Section_Widget() );
            require_once( __DIR__ . '/widgets/quadron-cases-cpt-post-navigation.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Cases_Cpt_Post_Navigation_Widget() );
            require_once( __DIR__ . '/widgets/quadron-cases-cpt-post-video.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Cases_Cpt_Post_Video_Widget() );
            require_once( __DIR__ . '/widgets/quadron-cases-cpt-post-details.php' );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Quadron_Cases_Cpt_Post_Details_Widget() );
        }
    }

    public function widget_styles() {
        // Plugin custom css
        wp_enqueue_style( 'quadron-slick', plugins_url( 'assets/front/js/slick/slick.css', __FILE__ ) );
        wp_enqueue_style( 'quadron-addons-plugin-custom', plugins_url( 'assets/front/css/custom.css', __FILE__ ) );
    }

    public function widget_scripts() {
        // Plugin custom scripts
        wp_enqueue_script( 'quadron-js-slick', plugins_url( 'assets/front/js/slick/slick.min.js', __FILE__ ), true );
        wp_enqueue_script( 'quadron-imagesloaded', plugins_url( 'assets/front/js/imagesloaded/imagesloaded.pkgd.min.js', __FILE__ ), true );
        wp_enqueue_script( 'quadron-isotope', plugins_url( 'assets/front/js/isotope/isotope.pkgd.min.js', __FILE__ ), true );
        wp_enqueue_script( 'quadron-addons-custom-scripts', plugins_url( 'assets/front/js/custom-scripts.js', __FILE__ ), true );
    }
}
Quadron_Elementor_Addons::instance();
