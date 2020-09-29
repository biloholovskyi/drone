<?php

if( !defined( 'ABSPATH' ) ) exit;

use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Elemequadron_Base;
use Elementor\Elementor_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Responsive\Responsive;
use Elementor\Widget_Base;
use Elementor\Group_Control_Background;

class Quadron_Section_Parallax {
    
    private static $instance = null;
    
    public function __construct(){
        // section register settings
        //add_action('elementor/element/section/section_structure/after_section_end',array($this,'register_controls'), 10 );
        add_action('elementor/element/section/section_structure/before_section_end',array($this,'register_change_section_column_structure'), 10 );
        add_action('elementor/frontend/section/before_render',array($this,'quadron_custom_attr_to_section'), 10);
        //
        // column register settings and before render column functions
        add_action('elementor/element/column/layout/after_section_end',array($this,'register_change_column_width'), 10 );
        add_action('elementor/frontend/column/before_render',array($this,'custom_attr_to_column'), 10);
    }
    //
    //
    /*****   START COLUMN CONTROLS   ******/
    public function register_change_column_width( $element ) {
        $element->start_controls_section('quadron_section_column_width_settings',
            [
                'label' => esc_html__( 'Quadron Custom Column', 'quadron' ),
                'tab' => Controls_Manager::TAB_LAYOUT
            ]
        );
        $element->add_control('quadron_column_width',
            [
                'label' => esc_html__( 'Change Column Width To', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => '',
                'prefix_class' => 'elementor',
                'options' => [
                    '' => esc_html__( 'None', 'quadron' ),
                    '-col-33' => esc_html__( '3 Column', 'quadron' ),
                    '-col-25' => esc_html__( '4 Column', 'quadron' ),
                    '-col-50' => esc_html__( '2 Column', 'quadron' ),
                ],
            ]
        );
        $element->end_controls_section();
    }
    public function custom_attr_to_column( $element ) {

        if( 'column' !== $element->get_name() ) {
            return;
        }
        $element->add_render_attribute( 'wrapper', 'class', $element->get_settings('quadron_column_width') );
    }
    /*****   END COLUMN CONTROLS   ******/
    
    /*****   START CONTROLS SECTION   ******/
    public function register_change_section_column_structure( $element ) {
        $element->add_control('quadron_section_column_structure_switcher',
            [
                'label' => esc_html__( 'Enable Quadron Structure Column', 'quadron' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );
        $element->add_control('quadron_section_change_column_structure',
            [
                'label' => esc_html__( 'Change Structure Column To', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block'  => 'true',
                'default' => '',
                'prefix_class' => 'nt-structure nt',
                'options' => [
                    '' => esc_html__( 'None', 'quadron' ),
                    '-col-33' => esc_html__( '3 Column', 'quadron' ),
                    '-col-25' => esc_html__( '4 Column', 'quadron' ),
                    '-col-50' => esc_html__( '2 Column', 'quadron' ),
                ],
                'condition' => ['quadron_section_column_structure_switcher' => 'yes'],
            ]
        );
        $element->add_control( 'quadron_section_indent',
            [
                'label' => esc_html__( 'Section Indent', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block'  => 'true',
                'default' => '__indent-def',
                'prefix_class' => 'section',
                'separator' => 'before',
                'options' => [
                    '__indent-def' => esc_html__( 'None', 'quadron' ),
                    '__indent-01' => esc_html__( 'Indent 1', 'quadron' ),
                    '__indent-02' => esc_html__( 'Indent 2', 'quadron' ),
                    '__indent-03' => esc_html__( 'Indent 3', 'quadron' ),
                    '__indent-04' => esc_html__( 'Indent 4', 'quadron' ),
                    '__indent-05' => esc_html__( 'Indent 5', 'quadron' ),
                    '__indent-06' => esc_html__( 'Indent 6', 'quadron' ),
                    '__indent-07' => esc_html__( 'Indent 7', 'quadron' ),
                    '__indent-08' => esc_html__( 'Indent 8', 'quadron' ),
                    '__indent-09' => esc_html__( 'Indent 9', 'quadron' ),
                    '__indent-10' => esc_html__( 'Indent 10', 'quadron' ),
                    '__indent-11' => esc_html__( 'Indent 11', 'quadron' ),
                    '__indent-12' => esc_html__( 'Indent 12', 'quadron' ),
                    '__indent-13' => esc_html__( 'Indent 13', 'quadron' ),
                    '__indent-14' => esc_html__( 'Indent 14', 'quadron' ),
                    '__indent-15' => esc_html__( 'Indent 15', 'quadron' ),
                    '__indent-16' => esc_html__( 'Indent 16', 'quadron' ),
                    '__indent-98px' => esc_html__( 'Indent 162px', 'quadron' ),
                    '__indent-02-custom' => esc_html__( 'Indent Top 98px', 'quadron' ),
                    '-default-inner' => esc_html__( 'Indent Default', 'quadron' ),
                    '-default-top' => esc_html__( 'Margin Top 148px', 'quadron' ),
                ]
            ]
        );
        $element->add_control( 'quadron_section_outdent',
            [
                'label' => esc_html__( 'Section Outdent', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block'  => 'true',
                'default' => '__outdent-def',
                'prefix_class' => 'section',
                'separator' => 'before',
                'options' => [
                    '__outdent-def' => esc_html__( 'None', 'quadron' ),
                    '-default-top' => esc_html__( 'Margin Top 148px', 'quadron' ),
                ]
            ]
        );
    }
    
    
    public function quadron_custom_attr_to_section( $element ) {
        $data     = $element->get_data();
        $type     = $data['elType'];
        $settings = $data['settings'];
        $isInner  = $data['isInner'];
        
        if( 'section' !== $element->get_name() ) {
            return;
        }
        $element->add_render_attribute( 'wrapper', 'class', $element->get_settings('quadron_section_indent') );
        $element->add_render_attribute( 'wrapper', 'class', $element->get_settings('quadron_section_outdent') );
        
        if( '0' !== $element->get_settings('quadron_section_column_structure_switcher') ) {
            $element->add_render_attribute( 'wrapper', 'class', $element->get_settings('quadron_section_change_column_structure') );
        }
    }
    
    public static function get_instance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}

Quadron_Section_Parallax::get_instance();