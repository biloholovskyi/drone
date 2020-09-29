<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Contact_Form_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-contact-form-section';
    }
    public function get_title() {
        return 'Contact Form 7 Section';
    }
    public function get_icon() {
        return 'eicon-form-horizontal';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_contact_form_text_settings',
            [
                'label' => esc_html__( 'Text and Form', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'section_type',
            [
                'label' => esc_html__( 'Section Type', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Select a type', 'quadron' ),
                    '1' => esc_html__( 'Type 1', 'quadron' ),
                    '2' => esc_html__( 'Type 2', 'quadron' )
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'form_background',
                'label' => esc_html__( 'Background', 'quadron' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .section--bg-wrapper-04, {{WRAPPER}} .section--bg-01, section--bg-vertical-line',
                'separator' => 'before',
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Contacts' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Get in Touch',
                'label_block' => true,
            ]
        );
        $this->add_control('quadron_cf7_form_id_control',
            [
                'label' => esc_html__( 'Select Form', 'quadron' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => false,
                'options' => $this->quadron_get_cf7(),
                'description' => 'Select Form to Embed'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
    }

    protected function render() {

        $settings  = $this->get_settings_for_display();

        if ( $settings['section_type'] == '1' ) {
            echo '<div class="section section-form layout-color-01" style="overflow: hidden;">';
                echo '<div class="container">';
                    if ( $settings['subtitle'] || $settings['title'] ) {
                        echo '<div class="row">';
                            echo '<div class="col-md-5 col-lg-4"></div>';
                            echo '<div class="col-md-7 col-lg-8">';
                                echo '<div class="section-heading section-heading_indentg03">';
                                    if ( $settings['subtitle'] ) {
                                        echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                                    }
                                    if ( $settings['title'] ) {
                                        echo '<h4 class="title">'.$settings['title'].'</h4>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '<div class="contact-form form-default form-default__color-01">';
                        if (!empty($settings['quadron_cf7_form_id_control'])){
                            echo do_shortcode( '[contact-form-7 id="'.$settings['quadron_cf7_form_id_control'].'"]' );
                        } else {
                            echo "Please Select a Form";
                        }
                    echo '</div>';

                echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="section section-form section--bg-vertical-line">';
                echo '<div class="container">';
                    if ( $settings['subtitle'] || $settings['title'] ) {
                        echo '<div class="section-heading section-heading_indentg02">';
                            if ( $settings['subtitle'] ) {
                                echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                            }
                            if ( $settings['title'] ) {
                                echo '<h4 class="title">'.$settings['title'].'</h4>';
                            }
                        echo '</div>';
                    }
                    if (!empty($settings['quadron_cf7_form_id_control'])){
                        echo do_shortcode( '[contact-form-7 id="'.$settings['quadron_cf7_form_id_control'].'"]' );
                    } else {
                        echo "Please Select a Form";
                    }
                echo '</div>';
            echo '</div>';
        }
    }
}
