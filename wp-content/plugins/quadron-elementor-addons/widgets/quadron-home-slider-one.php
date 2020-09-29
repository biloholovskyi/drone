<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Home_Slider_One_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-home-slider-one';
    }
    public function get_title() {
        return 'Home Slider';
    }
    public function get_icon() {
        return 'eicon-sliders';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        $this->start_controls_section( 'home_slider_section',
            [
                'label' => esc_html__( 'Slider Item', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'slider_items',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [
                        'slider_item_type' => 'style1',
                        'slider_subtitle' => 'Qadron Spark Controller Combo',
                        'slider_title' => 'The Ultraportable <br>Drone for the Best Video',
                        'slider_desc' => 'The ultraportable Copter features high-end flight performance and functionality for limitless exploration.',
                        'slider_btn_title' => 'DISCOVER',
                        'slider_btn_link' => '#'
                    ],
                    [
                        'slider_item_type' => 'style2',
                        'slider_subtitle' => 'Quadron Air',
                        'slider_title' => 'Awesome Quadron for <br>the Practice Inspection',
                        'slider_btn_title' => 'DISCOVER',
                        'slider_btn_link' => '#'
                    ],
                    [
                        'slider_item_type' => 'style3',
                        'slider_subtitle' => 'Quadron Air',
                        'slider_title' => 'The Best Video <br>Camera for Copters',
                        'slider_desc' => 'The ultraportable Copter features high-end flight performance and functionality for limitless exploration.',
                        'slider_btn_title' => 'DISCOVER',
                        'slider_btn_link' => '#'
                    ]
                ],
                'fields' => [
                    [
                        'name' => 'slider_item_type',
                        'label' => esc_html__('Slider Item Style', 'quadron'),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                            'style1' => esc_html__('Style 1', 'quadron'),
                            'style2' => esc_html__('Style 2', 'quadron'),
                            'style3' => esc_html__('Style 3', 'quadron')
                        ],
                        'default' => 'style2'
                    ],
                    [
                        'name' => 'slider_image',
                        'label' => esc_html__( 'Image', 'quadron' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => Utils::get_placeholder_image_src()]
                    ],
                    [
                        'name' => 'slider_number',
                        'label' => esc_html__( 'Image', 'quadron' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => Utils::get_placeholder_image_src()],
                        'condition' => ['slider_item_type' => 'style3']
                    ],
                    [
                        'name' => 'slider_subtitle',
                        'label' => esc_html__( 'Subtitle', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Quadron Air',
                        'pleaceholder' => esc_html__( 'Enter subtitle here', 'quadron' )
                    ],
                    [
                        'name' => 'slider_title',
                        'label' => esc_html__( 'Title', 'quadron' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Awesome Quadron for <br>the Practice Inspection',
                        'pleaceholder' => esc_html__( 'Enter title here', 'quadron' )
                    ],
                    [
                        'name' => 'slider_desc',
                        'label' => esc_html__( 'Description', 'quadron' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'pleaceholder' => esc_html__( 'Enter description here', 'quadron' ),
                        'default' => 'The ultraportable Copter features high-end flight performance and functionality for limitless exploration.',
                        'condition' => ['slider_item_type!' => 'style2']
                    ],
                    [
                        'name' => 'slider_btn_title',
                        'label' => esc_html__( 'Button Title', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'DISCOVER',
                        'pleaceholder' => esc_html__( 'Enter button title here', 'quadron' )
                    ],
                    [
                        'name' => 'slider_btn_link',
                        'label' => esc_html__( 'Button Link', 'quadron' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true'
                        ],
                        'placeholder' => esc_html__( 'Place URL here', 'quadron' )
                    ]
                ],
                'title_field' => '{{slider_title}}'
            ]
        );
        $this->add_control( 'hideline',
            [
                'label'          => esc_html__( 'Hide Background Line?', 'quadron' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'quadron' ),
                'label_off'      => esc_html__( 'No', 'quadron' ),
                'return_value'   => 'yes',
                'default'        => 'no',
                'separator'      => 'before'
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings    = $this->get_settings_for_display();
        $elementid   = $this->get_id();
        $line_image  = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $line_image2 = plugins_url( 'assets/front/img/main-slider-01-wrapper.png', __DIR__ );
        $line_image3 = plugins_url( 'assets/front/img/main-slider-02-wrapper.png', __DIR__ );
        $loading     = plugins_url( 'assets/front/img/loader-large.svg', __DIR__ );
        $lineimg = 'yes' != $settings['hideline'] ? ' data-bg="'.$line_image.'"' : '';
        echo '<div class="container-indent section--bg-vertical-line"'.$lineimg.'>';
            echo '<div class="mainSlider-layout">';
                echo '<div class="loading-content" data-bg="'.$loading.'"></div>';
                echo '<div class="mainSlider mainSlider-size-01 slick-dots-01" data-arrow="false" data-dots="true">';
                    foreach ( $settings['slider_items'] as $item ) {
                        if ('style1' == $item['slider_item_type']) {
                            echo '<div class="slide">';
                                echo '<div class="main-slider-02-wrapper">';
                                    echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                                    echo '<div class="slide-content">';
                                        echo '<div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">';
                                            echo '<div class="slide-layout-01">';
                                                if($item['slider_subtitle']){
                                                    echo '<div class="slide-subtitle">'.$item['slider_subtitle'].'</div>';
                                                }
                                                if($item['slider_title']){
                                                    echo '<div class="slide-title">'.$item['slider_title'].'</div>';
                                                }
                                                if($item['slider_desc']){
                                                    echo '<div class="slide-description">'.$item['slider_desc'].'</div>';
                                                }
                                                if($item['slider_btn_title']){
                                                    echo '<a class="btn-link-icon btn-link-icon__md" href="'.esc_attr( $item['slider_btn_link']['url'] ).'">';
                                                        echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                                        echo '<span class="btn__text">'.$item['slider_btn_title'].'</span>';
                                                    echo '</a>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        } else {
                            $style = 'style2' == $item['slider_item_type'] ? 'slide-layout-02 text-center' : 'slide-layout-03 text-right';
                            $anim  = 'style2' == $item['slider_item_type'] ? 'fadeInUpSm' : 'fadeInRightSm';
                            echo '<div class="slide">';
                                echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                                echo '<div class="slide-content">';
                                    echo '<div class="container" data-animation="'.$anim.'" data-animation-delay="0s">';
                                        echo '<div class="'.$style.'">';
                                            if($item['slider_number']['url'] && 'style3' == $item['slider_item_type']){
                                                echo '<img class="slide-icon" src="'.$item['slider_number']['url'].'" alt="'.$item['slider_title'].'">';
                                            }
                                            if($item['slider_subtitle']){
                                                echo '<div class="slide-subtitle">'.$item['slider_subtitle'].'</div>';
                                            }
                                            if($item['slider_title']){
                                                echo '<div class="slide-title">'.$item['slider_title'].'</div>';
                                            }
                                            if($item['slider_desc'] && 'style3' == $item['slider_item_type']){
                                                echo '<div class="slide-description">'.$item['slider_desc'].'</div>';
                                            }
                                            if($item['slider_btn_title']){
                                                echo '<a class="btn-link-icon btn-link-icon__md" href="'.esc_attr( $item['slider_btn_link']['url'] ).'">';
                                                    echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                                    echo '<span class="btn__text">'.$item['slider_btn_title'].'</span>';
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
