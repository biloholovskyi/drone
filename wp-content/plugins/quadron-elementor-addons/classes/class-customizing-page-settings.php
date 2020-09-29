<?php

namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Core\Base\Document;
use Elementor\Core\Base\Module as BaseModule;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Core\DocumentTypes\PageBase as PageBase;
use Elementor\Modules\Library\Documents\Page as LibraryPageDocument;

if( !defined( 'ABSPATH' ) ) exit;

class Quadron_Customizing_Page_Settings {
    
    private static $instance = null;
    
    public static function get_instance() {
        if ( null == self::$instance ) {
            self::$instance = new Quadron_Customizing_Page_Settings();
        }
        return self::$instance;
    }
    
    public function __construct(){
        // custom option for elementor heading widget font size
        add_action( 'elementor/element/post/document_settings/before_section_end',[ $this,'quadron_add_custom_settings_to_page_settings'], 10);
        add_action( 'elementor/element/post/section_page_style/after_section_end',[ $this,'quadron_add_custom_settings_to_page_style_settings'], 10);
        //add_action( 'elementor/documents/register_controls',[ $this,'quadron_add_custom_settings_to_page_style_settings'], 10);
        add_filter( 'elementor/editor/localize_settings', [ $this,'quadron_register_template'],10,2 );
    }
    
    public function quadron_register_template($localized_settings,$config)
    {
        $localized_settings = [
            'i18n' => [
                'my_templates' => esc_html__( 'Quadron Templates', 'quadron' )
            ]
        ];
        return $localized_settings;
    }
    
