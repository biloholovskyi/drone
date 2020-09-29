<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Button_Widget extends Widget_Base {

    use Quadron_Helper;

    public function get_name() {
        return 'quadron-button';
    }

    public function get_title() {
        return 'Button';
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'quadron' ];

    }

    // Registering Controls
    protected function _register_controls() {

        /*****   Button Options   ******/
        $this->start_controls_section('quadron_btn_settings',
            [
                'label'          => esc_html__( 'Button', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'quadron_btn_action',
            [
                'label'         => esc_html__( 'Button Action', 'quadron' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'custom-link',
                'options'       => [
                    'custom-link'  => esc_html__( 'Custom Link', 'quadron' ),
                    'video'        => esc_html__( 'Open Video', 'quadron' ),
                ]
            ]
        );
        $this->add_control( 'quadron_btn_video_url',
            [
                'label'         => esc_html__( 'Video URL', 'quadron' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => 'https://www.youtube.com/watch?v=mdfMT5Zi8Eo',
                'condition'     => [ 'quadron_btn_action' => 'video' ]
            ]
        );
        $this->add_control( 'quadron_btn_type',
            [
                'label'         => esc_html__( 'Button Color Type', 'quadron' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'btn-color-01',
                'options'       => [
                    'btn-color-01'     => esc_html__( 'Solid 1', 'quadron' ),
                    'btn-color-02'     => esc_html__( 'Solid 2', 'quadron' ),
                    'btn-border'       => esc_html__( 'Outline', 'quadron' ),
                ]
            ]
        );
        $this->add_control( 'quadron_btn_style',
            [
                'label'         => esc_html__( 'Button Style', 'quadron' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'btn-circle',
                'options'       => [
                    'btn-square'       => esc_html__( 'Square', 'quadron' ),
                    'btn-round'        => esc_html__( 'Round', 'quadron' ),
                    'btn-circle'       => esc_html__( 'Circle', 'quadron' )
                ]
            ]
        );
        $this->add_control( 'quadron_btn_size',
            [
                'label'         => esc_html__( 'Size', 'quadron' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'btn-md',
                'options'       => [
                    ''             => esc_html__( 'Select size', 'quadron' ),
                    'btn-lg'       => esc_html__( 'large', 'quadron' ),
                    'btn-md'       => esc_html__( 'medium', 'quadron' ),
                    'btn-sm'       => esc_html__( 'small', 'quadron' )
                ]
            ]
        );
        $this->add_responsive_control( 'quadron_btn_alignment',
            [
                'label'          => esc_html__( 'Alignment', 'quadron' ),
                'type'           => Controls_Manager::CHOOSE,
                'selectors'      => ['{{WRAPPER}} .quadron-button:not(.btn-justify)' => 'text-align: {{VALUE}};'],
                'options'        => [
                    'left'      => [
                        'title'    => esc_html__( 'Left', 'quadron' ),
                        'icon'     => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title'    => esc_html__( 'Center', 'quadron' ),
                        'icon'     => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title'    => esc_html__( 'Right', 'quadron' ),
                        'icon'     => 'fa fa-align-right'
                    ]
                ],
                'toggle'         => true,
                'default'        => 'left'
            ]
        );
        $this->add_control( 'quadron_btn_fullwidth',
            [
                'label'          => esc_html__( 'Full width', 'quadron' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'quadron' ),
                'label_off'      => esc_html__( 'No', 'quadron' ),
                'return_value'   => 'yes',
                'default'        => 'no'
            ]
        );

        $this->add_control( 'quadron_btn_text',
            [
                'label'         => esc_html__( 'Button Text', 'quadron' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Button Text', 'quadron' )
            ]
        );

        $this->add_control( 'quadron_btn_link',
            [
                'label'         => esc_html__( 'Button Link', 'quadron' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'         => '#',
                    'is_external' => ''
                ],
                'show_external' => true,
                'condition'     => [ 'quadron_btn_action!' => 'btn-trigger' ]
            ]
        );
        $this->add_control( 'quadron_use_icon',
            [
                'label'         => esc_html__( 'Use Icon', 'quadron' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'quadron' ),
                'label_off'     => esc_html__( 'No', 'quadron' ),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );
        $this->add_control( 'quadron_btn_icon',
            [
                'label'        => __( 'Button Icon', 'quadron' ),
                'type'         => Controls_Manager::ICONS,
                'default'      => [
                    'value'        => '',
                    'library'      => 'solid'
                ],
                'condition'    => ['quadron_use_icon' => 'yes']
            ]
        );
        $this->add_control( 'quadron_btn_icon_pos',
            [
                'label'         => esc_html__( 'Icon Position', 'quadron' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'btn-icon-right',
                'options'       => [
                    'btn-icon-left'    => esc_html__( 'Before', 'quadron' ),
                    'btn-icon-right'   => esc_html__( 'After', 'quadron' )
                ],
                'condition'     => ['quadron_use_icon' => 'yes']
            ]
        );

        $this->add_control( 'quadron_icon_spacing',
            [
                'label'         => esc_html__( 'Icon Spacing', 'quadron' ),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'   => [
                        'max' => 60
                    ]
                ],
                'selectors'     => [
                    '{{WRAPPER}} .quadron-button .btn-icon-left i' => 'margin-right: {{SIZE}}px;',
                    '{{WRAPPER}} .quadron-button .btn-icon-right i' => 'margin-left: {{SIZE}}px;'
                ],
                'condition'    => ['quadron_use_icon' => 'yes']
            ]
        );
        $this->end_controls_section();

        /*****   End Button Options   ******/


        /***** Button Style ******/
        $this->start_controls_section('quadron_btn_styling',
            [
                'label'         => esc_html__( 'Button Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs('quadron_btn_tabs');
        $this->start_controls_tab( 'quadron_btn_normal_tab',
            [ 'label'           => esc_html__( 'Normal', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array(),$id='quadron_btn_normal',$selector='.quadron-button .btn');
        $this->end_controls_tab();

        $this->start_controls_tab('quadron_btn_hover_tab',
            [ 'label'           => esc_html__( 'Hover', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo','margin'),$id='quadron_btn_hover',$selector='.quadron-button .btn:hover');
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /***** End Button Styling *****/

    }

    protected function render() {

        $settings     = $this->get_settings_for_display();
        $elementid    = $this->get_id();

        $btn_type     = $settings['quadron_btn_type'] ? ' '.$settings['quadron_btn_type'] : ' btn-color-01';
        $btn_size     = $settings['quadron_btn_size'] ? ' '.$settings['quadron_btn_size'] : '';
        $btn_style    = $settings['quadron_btn_style'] ? ' '.$settings['quadron_btn_style'] : ' btn-circle';
        $btn_full     = $settings['quadron_btn_fullwidth'] == 'yes' ? ' btn-justify' : '';

        $iconpos      = $settings['quadron_btn_icon']['value'] ? ' '.$settings['quadron_btn_icon_pos'] : '';
        $target       = $settings['quadron_btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow     = $settings['quadron_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $btnicon      = $settings['quadron_use_icon'] == 'yes' ? ' has-icon' : '';

        $btnaction    = '';
        if($settings['quadron_btn_action'] == 'video'){
            $btnlink = $settings['quadron_btn_video_url'];
            $btnaction = ' videolink video-popup';
        } else {
            $btnlink = $settings['quadron_btn_link']['url'];
        }

        echo '<div class="quadron-button'.$btn_full.$btnicon.'">';

            if ( $settings['quadron_btn_icon_pos'] == 'btn-icon-left' ) {

                echo '<a class="btn'.$btn_type.$btnaction.$btn_size.$btn_style.$iconpos.'" href="'.$btnlink.'"'.$target.$nofollow.'>'; if ( $settings['quadron_btn_icon']['value'] ) { Icons_Manager::render_icon( $settings['quadron_btn_icon'], [ 'aria-hidden' => 'true' ] ); } echo $settings['quadron_btn_text'] . '</a>';
            } else {

                echo '<a class="btn'.$btn_type.$btnaction.$btn_size.$btn_style.$iconpos.'" href="'.$btnlink.'"'.$target.$nofollow.'>'.$settings['quadron_btn_text'].' ';
                if ( $settings['quadron_btn_icon']['value'] ) { Icons_Manager::render_icon( $settings['quadron_btn_icon'], [ 'aria-hidden' => 'true' ] ); } echo '</a>';
            }
        echo '</div>';
    }
}
