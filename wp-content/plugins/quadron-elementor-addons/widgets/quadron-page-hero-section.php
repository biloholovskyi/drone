<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Page_Hero_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-page-hero-section';
    }
    public function get_title() {
        return 'Page Hero';
    }
    public function get_icon() {
        return 'eicon-columns';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_page_hero_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle_type',
            [
                'label' => esc_html__( 'Subtitle Type', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => 'sitename',
                'options' => [
                    'sitename' => esc_html__( 'Site Name', 'quadron' ),
                    'custom' => esc_html__( 'Custom Text', 'quadron' )
                ]
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Quadron.',
                'label_block' => true,
                'condition' => [ 'subtitle_type' => 'custom' ]
            ]
        );
        $this->add_control( 'title_type',
            [
                'label' => esc_html__( 'Title Type', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => 'page',
                'options' => [
                    'page' => esc_html__( 'Page Title', 'quadron' ),
                    'custom' => esc_html__( 'Custom Text', 'quadron' )
                ]
            ]
        );
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => get_the_title(),
                'label_block' => true,
                'condition' => [ 'title_type' => 'custom' ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'aboutus_three_background',
                'label' => esc_html__( 'Background Image', 'quadron' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .subpage-header__bg',
                'separator' => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        echo '<div class="section--no-padding section">';
            echo '<div class="subpage-header">';
                echo '<div class="subpage-header__bg">';
                    echo '<div class="container">';
                        echo '<div class="subpage-header__block">';
                            if ( $settings['subtitle_type'] == 'custom' ) {
                                if ( $settings['subtitle'] ) {
                                    echo '<div class="subpage-header__caption">'.$settings['subtitle'].'</div>';
                                }
                            } else {
                                echo '<div class="subpage-header__caption">'.get_bloginfo('name').'</div>';
                            }
                            if ( $settings['title_type'] == 'custom' ) {
                                if ( $settings['title'] ) {
                                    echo '<h1 class="subpage-header__title">'.$settings['title'].'</h1>';
                                    echo '<div class="subpage-header__line"></div>';
                                }
                            } else {
                                echo '<h1 class="subpage-header__title">'.get_the_title().'</h1>';
                                echo '<div class="subpage-header__line"></div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