    public function quadron_add_custom_settings_to_page_settings( $page )
    {
        
        if(isset($page) && $page->get_id() > ""){
            
            $nt_post_type   = false;
            $nt_post_type   = get_post_type($page->get_id());
            
            if ( $nt_post_type == 'page' || $nt_post_type == 'revision' ) {
                
                $page->add_control( 'quadron_hide_page_header',
                    [
                        'label'          => esc_html__( 'Hide Header', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'label_on'       => esc_html__( 'Yes', 'quadron' ),
                        'label_off'      => esc_html__( 'No', 'quadron' ),
                        'return_value'   => 'yes',
                        'default'        => 'no',
                        'condition'      => [ 'template'   => 'quadron-elementor-page.php' ]
                    ]
                );
                $page->add_control( 'quadron_page_header_type',
                    [
                        'label'          => esc_html__( 'Header Color Type', 'quadron' ),
                        'type'           => Controls_Manager::SELECT,
                        'options'        => [
                            'default'       => esc_html__( 'Default', 'quadron' ),
                            'transparent'   => esc_html__( 'Transparent', 'quadron' ),
                        ],
                        'default'        => 'default',
                        'condition'      => [ 
                            'template'   => 'quadron-elementor-page.php',
                            'quadron_hide_page_header!'   => 'yes',
                            
                         ]
                    ]
                );
                $page->add_control( 'quadron_hide_page_footer_widgetize',
                    [
                        'label'          => esc_html__( 'Hide Footer Widgetize', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'label_on'       => esc_html__( 'Yes', 'quadron' ),
                        'label_off'      => esc_html__( 'No', 'quadron' ),
                        'return_value'   => 'yes',
                        'default'        => 'no',
                        'condition'      => [ 'template'   => 'quadron-elementor-page.php' ]
                    ]
                );
                $page->add_control( 'quadron_hide_page_footer',
                    [
                        'label'          => esc_html__( 'Hide Footer', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'label_on'       => esc_html__( 'Yes', 'quadron' ),
                        'label_off'      => esc_html__( 'No', 'quadron' ),
                        'return_value'   => 'yes',
                        'default'        => 'no',
                        'condition'      => [ 'template'   => 'quadron-elementor-page.php' ]
                    ]
                );
                $page->add_control( 'quadron_add_page_footer_margin',
                    [
                        'label'          => esc_html__( 'Enable Footer Margin Top', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'label_on'       => esc_html__( 'Yes', 'quadron' ),
                        'label_off'      => esc_html__( 'No', 'quadron' ),
                        'return_value'   => 'yes',
                        'default'        => 'no',
                        'condition'      => [ 'template'   => 'quadron-elementor-page.php' ]
                    ]
                );
                $page->add_control( 'quadron_show_scroll_down',
                    [
                        'label'          => esc_html__( 'Show scroll down', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'label_on'       => esc_html__( 'Yes', 'quadron' ),
                        'label_off'      => esc_html__( 'No', 'quadron' ),
                        'return_value'   => 'yes',
                        'default'        => 'no',
                        'condition'      => [ 'template'   => 'quadron-elementor-page.php' ]
                    ]
                );
                $page->add_control( 'quadron_scroll_down_text',
                    [
                        'label'          => esc_html__( 'Scroll down text', 'quadron' ),
                        'type'           => Controls_Manager::TEXT,
                        'default'        => 'Scroll Down',
                        'condition'      => [ 'template'   => 'quadron-elementor-page.php','quadron_show_scroll_down'   => 'yes' ]
                    ]
                );
                $page->add_control( 'quadron_scroll_down_link',
                    [
                        'label'          => esc_html__( 'Add section CSS ID to here with (#)', 'quadron' ),
                        'type'           => Controls_Manager::TEXT,
                        'default'        => '#about',
                        'condition'      => [ 'template'   => 'quadron-elementor-page.php','quadron_show_scroll_down'   => 'yes' ]
                    ]
                );
            }
        }
    }
    
    public function quadron_add_custom_settings_to_page_style_settings( $page )
    {
        if(isset($page) && $page->get_id() > ""){
            
            $nt_post_type = false;
            $nt_post_type = get_post_type($page->get_id());
            
            if ( $nt_post_type == 'page' || $nt_post_type == 'revision' ) {
                /***********************************************/
                /**************** STYLE OPTIONS ****************/
                /***********************************************/
                $page->start_controls_section( 'quadron_page_header_style_controls_section',
                    [
                        'label'        => esc_html__( 'Page Header Style', 'quadron' ),
                        'tab'          => Controls_Manager::TAB_STYLE,
                        'condition'    => [ 'quadron_hide_page_header!'   => 'yes' ]
                    ]
                );
                $page->add_control( 'quadron_page_header_background_heading',
                    [
                        'label'         => esc_html__( 'Background Style', 'quadron' ),
                        'type'          => Controls_Manager::HEADING
                    ]
                );
                $page->add_responsive_control( 'quadron_page_header_height',
                    [
                        'label'         => esc_html__( 'Height', 'quadron' ),
                        'type'          => Controls_Manager::SLIDER,
                        'range'         => [ 'px'   => [ 'max' => 300 ] ],
                        'selectors'     => [ '{{WRAPPER}} #main-header' => 'height: {{SIZE}}px!important;' ],
                        'separator'     => 'after'
                    ]
                );
                $page->add_responsive_control( 'quadron_page_header_padding',
                    [
                        'label'         => esc_html__( 'Padding', 'quadron' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em', '%' ],
                        'selectors'     => ['{{WRAPPER}} #main-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;'],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => '',
                        ],
                        'separator'     => 'after'
                    ]
                );
                $page->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'          => 'quadron_page_header_background',
                        'label'         => esc_html__( 'Background', 'quadron' ),
                        'types'         => [ 'classic', 'gradient' ],
                        'selector'      => '{{WRAPPER}} #main-header',
                        'separator'     => 'before'
                    ]
                );

                $page->add_control( 'quadron_page_header_background_hr', [ 'type' => Controls_Manager::DIVIDER ] );

                $page->add_control( 'quadron_page_header_menu_heading',
                    [
                        'label'         => esc_html__( 'Menu Style', 'quadron' ),
                        'type'          => Controls_Manager::HEADING
                    ]
                );
                $page->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'          => 'quadron_page_header_menu_typo',
                        'label'         => esc_html__( 'Typography', 'quadron' ),
                        'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                        'selector'      => '{{WRAPPER}} .navbar-nav>li>a'
                    ]
                );
                $page->start_controls_tabs('quadron_page_header_menu_normal_tabs');
                $page->start_controls_tab( 'quadron_page_header_menu_normal_tab',
                    [ 'label'           => esc_html__( 'Normal', 'quadron' ) ]
                );
                $page->add_control( 'quadron_page_header_menu_normal_color',
                    [
                        'label'         => esc_html__( 'Menu Item Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => ['{{WRAPPER}} .navbar-nav>li>a' => 'color: {{VALUE}};']
                    ]
                );
                $page->end_controls_tab();

                $page->start_controls_tab('quadron_page_header_menu_hover_tab',
                    [ 'label'           => esc_html__( 'Hover', 'quadron' ) ]
                );
                $page->add_control( 'quadron_page_header_menu_hover_color',
                    [
                        'label'         => esc_html__( 'Menu Item Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => [ '{{WRAPPER}} .main-nav li a:hover, .secondary-nav li a:hover' => 'color: {{VALUE}};' ]
                    ]
                );
                $page->end_controls_tab();
                $page->end_controls_tabs();
                
                $page->end_controls_section();
                
                $page->start_controls_section( 'quadron_page_sticky_header_style_controls_section',
                    [
                        'label'         => esc_html__( 'Sticky Header Style', 'quadron' ),
                        'tab'           => Controls_Manager::TAB_STYLE,
                        'condition'     => [
                            'quadron_hide_page_header!'   => 'yes'
                        ]
                    ]
                );
                $page->add_control( 'quadron_page_sticky_header_background_heading',
                    [
                        'label'         => esc_html__( 'Background Style', 'quadron' ),
                        'type'          => Controls_Manager::HEADING
                    ]
                );
                $page->add_responsive_control( 'quadron_page_sticky_header_height',
                    [
                        'label'         => esc_html__( 'Height', 'quadron' ),
                        'type'          => Controls_Manager::SLIDER,
                        'range'         => [ 'px'   => [ 'max' => 300 ] ],
                        'selectors'     => [ '{{WRAPPER}} #main-header.header-clone' => 'height: {{SIZE}}px!important;' ],
                        'separator'     => 'after'
                    ]
                );
                $page->add_responsive_control( 'quadron_page_sticky_header_padding',
                    [
                        'label'         => esc_html__( 'Padding', 'quadron' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em', '%' ],
                        'selectors'     => [
                            '{{WRAPPER}} #main-header.header-clone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                            '{{WRAPPER}} #main-header.header-clone .logo img' => 'position:relative;'
                        ],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => '',
                        ],
                        'separator'     => 'after'
                    ]
                );
                $page->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'          => 'quadron_page_sticky_header_background',
                        'label'         => esc_html__( 'Background', 'quadron' ),
                        'types'         => [ 'classic', 'gradient' ],
                        'selector'      => '{{WRAPPER}} #main-header.header-clone',
                        'separator'     => 'before'
                    ]
                );
                $page->add_control( 'quadron_page_sticky_header_background_hr', [ 'type' => Controls_Manager::DIVIDER ] );
                $page->add_control( 'quadron_page_sticky_header_menu_heading',
                    [
                        'label'         => esc_html__( 'Menu Style', 'quadron' ),
                        'type'          => Controls_Manager::HEADING
                    ]
                );
                $page->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'          => 'quadron_page_sticky_header_menu_typo',
                        'label'         => esc_html__( 'Typography', 'quadron' ),
                        'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                        'selector'      => '{{WRAPPER}} .header-clone .navbar-nav>li>a'
                    ]
                );
                $page->start_controls_tabs('quadron_page_sticky_header_menu_normal_tabs');
                $page->start_controls_tab( 'quadron_page_sticky_header_menu_normal_tab',
                    [ 'label'           => esc_html__( 'Normal', 'quadron' ) ]
                );
                $page->add_control( 'quadron_page_sticky_header_menu_normal_color',
                    [
                        'label'         => esc_html__( 'Menu Item Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => [ '{{WRAPPER}} .header-clone .navbar-nav>li>a' => 'color: {{VALUE}};' ]
                    ]
                );
                $page->end_controls_tab();

                $page->start_controls_tab('quadron_page_sticky_header_menu_hover_tab',
                    [ 'label'           => esc_html__( 'Hover', 'quadron' ) ]
                );
                $page->add_control( 'quadron_page_sticky_header_menu_hover_color',
                    [
                        'label'         => esc_html__( 'Menu Item Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => [ '{{WRAPPER}} .header-clone .navbar-nav>li>a:hover' => 'color: {{VALUE}};']
                    ]
                );
                $page->end_controls_tab();
                $page->end_controls_tabs();
                $page->end_controls_section();
                
                
                $page->start_controls_section( 'quadron_page_header_mobile_style_controls_section',
                    [
                        'label'        => esc_html__( 'Page Header Mobile Style', 'quadron' ),
                        'tab'          => Controls_Manager::TAB_STYLE,
                        'condition'    => [
                            'quadron_hide_page_header!'   => 'yes',
                        ]
                    ]
                );
                $page->add_responsive_control( 'quadron_page_header_mobile_item_padding',
                    [
                        'label'         => esc_html__( 'Menu Item Padding', 'quadron' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em', '%' ],
                        'selectors'     => [
                            '{{WRAPPER}} .navbar-collapse.collapse.in .navbar-nav>li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;'
                        ],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => '',
                        ],
                        'separator'     => 'after'
                    ]
                );
                $page->add_responsive_control( 'quadron_page_header_mobile_item_margin',
                    [
                        'label'         => esc_html__( 'Menu Item Margin', 'quadron' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em' ],
                        'selectors'     => [
                            '{{WRAPPER}} .navbar-collapse.collapse.in .navbar-nav>li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;'
                        ],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => '',
                        ],
                        'separator'     => 'after'
                    ]
                );
                $page->add_control( 'more_options',
                    [
                        'label'         => esc_html__( 'Toggle Menu Background', 'plugin-name' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'before',
                    ]
                );
                $page->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'          => 'quadron_page_header_mobile_inner_background',
                        'label'         => esc_html__( 'Toggle Menu Background', 'quadron' ),
                        'types'         => [ 'classic', 'gradient' ],
                        'selector'      => '{{WRAPPER}} .navbar-collapse.collapsing, .navbar-collapse.collapse.in',
                    ]
                );
                $page->add_control( 'quadron_page_header_mobile_inner_background_hr', [ 'type' => Controls_Manager::DIVIDER ] );

                $page->add_control( 'quadron_page_header_mobile_menu_heading',
                    [
                        'label'         => esc_html__( 'Menu Style', 'quadron' ),
                        'type'          => Controls_Manager::HEADING
                    ]
                );
                $page->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'          => 'quadron_page_header_mobile_menu_typo',
                        'label'         => esc_html__( 'Typography', 'quadron' ),
                        'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                        'selector'      => '{{WRAPPER}} .navbar-collapse.collapse.in .navbar-nav>li>a'
                    ]
                );
                $page->start_controls_tabs('quadron_page_header_mobile_menu_normal_tabs');
                $page->start_controls_tab( 'quadron_page_header_mobile_menu_normal_tab',
                    [ 'label'           => esc_html__( 'Normal', 'quadron' ) ]
                );
                $page->add_control( 'quadron_quadron_page_header_mobile_menu_bar_color',
                    [
                        'label'         => esc_html__( 'Menu Bar Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => ['{{WRAPPER}} .navbar-toggle span' => 'color: {{VALUE}};']
                    ]
                );
                $page->add_control( 'quadron_page_header_mobile_menu_normal_color',
                    [
                        'label'         => esc_html__( 'Menu Item Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => ['{{WRAPPER}} .navbar-collapse.collapse.in .navbar-nav>li>a' => 'color: {{VALUE}};']
                    ]
                );
                $page->end_controls_tab();

                $page->start_controls_tab('quadron_page_header_mobile_menu_hover_tab',
                    [ 'label'           => esc_html__( 'Hover', 'quadron' ) ]
                );
                $page->add_control( 'quadron_quadron_page_header_mobile_menu_bar_hvrcolor',
                    [
                        'label'         => esc_html__( 'Menu Bar Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => ['{{WRAPPER}} .navbar-toggle:hover span' => 'color: {{VALUE}};']
                    ]
                );
                $page->add_control( 'quadron_page_header_mobile_menu_hover_color',
                    [
                        'label'         => esc_html__( 'Menu Item Color', 'quadron' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       => '',
                        'selectors'     => ['{{WRAPPER}} .navbar-collapse.collapse.in .navbar-nav>li>a:hover' => 'color: {{VALUE}};']
                    ]
                );
                $page->end_controls_tab();
                $page->end_controls_tabs();
                
                $page->end_controls_section();
                
                $page->start_controls_section( 'quadron_page_footer_widgetize_style_controls_section',
                    [
                        'label'        => esc_html__( 'Page Footer Widgetize Style', 'quadron' ),
                        'tab'          => Controls_Manager::TAB_STYLE,
                        'condition'     => [
                            'quadron_hide_page_footer_widgetize!'      => 'yes'
                        ]
                    ]
                );
                $page->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'          => 'quadron_page_footer_widgetize_style_background',
                        'label'         => esc_html__( 'Background', 'quadron' ),
                        'types'         => [ 'classic', 'gradient' ],
                        'selector'      => '{{WRAPPER}} #footer-widget-section'
                    ]
                );
                $page->add_responsive_control( 'quadron_page_footer_widgetize_style_padding',
                    [
                        'label'         => esc_html__( 'Padding', 'quadron' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em', '%' ],
                        'selectors'     => [ '{{WRAPPER}} #footer-widget-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => ''
                        ],
                        'separator'     => 'before'
                    ]
                );
                $page->end_controls_section();
                
                $page->start_controls_section( 'page_footer_controls_section',
                    [
                        'label'        => esc_html__( 'Page Footer Style', 'quadron' ),
                        'tab'          => Controls_Manager::TAB_STYLE,
                        'condition'     => [
                            'quadron_hide_page_footer!'      => 'yes'
                        ]
                    ]
                );
                $page->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'          => 'page_footer_background',
                        'label'         => esc_html__( 'Background', 'quadron' ),
                        'types'         => [ 'classic', 'gradient' ],
                        'selector'      => '{{WRAPPER}} #main-footer'
                    ]
                );
                $page->add_responsive_control( 'page_footer_padding',
                    [
                        'label'         => esc_html__( 'Padding', 'quadron' ),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => [ 'px', 'em', '%' ],
                        'selectors'     => [ '{{WRAPPER}} #main-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
                        'default'       => [
                            'top'          => '',
                            'right'        => '',
                            'bottom'       => '',
                            'left'         => ''
                        ],
                        'separator'     => 'before'
                    ]
                );
                $page->end_controls_section();
            }
        }
    }
}
Quadron_Customizing_Page_Settings::get_instance();
