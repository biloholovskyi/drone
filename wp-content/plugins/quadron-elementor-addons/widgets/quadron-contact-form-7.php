<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Contact_Form_7_Widget extends Widget_Base {

    use Quadron_Helper;

    public function get_name() {
        return 'quadron-contact-form-7';
    }

    public function get_title() {
        return 'Contact Form 7';
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return [ 'quadron' ];
    }

    // Registering Controls
    protected function _register_controls() {

        // Registering Post Grid Preset Meta Style Controls
        $this->start_controls_section( 'quadron_cf7_global_controls',
            [
                'label'         => esc_html__( 'Form Data', 'quadron' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Post Exclude Filter Control
        $this->add_control('quadron_cf7_form_id_control',
            [
                'label'             => esc_html__( 'Select Form', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => false,
                'options'           => $this->quadron_get_cf7(),
                'description'       => 'Select Form to Embed'
            ]
        );

        $this->end_controls_section();

        /***** Button Style ******/
        $this->start_controls_section('cf7_form_style_section',
            [
                'label'         => esc_html__( 'Form Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
		$this->add_responsive_control( 'cf7_form_custom_width',
			[
				'label' => esc_html__( 'Form Max Width', 'quadron' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000
					]
				],
				'selectors' => [ '{{WRAPPER}} form.wpcf7-form'  => 'width: {{SIZE}}px;max-width: {{SIZE}}px;margin:0 auto;display:block;positon:relative;' ]
			]
		);
		$this->add_responsive_control( 'cf7_form_input_height',
			[
				'label' => esc_html__( 'Input Height', 'quadron' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000
					]
				],
				'selectors' => [ '{{WRAPPER}} input:not(.wpcf7-submit)'  => 'height: {{SIZE}}px;' ]
			]
		);
        $this->start_controls_tabs( 'cf7_form_tabs');
        $this->start_controls_tab( 'cf7_form_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array(),$id='cf7_form_normal_style',$selector='input:not(.wpcf7-submit),{{WRAPPER}} textarea');
        $this->add_control( 'cf7_form_opacity_important_normal_style',
            [
                'label'         => esc_html__( 'Opacity', 'quadron' ),
                'type'          => Controls_Manager::NUMBER,
                'min'           => 0,
                'max'           => 1,
                'step'          => 0.1,
                'default'       => '',
                'separator'     => 'before',
                'selectors'     => ['{{WRAPPER}} input:not(.wpcf7-submit),{{WRAPPER}} textarea' => 'opacity: {{VALUE}} !important;']
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab( 'cf7_form_hover_tab',
            [ 'label'  => esc_html__( 'Hover', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo','margin'),$id='cf7_form_hover_style',$selector='input:not(.wpcf7-submit):hover,{{WRAPPER}} textarea:hover');
        $this->add_control( 'cf7_form_opacity_important_hover_style',
            [
                'label'         => esc_html__( 'Opacity', 'quadron' ),
                'type'          => Controls_Manager::NUMBER,
                'min'           => 0,
                'max'           => 1,
                'step'          => 0.1,
                'default'       => '',
                'separator'     => 'before',
                'selectors'     => ['{{WRAPPER}} input:not(.wpcf7-submit):hover,{{WRAPPER}} textarea:hover' => 'opacity: {{VALUE}} !important;']
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab( 'cf7_form_focus_tab',
            [ 'label'  => esc_html__( 'Focus', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo','margin'),$id='cf7_form_focus_style',$selector='input:not(.wpcf7-submit):focus,{{WRAPPER}} textarea:focus');
        $this->add_control( 'cf7_form_opacity_important_focus_style',
            [
                'label'         => esc_html__( 'Opacity', 'quadron' ),
                'type'          => Controls_Manager::NUMBER,
                'min'           => 0,
                'max'           => 1,
                'step'          => 0.1,
                'default'       => '',
                'separator'     => 'before',
                'selectors'     => ['{{WRAPPER}} input:not(.wpcf7-submit):focus,{{WRAPPER}} textarea:focus' => 'opacity: {{VALUE}} !important;']
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /***** Button Style ******/
        $this->start_controls_section('cf7_formbtn_style_section',
            [
                'label'         => esc_html__( 'Form Button Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
		$this->add_responsive_control( 'cf7_form_btn_custom_width',
			[
				'label' => esc_html__( 'Form Max Width', 'quadron' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000
					]
				],
				'selectors' => [ '{{WRAPPER}} input.wpcf7-submit'  => 'width: {{SIZE}}px;max-width: {{SIZE}}px;margin:0 auto;display:block;positon:relative;' ]
			]
		);
		$this->add_responsive_control( 'cf7_form_btn_input_height',
			[
				'label' => esc_html__( 'Input Height', 'quadron' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000
					]
				],
				'selectors' => [ '{{WRAPPER}} input.wpcf7-submit'  => 'height: {{SIZE}}px;' ]
			]
		);
        $this->start_controls_tabs( 'cf7_formbtn_tabs');
        $this->start_controls_tab( 'cf7_formbtn_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array(),$id='cf7_formbtn_normal_style',$selector='.wpcf7-submit');
        $this->add_control( 'cf7_formbtn_opacity_important_normal_style',
            [
                'label'         => esc_html__( 'Opacity', 'quadron' ),
                'type'          => Controls_Manager::NUMBER,
                'min'           => 0,
                'max'           => 1,
                'step'          => 0.1,
                'default'       => '',
                'separator'     => 'before',
                'selectors'     => ['{{WRAPPER}} .wpcf7-submit' => 'opacity: {{VALUE}} !important;']
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab( 'cf7_formbtn_hover_tab',
            [ 'label'  => esc_html__( 'Hover', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo','margin'),$id='cf7_formbtn_hover_style',$selector='.wpcf7-submit:hover');
        $this->add_control( 'cf7_formbtn_opacity_important_hover_style',
            [
                'label'         => esc_html__( 'Opacity', 'quadron' ),
                'type'          => Controls_Manager::NUMBER,
                'min'           => 0,
                'max'           => 1,
                'step'          => 0.1,
                'default'       => '',
                'separator'     => 'before',
                'selectors'     => ['{{WRAPPER}} .wpcf7-submit:hover' => 'opacity: {{VALUE}} !important;']
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        if (!empty($settings['quadron_cf7_form_id_control'])){
            echo '<div class="section-form">';
                echo do_shortcode( '[contact-form-7 id="'.$settings['quadron_cf7_form_id_control'].'"]' );
            echo '</div>';
        } else {
            echo "Please Select a Form";
        }
    }
}
