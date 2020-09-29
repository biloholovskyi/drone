<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Cases_Cpt_Post_Navigation_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-cases-cpt-post-navigation';
    }
    public function get_title() {
        return '(CPT) Cases Post Navigation';
    }
    public function get_icon() {
        return 'eicon-gallery-grid';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_cases_cpt_post_nav_settings',
            [
                'label' => esc_html__('Text', 'quadron'),
            ]
        );
        $this->add_control( 'prev_text',
            [
                'label' => esc_html__('Prev Text', 'quadron'),
                'type' => Controls_Manager::TEXT,
                'default' => 'PREV',
                'label_block' => true
            ]
        );
        $this->add_control( 'next_text',
            [
                'label' => esc_html__('Next Text', 'quadron'),
                'type' => Controls_Manager::TEXT,
                'default' => 'NEXT',
                'label_block' => true
            ]
        );
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( post_type_exists( 'cases') ) {
            $prev     = get_previous_post();
            $prevlink = get_permalink( $prev );
            $previmg  = quadron_aq_resize( get_the_post_thumbnail_url($prev, 'full'), 570, 125, true, true, true );

            $next     = get_next_post();
            $nextlink = get_permalink( $next );
            $nextimg  = quadron_aq_resize( get_the_post_thumbnail_url($next, 'full'), 570, 125, true, true, true );

            echo '<div class="page-nav-img">';
            if ( $prev ) {
                echo '<a href="'.$prevlink.'" class="page-nav-img__btn btn-prev">';
                    echo '<span class="wrapper-img" style="background-image:url('.$previmg.');"></span>';
                    echo '<i class="btn__icon"><svg><use xlink:href="#arrow_left"></use></svg></i>';
                    echo '<span class="btn__text">'.esc_html($settings['prev_text']).'</span>';
                echo '</a>';
            }
            if ( $next ) {
                echo '<a href="'.$nextlink.'" class="page-nav-img__btn btn-next">';
                    echo '<span class="wrapper-img" style="background-image:url('.$nextimg.');"></span>';
                    echo '<span class="btn__text">'.esc_html($settings['next_text']).'</span>';
                    echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                echo '</a>';
            }
            echo '</div>';
        }
    }
}
