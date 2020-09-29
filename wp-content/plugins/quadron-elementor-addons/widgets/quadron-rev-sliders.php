<?php


use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Rev_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'quadron-rev-sliders';
    }

    public function get_title() {
        return 'Revolution Sliders';
    }

    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_categories() {
        return [ 'quadron' ];
    }


    // Registering Controls
    protected function _register_controls() {

        // Registering Post Grid Preset Meta Style Controls
        $this->start_controls_section( 'quadron_rev_slider_controls_section',
            [
                'label'         => esc_html__( 'Slider Data', 'quadron' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Post Exclude Filter Control
        $this->add_control( 'quadron_rev_slider_id_control',
            [
                'label'             => esc_html__( 'Select Slider', 'quadron' ),
                'type'              => Controls_Manager::SELECT,
                'multiple'          => false,
                'options'           => $this->nt_get_rev_sliders(),
                'description'       => 'Select Slider to Embed'
            ]
        );

        $this->end_controls_section();

    }

    public function nt_get_rev_sliders() {

        $options = array();
        if ( class_exists( 'RevSlider' ) ) {
            $rev_slider = new RevSlider();
            $rev_sliders = $rev_slider->getAllSliderAliases();

            if ( ! empty( $rev_sliders ) && ! is_wp_error( $rev_sliders ) ) {
                foreach ( $rev_sliders as $slider ) {
                    $options[ $slider ] = $slider;
                }
            }

        } else {
            $options = esc_html__('No sliders exist.', 'quadron');
        }

        return $options;
    }


    protected function render() {

        $settings  = $this->get_settings_for_display();

        if (!empty($settings['quadron_rev_slider_id_control'])){
            echo do_shortcode(sprintf('[rev_slider alias="%s"]', $settings['quadron_rev_slider_id_control']));
        } else {
            echo esc_html__('No sliders exist. You must create one first.', 'quadron');
        }

    }

}
