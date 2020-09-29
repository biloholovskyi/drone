<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Section_Heading_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-section-heading';
    }
    public function get_title() {
        return 'Section Heading';
    }
    public function get_icon() {
        return 'eicon-t-letter';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   Text Options   ******/
        $this->start_controls_section('quadron_services_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Title
        $this->add_control('subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( 'Achievements' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( 'Quadron Progress' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title_tag',
            [
                'label'         => esc_html__( 'Title Tag', 'urip' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'h1',
                'options'       => [
                    'h1'   => esc_html__( 'h1', 'urip' ),
                    'h2'   => esc_html__( 'h2', 'urip' ),
                    'h3'   => esc_html__( 'h3', 'urip' ),
                    'h4'   => esc_html__( 'h4', 'urip' ),
                    'h5'   => esc_html__( 'h5', 'urip' ),
                    'h6'   => esc_html__( 'h6', 'urip' ),
                    'p'    => esc_html__( 'p', 'urip' ),
                    'div'  => esc_html__( 'div', 'urip' ),
                    'span' => esc_html__( 'span', 'urip' )
                ]
            ]
        );
        $this->add_control( 'indent',
            [
                'label'         => esc_html__( 'Indent', 'urip' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => '',
                'options'       => [
                    ''   => esc_html__( 'Default', 'urip' ),
                    'section-heading_indentg02'   => esc_html__( 'indent 02', 'urip' ),
                    'section-heading_indentg03'   => esc_html__( 'indent 03', 'urip' ),
                    'section-heading_indentg04'   => esc_html__( 'indent 04', 'urip' ),
                    'section-heading_indentg05'   => esc_html__( 'indent 05', 'urip' ),
                ]
            ]
        );
        $this->add_control( 'align',
            [
                'label'         => esc_html__( 'Alignment', 'urip' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => '',
                'options'       => [
                    ''   => esc_html__( 'Default', 'urip' ),
                    'text-left'   => esc_html__( 'left', 'urip' ),
                    'text-right'   => esc_html__( 'right', 'urip' ),
                    'text-center'   => esc_html__( 'center', 'urip' ),
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        $t_tag     = $settings['title_tag'] ? $settings['title_tag'] : 'h4';
        $indent    = $settings['indent'] ? ' '.$settings['indent'] : '';
        $align     = $settings['align'] ? ' '.$settings['align'] : '';
        $line      = $settings['align'] != 'text-center' ? '<i></i>' : '';

        echo '<div class="section-heading'.$indent.$align.'">';
        if ( $settings['subtitle'] ) {
            echo '<div class="description">'.$line.$settings['subtitle'].'</div>';
        }
        if ( $settings['title'] ) {
            echo '<'.$t_tag.' class="title">'.$settings['title'].'</'.$t_tag.'>';
        }
        echo '</div>';
    }
}
